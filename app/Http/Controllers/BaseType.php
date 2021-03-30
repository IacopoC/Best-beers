<?php

namespace App\Http\Controllers;

use App\Http\Bestbeers\BestBeers;


class BaseType extends Controller
{
    private $service;
    protected $baseUrl;

    public function __construct()
    {
        $this->service = new BestBeers();
    }

    private function buildCall($param)
    {
        return $this->service->callBeers('get', $this->baseUrl . $param);
    }

    public function getDefaultBeers()
    {
        return $this->buildCall('beers');
    }

}
