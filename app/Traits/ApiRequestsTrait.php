<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait ApiRequestsTrait
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getPlaces($city)
    {
        try {
            $response = $this->client->request('GET', 'https://api.foursquare.com/v3/places/search', [
                'query' => [
                    'near' => $city,
                    'limit' => 1,
                ],
                'headers' => [
                    'Authorization' => config('services.foursquare.key'),
                    'accept' => 'application/json',
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return null;
        }
    }

    public function getForecast($city)
    {
        try {
            $response = $this->client->request('GET', 'https://api.openweathermap.org/data/2.5/forecast', [
                'query' => [
                    'q' => $city,
                    'appid' => config('services.forecast.key'),
                    'units' => 'metric',
                    'cnt' => 6,
                ],
                'headers' => [
                    'accept' => 'application/json',
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return null;
        }
    }

    public function getPlaceDetails($fsqId)
    {
        try {
            $response = $this->client->request('GET', 'https://api.foursquare.com/v3/places/' . $fsqId, [
                'query' => [
                    'fields' => 'name,menu,photos,website,description,hours,location,rating,price',
                ],
                'headers' => [
                    'Authorization' => config('services.foursquare.key'),
                    'accept' => 'application/json',
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return null;
        }
    }
}
