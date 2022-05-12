<?php

namespace App\Utils;

class Setup
{
    public static function filterNewline(string $string): string
    {
        return str_replace(["\r\n", "\r", "\n"], '', $string);
    }
}
