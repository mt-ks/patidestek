<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'city' => City::orderBy('name')->get(),
            'stations' => Station::with('user')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->limit(5)->get()
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
