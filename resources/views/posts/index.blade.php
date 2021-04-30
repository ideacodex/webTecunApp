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
        <div class="d-flex bd-highlight mb-3">
            {{-- <div class="p-2 bd-highlight">Noticias</div> --}}
            <div class="p-2 bd-highlight">
                <a href=" {{ url('adminPost/create') }}" class="btn btn-success btn-sm">
                    + AGREGAR NOTICIA
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">NOTICIAS PUBLICADAS</strong>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table " id="tableID">
                <thead class="bg-orange text-light text-center">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">TITULO</th>
                        <th scope="col">AUTOR</th>
                        <th scope="col">CATEGORÍAS</th>
                        <th scope="col">DESCRIPCIÓN</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">TIPO</th>
                        <th scope="col">OPCIONES</th>
                    </tr>
                </thead>
                <tbody class="bg-theme-3">
                    @foreach ($posts as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user_id }}</td>
                            <td>@php echo($item->description) @endphp</td>
                            <td><span class="badge badge-{{ $item->status->color }}"> <i
                                        class="{{ $item->status->icon }}"></i>
                                    {{ $item->status->name }}</span></td>
                            <td>{{ $item->type() }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-sm btn-primary rounded-circle"
                                        href="{{ url('adminPost/' . $item->id . '/edit') }}" title="Editar">
                                        <span class=""><i class="fas fa-edit"></i></span>
                                    </a>
                                    <a class="btn btn-sm rounded-circle" style="background-color: rgb(2, 85, 16)"
                                        href="{{ url('adminPost/' . $item->id) }}" title="Ver Detalles">
                                        <span class=""><i class="fas fa-eye text-light"></i></span>
                                    </a>
                                    <a class="btn btn-sm btn-danger rounded-circle" title="eliminar"
                                        onclick="event.preventDefault();
                                                                 document.getElementById('formDel{{ $item->id }}').submit();">
                                        <span class="text-light"><i class="fas fa-trash-alt"></i></span>
                                    </a>
                                    <form id="formDel{{ $item->id }}" action="{{ url('adminPost/' . $item->id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <!-- Menu Toggle Script -->
    <script>
        $(document).ready(function() {
            $('#tableID').DataTable();
        });

    </script>
@endsection
