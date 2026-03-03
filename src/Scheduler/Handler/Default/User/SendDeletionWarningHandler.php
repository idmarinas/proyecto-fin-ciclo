<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/03/2026, 23:03
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

use App\Repository\User\UserRepository;
use App\Service\UserMailer;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Scheduler\Attribute\AsPeriodicTask;
use Throwable;

#[AsPeriodicTask('1 hour')]
final readonly class SendDeletionWarningHandler
{
    public function __construct(
        private UserRepository         $userRepository,
        private EntityManagerInterface $em,
        private UserMailer             $mailer,
        private LoggerInterface        $logger
    ) {}

    public function __invoke(): void
    {
        $users = $this->userRepository->findPendingDeletionWarning();

        if (empty($users)) {
            return;
        }

        foreach ($users as $user) {
            try {
                $this->mailer->sendAccountRemoveWarning($user);
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
}
