@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="letest-blog pb--120">
            <div class="container">
                <div class="section-title text-black">
                    <h2>Nuevas Publicaciones</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                </div>
                <div class="row">
                    <div class="blog-list">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="list-item">
                                <div class="blog-thumbnail">
                                    <a href="blog-details.html"><img src="{{asset('img/tecun/preview2.png')}}"
                                            alt="blog thumbnail"></a>
                                </div>
                                <h2 class="blog-title"><a href="blog-details.html">Vehículo de concepto autónomo</a>
                                </h2>
                                <div class="blog-meta">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i>12 Feb 2017</li>
                                        <li><i class="fa fa-comment"></i>Comments</li>
                                    </ul>
                                </div>
                                <div class="blog-summery">
                                    <p>En Case estamos repensando la productividad. El Vehículo Conceptual Autónomo Case
                                        IH tiene el potencial de revolucionar la agricultura.</p>
                                </div>
                                <a href="blog.html" class="read-more">Read More</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="list-item">
                                <div class="blog-thumbnail">
                                    <a href="blog-details.html"><img src="{{asset('img/tecun/preview3.png')}}"
                                            alt="blog thumbnail"></a>
                                </div>
                                <h2 class="blog-title"><a href="blog-details.html">50 años investigando accidentes para
                                        mejorar la seguridad vial</a></h2>
                                <div class="blog-meta">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i>12 Feb 2017</li>
                                        <li><i class="fa fa-comment"></i>Comments</li>
                                    </ul>
                                </div>
                                <div class="blog-summery">
                                    <p>Este año se cumple el 50º aniversario desde que el Equipo de Investigación de
                                        Accidentes de Volvo Trucks comenzó a recopilar y analizar </p>
                                </div>
                                <a href="blog.html" class="read-more">Read More</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="list-item">
                                <div class="blog-thumbnail">
                                    <a href="blog-details.html"><img src="{{asset('img/tecun/preview4.png')}}"
                                            alt="blog thumbnail"></a>
                                </div>
                                <h2 class="blog-title"><a href="blog-details.html">Solución de manipulación de
                                        materiales para puertos</a></h2>
                                <div class="blog-meta">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i>12 Feb 2017</li>
                                        <li><i class="fa fa-comment"></i>Comments</li>
                                    </ul>
                                </div>
                                <div class="blog-summery">
                                    <p>Mantsinen saca al mercado una nueva máquina de manipulación de materiales:
                                        Mantsinen 140. Se trata de la primera máquina</p>
                                </div>
                                <a href="blog.html" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection