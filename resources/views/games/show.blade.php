@extends('layouts.user')

@section('content')
    <div class="">
        <div class="mt-1 mb-3 justify-content-center">
            <div class="no-gutters">
                <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 ">
                    <div class="card bg-theme-1 justify-content-center">
                        {{-- <div class="card-header bg-transparent ">Header</div>
                        --}}
                        <div class="card-body ">
                            <a href="{{ url('/trip') }}" class="nav-link text-center">
                            <span class="text-light">{{ $question->description }}</span>
                                <div class=" text-light">
                                    <span class="text-light"> </span>
                                </div>
                            </a>
                            <a href="{{ url('trip') }}">
                                <img src="{{ asset('img/not-found.png') }}" class="rounded-circle mx-auto d-block"
                                    width="35%" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2 col-12 col-md-6 offset-md-3 ml-0 mr-0" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-lg btn-block btn-outline-info  justify-content-center d-flex"
                    href="{{ url('question') }}">
                    <i class="fas fa-coins mr-3  d-none"></i>
                    <span class="mr-3  justify-content-center">{{ $question->questionTrue }}</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                    </span>
                </a>

                <a type="button" class="btn btn-lg btn-block btn-outline-primary  justify-content-center d-flex"
                    href="{{ url('question') }}">
                    <i class="fas fa-coins mr-3  d-none "></i>
                    <span class="mr-3  justify-content-center">{{ $question->questionFalse1 }}</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                    </span>
                </a>

                <a type="button" class="btn btn-lg btn-block btn-outline-primary bg-theme-3# justify-content-center d-flex"
                    href="{{ url('question') }}">
                    <i class="fas fa-coins mr-3  d-none "></i>
                    <span class="mr-3  justify-content-center">{{ $question->questionFalse2 }}</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                    </span>
                </a>
                <a type="button" class="btn btn-lg btn-block btn-outline-primary bg-theme-3# justify-content-center d-flex"
                    href="{{ url('question') }}">
                    <i class="fas fa-coins mr-3  d-none "></i>
                    <span class="mr-3  justify-content-center">{{ $question->questionFalse2 }}</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                    </span>
                </a>

                <a type="button" class="btn btn-lg btn-block btn-outline-primary bg-theme-3# justify-content-center d-flex"
                    href="{{ url('question') }}">
                    <i class="fas fa-coins mr-3  d-none "></i>
                    <span class="mr-3  justify-content-center">{{ $question->questionFalse3 }}</span>
                    <span class="d-none badge  badge-secondary text-light  justify-content-end">{{ Auth::user()->id }}
                    </span>
                </a>
            </div>
        </div>
    </div>
@endsection
