<?php

use Jamesjjt\PhpFpl\Service\Data\Teams;

it('returns an array of teams', function () {
    $teams = (new Teams)->getTeams();

    expect($teams)
        ->toBeArray();
});
