@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
    <div class="col-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
        <div class="accordion" id="accordionExample">
            @if ($companies)
                @foreach ($companies as $item)
                    <div class="card d-flex justify-content-around ">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#id{{ $loop->index }}" aria-expanded="false"
                                    aria-controls="id{{ $loop->index }}">
                                    {{ $item->name }}
                                </button>
                            </h2>
                        </div>
                        <div id="id{{ $loop->index }}" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            @foreach ($records->where('name', $item->name) as $subItem)
                                <div class="card-body">
                                    <div>
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                            data-target="#id{{ $subItem->id }}">
                                            {{ $subItem->departament }}
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="id{{ $subItem->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ $subItem->departament }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Al elegir la empresa,se envía un correo electronico al encargado de nomina.

                                                    Para continuar con la solicitud sobre cuantos dias de vacaciones
                                                    tienes
                                                    por favor presione Aceptar. Se eviará un correo con
                                                    tu información y se contactaran contigo lo mas pronto posible.
                                                </div>
                                                <div class="modal-footer">
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
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-success">
                                                            {{ __('Aceptar') }}
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
