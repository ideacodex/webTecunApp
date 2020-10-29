@extends('layouts.user')
@section('content')
    <!-- blog post area start -->
    <div class="blog-details mt-2 ptb--320 pb-4">
        <div class="container">
            <div class="row">
                <!-- blog details area start -->
                <div class="col-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3">
                    <div class="blog-info">
                        <div class="blog-thumbnail">
                            <img src="{{ asset('/storage/posts/' . $post->featured_image) }}" width="100%"
                                style="max-height: 300px">
                        </div>
                        <h2 class="blog-title"><a href="blog-details.html">{{ $post->title }}</a></h2>
                        <div class="blog-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i>{{ $post->created_at }}</li>
                            </ul>
                        </div>
                        <div class="blog-summery">
                            <p>{{ $post->desciption }}</p>
                            <br>
                            <p>@php echo($post->content) @endphp</p>
                            <br>

                            <video width="100%" style="max-height: 300px" controls loop>
                                <source src="{{ asset('/storage/posts/' . $post->featured_video) }}" type="video/mp4">
                            </video> 

                            <a href="{{ asset('/storage/posts/' . $post->featured_document) }}" download>
                                Descarga el Pdf con las sugerencias para el agronomo
                            </a>

                            <div class="blog-single-tags">
                                <h2>Categorias</h2>
                                <div>
                                    @foreach ($categoryName as $item)
                                         <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- comment area start -->
                    <div class="comment-area pb-5">
                        <div class="comment-title">
                            <h4>Visitor Comments <span>(03)</span></h4>
                        </div>
                        <ul class="comment-list">
                            <li class="comment-info-inner">
                                <article>
                                    <div class="comment-author">
                                        <img src="assets/img/author/author1.jpg" alt="image">
                                        <h2>Luisiana garcias</h2>
                                    </div>
                                    <div class="meta-data">
                                        <p class="category">Category : <span>Apartment</span></p>
                                    </div>
                                    <div class="comment-content">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                            euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                            minim veniam...</p>
                                    </div>
                                    <div class="comment-reply">
                                        <a href="#"><i class="fa fa-reply"></i></a>
                                    </div>
                                </article>
                                <ul class="children">
                                    <li class="comment-info-inner">
                                        <article>
                                            <div class="comment-author">
                                                <img src="assets/img/author/author2.jpg" alt="image">
                                                <h2>Luisiana garcias</h2>
                                            </div>
                                            <div class="meta-data">
                                                <p class="category">Category : <span>Apartment</span></p>
                                            </div>
                                            <div class="comment-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                                    volutpat. Ut wisi enim ad minim veniam...</p>
                                            </div>
                                            <div class="comment-reply">
                                                <a href="#"><i class="fa fa-reply"></i></a>
                                            </div>
                                        </article>
                                    </li>
                                </ul>
                            </li>
                            <li class="comment-info-inner">
                                <article>
                                    <div class="comment-author">
                                        <img src="assets/img/author/author3.jpg" alt="image">
                                        <h2>Luisiana garcias</h2>
                                    </div>
                                    <div class="meta-data">
                                        <p class="category">Category : <span>Apartment</span></p>
                                    </div>
                                    <div class="comment-content">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                            euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                            minim veniam...</p>
                                    </div>
                                    <div class="comment-reply">
                                        <a href="#"><i class="fa fa-reply"></i></a>
                                    </div>
                                </article>
                            </li>
                        </ul>
                    </div>
                    <!-- comment area end -->
                    <!-- leave comment area start -->
                    <div class="leave-comment">
                        <div class="comment-title">
                            <h4>Leave a Comments</h4>
                        </div>
                        <div class="row">
                            <form action="mail.php" id="contact-form">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input placeholder="Nombre" id="name" type="text">
                                    <input placeholder="Email" id="email" type="text">
                                    <!--<input placeholder="Website" id="website" type="text">-->
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="msg" placeholder="Mensaje" rows="2"></textarea>
                                </div>
                                <div class="col-xs-12 col-md-6 mb-5">
                                    <input value="send message" id="comment-submit" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- leave comment area end -->
                </div>
                <!-- blog details area end -->
            </div>
        </div>
    </div>
    <!-- blog post area end -->
@endsection
