<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
use App\Models\RegionSub;
use Illuminate\Http\Request;
use Mavinoo\Batch\Batch;

class TestController extends Controller
{
    public function test()
    {
//        return         City::where('id',7)->with('regions')->get();

//        echo ini_get('max_execution_time');
    }

    public static function region_sub()
    {
        $file = file_get_contents("https://raw.githubusercontent.com/mburakkalkan/turkiye-il-ilce-semt-mahalle-veritabani/master/turkiye_mahalleler_12042017.csv");
        $data = explode("\n",$file);
        array_shift($data);
        $regions = [];
        $time = now('Europe/Istanbul');

        foreach ($data as $item)
        {
            $parse = explode(";",$item);
            $regions[] = [
                'region_id' => $parse[0],
                'name' => $parse[1],
                'city_id' => 0,
                'created_at' => $time,
                'updated_at' => $time
            ];
        }
        return $regions;
    }

    public static function region()
    {
        $file = file_get_contents("https://raw.githubusercontent.com/mburakkalkan/turkiye-il-ilce-semt-mahalle-veritabani/master/turkiye_ilceler_12042017.csv");
        $data = explode("\n",$file);
        array_shift($data);
        $regions = [];
        $time = now('Europe/Istanbul');
        foreach ($data as $item)
        {
            $parse = explode(";",$item);
            $regions[] = [
                'city_id' => $parse[2],
                'name' => $parse[1],
                'created_at' => $time,
                'updated_at' => $time
            ];
        }
        return $regions;
    }

    public static function cities()
    {
        $file = file_get_contents("https://raw.githubusercontent.com/mburakkalkan/turkiye-il-ilce-semt-mahalle-veritabani/master/turkiye_iller_12042017.csv");
        $data = explode("\n",$file);
        array_shift($data);

        $cities = [];
        $time = now('Europe/Istanbul');
        foreach ($data as $item)
        {
            $parse = explode(";",$item);
            $cities[] = [
                'code' => $parse[0],
                'name' => $parse[1],
                'created_at' => $time,
                'updated_at' => $time
            ];
        }
        return $cities;
    }

}
