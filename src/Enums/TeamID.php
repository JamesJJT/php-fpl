<?php

namespace Jamesjjt\PhpFpl\Enums;

enum TeamID: int
{
    case Arsenal = 1;
    case Aston_Villa = 2;
    case Bournemouth = 3;
    case Brentford = 4;
    case Brighton = 5;
    case Chelsea = 6;
    case Crystal_Palace = 7;
    case Everton = 8;
    case Fulham = 9;
    case Ipswich = 10;
    case Leicester = 11;
    case Liverpool = 12;
    case Man_City = 13;
    case Man_Utd = 14;
    case Newcastle = 15;
    case Notts_Forest = 16;
    case Southampton = 17;
    case Spurs = 18;
    case West_Ham = 19;
    case Wolves = 20;

    public function getValue(): int
    {
        return $this->value;
    }
}
