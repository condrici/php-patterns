<?php declare(strict_types=1);

namespace App\Model\DataMapper;

class User
{
    /** @var string */
    private $username;

    /** @var string */
    private $email;

    public static function fromState(array $state): User
    {
        // validate state before accessing keys!

        return new self(
            $state['username'],
            $state['email']
        );
    }

    public function __construct(string $username, string $email)
    {
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
