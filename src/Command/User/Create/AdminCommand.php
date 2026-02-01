<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/02/2026, 14:27
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    AdminCommand.php
 * @date    01/02/2026
 * @time    12:00
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Command\User\Create;

use App\Entity\User\User;
use App\Traits\Command\SymfonyStyleTrait;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Validation;

#[AsCommand(
    name       : 'app:user:create:admin',
    description: 'Crear un usuario administrador o super administrador',
)]
final class AdminCommand extends Command
{
    use SymfonyStyleTrait;

    public function __construct (
        private EntityManagerInterface      $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {
        parent::__construct();
    }

    protected function configure (): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email del administrador a crear')
            ->addArgument('username', InputArgument::OPTIONAL, 'Nombre de usuario del administrador a crear')
            ->addArgument('password', InputArgument::OPTIONAL, 'Contraseña de la cuenta del administrador a crear')
            ->addOption('super', null, InputOption::VALUE_NONE, 'Crear el Admin como super administrador')
        ;
    }

    protected function execute (InputInterface $input, OutputInterface $output): int
    {
        self::symfonyStyle($input, $output);
        $isSuperAdmin = $input->getOption('super');
        $email = $input->getArgument('email');
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');

        $user = new User();
        $user
            ->setEmail($email)
            ->setUsername($username)
            ->setRoles(['ROLE_ADMIN'])
            ->setCreatedAt(new DateTime())
            ->setPassword($this->passwordHasher->hashPassword($user, $password))
        ;

        $super = '';
        if ($isSuperAdmin && $this->canCreateSuperAdmin()) {
            $user->setRoles(['ROLE_SUPER_ADMIN']);
            $super = 'Super ';
        }

        try {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        } catch (Exception $exception) {
            self::io()->note('No se pudo crear al administrador.');
            self::io()->error($exception->getMessage());

            return Command::FAILURE;
        }

        self::io()->success(
            sprintf('%sAdministrador "%s" con email "%s", creado correctamente', $super, $username, $email)
        );

        return Command::SUCCESS;
    }

    #[Override]
    protected function interact (InputInterface $input, OutputInterface $output): void
    {
        self::symfonyStyle($input, $output);

        $email = $input->getArgument('email');
        $validators = [new NotBlank(allowNull: false)];
        $emailV = [
            new Email(),
            new Callback(function ($email, ExecutionContextInterface $context): void {
                $exists = null !== $this->entityManager->getRepository(User::class)->findOneByEmail($email);

                if ($exists) {
                    $context->addViolation('Ya existe un usuario con ese email.');
                }
            }),
            ...$validators,
        ];

        if (empty($email) || !Validation::createIsValidCallable(...$emailV)($email)) {
            $email = self::io()->ask(
                'Escribe el email que tendrá el nuevo administrador',
                null,
                Validation::createCallable(...$emailV)
            );
            $input->setArgument('email', $email);
        }

        $username = $input->getArgument('username');

        if (empty($username)) {
            $username = self::io()->ask('Escribe el nombre de usuario del nuevo administrador');

            $input->setArgument('username', $username);
        }

        $password = $input->getArgument('password');
        if (empty($password) || !Validation::createIsValidCallable(...$validators)($password)) {
            $password = self::io()->askHidden(
                'Contraseña para el nuevo administrador',
                Validation::createCallable(...$validators)
            );

            $input->setArgument('password', $password);
        }
    }

    private function canCreateSuperAdmin (): bool
    {
        // Entity manager
        $qb = $this->entityManager->getRepository(User::class)->createQueryBuilder('u');

        $count = $qb
            ->select('COUNT(1)')
            ->where('u.roles LIKE :super')
            ->setParameter('super', '%"ROLE_SUPER_ADMIN"%')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        $canCreate = $count < 2;

        if (!$canCreate) {
            self::io()->warning('Ya existen 2 Super Administradores, no se puede crear más.');
        }

        return $canCreate;
    }
}
