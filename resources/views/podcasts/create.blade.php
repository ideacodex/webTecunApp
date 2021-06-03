@extends('layouts.admin')

@section('content')
    @if (!$categories->first())
        <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
            <span class="badge badge-pill badge-warning">No hay categorias aun, <a href="{{ url('categories/create') }}">
                    Agregar un nueva categoria</a> </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">NUEVO PODCAST</strong>
            </div>
        </div>
        <div class="mt-4">
            <form method="POST" action="{{ url('adminPodcast') }}" enctype="multipart/form-data"
                onsubmit="return checkSubmit();">
                @csrf
                <div class="form-row">
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text transparent border-top-0 border-right-0 bg-input"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-heading"></i>
                            </span>
                        </div>
                        <input id="title" name="title" placeholder="Agregar titulo" type="text" size="100" maxlength="100"
                            class="text-dark border-top-0 border-left-0 bg-input form-control @error('title') is-invalid @enderror"
                            title="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text transparent border-top-0 border-right-0 bg-input"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-align-left"></i>
                            </span>
                        </div>
                        <input id="description" placeholder="Descripcion o texto corto" type="text" size="250"
                            maxlength="250"
                            class="text-dark border-top-0 border-left-0 bg-input form-control @error('description') is-invalid @enderror"
                            name="description" value="{{ old('description') }}" required autocomplete="description"
                            autofocus>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text transparent border-top-0 border-right-0 bg-input"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fab fa-youtube"></i>
                            </span>
                        </div>
                        <input id="video" placeholder="Codigo Youtube" type="text" size="250" title="Ejemplo: VYOjWnS4cMY"
                            maxlength="250"
                            class="text-dark border-top-0 border-left-0 bg-input form-control @error('video') is-invalid @enderror"
                            name="video" value="{{ old('video') }}" autocomplete="video" autofocus>

                        @error('video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text transparent border-top-0 border-right-0 bg-input"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fab fa-spotify"></i>
                            </span>
                        </div>
                        <input id="spotify" placeholder="Codigo Spotify" type="text" size="250"
                            title="Ejemplo: 2KEjuwECqFvmneRncRwrO6" maxlength="250"
                            class="text-dark border-top-0 border-left-0 bg-input form-control @error('spotify') is-invalid @enderror"
                            name="spotify" value="{{ old('spotify') }}" autocomplete="spotify" autofocus>

                        @error('spotify')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('spotify')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text transparent border-top-0 border-right-0 bg-input"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-file-pdf"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                            <input title="Selecionar" type="file" accept="file_extension/*" name="pdf" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04"
                                class="custom-file-input form-control{{ $errors->has('pdf') ? ' is-invalid' : '' }}"
                                value="{{ old('pdf') }}">
                            @if ($errors->has('pdf'))
                                <span class="invalid-feedback" role="alert">
                                    <strong><i
                                            class="fas fa-exclamation-triangle"></i>{{ $errors->first('pdf') }}</strong>
                                </span>
                            @endif
                            <label class="custom-file-label" for="inputGroupFile04">Elegir documento</label>
                        </div>
                    </div>
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text transparent border-top-0 border-right-0 bg-input"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="fas fa-image"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                            <input title="Selecionar" type="file" accept="image/*" name="image" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04"
                                class="custom-file-input form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                value="{{ old('image') }}" required>
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong><i
                                            class="fas fa-exclamation-triangle"></i>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                            <label class="custom-file-label" for="inputGroupFile04">Elegir imagen de portada</label>
                        </div>
                    </div>
                    <div class="col-12 input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text transparent border-top-0 border-right-0 bg-input"
                                id="inputGroup-sizing-sm">
                                <i style="color: #fa5e0a" class="far fa-file-audio"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                            <input title="Selecionar" type="file" accept="audio/*" name="audio" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04"
                                class="custom-file-input form-control{{ $errors->has('audio') ? ' is-invalid' : '' }}"
                                value="{{ old('audio') }}">
                            @if ($errors->has('audio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong><i
                                            class="fas fa-exclamation-triangle"></i>{{ $errors->first('audio') }}</strong>
                                </span>
                            @endif
                            <label class="custom-file-label" for="inputGroupFile04">Elegir audio</label>
                        </div>
                    </div>
                    {{-- selec categorias --}}
                    <div class="col-12 col-md-12 input-group input-group-lg mb-3">
                        <div class="row">
                            <div class="col-12 col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text transparent border-top-0 border-right-0 bg-input"
                                        id="inputGroup-sizing-sm">
                                        <i style="color: #fa5e0a" class="far fa-file-audio"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                <select
                                    class="js-example-basic-multiple js-states form-control @error('category_id') is-invalid @enderror"
                                    name="category_id[]" id="category_id" multiple="multiple" required>
                                    <option disabled>Categorias</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                    </div>
                    <div class="col-12">
                        <textarea id="summernote" name="editordata"></textarea>
                    </div>
                    {{-- ifrmae extra --}}
                    <div class="col-12 col-md-8 input-group input-group-lg mb-3">
                        <div class="form-group ">
                            <label> textarea</label>
                            <textarea class="form-control" name="iframe" id="iframe"
                                style="border-radius:25px ;color:rgb(0, 0, 0);font-size:20px; " onChange="Verificacion();"
                                cols="50" rows="3"></textarea>
                        </div>
                    </div>

                    <script>
                        // var xd = document.getElementById('iframe').value;
                        // console.log(
                        //     xd
                        // );

                        // var miCadena = "Hola Mundo. Cómo estás hoy? width ='100' height=== Hola src Mundo. Cómo estás hoy?";
                        // var PalabraUno = miCadena.search("width ='100' ", 2);
                        // var PalabraDos = miCadena.search("src ", 2);
                        // console.log(PalabraUno);
                        // console.log(PalabraDos);

                        function Verificacion() {
                            //trae la cadena del textArea por medio del ID del elemento
                            var miCadenaa = document.getElementById('iframe').value;
                            // busca informacion designada
                            // var PalabraUnoa = miCadenaa.search('width=\"620\"', 2);
                            // var PalabraDosa = miCadenaa.search('src', 2);
                            // console.log(PalabraUnoa);
                            // console.log(PalabraDosa);
                            //remplaza la informacion del width
                            // lectura de caracteres la diagonal inversa \"
                            // remplaza solo el with
                            const remplazaWidthIframe = miCadenaa.replace('width=\"', 'width=\"100%\" \"');
                            // remplaza solo el height
                            // const remplazaHeightIframe = miCadenaa.replace('height=\"', 'height=\"100%\" \"');
                            // console.log(remplazaWidthIframe);
                            // console.log(remplazaHeightIframe);
                            // remplaza el height ya con el width remplazdo
                            const PRUEBAremplazaHeightIframe = remplazaWidthIframe.replace('height=\"',
                                'height=\"100%\" \"');
                            console.log(PRUEBAremplazaHeightIframe);
                            document.getElementById('iframe').value = PRUEBAremplazaHeightIframe;

                        }
                       

                    </script>
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg bg-theme-1 text-light" style="border-radius: 10px">
                                    <i class="fas fa-save"></i>
                                    {{ __('GUARDAR PODCAST') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.js-example-basic-multiple').select2();

    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Agrega aquí el contenido',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
            ]
        });

    </script>

@endsection
