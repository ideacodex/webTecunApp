@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid">
        
        @if (isset($pbx))
            <div class="row justify-content-around" style="margin-top: 4em;">
                <img src="{{ asset('img/telephone.png') }}" class="img-fluid" style="max-height: 250px;">
            </div>
            @foreach ($pbx as $item)
                <div class="mb-3 justify-content-center row ">
                    <div class="mt-3 col-12 col-md-6 col-lg-6 " role="group" aria-label="Basic example">
                        <a type="button" href="tel:{{ $item->phone_one }}" class="btn btn-lg btn-block btn-light d-flex">
                            <span class="ml-3 mr-3  justify-content-center h3">{{ $item->name }}</span>
                            <span class="ml-3 mr-3  justify-content-center h3">{{ $item->phone_one }}</span>
                            <span class="d-none badge  badge-primary text-light  justify-content-end">{{ Auth::user()->id * 25 }}
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif

        @if (isset($whatsapp))
            <div class="row justify-content-around" style="margin-top: 4em;">
                <img src="{{ asset('img/whatsapp.png') }}" class="img-fluid" style="max-height: 250px;">
            </div>
            @foreach ($whatsapp as $item)
                <div class="mb-3 justify-content-center row ">
                    <div class="mt-3 col-12 col-md-6 col-lg-6 " role="group" aria-label="Basic example">
                        <a type="button" href="tel:{{ $item->mobile_one }}" class="btn btn-lg btn-block btn-light d-flex">
                            <span class="ml-3 mr-3  justify-content-center h3">{{ $item->name }}</span>
                            <span class="ml-3 mr-3  justify-content-center h3">{{ $item->mobile_one }}</span>
                            <span class="d-none badge  badge-primary text-light  justify-content-end">{{ Auth::user()->id * 25 }}
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
