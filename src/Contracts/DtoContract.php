<?php

namespace Jamesjjt\PhpFpl\Contracts;

interface DtoContract
{
    public static function fromArray(array $array): DtoContract;
}
