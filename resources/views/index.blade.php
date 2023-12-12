@extends('layouts.public')

@section('title', 'Bienvenidos')

@section('content')
    <!-- Banner oferta -->
    <div id="oferta">Oferta especial otoño: 25 % dto.</div>
    <section id="principal">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="module bus_search">
                        <form name="busSearchForm" method="post" action="buscar_ruta.php" id="busFrm">
                            <div class="row-fluid input-append">
                                <p class="label_search" style="min-width: 50px;">Ruta</p>
                                <select name="ruta" class="input-medium form-control">
                                    <option value="" selected="selected">Seleccionar ruta</option>
                                    @foreach ($routes as $route)
                                        <option value="{{ $route->id }}"> {{ $route->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row-fluid">
                                <div class="span6 input-append date start_date">
                                    <p class="label_search">Fecha</p>
                                    <input type="text" class="input-small datepicker" name="fecha"
                                        data-format="dd/mm/yyyy" value="@php echo date('d/m/Y'); @endphp">
                                </div>
                            </div>
                            <div class="row-fluid text-center jbsearch_submit">
                                <button type="submit" class="btn btn-primary submit_search">Buscar viaje</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    $(document).ready(function($) {
        setTimeout(function() {
            $("#oferta").fadeOut(1500);
        },4000);                
    });	  
    
</script>
@endsection

