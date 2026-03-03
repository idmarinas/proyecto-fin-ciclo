<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/03/2026, 22:48
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    SendDeletionWarningHandler.php
 * @date    03/03/2026
 * @time    00:00
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Scheduler\Handler\Default\User;

use App\Entity\User\User;
use App\Repository\User\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Scheduler\Attribute\AsPeriodicTask;
use Throwable;

#[AsPeriodicTask('1 hour')]
final readonly class SendDeletionWarningHandler
{
    public function __construct(
        private UserRepository         $userRepository,
        private EntityManagerInterface $em,
        private MailerInterface        $mailer,
        private LoggerInterface        $logger,
        private string                 $appTitle,
    ) {}

    public function __invoke(): void
    {
        $users = $this->userRepository->findPendingDeletionWarning();

        if (empty($users)) {
            return;
        }

        foreach ($users as $user) {
            try {
                $this->sendWarning($user);
                $user->markDeletionWarningSent();
                $this->em->persist($user);
            } catch (Throwable $e) {
                // Registramos el error, pero seguimos con el resto de usuarios
                $this->logger->error('Error al enviar aviso de eliminación a {email}: {error}', [
                    'email' => $user->getEmail(),
                    'error' => $e->getMessage(),
                ]);
            }
        }

        $this->em->flush();
    }

    /**
     * @throws TransportExceptionInterface
     */
    private function sendWarning(User $user): void
    {
        $deletedAt = $user->getDeletedAt();

        $email = new TemplatedEmail()
            ->to(new Address((string)$user->getEmail(), $user->getUserIdentifier()))
            ->subject(sprintf('[%s] Tu cuenta será eliminada en menos de 24 horas', $this->appTitle))
            ->htmlTemplate('emails/user/deletion_warning.html.twig')
            ->textTemplate('emails/user/deletion_warning.txt.twig')
            ->context([
                'user'      => $user,
                'deletedAt' => $deletedAt,
            ])
        ;

        $this->mailer->send($email);

        $this->logger->info('Aviso de eliminación enviado a {email}, eliminación prevista: {date}', [
            'email' => $user->getEmail(),
            'date'  => $deletedAt?->format('d/m/Y H:i'),
        ]);
    }
}
