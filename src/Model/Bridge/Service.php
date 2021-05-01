<?php declare(strict_types=1);

namespace App\Model\Bridge;

abstract class Service
{
    /** @var Formatter */
    protected $implementation;

    public function __construct(Formatter $implementation)
    {
        $this->implementation = $implementation;
    }

    public function setImplementation(Formatter $printer)
    {
        $this->implementation = $printer;
    }

    abstract public function get(): string;
}
