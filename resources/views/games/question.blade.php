@extends('layouts.user')

@section('content')
    <div id="alerta" class="text-center"></div>
    <div class="">
        <div class="bg-theme-1 d-lg-none d-sm-inline"
            style="border-bottom-left-radius: 50px; border-bottom-right-radius: 50px">
            <div class="bg-theme-1 row justify-content-around d-lg-none d-sm-inline">
                <img src="{{ asset('img/app/bsolicitudes.png') }}" class="d-lg-none d-sm-inline img-fluid"
                    style="max-height: 100%; margin-top: 3%">
            </div>
        </div>
        <div class="mt-1 mb-3 justify-content-center">
            @foreach ($questionRandom as $item)
                <div class="no-gutters">
                    <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4">
                        <div class="card bg-theme-2 justify-content-center">
                            <div class="card-body ">
                                <span class="text-center text-light">{{ $item->description }}</span>
                                <div class=" text-center">
                                    <span class="text-center"> </span>
                                </div>
                                <img src="{{ asset('/storage/questions/' . $item->url_image) }}"
                                    class="rounded-circle mx-auto d-block" width="35%" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ url('storeUser') }}">
                    @csrf
                    <input type="hidden" name="questionID" value="{{ $item->id }}">
                    <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">

                        <input type="hidden" name="answerID" value="{{ $ansRand1->id }}">
                        <input type="hidden" name="flag" value="{{ $ansRand1->flag }}">
                        <input type="button"
                            onclick="return sendRequestShowAlert('{{ $ansRand1->id }}','{{ $ansRand1->flag }}','{{ $ansRand1->reply }}');"
                            class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                            name="question" value="{{ $ansRand1->reply }}">
                    </div>
                </form>

                <form method="POST" action="{{ url('storeUser') }}">
                    @csrf
                    <input type="hidden" name="questionID" value="{{ $item->id }}">
                    <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">
                        <input type="hidden" name="answerID" value="{{ $ansRand2->id }}">
                        <input type="hidden" name="flag" value="{{ $ansRand2->flag }}">
                        <input type="button"
                            onclick="return sendRequestShowAlert('{{ $ansRand2->id }}','{{ $ansRand2->flag }}','{{ $ansRand2->reply }}');"
                            class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                            name="question" value="{{ $ansRand2->reply }}">
                    </div>
                </form>

                @if (isset($ansOthers[0]))
                    <form method="POST" action="{{ url('storeUser') }}">
                        @csrf

                        <input type="hidden" name="questionID" value="{{ $item->id }}">
                        <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">
                            <input type="hidden" name="answerID" value="{{ $ansOthers[0]->id }}">
                            <input type="hidden" name="flag" value="{{ $ansOthers[0]->flag }}">
                            <input type="button"
                                onclick="return sendRequestShowAlert('{{ $ansOthers[0]->id }}','{{ $ansOthers[0]->flag }}','{{ $ansOthers[0]->reply }}');"
                                class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                                name="question" value="{{ $ansOthers[0]->reply }}">
                        </div>
                    </form>
                @endif

                @if (isset($ansOthers[1]))
                    <form method="POST" action="{{ url('storeUser') }}">
                        @csrf
                        <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">
                            <input type="hidden" name="answerID" value="{{ $ansOthers[1]->id }}">
                            <input type="hidden" name="flag" value="{{ $ansOthers[1]->flag }}">
                            <input type="button"
                                onclick="return sendRequestShowAlert('{{ $ansOthers[1]->id }}','{{ $ansOthers[1]->flag }}','{{ $ansOthers[1]->reply }}');"
                                class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                                name="question" value="{{ $ansOthers[1]->reply }}">
                        </div>
                    </form>
                @endif

                @if (isset($ansOthers[2]))
                    <form method="POST" action="{{ url('storeUser') }}">
                        @csrf

                        <input type="hidden" name="questionID" value="{{ $item->id }}">
                        <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">

                            <input type="hidden" name="answerID" value="{{ $ansOthers[2]->id }}">
                            <input type="hidden" name="flag" value="{{ $ansOthers[2]->flag }}">
                            <input type="button" onclick="return sendRequestShowAlert(1,2,1,5);"
                                class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                                name="question" value="{{ $ansOthers[2]->reply }}">
                        </div>
                    </form>
                @endif

                @if (isset($ansOthers[3]))
                    <form method="POST" action="{{ url('storeUser') }}">
                        @csrf
                        <div class="col-12 col-md-6 offset-md-3 pl-0 pr-0 mt-4" role="group" aria-label="Basic example">
                            <input type="hidden" name="answerID" value="{{ $ansOthers[3]->id }}">
                            <input type="hidden" name="flag" value="{{ $ansOthers[3]->flag }}">
                            <input type="button"
                                onclick="return sendRequestShowAlert('{{ $ansOthers[3]->id }}','{{ $ansOthers[3]->flag }}','{{ $ansOthers[3]->reply }}');"
                                class="btn btn-lg btn-block btn-outline-primary  justify-content-center d0-flex mb-3"
                                name="question" value="{{ $ansOthers[3]->reply }}">
                        </div>
                    </form>
                @endif
            @endforeach
        </div>
    @endsection
    @section('js')
        <script type="text/javascript">
            async function sendRequestShowAlert(answId, flag, reply) {
                let colorAlert = '';
                let textShow = '';
                try {
                    let dataForm = '_method=' + encodeURIComponent('POST');
                    dataForm = '_token=' + encodeURIComponent('{{ csrf_token() }}');
                    dataForm += '&answerID=' + encodeURIComponent(answId);
                    dataForm += '&flag=' + encodeURIComponent(flag);
                    console.log('token: ', );

                    const response = await fetch('{{ url('storeUser') }}', {
                        method: 'POST',
                        headers: {
                            Accept: 'application/json',
                            'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8',
                        },
                        body: dataForm
                    });
                    const data = await response.json();
                    console.log('url: ');
                    console.log('data api: ', data);
                } catch (error) {
                    console.log('error: ', error);
                }
                if (answId == '{{ $correcId->id }}') {
                    colorAlert = 'success';
                    textShow = '¡Respuesta correcta! '
                } else {
                    colorAlert = 'danger'
                    textShow = 'Error, la respesta es: '
                }
                document.getElementById("alerta").innerHTML = `<div class="alert alert-${colorAlert} alert-dismissible fade show" role="alert">
                          <strong>${textShow}</strong> {{ $correcId->reply }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>`;
                setTimeout(function() {
                    location.reload();
                }, 2500);

                return 0;
            }

            function test() {
                console.log("funcion de prueba");
                return 0;
            }

        </script>
    @endsection
