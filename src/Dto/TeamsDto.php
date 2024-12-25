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

    public static function fromArray(array $data): TeamsDto
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['short_name'],
            $data['strength'],
            $data['strength_overall_home'],
            $data['strength_overall_away'],
            $data['strength_attack_home'],
            $data['strength_attack_away'],
            $data['strength_defence_home'],
            $data['strength_defence_away']
        );
    }
}
