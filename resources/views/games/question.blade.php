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
                    <input type="hidden" name="item" value="1">
                    <input type="hidden" name="questionID" value="{{ $item->id }}">
                    <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">

                        <input type="hidden" name="answerID" value="{{ $ansRand1->id }}">
                        <input type="hidden" name="flag" value="{{ $ansRand1->flag }}">
                        <input type="submit"
                            class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                            name="question" value="{{ $ansRand1->reply }}">
                    </div>
                </form>

                <form method="POST" action="{{ url('storeUser') }}" onsubmit="return checkSubmit();">
                    @csrf
                    <input type="hidden" name="item" value="1">
                    <input type="hidden" name="questionID" value="{{ $item->id }}">
                    <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">

                        <input type="hidden" name="answerID" value="{{ $ansRand2->id }}">
                        <input type="hidden" name="flag" value="{{ $ansRand2->flag }}">
                        <input type="submit"
                            class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                            name="question" value="{{ $ansRand2->reply }}">
                    </div>
                </form>

                @if (isset($ansOthers[0]))
                    <form method="POST" action="{{ url('storeUser') }}" onsubmit="return checkSubmit();">
                        @csrf
                        <input type="hidden" name="item" value="1">
                        <input type="hidden" name="questionID" value="{{ $item->id }}">
                        <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">

                            <input type="hidden" name="answerID" value="{{ $ansOthers[0]->id }}">
                            <input type="hidden" name="flag" value="{{ $ansOthers[0]->flag }}">
                            <input type="submit"
                                class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                                name="question" value="{{ $ansOthers[0]->reply }}">
                        </div>
                    </form>
                @endif

                @if (isset($ansOthers[1]))
                    <form method="POST" action="{{ url('storeUser') }}" onsubmit="return checkSubmit();">
                        @csrf
                        <input type="hidden" name="item" value="1">
                        <input type="hidden" name="questionID" value="{{ $item->id }}">
                        <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">

                            <input type="hidden" name="answerID" value="{{ $ansOthers[1]->id }}">
                            <input type="hidden" name="flag" value="{{ $ansOthers[1]->flag }}">
                            <input type="submit"
                                class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                                name="question" value="{{ $ansOthers[1]->reply }}">
                        </div>
                    </form>
                @endif

                @if (isset($ansOthers[2]))
                    <form method="POST" action="{{ url('storeUser') }}" onsubmit="return checkSubmit();">
                        @csrf
                        <input type="hidden" name="item" value="1">
                        <input type="hidden" name="questionID" value="{{ $item->id }}">
                        <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">

                            <input type="hidden" name="answerID" value="{{ $ansOthers[2]->id }}">
                            <input type="hidden" name="flag" value="{{ $ansOthers[2]->flag }}">
                            <input type="submit"
                                class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                                name="question" value="{{ $ansOthers[2]->reply }}">
                        </div>
                    </form>
                @endif

                @if (isset($ansOthers[3]))
                    <form method="POST" action="{{ url('storeUser') }}" onsubmit="return checkSubmit();">
                        @csrf
                        <input type="hidden" name="item" value="1">
                        <input type="hidden" name="questionID" value="{{ $item->id }}">
                        <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">

                            <input type="hidden" name="answerID" value="{{ $ansOthers[3]->id }}">
                            <input type="hidden" name="flag" value="{{ $ansOthers[3]->flag }}">
                            <input type="submit"
                                class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                                name="question" value="{{ $ansOthers[3]->reply }}">
                        </div>
                    </form>
                @endif
            @endforeach
        </div>
    </div>
@endsection
