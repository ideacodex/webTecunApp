@extends('layouts.admin')

@section('content')
<div class="alert alert-warning alert-dismissible fade show justify-content-around" role="alert">
    <a href="#" class="d-none btn bg-theme-1 text-light btn-sm"
        onClick="$('#tableID').tableExport({type:'json',escape:'false'});">
        <span class=""><i class="fas fa-ellipsis-v"></i></span> JSON</a>
    <a href="#" class="btn bg-theme-1 text-light btn-sm" onClick="$('#tableID').tableExport({type:'excel',escape:'false'});">
        <span class=""><i class="fas fa-file-excel"></i></span> XLS</a>
    <a href="#" class="btn bg-theme-1 text-light btn-sm" onClick="$('#tableID').tableExport({type:'csv',escape:'false'});">
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
        <table class="table" id="tableID">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
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