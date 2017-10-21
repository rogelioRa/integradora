@extends('templates.master')
@section("title") Campaña dupont @stop

@section('carousel-section')

<div id="carousel-example-1" class="carousel slide carousel-fade " data-ride="carousel" data-ride="carousel"  style="margin-top:0rem;">
        <!--Indicators-->

        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            <!--First slide-->
            <div class="carousel-item active">
                <!--Mask-->
                @if(!Auth::user())
                <img src="/packages/assets/media/images/btn-juega.png" alt="" data-toggle="modal" data-target="#mdl-login-register" class="btn-juega animated bounce">
                @else
                <a href="/game/">
                  <img src="/packages/assets/media/images/btn-juega.png" alt="" class="btn-juega animated bounce">
                </a>
                @endif
                <!--/.Mask-->
            </div>
            <!--/.First slide-->
            @if(Auth::user())
            <!--Second slide -->
            <!-- <div class="carousel-item"> -->
                <!--Mask-->
                <!--/.Mask-->
            <!-- </div> -->
            <!--/.Second slide -->


            @endif
        </div>

        <!--/.Controls-->
    </div>
<!-- / Modal de login -->
@stop
@section('content-main')
  <!--Modal: Login / Register Form-->
  <div class="modal-dialog cascading-modal" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab"><i class="fa fa-user mr-1"></i> Login</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#panel2" role="tab"><i class="fa fa-user-plus mr-1"></i> Register</a>
                                    </li>
                                </ul>

                                <!-- Tab panels -->
                                <div class="tab-content">
                                    <!--Panel 1-->
                                    <div class="tab-pane fade in show active" id="panel1" role="tabpanel">

                                        <!--Body-->
                                        <div class="modal-body mb-1">
                                          <form id="frm-login">

                                            <div class="md-form form-sm">
                                                <i class="fa fa-envelope prefix"></i>
                                                <input type="text" id="username" class="form-control">
                                                <label for="username">Username</label>
                                            </div>

                                            <div class="md-form form-sm">
                                                <i class="fa fa-lock prefix"></i>
                                                <input type="password" id="pass" class="form-control">
                                                <label for="pass"> password</label>
                                            </div>
                                            <div class="text-center mt-2">
                                                <button class="btn btn-info waves-effect waves-light">Log in <i class="fa fa-sign-in ml-1"></i></button>
                                            </div>
                                          </form>
                                        </div>
                                        <!--Footer-->
                                        <div class="modal-footer display-footer">
                                            <div class="options text-center text-md-right mt-1">
                                                <p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>
                                                <p>Forgot <a href="#" class="blue-text">Password?</a></p>
                                            </div>
                                            <button type="button" class="btn btn-outline-info waves-effects ml-auto" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                    <!--/.Panel 1-->

                                    <!--Panel 2-->
                                    <div class="tab-pane fade" id="panel2" role="tabpanel">

                                        <!--Body-->
                                        <div class="modal-body">
                                          <form id=frm-register>

                                            <div class="md-form form-sm">
                                                <i class="fa fa-envelope prefix"></i>
                                                <input type="text" id="email" class="form-control">
                                                <label for="email">Your email</label>
                                            </div>

                                            <div class="md-form form-sm">
                                                <i class="fa fa-envelope prefix"></i>
                                                <input type="text" id="username-r" class="form-control">
                                                <label for="username-r">username</label>
                                            </div>

                                            <div class="md-form form-sm">
                                                <i class="fa fa-envelope prefix"></i>
                                                <input type="text" id="nombre" class="form-control">
                                                <label for="nombre">Nombre</label>
                                            </div>

                                            <div class="md-form form-sm">
                                                <i class="fa fa-envelope prefix"></i>
                                                <input type="text" id="apellidos" class="form-control">
                                                <label for="apellidos">apellidos</label>
                                            </div>

                                            <div class="md-form form-sm">
                                                <i class="fa fa-lock prefix"></i>
                                                <input type="password" id="pass-r" class="form-control">
                                                <label for="pass-r">Your password</label>
                                            </div>

                                            <div class="md-form form-sm">
                                                <i class="fa fa-lock prefix"></i>
                                                <input type="password" id="password-rep" class="form-control">
                                                <label for="password-rep">Repeat password</label>
                                            </div>

                                            <div class="text-center form-sm mt-2">
                                                <button type="submit" class="btn btn-info waves-effect waves-light">Sign up <i class="fa fa-sign-in ml-1"></i></button>
                                            </div>
                                          </form>
                                        </div>
                                        <!--Footer-->
                                        <div class="modal-footer">
                                            <div class="options text-right">
                                                <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
                                            </div>
                                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!--/.Panel 2-->
                                </div>

                            </div>
                        </div>
                        <!--/.Content-->
                    </div>

  <!--Modal: Login / Register Form-->

@stop

@section('js')
<script src="/packages/assets/js/guia.js" charset="utf-8"></script>
<script src="/packages/assets/js/components.js" charset="utf-8"></script>
<script src="/packages/assets/js/main.js" charset="utf-8"></script>
@stop
