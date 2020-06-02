@extends('layouts.user')

@section('content')
<div class="container-fluid">
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

        <div class="card-deck">
            <div class="card">
                <img src="{{asset('img/tecun/preview2.png')}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title" style="color:orange">Vehículo de concepto autónomo</h5>
                    <p class="card-text">
                        En Case estamos repensando la productividad. El Vehículo Conceptual Autónomo Case IH tiene el
                        potencial de revolucionar la agricultura
                        <a href="{{url('news/1')}}" class="">
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
                            25-04-2020
                        </span>
                    </span>
                    <span> </span>
                    <span class="text-muted">

                        <span class="text-primary">
                            <i class="fas fa-comment"></i>
                            Comentarios
                        </span>
                    </span>
                </div>
            </div>
            <div class="card">
                <img src="{{asset('img/tecun/preview3.png')}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title" style="color:orange">50 años investigando accidentes para mejorar la
                        seguridad vial</h5>
                    <p class="card-text">Este año se cumple el 50º aniversario desde que el Equipo de Investigación de
                        Accidentes de Volvo Trucks comenzó a recopilar y analizar .
                        <a href="{{url('news/1')}}" class="">
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
                            25-04-2020
                        </span>
                    </span>
                    <span> </span>
                    <span class="text-muted">

                        <span class="text-primary">
                            <i class="fas fa-comment"></i>
                            Comentarios
                        </span>
                    </span>
                </div>
            </div>
            <div class="card">
                <img src="{{asset('img/tecun/preview4.png')}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title" style="color:orange">Solución de manipulación de materiales para puertos</h5>
                    <p class="card-text">Mantsinen saca al mercado una nueva máquina de manipulación de materiales:
                        Mantsinen 140. Se trata de la primera máquina de pórtico de este tamaño con ruedas giratorias
                        <a href="{{url('news/1')}}" class="">
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
                            25-04-2020
                        </span>
                    </span>
                    <span> </span>
                    <span class="text-muted">

                        <span class="text-primary">
                            <i class="fas fa-comment"></i>
                            Comentarios
                        </span>
                    </span>
                </div>
            </div>
        </div>
        <div class="card-deck">
            <div class="card">
                <img src="{{asset('img/tecun/preview2.png')}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title" style="color:orange">Vehículo de concepto autónomo</h5>
                    <p class="card-text">
                        En Case estamos repensando la productividad. El Vehículo Conceptual Autónomo Case IH tiene el
                        potencial de revolucionar la agricultura
                        <a href="{{url('news/1')}}" class="">
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
                            25-04-2020
                        </span>
                    </span>
                    <span> </span>
                    <span class="text-muted">

                        <span class="text-primary">
                            <i class="fas fa-comment"></i>
                            Comentarios
                        </span>
                    </span>
                </div>
            </div>
            <div class="card">
                <img src="{{asset('img/tecun/preview3.png')}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title" style="color:orange">50 años investigando accidentes para mejorar la
                        seguridad vial</h5>
                    <p class="card-text">Este año se cumple el 50º aniversario desde que el Equipo de Investigación de
                        Accidentes de Volvo Trucks comenzó a recopilar y analizar.
                        <a href="{{url('news/1')}}" class="">
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
                            25-04-2020
                        </span>
                    </span>
                    <span> </span>
                    <span class="text-muted">

                        <span class="text-primary">
                            <i class="fas fa-comment"></i>
                            Comentarios
                        </span>
                    </span>
                </div>
            </div>
            <div class="card">
                <img src="{{asset('img/tecun/preview4.png')}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title" style="color:orange">Solución de manipulación de materiales para puertos</h5>
                    <p class="card-text">Mantsinen saca al mercado una nueva máquina de manipulación de materiales:
                        Mantsinen 140. Se trata de la primera máquina de pórtico de este tamaño con ruedas giratorias
                        <a href="{{url('news/1')}}" class="">
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
                            25-04-2020
                        </span>
                    </span>
                    <span> </span>
                    <span class="text-muted">

                        <span class="text-primary">
                            <i class="fas fa-comment"></i>
                            Comentarios
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection