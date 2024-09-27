<?php

namespace App\Http\Controllers;

use App\Traits\ApiRequestsTrait;
use Illuminate\Http\Request;

class CityController extends Controller
{
    use ApiRequestsTrait;

    public function get(Request $request)
    {
        $city = $request->input('city');

        $places = $this->getPlaces($city);
        $forecast = $this->getForecast($city);

        return response()->json([
            'places' => $places,
            'forecast' => $forecast,
        ]);
    }
}
