@extends('layouts.user')
@section('content')
    <!-- blog post area start -->
    <div class="blog-details mt-2 ptb--320 pb-4">
        <div class="container">
            @if (session('message'))
                <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
                    <span class="badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!-- blog details area start -->
            <div class="blog-info">
                <div class="blog-thumbnail">
                    <div class="card-deck">
                        <div class="card">
                            <div class="mb-3 card-header text-center bg-theme-2" style="border-radius: 15px; color: white">
                                <strong style="text-transform: uppercase;"
                                    class="card-title">{{ $picture->title }}</strong>
                            </div>
                            <div class="blog-thumbnail">
                                <img src="{{ asset('/storage/pictures/' . $picture->featured_image) }}" width="100%"
                                    style="max-height: 500px; border-top-left-radius: 20px; border-bottom-right-radius: 20px">
                            </div>
                            <div class="card-footer justify-content-around d-flex sombra bg-theme-1"
                                style="border-radius: 15px; color: white">
                                <span> <b>{{ $picture->created_at->format('d-m-Y') }}</b> </span>
                                <span class="text-muted">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- comment area start -->
        </div>
    </div>
    <!-- blog post area end -->
@endsection
