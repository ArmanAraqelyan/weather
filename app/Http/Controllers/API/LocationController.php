<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocationCountryResource;
use App\Http\Resources\LocationStateResource;
use App\Models\Country;
use App\Models\State;

class LocationController extends Controller
{
    public function country(Country $country): LocationCountryResource
    {
        return new LocationCountryResource($country);
    }

    /**
     * Get states related to country.
     */
    public function state(State $state): LocationStateResource
    {
        return new LocationStateResource($state);
    }
}
