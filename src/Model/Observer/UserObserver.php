<?php declare(strict_types=1);

namespace App\Model\Observer;

use SplObserver;
use SplSubject;

class UserObserver implements SplObserver
{
    /** @var SplSubject[]  */
    private $changedUsers = [];

    public function update(SplSubject $subject)
    {
        $this->changedUsers[] = clone $subject;
    }

    public function getChangedUsers(): array
    {
        return $this->changedUsers;
    }
}