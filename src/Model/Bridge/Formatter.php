<?php declare(strict_types=1);

namespace App\Model\Bridge;

interface Formatter
{
    public function format(string $text): string;
}
