@extends('layouts.admin')

@section('content')
@if(!$categories->first())
<div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
    <span class="badge badge-pill badge-warning">No hay categorias aun, <a href="{{url('categories/create')}}"> Agregar
            un nueva categoria</a> </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container-fluid">
    <div class="row justify-content-center mt-2">
        <p class="text-primary h2">Nueva oferta de empleo <i class="fas fa-briefcase"> </i></p>
    </div>
    <div class="mt-4">
        <form method="POST" action="{{ url('jobsAdmin/'. $job->id) }}" enctype="multipart/form-data"
            onsubmit="return checkSubmit();">
            @csrf
            @method('PATCH')
            <div class="form-row">
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-heading"></i>
                        </span>
                    </div>
                    <input id="title" name="title" placeholder="Agregar titulo" type="text" size="100" maxlength="100"
                        class="text-primary form-control @error('title') is-invalid @enderror" title="title"
                        value="{{ $job->title }}" required autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-align-left"></i>
                        </span>
                    </div>
                    <input id="description" placeholder="Descripcion o texto corto" type="text"
                        class="text-primary form-control @error('description') is-invalid @enderror" name="description"
                        value="{{ $job->description }}" required autocomplete="description" autofocus>

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
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-money-bill-wave"></i>
                        </span>
                    </div>
                    <input id="salary" name="salary" placeholder="Salario (opcional)" type="number" size="100"
                        maxlength="100" class="text-primary form-control @error('salary') is-invalid @enderror"
                        salary="salary" value="{{ $job->salary}}" autofocus>

                    @error('salary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('salary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-primary" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-tags"></i>
                        </span>
                    </div>
                    <select name="category_id" id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror" required>
                <option value="{{$job->category_id}}" selected>{{ $job->category->name }}</option>
                        @foreach($categories as $item)
                        <option value="{{$item->id}}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text transparent" id="inputGroup-sizing-sm">
                            <i class="text-primary fas fa-at"></i>
                        </span>
                    </div>
                    <input id="email" name="email" placeholder="correo electronico del reclutador" type="text"
                        size="100" maxlength="100"
                        class="text-primary form-control @error('email') is-invalid @enderror" email="email"
                        value="{{ $job->email }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @error('email')
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
    <div class="row mt-5 justify-content-center">
        @if (Route::has('password.request'))
        <a class="m-t-5 btn btn-link text-light" href="{{ route('password.request') }}">
            {{ __('¿Olvidé la contraseña?') }}
        </a>
        <a class="btn btn-link text-light" href="{{ route('register') }}">
            {{ __('Crear cuenta') }}
        </a>
        @endif
    </div>
</div>
@endsection