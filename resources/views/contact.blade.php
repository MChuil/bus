@extends('layouts.public')

@section('title', 'Contactanos')

@section('content')
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contacto</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="contactform_ok" class="alert alert-success" style="display:none">
                        <strong>Mensaje enviado con éxito.</strong> Gracias por contactar.
                    </div>

                    <div id="contactform_error" class="alert alert-danger" style="display:none">
                        <strong>Se han producido errores.</strong> Inténtelo mas tarde, gracias.
                    </div>
                    <form action="contacto_mail.php" method="post" class="form-info" id="contactform">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Nombre</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nombre"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span>
                                        </span>
                                        <input type="email" class="form-control" id="email" placeholder="Email"
                                            required="required" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Mensaje</label>
                                    <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                        placeholder="Mensaje"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                    Enviar Mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <legend><span class="glyphicon glyphicon-globe"></span> Oficinas centrales</legend>
                    <address>
                        <strong>AraBus, S.A.</strong><br>
                        C/ Nueva 6<br>
                        50000 Zaragoza<br>
                        <abbr title="Teléfono">
                            Tel:</abbr>
                        976 000 000
                    </address>
                    <address>
                        <strong>Email</strong><br>
                        <a href="mailto:#">arabus@example.com</a>
                    </address>
                </div>
            </div>
        </div>
    </section>

@endsection
