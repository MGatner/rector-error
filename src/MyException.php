<?php

namespace MGatner\RectorError;

use CodeIgniter\Exceptions\ExceptionInterface;
use RuntimeException;

class MyException extends RuntimeException implements ExceptionInterface
{
    public static function forAnything(string $content)
    {
        return new static($content); // @phpstan-ignore-line
    }
}
