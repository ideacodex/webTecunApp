@extends('layouts.user')
@section('content')
<!-- blog post area start -->
<div class="blog-details ptb--320 pb-4">
    <div class="container">
        <div class="row">
            <!-- blog details area start -->
            <div class="col-md-9 col-sm-8 col-xs-12 mt-3">
                <div class="blog-info">
                    <h1 class="display-3">{{ $job->title }}<h1>
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
                <div class="leave-comment">
                    <div class="comment-title">
                        <h4>Postulate</h4>
                    </div>
                    <div class="row">
                        <form action="mail.php" id="contact-form">
                            <div class="custom-file mb-3 ml-4">
                                <input title="Selecionar" type="file" accept="file_extension/*" name="pdf" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04"
                                    class="custom-file-input form-control{{ $errors->has('pdf') ? ' is-invalid' : '' }}"
                                    value="{{ old('pdf') }}">
                                @if ($errors->has('pdf'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong><i class="fas fa-exclamation-triangle"></i>{{ $errors->first('pdf') }}</strong>
                                    </span>
                                @endif
                                <label class="custom-file-label" for="inputGroupFile04">Cv.pdf</label>
                            </div>
                            <div class="col-md-12 col-sm-3 col-xs-3">
                                <textarea name="msg" placeholder="Mensaje" rows="2"></textarea>
                            </div>
                            <div class="col-xs-12 col-md-6 mb-5">
                                <input value="Enviar" id="comment-submit" type="submit">
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