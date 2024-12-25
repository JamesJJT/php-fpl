<?php

namespace Jamesjjt\PhpFpl\Service\Data;

use Jamesjjt\PhpFpl\Enums\TeamID;
use Jamesjjt\PhpFpl\Service\FPLService;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Players extends FPLService
{
    /**
     * @throws TransportExceptionInterface
     */
    public function getPlayerById(int $id): \Symfony\Contracts\HttpClient\ResponseInterface
    {
        $player = $this->client
            ->get("https://fantasy.premierleague.com/api/element-summary/{$id}/")
            ->toArray();

        return new PlayerDto($player);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getPlayersByTeam(TeamID $team): array
    {
        $players = $this->getBootstrapStatic()->toArray()['elements'];

        return array_filter($players, function ($player) use ($team) {
            return $player['team'] === $team->getValue();
        });
    }
}
