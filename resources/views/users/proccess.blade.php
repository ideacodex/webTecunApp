@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    @if (session('message'))
        <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
            <span class="badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card-group mt-5 mb-5">
            <div class="card text-center">
                <img class="img-fluid mx-auto d-block" src="{{ asset('img/seguro.jpg') }}" width="60%">
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
                <img class="img-fluid mx-auto d-block" src="{{ asset('img/piscina.jpg') }}" width="60%">
                <div class="card-body">
                    <h5 class="card-title">Consulta Vacaciones</h5>
                </div>
                <div class="card-footer">
                    <a href="{{ route('proccessRRHH') }}" class="btn btn-primary btn-lg"> Consultar</a>
                </div>
            </div>

            <div class="card text-center">
                <img class="img-fluid mx-auto d-block" src="{{ asset('img/certificado.jpg') }}" width="60%">
                <div class="card-body">
                    <h5 class="card-title">Constacia Laboral</h5>
                </div>
                <div class="card-footer">
                    <a href="{{ url('procesos/constancia') }}" class="btn btn-primary btn-lg"> Solictar</a>
                </div>
            </div>
        </div>
    </div>

    
@endsection
