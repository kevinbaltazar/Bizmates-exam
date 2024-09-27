<?php

namespace App\Http\Controllers;

use App\Traits\ApiRequestsTrait;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    use ApiRequestsTrait;

    public function get(Request $request)
    {
        $fsqId = $request->input('fsqId');

        $placeDetails = $this->getPlaceDetails($fsqId);

        return response()->json($placeDetails);
    }
}
