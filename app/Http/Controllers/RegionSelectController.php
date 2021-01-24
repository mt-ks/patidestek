<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
use App\Models\Town;
use Illuminate\Http\Request;

class RegionSelectController extends Controller
{
    public function cities()
    {
        return City::all();
    }

    public function towns($cityId)
    {
        return City::where('id',$cityId)->with('towns')->first();
    }

    public function districts($regionId)
    {
        return Town::where('id',$regionId)->with('districts')->first();
    }

}
