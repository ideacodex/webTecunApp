@extends('layouts.user')
@section('content')
    <!-- blog post area start -->
    <div class="col-md-9 col-sm-8 col-xs-12 mt-3">
        <div class="container">
            @if (session('message'))
                <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
                    <span class="badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="blog-details mt-2 ptb--320 pb-4 ml-5">
                <div class="container">
                    <div class="row">
                        <!-- blog details area start -->
                        <div class="col-md-9 col-sm-8 col-xs-12 mt-3">
                            <div class="card ml-4">
                                <div class="card-header text-center bg-theme-2" style="border-radius: 15px; color: white">
                                    <strong style="text-transform: uppercase;"
                                        class="card-title">{{ $job->title }}</strong>
                                </div>
                            </div>
                            <div class="container">
                                <div class="card ml-3">
                                    <div class="card-header sombra bg-theme-1" style="border-radius: 15px; color: white">
                                        <strong class="card-title">{{ $job->created_at }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-summery ml-5">
                                <p>{{ $job->description }}</p><br>
                                {{-- <p>@php echo($job->skils) @endphp</p> --}}
                            </div>
                            <div class="card ml-4">
                                <div class="card-header text-center bg-theme-2" style="border-radius: 15px; color: white">
                                    <strong style="text-transform: uppercase;" class="card-title">Requerimientos</strong>
                                </div>
                            </div>
                            <div class="blog-summery ml-5">
                                <p>@php echo($job->skils) @endphp</p>
                            </div>
                        </div>
                        <!-- comment area start -->
                        <!-- leave comment area start -->
                        <div class="card ml-5 col-5">
                            <div class="card-header text-center bg-theme-2" style="border-radius: 15px; color: white">
                                <strong style="text-transform: uppercase;" class="card-title">Aplicar</strong>
                            </div>
                            <a style="border-radius: 10px"
                                href="whatsapp://send?text= http://172.18.0.3:3000/{{ substr(request()->getRequestUri(), 1) }}"
                                data-action="share/whatsapp/share" class="mt-2 btn btn-lg text-light bg-theme-1 mb-3">
                                Copiar enlace Whatsapp
                            </a>
                        </div>

                        <div class="row">
                            @auth
                                <form method="POST" action="{{ url('apply/mail') }}" enctype="multipart/form-data"
                                    onsubmit="return checkSubmit();">
                                    @csrf
                                    <input type="hidden" name="title" id="title" value="{{ $job->title }}">
                                    <input type="hidden" name="name" id="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="lastname" id="lastname"
                                        value="{{ auth()->user()->lastname }}">
                                    <input type="hidden" name="emailCompany" id="emailCompany" value="{{ $job->email }}">
                                    <input type="hidden" name="email" id="email" value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="phone" id="phone" value="{{ auth()->user()->phone }}">
                                    <div class="col-xs-11 col-md-11 mb-4 ml-5">
                                        <input title="Selecionar" type="file" accept="file_extension/*" name="document"
                                            id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                                            class="custom-file-input form-control{{ $errors->has('document') ? ' is-invalid' : '' }}"
                                            value="{{ old('document') }}">
                                        @if ($errors->has('document'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong><i
                                                        class="fas fa-exclamation-triangle"></i>{{ $errors->first('document') }}</strong>
                                            </span>
                                        @endif
                                        <label class="custom-file-label" for="inputGroupFile04">Curriculum.pdf</label>
                                    </div>
                                    <div class="col-xs-12 col-md-12 mb-5 ml-4">
                                        <textarea id="comment" name="comment" placeholder="Mensaje" type="text" size="100"
                                            maxlength="100"
                                            class="text-primary form-control @error('comment') is-invalid @enderror"
                                            comment="comment" value="{{ old('comment') }}" autocomplete="comment"
                                            autofocus></textarea>

                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $comment }}</strong>
                                            </span>
                                        @enderror

                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $comment }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-xs-12 col-md-6 mb-5 ml-4">
                                        <button type="submit" class=" btn bg-theme-1 text-light btn-lg">
                                            {{ __('Enviar') }}
                                        </button>
                                    </div>
                                </form>
                            @endauth
                        </div>

                        <div class="row">
                            @guest
                                <form method="POST" action="{{ url('apply/mail') }}" enctype="multipart/form-data"
                                    onsubmit="return checkSubmit();">
                                    @csrf
                                    <input type="hidden" name="title" id="title" value="{{ $job->title }}">
                                    <input type="hidden" name="emailCompany" id="emailCompany" value="{{ $job->email }}">
                                    <div class="col-xs-12 col-md-12 mb-5 ml-4">
                                        <input id="name" name="name" placeholder="Nombre" type="text" size="100" maxlength="100"
                                            class="text-primary form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-xs-12 col-md-12 mb-5 ml-4">
                                        <input id="lastname" name="lastname" placeholder="Apellido" type="text" size="100"
                                            maxlength="100"
                                            class="text-primary form-control @error('lastname') is-invalid @enderror"
                                            lastname="lastname" value="{{ old('lastname') }}" required
                                            autocomplete="lastname" autofocus>

                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-xs-12 col-md-12 mb-5 ml-4">
                                        <input id="email" placeholder="Correo " type="text" size="100" maxlength="100"
                                            class="text-light form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-xs-12 col-md-12 mb-5 ml-4">
                                        <input id="phone" name="phone" placeholder="N??mero de m??vil" type="text" size="100"
                                            maxlength="100"
                                            class="text-primary form-control @error('phone') is-invalid @enderror" phone="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-xs-11 col-md-11 mb-4 ml-5">
                                        <input title="Selecionar" type="file" accept="file_extension/*" name="document"
                                            id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                                            class="custom-file-input form-control{{ $errors->has('document') ? ' is-invalid' : '' }}"
                                            value="{{ old('document') }}">
                                        @if ($errors->has('document'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong><i
                                                        class="fas fa-exclamation-triangle"></i>{{ $errors->first('pdf') }}</strong>
                                            </span>
                                        @endif
                                        <label class="custom-file-label" for="inputGroupFile04">Curriculum.pdf</label>
                                    </div>

                                    <div class="col-xs-12 col-md-12 mb-5 ml-4">
                                        <textarea id="comment" name="comment" placeholder="Mensaje" type="text" size="100"
                                            maxlength="100"
                                            class="text-primary form-control @error('comment') is-invalid @enderror"
                                            comment="comment" value="{{ old('comment') }}" required autocomplete="comment"
                                            autofocus></textarea>

                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $comment }}</strong>
                                            </span>
                                        @enderror

                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $comment }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="col-xs-12 col-md-6 mb-5 ml-4 justify-content-around">
                                        <button type="submit" class="mb-5 btn bg-theme-1 text-light btn-lg">
                                            {{ __('Enviar') }}
                                        </button>
                                    </div>

                                </form>
                            @endauth
                        </div>
                        <!-- leave comment area end -->
                    </div>
                    <!-- blog details area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- blog post area end -->
@endsection
