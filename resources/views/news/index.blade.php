@extends('layouts.user')

@section('content')
<div class="container-fluid mb-5">
    <div class="row justify-content-center">
        <div class="mb-n1 text-center col-12 bg-primary  alert alert-warning alert-dismissible fade show" role="alert">
            <a href="{{url('podcast')}}"">
                <span class=" text-light">
                Nuevos Episodios.
                <strong>¡TECUN Podcast!
                    <span class=" text-light justify-content-end">
                        <i class="fas fa-podcast ml-2  justify-content-start text-light"></i>
                    </span>
                </strong>
                </span>
            </a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-light">&times;</span>
            </button>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Filtrar</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Selecione una categoría...</option>
                <option value="1">TECUN Automotores</option>
                <option value="2">TECUN Comercial</option>
                <option value="3">Salud y Seguridad</option>
            </select>
        </div>

        <div class="row">
            @foreach ($posts as $item)
            <div class="card col-12 col-md-4">
                <img src="{{asset('/storage/posts/' . $item->featured_image)}}" class="card-img-top"
                    onerror=this.src="{{asset('img/tecun/preview2.png')}}">
                <div class="card-body">
                    <h5 class="card-title" style="color:orange">{{$item->title}}</h5>
                    <p class="card-text">
                        {{$item->description}}
                        <a href="{{url('newsRead/' . $item->id)}}" class="">
                            <span class="text-primary">
                                Leer más
                                <i class="fas fa-book-reader"></i>
                            </span>
                        </a>
                    </p>
                </div>
                <div class="card-footer justify-content-around d-flex">
                    <span class="text-muted justify-content-end">
                        <span class="text-primary">
                            <i class="fas fa-calendar"></i>
                            {{$item->created_at->format('d-m-Y')}}
                        </span>
                    </span>
                    <span> </span>
                    <a href="{{url('newsRead/' . $item->id)}}">
                        <span class="text-muted">
                            <span class="text-primary">
                                <i class="fas fa-comment"></i>
                                Comentarios
                            </span>
                            <span class="badge bage-pill badge-primary">
                                {{$item->comments()}}
                            </span>
                        </span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection