@extends('plantilla.plantillaTienda')

@section('titulo','Kasle Glam')

@section('estilos')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{ asset('PlantillaTienda/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('PlantillaTienda/styles/responsive.css')}}">

<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
@endsection


@section('pagina','Verificacion de Correo')


@section('contenido')

@extends('custom.breadcrumbtienda')

@section('breadcrumb')

 <li class=" active"><a href=""> @yield('pagina')</a></li>
@endsection

@section('salto')
 <br>
 <br>
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
