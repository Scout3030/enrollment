<?php

namespace App\Http\Controllers;

use App\Http\Resources\BusStopByRouteResource;
use App\Models\Route;

class BusStopController extends Controller
{
    public function busStopByRoute(Route $route)
    {
        $busStops = $route->busStops;
        if(request()->ajax()){
            return BusStopByRouteResource::collection($busStops);
        }
    }
}
