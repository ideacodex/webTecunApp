@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="container-fluid">
        <div class="mb-3 justify-content-center row ">
           
            @if (sizeof($pictures) >= 1)

                <div class="container-fluid">
                    <div class="row mt-2">
                        @foreach ($pictures as $item)
                            <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-2">
                                <div class="card">
                                    <img src="{{ asset('/storage/pictures/' . $item->featured_image) }}" width="100%"
                                        style="max-height: 600px">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color:orange">{{ $item->title }}</h5>
                                        <p class="card-text">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <div class="card-footer justify-content-around d-flex">
                                        <span> {{ $item->created_at->format('d-m-Y') }} </span>
                                        <span class="text-muted">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="container">
                    <div class="row justify-content-around mt-5" style="margin-top:15em">
                        <img src="{{ asset('img/not-found.png') }}" class="img-fluid" style="max-height: 300px;">
                    </div>

                    <div class="row justify-content-around mt-5">
                        <p class="h1 text-primary">Vaya</p>
                    </div>
                    <div class="row justify-content-around mt-1">
                        <p class="h5 text-primary">Aun no hay publicaciones</p>
                    </div>
                    <div class="row justify-content-center mt-1">
                        <span class="text-primary"> ...</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
