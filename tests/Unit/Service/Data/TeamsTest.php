<?php

use Jamesjjt\PhpFpl\Dto\TeamsDto;
use Jamesjjt\PhpFpl\Enums\TeamID;
use Jamesjjt\PhpFpl\Service\Data\Teams;

it('returns an array of all teams', function () {
    $teams = (new Teams())->getAllTeams();

    foreach ($teams as $team) {
        expect($team)
            ->toHaveKey('id')
            ->toHaveKey('name')
            ->toHaveKey('short_name')
            ->toHaveKey('strength')
            ->toHaveKey('strength_overall_home')
            ->toHaveKey('strength_overall_away')
            ->toHaveKey('strength_attack_home')
            ->toHaveKey('strength_attack_away')
            ->toHaveKey('strength_defence_home')
            ->toHaveKey('strength_defence_away')
            ->toBeInstanceOf(TeamsDto::class);
    }
    expect($teams)
        ->toBeArray()
        ->toHaveCount(20);
});

it('returns a TeamsDTO with the indivdual team data', function () {
    $team = (new Teams())->getSpecificTeam(TeamID::Arsenal);

    expect($team)
        ->toHaveKey('id')
        ->toHaveKey('name')
        ->toHaveKey('short_name')
        ->toHaveKey('strength')
        ->toHaveKey('strength_overall_home')
        ->toHaveKey('strength_overall_away')
        ->toHaveKey('strength_attack_home')
        ->toHaveKey('strength_attack_away')
        ->toHaveKey('strength_defence_home')
        ->toHaveKey('strength_defence_away')
        ->toBeInstanceOf(TeamsDto::class);
});
