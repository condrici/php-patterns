<?php declare(strict_types=1);

namespace App\Model\Observer;

use SplSubject;
use SplObjectStorage;
use SplObserver;

class User implements SplSubject
{
    /** @var SplObjectStorage  */
    private $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function changeEmail()
    {
        $this->notify();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }


}