<?php

namespace Jamesjjt\PhpFpl\Client;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class FPLClient
{
    private HttpClientInterface $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function get(string $url): ResponseInterface
    {
        return $this->client->request('GET', $url);
    }
}
