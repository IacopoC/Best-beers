<?php


namespace App\Http\Bestbeers;
use GuzzleHttp\Client;

class BestBeers
{
    protected $client;
    protected $baseUrl;

    public function __construct() {

        $this->baseUrl = 'https://api.punkapi.com/v2/';
        $this->SetUpClient();

    }

    private function SetUpClient() {
        $this->client = new Client(['base_uri' => $this->baseUrl]);
    }

    public function callBeers($method, $url)
    {
        $results_pages = $this->client->request($method, $url);
        $body_results_pages = $results_pages->getBody();
        return json_decode($body_results_pages);
    }

}
