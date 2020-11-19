@extends('layouts.user')

@section('content')
    <div class="">
        <div class="mt-1 mb-3 justify-content-center">
            @foreach ($questionRandom as $item)
                <div class="no-gutters">
                    <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4">
                        <div class="card bg-theme-1 justify-content-center">
                            <div class="card-body ">
                                <a href="{{ url('/trip') }}" class="nav-link text-center">
                                    <span class="text-center">{{ $item->description }}</span>
                                    <div class=" text-center">
                                        <span class="text-center"> </span>
                                    </div>
                                </a>
                                <a href="{{ url('trip') }}">
                                    <img src="{{ asset('/storage/questions/' . $item->url_image) }}"
                                        class="rounded-circle mx-auto d-block" width="35%" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ url('storeUser') }}" onsubmit="return checkSubmit();">
                    @csrf
                    <input type="hidden" name="item" value="1" >
                    <input type="hidden" name="questionID" value="{{ $item->id }}" >
                    <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">
                        <input type="submit" class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                            name="questionTrue"
                            value="{{ $item->questionTrue }}"
                        >

                        <input type="submit" class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                            name="questionFalse1"
                            value="{{ $item->questionFalse1 }} "
                        >

                        <input type="submit" class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                            name="questionFalse2"
                            value="{{ $item->questionFalse2 }}"
                        >

                        <input type="submit" class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                            name="questionFalse3"
                            value="{{ $item->questionFalse3 }}"
                        >
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
