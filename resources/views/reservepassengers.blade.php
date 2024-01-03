@extends('layouts.public')

@section('title', 'Reservar')

@section('content')

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Datos pasajero(s)</h2>
                    <div class="alert alert-danger" id="error_compra" style="display:none;">
                        <strong>Los asientos ya están reservados!</strong> <a href={{ route('reservar', [$bus_id, $fecha, $ruta_id ] )}}">Volver a elegir asientos</a>
                    </div>
                    @if ($message = Session::get('errors'))
                        <div id="contactform_error" class="alert alert-danger" style="display:none">
                            <strong>Se han producido errores.</strong> {{ $message }}, Inténtelo mas tarde, gracias.
                        </div>
                    @endif
                    <form id="reservar_form" method="POST" action="{{ route('reservar.finalizar') }}">
                        @csrf
                        <input type="hidden" name="ruta_id" value="{{ $ruta_id}}" />
                        <input type="hidden" name="bus_id" value="{{ $bus_id}}" />
                        <input type="hidden" name="fecha" value="{{ $fecha}}" />
                        <input type="hidden" name="usuario_id" value="{{ $usuario_id}}" />
                        <input type="hidden" class="asientos_sel" name="asientos" value="{{ json_encode($asientos) }}">
                        <div class="row" id="bus">
                            @foreach ($asientos as $asiento)
                                <div class="card card-body" style="margin-bottom:10px;">
                                    <h4 class="card-title">Pasajero {{ $counter }}</h4>
                                    <div class="card-text">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="exampleInputUsername1">Asiento</label>
                                                    <p>{{ $asiento}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="exampleInputUsername1">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre[]" placeholder="Nombre" required />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputUsername1">Apellidos</label>
                                                    <input type="text" class="form-control" name="apellidos[]" placeholder="Apellidos" required />
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="exampleInputUsername1">DNI</label>
                                                    <input type="text" class="form-control" name="dni[]" placeholder="DNI" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $counter++    
                                @endphp
                            @endforeach
                        </div>
                        <button type="submit" id="reservar-button" class="btn btn-lg btn-success " >Completar reserva</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')    
@endsection
