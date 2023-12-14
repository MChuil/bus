@extends('layouts.public')

@section('title', 'Reservar')

@section('content')

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Reservar billete</h2>
                    <form id="reservar_form" method="post" action="reservar_pasajeros.php">
                        <div class="row" id="bus">
                            <div class="col-md-3 detalles-ruta pt-3">
                                <p>
                                    <strong>Ruta: </strong> {{ $info->name }}
                                </p>
                                <p>
                                    <strong>Fecha: </strong> {{ date('d-m-Y', $date) }}
                                </p>
                                <p>
                                    <strong>Hora salida: </strong> {{ $info->hour }}
                                </p>
                                <p>
                                    <strong>Duración viaje: </strong> {{ $info->duration }}
                                </p>
                                <div class="pull-left">Seleccione asiento(s) y pulse en <br>
                                    <a href="#" id="reservar-button"
                                        class="btn btn-lg btn-success btn-block">Continuar</a>
                                </div>
                                <span id="totalSeats" data-asientos={{ $info->seats  }}></span>
                                <span id="price" data-price={{ $info->price  }}></span>
                            </div>
                            <div class="col-md-5" style="background-color: #fff;">
                                <div class="titulo">SELECCIONAR ASIENTO(S)</div>
                                <div class="row">
                                    <div class="col-md-2">
                                        {{-- <div class="conductor"><img
                                                src="http://techlabz.in/truebus/assets/images/driver.png"></div> --}}
                                    </div>
                                    <div class="col-md-10">
                                        <div class="fila-asientos">
                                            <table id="tableBus"></table>
                                        </div>
                                    </div>
                                </div>

                                <table width="100%" style="margin-top:20px; border:1px solid;">
                                    <tr>
                                        <td width="33%" style="text-align:center; padding:10px;"><img
                                                src="{{ asset('images/asiento_disp.png') }}"> Disponible</td>
                                        <td width="33%" style="text-align:center; padding:10px;"><img
                                                src="{{ asset('images/asiento_sel.png') }}"> Seleccionado
                                        </td>
                                        <td width="33%" style="text-align:center; padding:10px;"><img
                                                src="{{ asset('images/asiento_nodisp.png') }}"> No Disponible
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4" style="background-color: #fff;">
                                <div class="titulo">DETALLE COMPRA</div>
                                <div class="detalles-billetes row">
                                    <div class="col-12">
                                        <p><strong>Asiento(s): </strong><span class="col_rojo asiento_no"></span></p>
                                        <p><strong>Tarifa: </strong><span class="col_rojo tarifa_bus">{{ number_format($info->price, 2, ',', '.') }} €</span></p>
                                        <p><strong>Total: </strong><span class="col_rojo total_tarifa ng-binding">0</span></p>
                                        <input type="hidden" name="ruta_id" value="{{ $info->route_id }}" />
                                        <input type="hidden" name="bus_id" value="{{ $info->id }}" />
                                        <input type="hidden" name="fecha" value="{{ $date }}" />
                                        <input type="hidden" class="asientos_sel" name="asientos" id="asientos_sel" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', ()=>{
            const seats = document.getElementById('totalSeats').getAttribute('data-asientos')
            const price = document.getElementById('price').getAttribute('data-price')
            let letter = ['A', 'B', 'C', 'D']
            for (let x = 0;  x <= 3; x++) {
                let rows = seats / 4
                let tr = document.createElement('tr')
                for (let i = 1; i <= rows; i++) {
                    let td = document.createElement('td')
                    let div = document.createElement('div')
                    div.setAttribute('data-class', 'asiento')
                    div.setAttribute('data-tarifa', price)
                    div.setAttribute('data-asiento', `${letter[x]}${i}`)
                    div.className = 'asiento'
                    div.addEventListener('click', () => SeleccionarAsiento(div))
                    td.appendChild(div)
                    tr.appendChild(td)
                }
                const tableBus = document.getElementById('tableBus')
                tableBus.appendChild(tr);
            }
        })


        function SeleccionarAsiento(elm) {
            var existB = $(elm).hasClass('asiento_ND');

            if (existB != true || existB2 != true) {
                asiento = $(elm).data("asiento");
                tarifa = $(elm).data("tarifa");
                classs = $(elm).data("class");

                if ($(elm).hasClass(classs)) {
                    $(elm).removeClass(classs);
                    if (classs == 'asiento') {
                        $(elm).addClass('asientoSel');
                    }

                } else {
                    $(elm).removeClass('asientoSel');
                    $(elm).addClass(classs);
                }
                var seleccionados = $("#bus .asientoSel").map(function () {
                    return $(this).data("asiento");
                }).get();

                $("#bus .asiento_no").text(seleccionados);
                $("#bus .asientos_sel").val(seleccionados);

                var total_compra = tarifa * seleccionados.length;
                var num = total_compra.toLocaleString('es-ES', {
                    style: 'currency',
                    currency: 'EUR',
                    minimumFractionDigits: 2
                });

                $("#bus .total_tarifa").text(num);
            }
        }
    </script>
    
@endsection
