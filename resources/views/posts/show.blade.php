@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    @if (session('message'))
    <div class="sufee-alert alert with-close alert-{{ session('alert') }} alert-dismissible fade show">
        <span class="badge badge-pill badge-{{ session('alert') }}">{{ session('message') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @foreach ($posts as $item)
    <div class="mt-5">
        @php
        echo($item->content) ;   
        @endphp
    </div>
    <div class="mt-2">
        {!! $item->trixRender("content") !!}
    </div>
    @endforeach




</div>
@endsection
@section('js')
<!-- Menu Toggle Script -->
<script>
    $(document).ready(function() {
        $('#tableID').DataTable();
    } );
</script>
@endsection