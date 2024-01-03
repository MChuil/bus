<?php

namespace App\Http\Controllers;

use App\Models\Bus_info;
use App\Models\TicketDetail;
use Illuminate\Http\Request;


class ReservarController extends Controller
{
    public function index($id, $date, $route_id){
        $info = Bus_info::join('bus_routes', 'bus_routes.id', 'bus_infos.route_id')
                        ->select('bus_infos.*', 'bus_routes.name')
                        ->where('bus_infos.id', $id)->first();

        return view('reserve', compact('info', 'date'));
    }

    public function reserve(Request $request){
        //TODO: validaciones
        $asientos = explode("," , $request->asientos);
        $data = [
            'ruta_id' => $request->ruta_id,
            'bus_id' => $request->bus_id,
            'fecha' => $request->fecha,
            'asientos' => $asientos,
            'usuario_id' => auth()->user()->id,
            'counter' => 1
        ];
        return view('reservepassengers', $data);
    }

    public function finish(Request $request){
        //TODO: validaciones
        try {
            //inicio de transaccion
            $route_id       = $request->ruta_id;
            $bus_id         = $request->bus_id;
            $fecha      = $request->fecha;
            $usuario_id         = $request->usuario_id;
            $asientos       = explode(",", $request->asientos);
            $nombres        = $request->nombre;
            $apellidos      = $request->apellidos;
            $dni       = $request->dni;
            $buyId      = sha1($fecha . $route_id . $bus_id . $usuario_id);
            
            $compra_valida = "";
            $i = 0;
            
            foreach($asientos as $asiento) {
                $ticket = new TicketDetail();
                $localizador = sha1( $buyId . $nombres[$i] . $apellidos[$i]);
                //COMPROBAMOS SI EL ASIENTO SIGUE LIBRE
                $ocupado = $ticket::where('created_at', $fecha)->where('route_id', $route_id)->where('bus_id', $bus_id)
                ->where('seat', $asiento)->first();
                if(!$ocupado){
                    $ticket->bus_id = $bus_id;
                    $ticket->route_id = $route_id;
                    $ticket->seat = $asiento;
                    $ticket->user_id = $usuario_id;
                    $ticket->name = $nombres[$i];
                    $ticket->lastname = $apellidos[$i];
                    $ticket->dni = $dni[$i];
                    $ticket->locator = $localizador;
                    $ticket->buys_id = $buyId;
                    $ticket->state = 1;
                    $ticket->save();
                }
            }
            //fin de transaccion
            return redirect('compras.index')->with('Compra realizada satisfactoriamente');
        } catch (\Throwable $th) {
            // return back()->with("errors", $th->getMessage());
            return $th->getMessage();
        }

    }
}
