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
                <a href=" {{ url('empresas/create') }}" class="btn btn-success btn-sm" style="border-radius: 95px">
                    <i class="fas fa-plus-circle"></i>
                    Agregar
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table " id="tableID">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Departamentos</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->departament }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-sm btn-primary" href="{{ url('empresas/' . $item->id . '/edit') }}"
                                        title="Editar">
                                        <span class=""><i class="fas fa-edit"></i></span>
                                    </a>
                                    <a class="btn btn-sm btn-danger" title="eliminar" onclick="event.preventDefault();
                                                         document.getElementById('formDel{{ $item->id }}').submit();">
                                        <span class="text-light"><i class="fas fa-trash"></i></span>
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
