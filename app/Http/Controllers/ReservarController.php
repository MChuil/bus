<?php

namespace App\Http\Controllers;

use App\Models\Bus_info;
use Illuminate\Http\Request;

class ReservarController extends Controller
{
    public function index($id, $date, $route_id){
        $info = Bus_info::join('bus_routes', 'bus_routes.id', 'bus_infos.route_id')
                        ->select('bus_infos.*', 'bus_routes.name')
                        ->where('bus_infos.id', $id)->first();

        return view('reserve', compact('info', 'date'));
    }
}
