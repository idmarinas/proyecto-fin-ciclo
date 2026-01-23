<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 23/01/2026, 22:23
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    User.php
 * @date    10/01/2026
 * @time    13:36
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Entity\User;

use App\Repository\User\UserRepository;
use App\Traits\Entity\BanTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\SoftDeleteable;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Timestampable;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Idm\Bundle\Common\Traits\Entity\UuidTrait;
use Stringable;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'app.email.not_unique')]
#[Gedmo\SoftDeleteable]
class User implements Stringable, UserInterface, PasswordAuthenticatedUserInterface, SoftDeleteable, Timestampable
{
    use UuidTrait;
    use BanTrait;
    use SoftDeleteableEntity;
    use TimestampableEntity;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $username = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avatar = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var ?string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column]
    private bool $isVerified = false;

    #[ORM\Column]
    private bool $termsAccepted = false;

    #[ORM\Column]
    private bool $privacyAccepted = false;

    public function __toString (): string
    {
        return (string)$this->username ?: (string)$this->email;
    }

    public function getEmail (): ?string
    {
        return $this->email;
    }

    public function setEmail (string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername (): ?string
    {
        return $this->username;
    }

    public function setUsername (string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getAvatar (): ?string
    {
        return $this->avatar;
    }

    public function setAvatar (?string $avatar): static
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier (): string
    {
        return (string)$this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles (): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles (array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword (): ?string
    {
        return $this->password;
    }

    public function setPassword (string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function isVerified (): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified (bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function isTermsAccepted (): bool
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted (bool $termsAccepted): static
    {
        $this->termsAccepted = $termsAccepted;

        return $this;
    }

    public function isPrivacyAccepted (): bool
    {
        return $this->privacyAccepted;
    }

    public function setPrivacyAccepted (bool $privacyAccepted): static
    {
        $this->privacyAccepted = $privacyAccepted;

        return $this;
    }

    /**
     * Ensure the session doesn't contain actual password hashes by CRC32C-hashing them, as supported since Symfony 7.3.
     */
    public function __serialize (): array
    {
        $data = (array)$this;
        $data["\0" . self::class . "\0password"] = hash('crc32c', $this->password);

        return $data;
    }
}
