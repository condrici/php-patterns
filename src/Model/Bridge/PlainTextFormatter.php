<?php declare(strict_types=1);

namespace App\Model\Bridge;

class PlainTextFormatter implements Formatter
{
    public function format(string $text): string
    {
        return $text;
    }
}
