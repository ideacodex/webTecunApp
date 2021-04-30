@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">EDITAR TRIVIA</strong>
            </div>
        </div>
        <div class="mt-4">
            @foreach ($question as $items)
                <form method="POST" action="{{ url('gamesAdmin/' . $items->id) }}" enctype="multipart/form-data"
                    onsubmit="return checkSubmit();">
                    <input type="hidden" name="oneAnswer" value="{{ $items->answer[0]->id }}">
                    <input type="hidden" name="twoAnswer" value="{{ $items->answer[1]->id }}">
                    <input type="hidden" name="treeAnswer" value="{{ $items->answer[2]->id }}">
                    <input type="hidden" name="forAnswer" value="{{ $items->answer[3]->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-12 input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                    id="inputGroup-sizing-sm">
                                    <i style="color: #fa5e0a" class="fas fa-align-left"></i>
                                </span>
                            </div>
                            <input id="description" placeholder="Describe la trivia" type="text"
                                class="text-dark border-top-0 border-left-0 bg-input form-control @error('description') is-invalid @enderror"
                                name="description" value="{{ $items->description }}" required autocomplete="description"
                                autofocus>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                    id="inputGroup-sizing-sm">
                                    <i style="color: #fa5e0a" class="fas fa-check"></i>
                                </span>
                            </div>
                            <input id="questionTrue" name="questionTrue" placeholder="Respuesta Correcta" type="text"
                                size="100" maxlength="100"
                                class="text-dark border-top-0 border-left-0 bg-input form-control @error('questionTrue') is-invalid @enderror"
                                questionTrue="questionTrue" value="{{ $items->answer[0]->reply }}" autofocus>

                            @error('questionTrue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('questionTrue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                    id="inputGroup-sizing-sm">
                                    <i style="color: #fa5e0a" class="fas fa-times"></i>
                                </span>
                            </div>
                            <input id="questionFalse1" name="questionFalse1" placeholder="Respuesta incorrecta" type="text"
                                size="100" maxlength="100"
                                class="text-dark border-top-0 border-left-0 bg-input form-control @error('questionFalse1') is-invalid @enderror"
                                questionTrue="questionFalse1" value="{{ $items->answer[1]->reply }}" autofocus>

                            @error('questionFalse1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('questionFalse1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                    id="inputGroup-sizing-sm">
                                    <i style="color: #fa5e0a" class="fas fa-times"></i>
                                </span>
                            </div>
                            <input id="questionFalse2" name="questionFalse2" placeholder="Respuesta incorrecta" type="text"
                                size="100" maxlength="100"
                                class="text-dark border-top-0 border-left-0 bg-input form-control @error('questionTrue') is-invalid @enderror"
                                questionTrue="questionFalse2" value="{{ $items->answer[2]->reply }}" autofocus>

                            @error('questionFalse2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('questionFalse2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-top-0 border-right-0 bg-input transparent"
                                    id="inputGroup-sizing-sm">
                                    <i style="color: #fa5e0a" class="fas fa-times"></i>
                                </span>
                            </div>
                            <input id="questionFalse3" name="questionFalse3" placeholder="Respuesta incorrecta" type="text"
                                size="100" maxlength="100"
                                class="text-dark border-top-0 border-left-0 bg-input form-control @error('questionFalse3') is-invalid @enderror"
                                questionTrue="questionFalse3" value="{{ $items->answer[3]->reply }}" autofocus>

                            @error('questionFalse3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('questionFalse3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="custom-file">
                            <input title="Selecionar" type="file" accept="image/*" name="image" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04"
                                class="custom-file-input form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                value="{{ old('image') }}">
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        <i class="fas fa-exclamation-triangle"></i>{{ $errors->first('image') }}
                                    </strong>
                                </span>
                            @endif
                            <label class="custom-file-label" for="inputGroupFile04">Elegir imagen de la trivia</label>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg bg-theme-1 text-light" style="border-radius: 10px">
                                    <i class="fas fa-save"></i>
                                    {{ __('ACTUALIZAR TRIVIA') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
