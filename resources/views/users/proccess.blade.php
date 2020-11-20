@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid">
        <div class="card-group mt-5 mb-5">
            <div class="card text-center">
                <img class="img-fluid mx-auto d-block" src="https://www.flaticon.com/svg/static/icons/svg/196/196123.svg" width="100 px">
                <div class="card-body">
                    <h5 class="card-title">Instructivo_seguro médico GyT</h5>
                </div>
                <div class="card-footer">
                    <a href="{{ asset('files/InstructivoSeguromédicoGyT.pdf') }}" class="btn btn-primary btn-lg"> Descargar</a>
                </div>
            </div>
            <div class="card text-center">
                <img class="img-fluid mx-auto d-block" src="https://irtraesfelicidad.files.wordpress.com/2019/08/logo-irtra.org_.png?w=200" width="100 px">
                <div class="card-body">
                    <h5 class="card-title">Formulario Irtra</h5>
                </div>
                <div class="card-footer">
                    <a href="{{ asset('files/formularioIrtra.doc') }}" class="btn btn-primary btn-lg"> Descargar</a>
                </div>
            </div>
            <div class="card text-center">
                <img class="img-fluid mx-auto d-block" src="https://www.flaticon.com/svg/static/icons/svg/3208/3208164.svg" width="100 px">
                <div class="card-body">
                    <h5 class="card-title">Instructivo_seguro médico GyT</h5>
                </div>
                <div class="card-footer">
                    <a href="{{ asset('files/InstructivoSeguromédicoGyT.pdf') }}" class="btn btn-primary btn-lg"> Descargar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 mb-5"></div>
@endsection
