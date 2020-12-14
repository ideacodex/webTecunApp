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
                            <div class="blog-thumbnail">
                                <img src="{{ asset('/storage/pictures/' . $picture->featured_image) }}" width="100%"
                                    style="max-height: 500px">
                            </div>
                            <div class="card-body">
                                <p class="card-text" style="color:orange">{{ $picture->title }}</p>
                            </div>
                            <div class="card-footer justify-content-around d-flex">
                                <span> {{ $picture->created_at->format('d-m-Y') }} </span>
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
