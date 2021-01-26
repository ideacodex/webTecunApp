@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid">

        @if (isset($pbx))
            <div class="row justify-content-around" style="margin-top: 4em;">
                <img src="{{ asset('img/telephone.png') }}" class="img-fluid" width="20%">
            </div>

            <div class="mb-3 justify-content-center row ">
                <div class="mt-3 col-12 col-md-6 col-lg-6 " role="group" aria-label="Basic example">

                    @foreach ($pbx as $item)
                        <a type="button" href="tel:{{ $item->phone_one }}" class="btn btn-lg btn-block btn-light d-flex">
                            <span class="h3"><i class="fas fa-phone mr-3  text-success justify-content-start"></i></span>
                            <span class="ml-3 mr-3  justify-content-center h3">{{ $item->name }}</span>
                            <span class="justify-content-end">
                                <i class="fa fa-send"></i>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if (isset($whatsapp))
            <div class="row justify-content-around" style="margin-top: 4em;">
                <img src="{{ asset('img/whatsapp.png') }}" class="img-fluid" width="20%">
            </div>
            <div class="mb-3 justify-content-center row ">
                <div class="mt-3 col-12 col-md-6 col-lg-6 " role="group" aria-label="Basic example">

                    @foreach ($whatsapp as $item)
                        <a type="button" href="{{ url('https://api.whatsapp.com/send?phone=' . $item->mobile_one) }}"
                            class="btn btn-lg btn-block btn-light d-flex">
                            <span class="h3"><i class="fab fa-whatsapp mr-3  text-success justify-content-start"></i></span>
                            <span class="ml-3 mr-3  justify-content-center h3">{{ $item->name }}</span>
                            <span class="justify-content-end">
                                <i class="fa fa-send"></i>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

@endsection
