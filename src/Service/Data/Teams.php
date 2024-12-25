<?php

namespace Jamesjjt\PhpFpl\Service\Data;

use Jamesjjt\PhpFpl\Dto\TeamsDto;
use Jamesjjt\PhpFpl\Enums\TeamID;
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
    public function getAllTeams(): array
    {
        $teams = $this->getBootstrapStatic()->toArray()['teams'];

        $formattedTeams = [];

        foreach ($teams as $team) {
            $formattedTeams[] = TeamsDto::create($team);
        }

        return $formattedTeams;
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     * @throws \Exception
     */
    public function getSpecificTeam(TeamID $teamID): TeamsDto
    {
        $teams = $this->getAllTeams();

        foreach ($teams as $team) {
            if ($team->id === $teamID->getValue()) {
                return $team;
            }
        }
    }
}
