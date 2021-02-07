<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $stations = (new Station())->with('user')->orderBy('id','DESC')->limit(9)->get();
        return view('welcome',['stations' => $stations, 'developers' => $this->developers()]);
    }

    public function developers()
    {
        return [
            [
                'name' => 'Mehmet Emin Karakaş',
                'avatar' => 'https://avatars.githubusercontent.com/u/12996462?s=460&u=793ca76282ecda3f5a9af4197c89df588d0cdd9a&v=4',
                'role' => 'Yazılım Geliştirici'
            ],
            [
                'name' => 'Azad Can Tekin',
                'avatar' => 'https://avatars.githubusercontent.com/u/77458116?s=460&v=4',
                'role' => 'Yazılım Geliştirici'
            ],
            [
                'name' => 'Umut Mustafa Kaya',
                'avatar' => 'https://avatars.githubusercontent.com/u/78111190?s=460&u=3df67c8d8da7b9ab1adf4dd8a655fb8ae9a88766&v=4',
                'role' => 'Veritabanı'
            ],
            [
                'name' => 'Muhammed Furkan Taşçeken',
                'avatar' => 'https://avatars.githubusercontent.com/u/78698286?s=400&u=1dae598c06084b25e98630c9137c264d1adf015f&v=4',
                'role' => 'Veritabanı'
            ],
            [
                'name' => 'Murat Can Yener',
                'avatar' => 'https://avatars.githubusercontent.com/u/76731497?s=460&v=4',
                'role' => 'Grafik Tasarım'
            ],
            [
                'name' => 'Kader Çelik',
                'avatar' => 'https://avatars.githubusercontent.com/u/78111207?s=400&u=46a802aa655d0964e38bc12318218c7ddf0f2151&v=4',
                'role' => 'Grafik Tasarım'
            ],
            [
                'name' => 'Eda ',
                'avatar' => 'https://avatars.githubusercontent.com/u/76731497?s=460&v=4',
                'role' => 'Grafik Tasarım'
            ],
            [
                'name' => 'Arif Can Ünlütürk',
                'avatar' => 'https://avatars.githubusercontent.com/u/76731497?s=460&v=4',
                'role' => 'Web Tasarım'
            ]
        ];
    }
}
