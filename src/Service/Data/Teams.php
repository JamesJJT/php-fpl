<?php

namespace Jamesjjt\PhpFpl\Service\Data;

use Jamesjjt\PhpFpl\Service\FPLService;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Teams extends FPLService
{
    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getTeams(): array
    {
        $teams = $this->getBootstrapStatic()->toArray()['teams'];

        return array_map(function ($team) {
            return [
                'id' => $team['id'],
                'name' => $team['name'],
                'short_name' => $team['short_name'],
                'strength' => $team['strength'],
                'strength_overall_home' => $team['strength_overall_home'],
                'strength_overall_away' => $team['strength_overall_away'],
                'strength_attack_home' => $team['strength_attack_home'],
                'strength_attack_away' => $team['strength_attack_away'],
                'strength_defence_home' => $team['strength_defence_home'],
                'strength_defence_away' => $team['strength_defence_away'],
            ];
        }, $teams);
    }
}
