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
            <div class="p-2 bd-highlight d-none">Personal para Vacaciones</div>
            <div class="p-2 bd-highlight">
                <a href=" {{ url('empresas/create') }}" class="btn btn-success btn-sm">
                    + AGREGAR VACACIONES
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-theme-1" style="border-radius: 15px; color: white">
                <strong class="card-title">EMPRESAS REGISTRADAS</strong>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table " id="tableID">
                <thead class="bg-orange text-light text-center">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">EMPRESA</th>
                        <th scope="col">DEPARTAMENTO</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">OPCIONES</th>
                    </tr>
                </thead>
                <tbody class="bg-input">
                    @foreach ($empresas as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->departament }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn rounded-circle btn-sm btn-primary"
                                        href="{{ url('empresas/' . $item->id . '/edit') }}" title="Editar">
                                        <span class=""><i class="fas fa-edit"></i></span>
                                    </a>
                                    <a class="btn rounded-circle btn-sm btn-danger" title="eliminar"
                                        onclick="event.preventDefault();
                                                                         document.getElementById('formDel{{ $item->id }}').submit();">
                                        <span class="text-light"><i class="fas fa-trash-alt"></i></span>
                                    </a>
                                    <form id="formDel{{ $item->id }}" action="{{ url('empresas/' . $item->id) }}"
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
