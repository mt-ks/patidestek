<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Station;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $stations = Station::with('user');

        if ($request->input('city_id'))
        {
            $stations = $stations->where('city_id',$request->input('city_id'));
        }

        if ($request->input('town_id') && (int)$request->input('town_id') > 0)
        {
            $stations = $stations->where('town_id',$request->input('town_id'));
        }

        $data = [
            'city' => City::orderBy('name')->get(),
            'stations' => $stations->get()
        ];
        return view('home',$data);
    }
}
