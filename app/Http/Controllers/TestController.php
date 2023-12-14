<?php

namespace App\Http\Controllers;

use App\Models\Bus_info;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $info = Bus_info::all();
        $example = [1,2,5,8,9,7,6];
        // print_r($info->toArray());

        foreach ($info->toArray() as $row) {
            echo "{$row['hour']}<br>";
        }
        // echo json_encode($info);
        // dd($example);
        // echo gettype($example);
    }
}
