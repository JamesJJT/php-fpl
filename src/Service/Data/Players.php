<?php

namespace Jamesjjt\PhpFpl\Service\Data;

use Jamesjjt\PhpFpl\Dto\PlayerFullDto;
use Jamesjjt\PhpFpl\Dto\PlayerSimpleDto;
use Jamesjjt\PhpFpl\Enums\TeamID;
use Jamesjjt\PhpFpl\Exceptions\Services\Data\PlayerNotFoundException;
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
     * @throws \Exception
     */
    public function getPlayerById(int $id, bool $simpleFormat = false): PlayerSimpleDto|PlayerFullDto
    {
        $player = $this->getBootstrapStatic()->toArray()['elements'];

        $filteredPlayer = array_filter($player, function ($player) use ($id) {
            return $player['id'] === $id;
        });

        if (empty($filteredPlayer)) {
            throw new PlayerNotFoundException("Player ID: {$id} not found.");
        }

        if ($simpleFormat){
            return PlayerSimpleDto::fromArray($filteredPlayer[0]);
        }

        return PlayerFullDto::fromArray($filteredPlayer[0]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getPlayersByTeam(TeamID $team, bool $simpleFormat = false): array
    {
        $players = $this->getBootstrapStatic()->toArray()['elements'];

        $filteredPlayers = array_filter($players, function ($player) use ($team) {
            return $player['team'] === $team->getValue();
        });

        if ($simpleFormat){
            return array_map(function ($player) {
                return PlayerSimpleDto::fromArray($player);
            }, $filteredPlayers);
        }

        return array_map(function ($player) {
            return PlayerFullDto::fromArray($player);
        }, $filteredPlayers);
    }
}
