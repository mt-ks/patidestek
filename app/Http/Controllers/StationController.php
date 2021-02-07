<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StationController extends Controller
{

    public function index()
    {
        return view('station-add');
    }

    public function getStation($id)
    {
        $station = Station::findOrFail($id);
        $comments = Comments::where('station_id',$id)->get();
        return view('station',['station' => $station, 'comments' => $comments]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'location' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()):
            return response()->json(['status' => 'fail', 'message' => $validator->errors()->first()],400);
        endif;

        Station::create([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id,
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'receiver_location' => $request->input('location'),
            'confirmed_by_admin' => true
        ]);

        return response()->json(['status' => 'ok', 'message' => 'İstasyon eklendi.']);

    }

    public function update()
    {

    }




}
