<?php

namespace Jamesjjt\PhpFpl\Dto;

use Jamesjjt\PhpFpl\Contracts\DtoContract;

class PlayerSimpleDto implements DtoContract
{
    public function __construct(
        public bool $can_transact,
        public bool $can_select,
        public string $first_name,
        public int $id,
        public string $news,
        public ?string $news_added,
        public string $points_per_game,
        public bool $removed,
        public string $second_name,
        public string $selected_by_percent,
        public ?int $squad_number,
        public int $team,
        public int $team_code,
        public int $total_points,
        public string $web_name,
        public ?string $region,
        public ?string $team_join_date,
        public int $minutes,
        public int $goals_scored,
        public int $assists,
        public int $clean_sheets,
        public int $goals_conceded,
        public int $own_goals,
        public int $penalties_saved,
        public int $penalties_missed,
        public int $yellow_cards,
        public int $red_cards,
        public int $saves,
        public int $bonus,
        public int $bps,
        public int $starts,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['can_transact'],
            $data['can_select'],
            $data['first_name'],
            $data['id'],
            $data['news'],
            $data['news_added'],
            $data['points_per_game'],
            $data['removed'],
            $data['second_name'],
            $data['selected_by_percent'],
            $data['squad_number'],
            $data['team'],
            $data['team_code'],
            $data['total_points'],
            $data['web_name'],
            $data['region'],
            $data['team_join_date'],
            $data['minutes'],
            $data['goals_scored'],
            $data['assists'],
            $data['clean_sheets'],
            $data['goals_conceded'],
            $data['own_goals'],
            $data['penalties_saved'],
            $data['penalties_missed'],
            $data['yellow_cards'],
            $data['red_cards'],
            $data['saves'],
            $data['bonus'],
            $data['bps'],
            $data['starts'],
        );
    }
}
