@php
$namesUser = explode(' ', Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')

    <div class="container-fluid">

        @if (isset($pbx))
            <div class="bg-theme-1 d-lg-none d-sm-inline"
                style="border-bottom-left-radius: 50px; border-bottom-right-radius: 50px">
                <div class="bg-theme-1 row justify-content-around d-lg-none d-sm-inline">
                    <img src="{{ asset('img/app/bnumerosimportantes.png') }}" class="d-lg-none d-sm-inline img-fluid"
                        style="max-height: 100%; margin-top: 3%">
                </div>
            </div>

            <div class="mb-3 justify-content-center row ">
                <div class="mt-3 col-12 col-md-6 col-lg-6" role="group" aria-label="Basic example">

                    @foreach ($pbx as $item)
                        <a type="button" href="tel:{{ $item->phone_one }}" class="btn btn-lg btn-block btn-light d-flex">
                            <span style="color: #030d4f; text-align: left"
                                class="ml-3 justify-content h3"><b>{{ $item->name }}</b>
                            </span>
                            <img class="ml-auto" width="30px" height="30px" src="{{ asset('img/app/llamar.png') }}"
                                alt="">
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if (isset($whatsapp))
            <div class="bg-theme-1 d-lg-none d-sm-inline"
                style="border-bottom-left-radius: 50px; border-bottom-right-radius: 50px">
                <div class="bg-theme-1 row justify-content-around d-lg-none d-sm-inline">
                    <img src="{{ asset('img/app/bnumerosimportatnesWhatsapp.png') }}"
                        class="d-lg-none d-sm-inline img-fluid" style="max-height: 100%; margin-top: 3%">
                </div>
            </div>
            <div class="mb-3 justify-content-center row ">
                <div class="mt-3 col-12 col-md-6 col-lg-6 " role="group" aria-label="Basic example">

                    @foreach ($whatsapp as $item)
                        <a type="button" href="{{ url('https://api.whatsapp.com/send?phone=' . $item->mobile_one) }}"
                            class="btn btn-lg btn-block btn-light d-flex">
                            <span style="color: #030d4f; text-align: left"
                                class="ml-3 mr-3 justify-content-center h3"><b>{{ $item->name }}</b></span>
                            <img class="ml-auto" width="30px" height="30px" src="{{ asset('img/app/whatsapp.png') }}"
                                alt="">
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

@endsection
