@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">EDITAR AGENCIA</strong>
            </div>
        </div>
        <div class="mt-4">
            <form method="POST" action="{{ url('storesAdmin/' . $store->id) }}" enctype="multipart/form-data"
                onsubmit="return checkSubmit();">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-building"></i>
                            </span>
                        </div>
                        <input id="name" name="name" placeholder="Nombre de agencia" type="text" size="100" maxlength="100"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ $store->name }}" required autocomplete="name" autofocus>

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
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-map"></i>
                            </span>
                        </div>
                        <input id="address" placeholder="Dirección" type="text"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('address') is-invalid @enderror"
                            name="address" value="{{ $store->address }}" required autocomplete="address" autofocus>

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
                    {{-- <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-clock"></i>
                            </span>
                        </div>
                        <input id="schedule" name="schedule" placeholder="Horario" type="text" size="100" maxlength="100"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('schedule') is-invalid @enderror"
                            schedule="schedule" value="{{ $store->schedule }}" required autocomplete="schedule" autofocus>

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
                    </div> --}}

                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-phone-square-alt"></i>
                            </span>
                        </div>
                        <input id="number" name="number" placeholder="PBX de agecia" type="text" size="100" maxlength="100"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('number') is-invalid @enderror"
                            name="number" value="{{ $store->number }}" required autocomplete="number" autofocus>

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
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fab fa-waze"></i>
                            </span>
                        </div>
                        <input id="maps" name="maps" placeholder="Link o enlace de waze" type="text" size="100"
                            maxlength="100"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('maps') is-invalid @enderror"
                            maps="maps" value="{{ $store->maps }}" required autocomplete="maps" autofocus>

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

                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-map-marker-alt"></i>
                                
                            </span>
                        </div>
                        <input id="waze" name="waze" placeholder="Link o enlace de google maps" type="text" size="100"
                            maxlength="100"
                            class="text-dark bg-input border-top-0 border-left-0 form-control @error('waze') is-invalid @enderror"
                            waze="waze" value="{{ $store->waze }}" required autocomplete="waze" autofocus>

                        @error('waze')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('waze')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <textarea id="summernote" name="schedule">{{ $store->schedule }}</textarea>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg bg-theme-1 text-light" style="border-radius: 10px">
                                    <i class="fas fa-save"></i>
                                    {{ __('ACTUALIZAR AGENCIA') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
<script>
    $('.js-example-basic-multiple').select2();

</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Agrega aquí el contenido',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']],
        ]
    });

</script>
@endsection
