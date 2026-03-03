<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/03/2026, 23:03
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    UserMailer.php
 * @date    03/03/2026
 * @time    22:56
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Service;

use App\Entity\User\User;
use DateTimeImmutable;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

/**
 * Centraliza todos los correos transaccionales relacionados con la cuenta del usuario.
 */
final readonly class UserMailer
{
    public function __construct(
        private MailerInterface $mailer,
        private LoggerInterface $logger,
        private string          $appTitle,
    ) {}

    /**
     * Envía la confirmación de solicitud de borrado de cuenta.
     * Incluye la fecha prevista de eliminación definitiva y la IP desde la que se solicitó,
     * para que el usuario pueda detectar un uso no autorizado de su cuenta.
     *
     * @throws TransportExceptionInterface
     */
    public function sendAccountDeletionRequest(User $user, string $requestIp): void
    {
        $email = new TemplatedEmail()
            ->to(new Address((string)$user->getEmail(), $user->getUserIdentifier()))
            ->subject(sprintf('[%s] Solicitud de borrado de cuenta recibida', $this->appTitle))
            ->htmlTemplate('emails/user/account_deletion_request.html.twig')
            ->textTemplate('emails/user/account_deletion_request.txt.twig')
            ->context([
                'user'        => $user,
                'deletedAt'   => $user->getDeletedAt(),
                'requestIp'   => $requestIp,
                'requestedAt' => new DateTimeImmutable(),
            ])
        ;

        $this->mailer->send($email);

        $this->logger->info('Solicitud de borrado de cuenta enviada a {email}, solicitud desde {ip}', [
            'email' => $user->getEmail(),
            'ip'    => $requestIp,
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendAccountRemoveWarning(User $user): void
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
