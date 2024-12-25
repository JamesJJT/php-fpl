<?php

namespace Jamesjjt\PhpFpl\Dto;

use Jamesjjt\PhpFpl\Contracts\DtoContract;

class TeamsDto implements DtoContract
{
    public function __construct(
        public int $id,
        public string $name,
        public string $short_name,
        public int $strength,
        public int $strength_overall_home,
        public int $strength_overall_away,
        public int $strength_attack_home,
        public int $strength_attack_away,
        public int $strength_defence_home,
        public int $strength_defence_away
    ) {}

    public static function fromArray(array $array): TeamsDto
    {
        return new self(
            $array['id'],
            $array['name'],
            $array['short_name'],
            $array['strength'],
            $array['strength_overall_home'],
            $array['strength_overall_away'],
            $array['strength_attack_home'],
            $array['strength_attack_away'],
            $array['strength_defence_home'],
            $array['strength_defence_away']
        );
    }
}
