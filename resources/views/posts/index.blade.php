@extends('layouts.admin')

@section('content')
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
    <a href="#" onClick="$('#tableID').tableExport({type:'json',escape:'false',tableName:'yourTableName'});">JSON</a>
    <a href="#" onClick="$('#tableID').tableExport({type:'excel',escape:'false',tableName:'yourTableName'});">XLS</a>
    <a href="#" onClick="$('#tableID').tableExport({type:'csv',escape:'false',tableName:'yourTableName'});">CSV</a>
    <a href="#"
        onClick="$('#tableID').tableExport({type:'pdf',escape:'false',tableName:'yourTableName', htmlContent:'true'});">PDF</a>
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