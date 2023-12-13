@extends('layouts.public')

@section('title', 'Reservar')

@section('content')

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <p>
                        <strong>Ruta: </strong> {{ $info->name }}
                    </p>
                    <p>
                        <strong>Fecha: </strong> {{ date('d-m-Y', $date) }}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 lista-rutas">
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
