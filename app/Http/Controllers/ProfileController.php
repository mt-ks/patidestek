<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
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
        return view('home', $data);
    }

    public function edit()
    {
        return view('profile-edit');
    }

    public function _edit(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'gender' => 'required|numeric',
            'email' => 'required'
        ]);
        User::find(auth()->id())->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email')
        ]);
        return response()->json(['status' => 'ok', 'message' => 'Bilgileriniz güncellendi.']);
    }

    public function _upload_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|mimes:jpeg,png'
        ]);

        $image = $request->file('avatar');
        $uploadedUrl = env('APP_URL') . 'storage/' . $image->store('avatar');
        User::find(auth()->id())->update([
            'avatar' => $uploadedUrl
        ]);
        return redirect()->back();
    }
}
