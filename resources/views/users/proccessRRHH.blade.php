@php
$namesUser = explode(" ", Auth::user()->name);
@endphp
@extends('layouts.user')
@section('content')
  <div class="col-12 mt-1">
    <div class="form-group row">
      <div class="col-12 pl-0 pr-0">
        <div class="border border-light p-3 mb-4">
          <div class="text-center">
            @foreach ($tecunComercial as $item)
              <a class="btn btn-primary btn-lg" data-toggle="collapse" href="#multiCollapseExample1" role="button"
                aria-expanded="false" aria-controls="multiCollapseExample1">{{ $item->groupCompanies }}
              </a>
            @endforeach

            @foreach ($tecunAutomotores as $item)
              <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse"
                data-target="#multiCollapseExample2" aria-expanded="false"
                aria-controls="multiCollapseExample2">{{ $item->groupCompanies }}
              </button>
            @endforeach

            @foreach ($otros as $item)
              <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse"
                data-target="#multiCollapseExample3" aria-expanded="false"
                aria-controls="multiCollapseExample3">{{ $item->groupCompanies }}
              </button>
            @endforeach

          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
              <div class="card card-body">
                @foreach ($companiesTecunComercial as $items)
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterCommercial">
                    {{ $items->company }}
                  </button>
                  <hr/>
                @endforeach
              </div>
            </div>
          </div>

          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
              <div class="card card-body">
                @foreach ($companiesTecunAutomotores as $items)
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterAutomotive">
                    {{ $items->company }}
                  </button>
                  <hr/>
                @endforeach
              </div>
            </div>
          </div>

          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample3">
              <div class="card card-body">
                @foreach ($companiesOtros as $items)
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterOthers">
                    {{ $items->company }}
                  </button>
                  <hr/>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenterCommercial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      @foreach ($tecunComercial as $item)
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">{{ $item->groupCompanies }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Al momento de elegir la empresa donde labora,
            se esta procesando un correo electronico al encargado de nomina,
            del grupo de trabajo donde perteneces.

            Para continuar con la solicitud sobre cuantos dias de vacaciones tienes
            por favor presione Aceptar. Automaticamente se eviara un correo con tu informacion,
            se contactaran contigo lo mas pronto posible.
          </div>
          <div class="modal-footer">
            <form method="POST" action="{{ url('mailRRHHVacation') }}" onsubmit="return checkSubmit();">
              @csrf
              <input type="hidden" name="mailGroup" title="mailGroup" value="{{ $item->mailGroupCompany }}" >
              <input type="hidden" name="emailUser" id="emailUser" value="{{ auth()->user()->email }}">
              <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
              <input type="hidden" name="lastname" id="lastname" value="{{ auth()->user()->lastname }}">
              <input type="hidden" name="groupCompanies" title="groupCompanies" value="{{ $item->groupCompanies }}" >
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">
                {{ __('Aceptar') }}
              </button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenterAutomotive" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      @foreach ($tecunAutomotores as $item)
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">{{ $item->groupCompanies }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Al momento de elegir la empresa donde labora,
            se esta procesando un correo electronico al encargado de nomina,
            del grupo de trabajo donde perteneces.

            Para continuar con la solicitud sobre cuantos dias de vacaciones tienes
            por favor presione Aceptar. Automaticamente se eviara un correo con tu informacion,
            se contactaran contigo lo mas pronto posible.
          </div>
          <div class="modal-footer">
            <form method="POST" action="{{ url('mailRRHHVacation') }}" onsubmit="return checkSubmit();">
              @csrf
              <input type="hidden" name="mailGroup" title="mailGroup" value="{{ $item->mailGroupCompany }}" >
              <input type="hidden" name="groupCompanies" title="groupCompanies" value="{{ $item->groupCompanies }}" >
              <input type="hidden" name="emailUser" id="emailUser" value="{{ auth()->user()->email }}">
              <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
              <input type="hidden" name="lastname" id="lastname" value="{{ auth()->user()->lastname }}">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">
                {{ __('Aceptar') }}
              </button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenterOthers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      @foreach ($otros as $item)
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">{{ $item->groupCompanies }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Al momento de elegir la empresa donde labora,
            se esta procesando un correo electronico al encargado de nomina,
            del grupo de trabajo donde perteneces.

            Para continuar con la solicitud sobre cuantos dias de vacaciones tienes
            por favor presione Aceptar. Automaticamente se eviara un correo con tu informacion,
            se contactaran contigo lo mas pronto posible.
          </div>
          <div class="modal-footer">
            <form method="POST" action="{{ url('mailRRHHConstancy') }}" onsubmit="return checkSubmit();">
              @csrf
              <input type="hidden" name="mailGroup" title="mailGroup" value="{{ $item->mailGroupCompany }}" >
              <input type="hidden" name="groupCompanies" title="groupCompanies" value="{{ $item->groupCompanies }}" >
              <input type="hidden" name="emailUser" id="emailUser" value="{{ auth()->user()->email }}">
              <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
              <input type="hidden" name="lastname" id="lastname" value="{{ auth()->user()->lastname }}">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">
                {{ __('Aceptar') }}
              </button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
