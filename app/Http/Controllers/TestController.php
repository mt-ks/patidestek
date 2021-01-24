<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\Town;
use Illuminate\Http\Request;
use JsonMachine\JsonMachine;
use Mavinoo\Batch\Batch;

class TestController extends Controller
{
    public function test()
    {
//        return         City::where('id',7)->with('regions')->get();
//        $data = $this->district();
//
//
//        $columns = ['city_id','town_id','name','updated_at','created_at'];
//
//        $batchSize = 500; // insert 500 (default), 100 minimum rows in one query
//
//       \batch()->insert(new District, $columns, $data, $batchSize);
//


    }


    public function district()
    {
        $jsonData = [];
        $data = JsonMachine::fromFile(public_path("regions/district.json"));
        $time = now('Europe/Istanbul');
        foreach ($data as $it)
        {
            $jsonData[] = [
                'city_id' => $it['il_id'],
                'town_id' => $it['ilce_id'] - 1100,
                'name' => $it['mahalle_adi'],
                'updated_at' => $time,
                'created_at' => $time,
            ];
        }
        return $jsonData;
    }

    public function town()
    {
        $jsonData = [];
        $data = JsonMachine::fromFile(public_path("regions/town.json"));
        $time = now('Europe/Istanbul');
        foreach ($data as $it)
        {
            $jsonData[] = [
                'city_id' => $it['il_id'],
                'name' => $it['ilce_adi'],
                'updated_at' => $time,
                'created_at' => $time,
            ];

        }
        return $jsonData;
    }


    public function city()
    {
        $jsonData = [];
        $data = JsonMachine::fromFile(public_path("regions/city.json"));
        $time = now('Europe/Istanbul');
        foreach ($data as $it)
        {

            $jsonData[] = [
                'code' => $it['_id'],
                'name' => $it['il_adi'],
                'updated_at' => $time,
                'created_at' => $time,
            ];

        }
        return $jsonData;
    }

}
