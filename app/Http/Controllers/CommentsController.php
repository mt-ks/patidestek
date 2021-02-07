<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function add(Request $request)
    {
        request()->validate([
           'comment' => 'required',
           'station_id' => 'required'
        ]);

        Comments::create([
            'user_id' => auth()->user()->id,
            'comment' => $request->input('comment'),
            'station_id' => $request->input('station_id')
        ]);
        return response()->json(['status' => 'ok', 'message' => 'Yorum eklendi', 'redirect' => route('station.get',['id' => $request->input('station_id')])]);
    }

    public function edit()
    {

    }
}
