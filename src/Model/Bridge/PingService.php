<?php declare(strict_types=1);

namespace App\Model\Bridge;

class PingService extends Service
{
    /** @var Formatter */
    protected $implementation;

    public function get(): string
    {
        return $this->implementation->format('pong');
    }
}
