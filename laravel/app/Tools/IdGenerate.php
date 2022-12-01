<?php

namespace App\Tools;

class IdGenerate
{
    private const length = 10;

    public static function generate(int $length = null): string{
        if ($length === null)
            return substr(md5(time()), 0, self::length);
        else
            return substr(md5(time()), 0, $length);
    }
}
