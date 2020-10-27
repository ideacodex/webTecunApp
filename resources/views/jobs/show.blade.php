@extends('layouts.user')
@section('content')
    <!-- blog post area start -->
    <div class="col-md-9 col-sm-8 col-xs-12 mt-3">
        <div class="container">
            <div class="row">
                <!-- blog details area start -->
                <div class="col-md-9 col-sm-8 col-xs-12 mt-3">
                    <div class="blog-info">
                        <h1 class="display-3">{{ $job->title }}
                            <h1>
                    </div>
                    <div class="container">
                        <small class="fa fa-calendar small">{{ $job->created_at }}</small>
                    </div>
                    <div class="blog-summery">
                        <p>@php echo($job->skils) @endphp</p>
                    </div>
                </div>
                <!-- comment area start -->
                <!-- leave comment area start -->
                <div class="leave-comment ">
                    <div class="comment-title col-xs-12 col-md-6 ml-2">
                        <h4>Aplicar</h4>
                    </div>
                    <div class="row">
                        @auth
                            <form method="POST" action="{{ url('apply/mail') }}" enctype="multipart/form-data"
                                onsubmit="return checkSubmit();">
                                @csrf
                                <input type="hidden" name="user" id="user" value="{{ auth()->user()->name }}">
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
                                        maxlength="100" class="text-primary form-control @error('comment') is-invalid @enderror"
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
                                <div class="col-xs-12 col-md-6 mb-5 ml-4">
                                    <button type="submit" class=" btn btn-success btn-lg">
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
                                <div class="col-xs-12 col-md-12 mb-5 ml-4">
                                    <input id="name" name="name" placeholder="Nombre completo" type="text" size="100"
                                        maxlength="100" class="text-primary form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <input id="phone" name="phone" placeholder="Número de móvil" type="text" size="100"
                                        maxlength="100" class="text-primary form-control @error('phone') is-invalid @enderror"
                                        phone="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

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
                                    <textarea id="message" name="message" placeholder="Mensaje" type="text" size="100"
                                        maxlength="100" class="text-primary form-control @error('message') is-invalid @enderror"
                                        message="message" value="{{ old('message') }}" required autocomplete="message"
                                        autofocus></textarea>

                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-xs-12 col-md-6 mb-5 ml-4 justify-content-around">
                                    <button type="submit" class="mb-5 btn btn-success btn-lg">
                                        {{ __('Enviar') }}
                                    </button>
                                </div>

                            </form>
                        @endauth
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
