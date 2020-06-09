@extends('layouts.admin')

@section('content')
<div class="alert alert-warning alert-dismissible fade show justify-content-around" role="alert">
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
        onClick="$('#tableID').tableExport({type:'pdf',escape:'false', htmlContent:'true'});"> <span class=""><i
                class="fas fa-file-pdf"></i></span> PDF</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="container-fluid">
    <div>
        <table class="table table-responsive" id="tableID">
            <thead class="thead-dark bg-theme-2">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">correo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Puntos</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->lastname}}</td>
                    <td><a href="mailto:{{$item->email}}" target="blank">{{$item->email}}</a></td>
                    <td>{{$item->phone}}</td>
                    <td><span class="badge badge-{{$item->status->color}}"> <i class="{{$item->status->icon}}"></i>
                            {{$item->status->name}}</span></td>
                    <td>{{$item->score->points}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{url('users/'. $item->id)}}" title="Ver Detalles">
                            <span class=""><i class="fas fa-eye"></i></span>
                        </a>
                        <a class="btn btn-sm btn-primary" href="{{url('users/'. $item->id . '/edit')}}" title="Editar">
                            <span class=""><i class="fas fa-cog"></i></span>
                        </a>
                        <a class="btn btn-sm btn-danger" href="{{url('users/'. $item->id)}}" title="eliminar">
                            <span class=""><i class="fas fa-trash"></i></span>
                        </a>
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