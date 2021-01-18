@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-2">
        <p class="text-primary h2">Nueva agencia <i class="fas fa-building"> </i></p>
    </div>
    <div class="mt-4">
        <form method="POST" action="{{ url('storesAdmin') }}" enctype="multipart/form-data"
            onsubmit="return checkSubmit();">
            @csrf
            <div class="form-row">
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-building"></i>
                        </span>
                    </div>
                    <input id="name" name="name" placeholder="Nombre de agencia" type="text" size="100" maxlength="100"
                        class="text-primary form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-map"></i>
                        </span>
                    </div>
                    <input id="address" placeholder="Dirección" type="text"
                        class="text-primary form-control @error('address') is-invalid @enderror" name="address"
                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-clock"></i>
                        </span>
                    </div>
                    <input id="schedule" name="schedule" placeholder="Horario" type="text"
                        size="100" maxlength="100"
                        class="text-primary form-control @error('schedule') is-invalid @enderror" schedule="schedule"
                        value="{{ old('schedule') }}" required autocomplete="schedule" autofocus>

                    @error('schedule')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('schedule')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-phone-square-alt"></i>
                        </span>
                    </div>
                    <input id="number" name="number" placeholder="PBX de agecia" type="text"
                        size="100" maxlength="100"
                        class="text-primary form-control @error('number') is-invalid @enderror" name="number"
                        value="{{ old('number') }}" required autocomplete="number" autofocus>

                    @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fab fa-waze"></i>
                        </span>
                    </div>
                    <input id="maps" name="maps" placeholder="Link o enlace de waze" type="text"
                        size="100" maxlength="100"
                        class="text-primary form-control @error('maps') is-invalid @enderror" maps="maps"
                        value="{{ old('maps') }}" required autocomplete="maps" autofocus>

                    @error('maps')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('maps')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                <i class="fas fa-save"></i>
                                {{ __('Guardar') }}
                            </button> </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection