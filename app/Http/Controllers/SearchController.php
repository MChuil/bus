<?php

namespace App\Http\Controllers;

use App\Models\Bus_info;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        //TODO: Validaciones-----

        $route_id = $request->route;
        $dateSelect = $request->date;

        $date = implode('-', array_reverse(explode('/', $request->date)));
        $weekDay = date("w", strtotime($date));
        // $ddaa = mysqli_query($con, "SELECT * FROM bus_info WHERE dias like '%" . $dia_semana . "%' AND ruta_id='" . $_POST["ruta"] . "' and estado = 1");

        $info = Bus_info::join('bus_routes', 'bus_routes.id', 'bus_infos.route_id')
                        ->select('bus_infos.*', 'bus_routes.name')
                        ->where('bus_infos.days','like', "%$weekDay%")
                        ->where('bus_infos.route_id', $route_id)
                        ->where('bus_infos.state', 1)->get();
        $route = $info[0]->name;
        $data = [];
        foreach ($info as $row) {
            //consulta de los ticket
            array_push($data, [
                // 'row' => json_encode($row),
                'available' => 0,
                'noBus' => $row->no_bus,
                'hour' => $row->hour,
                'duration' => $row->duration,
                'price' => number_format($row->price, 2, ',', '.') . ' €'
            ]);
        }
        //se convierte el array a objeto
        $data = json_decode(json_encode($data));
        

        return view('searchroute', compact('route', 'dateSelect', 'data'));
    }
}
