@extends('layouts.user')
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 ml-2" >
                <div class="crumbs-inner">
                    <h2>{{ $job->title }}</h2>
                    <ul>
                    <li><a href="index.html">{{ url('jobs') }}</a></li>
                    <li><span>{{ $job->title }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- crumbs area end -->
<!-- blog post area start -->
<div class="blog-details ptb--320 pb-4">
    <div class="container">
        <div class="row">
            <!-- blog details area start -->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="blog-info">
                    <div class="blog-thumbnail">
                        <img src="{{asset('appson/assets/img/blog/blog-thumb3.jpg')}}" alt="blog thumbnail">
                    </div>
                <h2 class="blog-title"><a href="blog-details.html">{{ $job->title }}</a></h2>
                    <div class="blog-meta">
                        <ul>
                            <li><i class="fa fa-calendar"></i>12 Feb 2017</li>
                        </ul>
                    </div>
                    <div class="blog-summery">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit.
                            <br>
                            <br>Lorem ipsum dolor sit amet, consectetuer adipiscing elit sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                    </div>
                </div>
                <!-- comment area start -->
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