<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionSelectController extends Controller
{
    public function cities()
    {
        return City::all();
    }

    public function regions(Request $request)
    {
        return City::where('id',$request->input('id'))->with('regions')->get();
    }

    public function region_sub(Request $request)
    {
        return Region::where('id',$request->input('id'))->with('region_sub');
    }

}
