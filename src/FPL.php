<?php

require_once __DIR__.'/../vendor/autoload.php';

use Jamesjjt\PhpFpl\Enums\TeamID;
use Jamesjjt\PhpFpl\Service\Data\Players;
use Jamesjjt\PhpFpl\Service\Data\Teams;

/**
 * Gen enums file
 */
//$fpl = (new Teams)->getTeams();
//
//foreach ($fpl as $team) {
//    echo 'CASE '.$team['name']." = ".$team['id'].';'. PHP_EOL;
//}

///**
// * Get players by team
// */
//$fpl = (new Players)->getPlayersByTeam(TeamID::Liverpool);
//
//foreach ($fpl as $player) {
//    var_dump($player);
//    echo $player['web_name'].PHP_EOL;
//}

$fpl = (new Teams)->getSpecificTeam(TeamID::Arsenal);

dd($fpl);
