<?php

namespace App\Http\Controllers;

use App\Models\Bus_route;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index(){
        $routes = Bus_route::select('id', 'name')->get();
        return view('index', compact('routes'));
    }
}
