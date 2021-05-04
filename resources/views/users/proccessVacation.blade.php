@php
$namesUser = explode(' ', Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="col-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
        <div class="accordion mt-5" id="accordionExample">
            @if ($companies)
                @foreach ($companies as $item)
                    <div class="card d-flex justify-content-around mt-3">
                        <div class="card-header text-center bg-theme-2" style="border-radius: 15px;" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-center text-light btn-block text-left collapsed"
                                    type="button" data-toggle="collapse" data-target="#id{{ $loop->index }}"
                                    aria-expanded="false" aria-controls="id{{ $loop->index }}">
                                    <b>{{ $item->name }}</b>
                                </button>
                            </h2>
                        </div>
                        <div id="id{{ $loop->index }}" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            @foreach ($records->where('name', $item->name) as $subItem)
                                <div class="card-body border border-secondary border-top-0 border-left-0 border-right-0">
                                    <div>
                                        <button type="button" class="btn text-left" data-toggle="modal"
                                            data-target="#id{{ $subItem->id }}">
                                            {{ $subItem->departament }}
                                        </button>
                                        <img width="40px" class="empresas ml-auto" src="{{ asset('img/vacaciones.png') }}"
                                            alt="">
                                    </div>

                                    <!-- Modal -->
                                    <div class=" modal fade" id="id{{ $subItem->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">

                                            <div class="modal-content" style="border-radius: 30px">
                                                <div class="modal-body">
                                                    <h3 class="mt-4 text-center modales">
                                                        <b>CONSULTAR MIS VACACIONES</b>
                                                    </h3>
                                                    <h4 class="text-center">Elige la empresa a la que perteneces para
                                                        consultar cuantos días de
                                                        vacaciones tienes disponibles</h4>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <form method="POST" action="{{ url('mailRRHHVacation') }}"
                                                        onsubmit="return checkSubmit();">
                                                        @csrf
                                                        <input type="hidden" name="email" title="email"
                                                            value="{{ $subItem->email }}">
                                                        <input type="hidden" name="emailUser" id="emailUser"
                                                            value="{{ auth()->user()->email }}">
                                                        <input type="hidden" name="name" id="name"
                                                            value="{{ auth()->user()->name }}">
                                                        <input type="hidden" name="lastname" id="lastname"
                                                            value="{{ auth()->user()->lastname }}">
                                                        <input type="hidden" name="departament" title="departament"
                                                            value="{{ $subItem->departament }}">
                                                        <button type="button" class="btn" data-dismiss="modal">
                                                            <h5 class="text-primary"><i
                                                                    class="text-primary far fa-times-circle"></i>CERRAR</h5>
                                                        </button>
                                                        <button type="submit" class="btn">
                                                            <h5 class="text-primary"><i
                                                                    class="text-primary fas fa-share-square"></i> ACEPTAR
                                                            </h5>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            @endif


        </div>
    </div>


@endsection
