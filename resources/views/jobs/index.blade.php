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
        <div class="p-2 bd-highlight ">Empleos</div>
        <div class="p-2 bd-highlight">
            <a href=" {{url('jobsAdmin/create')}}" class="btn btn-success btn-sm" style="border-radius: 95px">
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
                    <th scope="col">Título</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Salario</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->salary}}</td>
                    <td><a href="mailto:{{$item->email}}" target="blank">{{$item->email}}</a></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-sm btn-secondary" href="{{url('job/' .$item->id )}}"
                                title="Ver Detalles">
                                <span class=""><i class="fas fa-eye"></i></span>
                            </a>
                            <a class="btn btn-sm btn-primary" href="{{url('jobsAdmin/'. $item->id . '/edit')}}"
                                title="Editar">
                                <span class=""><i class="fas fa-edit"></i></span>
                            </a>
                            <a class="btn btn-sm btn-danger"  title="eliminar"
                                onclick="event.preventDefault();
                                                     document.getElementById('formDel{{$item->id}}').submit();">
                                <span class="text-light"><i class="fas fa-trash"></i></span>
                            </a>
                            <form id="formDel{{$item->id}}" action="{{ url('jobsAdmin/'. $item->id) }}" method="POST"
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
    } );
</script>
@endsection