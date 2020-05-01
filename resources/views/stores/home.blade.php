@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
<div class="container-fluid">
    <div class="mb-3 justify-content-center row ">
        <div class="col-12 col-md-8 offset-md-2 mt-3">
            <div class="d-flex justify-content-around mt-2">
                <h1 class="text-info">{{'Encontrar Agencia'}}
                </h1>
            </div>
            <form class="d-flex justify-content-around  my-lg-0" method="POST" action="{{ url('url') }}"
                onsubmit="return checkSubmit();">
                @csrf
                <input id="trip" name="key" type="hidden" value="{{''}}">
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-taxi map-marker-alt"></i>
                        </span>
                    </div>
                    <input aria-label=" Sizing example input" aria-describedby="inputGroup-sizing-sm" id="cityData"
                        name="search" class="text-primary form-control{{ $errors->has('search') ? ' is-invalid' : '' }}"
                        autofocus required>
                    @if ($errors->has('search'))
                    <span class="invalid-feedback" role="alert">
                        <strong><i class="fas fa-waze"></i>{{ $errors->first('search') }}</strong>
                    </span>
                    @endif
                    <button class="btn btn-primary" type="submit">
                        <i class="text-light fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-2 col-12 col-md-6 offset-md-3" role="group" aria-label="Basic example">
            <a type="button" href="{{url('messages')}}" class="btn btn-lg btn-block btn-light d-flex">
                <i class="fas fa-rocket mr-3  text-success justify-content-start"></i>
                <span class="mr-3  justify-content-center">Oportunidades de crecimiento</span>
                <span class="badge  badge-primary text-light  justify-content-end">{{ Auth::user()->id *25 }}
                </span>
            </a>
            <button type="button" class="btn btn-lg btn-block btn-light d-flex">
                <i class="fas fa-map-marked-alt mr-3 text-dark justify-content-start"></i>
                <span class="mr-3  justify-content-center">Ubicación de agencias</span>
                <span class="badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id  * 20}}
                </span>
            </button>
            <a type="button" class="btn btn-lg btn-block btn-light d-flex" href="{{url('cars')}}">
                <i class="fas fa-medal mr-3  justify-content-start text-danger"></i>
                <span class="mr-3  justify-content-center">Colaboradores Destacados</span>
                <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                </span>
            </a>
        </div>
    </div>
</div>

@endsection