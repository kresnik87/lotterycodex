<?php

namespace App\Services;

use App\Interfaces\ScrapInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Panther\Client;

class ScrapService implements ScrapInterface
{
    public const LOGGER_NAME = "SCRAP_SERVICE";
    private $client;

    public function __construct(protected LoggerInterface $logger)
    {
        $this->client = Client::createChromeClient();
    }

    public function getData(string $url, int $cant)
    {
        $crawler = $this->client->request('GET', $url);
        for ($i = 0; $i < $cant; $i++) {
            die(var_dump($crawler->filter('article')->filter('ul')->filter('li')->filter('div.combisa')->count()));
            if($crawler->filter('article')->filter('ul')->filter('li')->filter('div.combisa')->count()>0){
                $data[$i]["data"]=$crawler->filter('article')->filter('ul')->filter('li')->filter('div.combisa')->eq($i)->getText();
            }
        }
        return $data;
    }
}