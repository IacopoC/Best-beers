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

    private function buildCall($param, $page, $perpage)
    {
        return $this->service->callBeers('get', $this->baseUrl . $param . '?page=' . $page . '&per_page=' . $perpage);
    }

    private function buildSingleCall($param)
    {
        return $this->service->callBeers('get', $this->baseUrl . $param);
    }

    public function getDefaultBeers($page)
    {
        return $this->buildCall('beers', $page , 40);
    }

    public function getSingleBeer($id)
    {
        return $this->buildSingleCall('beers/' . $id);
    }

    public function getSearchedBeer($query)
    {
        return $this->buildSingleCall('beers?beer_name=' . $query);
    }

}
