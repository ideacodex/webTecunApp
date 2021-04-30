@extends('layouts.admin')

@section('content')
    @if (!$categories->first())
        <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
            <span class="badge badge-pill badge-warning">No hay categorias aún, <a href="{{ url('categories/create') }}">
                    Agregar
                    una nueva categoria</a> </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">EDITAR RECONOCIMIENTO</strong>
            </div>
        </div>
        <div class="mt-4">
            <form method="POST" action="{{ url('awardsAdmin/' . $award->id) }}" enctype="multipart/form-data"
                onsubmit="return checkSubmit();">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 bg-input border-right-0" id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-question-circle"></i>
                            </span>
                        </div>
                        <select name="type_id" id="type_id"
                            class="form-control bg-input border-top-0 border-left-0 @error('type_id') is-invalid @enderror">
                            <option selected value="{{ $award->type_id }}">Tipo</option>
                            <option value="0">Empleado Nuevo</option>
                            <option value="1">Puesto Nuevo</option>
                        </select>
                        @error('type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 bg-input border-right-0" id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-question-circle"></i>
                            </span>
                        </div>
                        @if ($award->active == 1)
                            <select name="active" id="active"
                                class="form-control bg-input border-top-0 border-left-0 @error('active') is-invalid @enderror">
                                <option selected disabled value="{{ $award->active }}">Si</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                            @error('active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        @else
                            <select name="active" id="active"
                                class="form-control bg-input border-top-0 border-left-0 @error('active') is-invalid @enderror">
                                <option selected disabled value="{{ $award->active }}">No</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                            @error('active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        @endif
                    </div>
                    <div class="col-12 input-group input-group-lg mb-3">
                        <select name="user_id" id="user_id"
                            class="select2 form-control @error('user_id') is-invalid @enderror">
                            <option selected value="{{ $award->user_id }}">{{ $award->user->name }} ,
                                {{ $award->user->lastname }}</option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} , {{ $item->lastname }}
                                </option>
                            @endforeach

                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-top-0 bg-input border-right-0
                                            id=" inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-image"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                            <input title="Selecionar" type="file" accept="image/*" name="image" id="inputGroupFilAwarde04"
                                aria-describedby="inputGroupFileAddon04"
                                class="custom-file-input form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                value="{{ old('image') }}">
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong><i
                                            class="fas fa-exclamation-triangle"></i>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                            @foreach ($award as $item)
                                <label class="custom-file-label" for="inputGroupFile04">Elegir imagen</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg bg-theme-1 text-light" style="border-radius: 10px">
                                    <i class="fas fa-save"></i>
                                    {{ __('ACTUALIZAR RECINOCIMIENTO') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
