<?php

namespace Jamesjjt\PhpFpl\Service;

use Jamesjjt\PhpFpl\Client\FPLClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class FPLService
{
    protected FPLClient $client;

    public function __construct()
    {
        $this->client = new FPLClient;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function getBootstrapStatic(): ResponseInterface
    {
        return $this->client->get('https://fantasy.premierleague.com/api/bootstrap-static/');
    }
}
