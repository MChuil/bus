@extends('layouts.public')

@section('title', 'Empresa')

@section('content')

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <p>
                        <strong>Ruta: </strong> {{ $route }}
                    </p>
                    <p>
                        <strong>Fecha: </strong> {{ $dateSelect }}
                    </p>
                </div>
            </div>
            <div class="row">
                {{-- {{ var_dump($data) }} --}}
                <div class="col-md-12 lista-rutas">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nº Bus</th>
                                <th>Hora salida</th>
                                <th>Duración</th>
                                <th>Precio</th>
                                <th>Asientos disponibles</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td># {{ $row->noBus }}</td>
                                    <td>{{ $row->hour }}</td>
                                    <td>{{ $row->duration }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td>{{ $row->available }}</td>
                                    <td>
                                        @auth
                                        <a href="{{ route('reservar', [$row->id, $dateToTime, $route_id])}}" class="btn btn-success">Reservar billete</a>
                                        @else    
                                        <a class="btn btn-success" href="{{ route('login', true) }}">Acceso usuarios</a>
                                        @endauth
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
