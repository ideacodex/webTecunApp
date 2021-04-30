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
            <div class="p-2 bd-highlight">
                <a href=" {{ url('favoriteAdmin/create') }}" class="btn btn-success btn-sm">
                    + AGREGAR NÚMERO FAVORITO
                </a>
            </div>
            <div class="ml-auto p-2 bd-highlight">
                <div class="btn-group ml-3" role="group" aria-label="Basic example">
                    <a href="#" class="d-none btn bg-theme-1 text-light btn-sm"
                        onClick="$('#tableID').tableExport({type:'json',escape:'false'});">
                        <span class=""><i class="fas fa-ellipsis-v"></i></span> JSON</a>
                    <a href="#" class="btn bg-theme-1 text-light btn-sm"
                        onClick="$('#tableID').tableExport({type:'excel',escape:'false'});">
                        <span class=""><i class="fas fa-file-excel"></i></span> XLS</a>
                    <a href="#" class="btn bg-theme-1 text-light btn-sm"
                        onClick="$('#tableID').tableExport({type:'csv',escape:'false'});">
                        <span class=""><i class="fas fa-file-csv"></i></span> CSV</a>
                    <a href="#" class="btn bg-theme-1 text-light btn-sm"
                        onClick="$('#tableID').tableExport({type:'pdf',escape:'false', htmlContent:'true'});"> <span
                            class=""><i class="fas fa-file-pdf"></i></span> PDF</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">NÚMEROS FAVORITOS</strong>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table " id="tableID">
                <thead class="bg-orange text-light text-center">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">DESCRIPCIÓN</th>
                        <th scope="col">PBX</th>
                        <th scope="col">WHATSAPP</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="bg-input">
                    @foreach ($calls as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>

                            @if ($item->phone_one === 'null')
                                <td>Sin PBX</td>
                            @else
                                <td>{{ $item->phone_one }}</td>
                            @endif

                            @if ($item->mobile_one === 'null')
                                <td>Sin Whatsapp</td>
                            @else
                                <td>{{ $item->mobile_one }}</td>
                            @endif
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn rounded-circle btn-sm btn-primary"
                                        href="{{ url('favoriteAdmin/' . $item->id . '/edit') }}" title="Editar">
                                        <span class=""><i class="fas fa-edit"></i></span>
                                    </a>
                                    <a class="btn rounded-circle btn-sm" style="background-color: rgb(2, 85, 16)"
                                        href="{{ url('favoriteAdmin/' . $item->id) }}" title="Ver Detalles">
                                        <span class=""><i class="fas fa-eye text-light"></i></span>
                                    </a>
                                    <a class="btn rounded-circle btn-sm btn-danger" title="eliminar"
                                        onclick="event.preventDefault();
                                                                             document.getElementById('formDel{{ $item->id }}').submit();">
                                        <span class="text-light"><i class="fas fa-trash-alt"></i></span>
                                    </a>
                                    <form id="formDel{{ $item->id }}"
                                        action="{{ url('favoriteAdmin/' . $item->id) }}" method="POST"
                                        style="display: none;">
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
