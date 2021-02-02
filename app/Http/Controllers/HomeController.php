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
    public function index()
    {
        $data = [
            'city' => City::orderBy('name')->get(),
            'stations' => Station::with('user')->orderBy('id','DESC')->limit(5)->get()
        ];
        return view('home',$data);
    }
}
