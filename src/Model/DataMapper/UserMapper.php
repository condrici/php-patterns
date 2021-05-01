<?php declare(strict_types=1);

namespace App\Model\DataMapper;

use InvalidArgumentException;

class UserMapper
{
    /** @var StorageAdapter */
    private $storageAdapter;

    public function __construct(StorageAdapter $storageAdapter)
    {
        $this->storageAdapter = $storageAdapter;
    }

    public function findById(int $id): User
    {
        $result = $this->storageAdapter->find($id);

        if ($result === null) {
            throw new InvalidArgumentException("User #$id not found");
        }

        return $this->mapRowToUser($result);
    }

    private function mapRowToUser(array $row): User
    {
        return User::fromState($row);
    }
}
