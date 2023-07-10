@extends('adminlte::page')

@section('title', 'Maestros | Admin')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista de Maestros</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Maestros</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header"><h5 class="card-title">Informacion de Maestros</h5></div>
            <div class="card-text">
                <h5 class="card-title">Informacion de Maestros</h5>
            </div>
            <table id="tablaMaster" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre de alumno</th>
                        <th>Calificacion</th>
                        <th>Mensajes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>q</td>
                        <td>alumno</td>
                        <td>10</td>
                        <td>
                            <button class="btn">
                                <i class="bi bi-chat-square-dots h4"></i>
                                <span style="vertical-align:top;"
                                    class="badge badge-warning"></span>
                            </button>
                            <span class="badge badge-info">No hay mensajes</span>
                        </td>
                        <td class="text-center">
                            <i class="bi bi-clipboard2-plus h4"></i></a>
                            <a href="#" class="mx-2"><i class="bi bi-send-plus h4"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>    $("#tablaMaster").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        "buttons": ["copy", "excel", "pdf", "colvis"]
    }).buttons().container().appendTo('#tablaMaster_wrapper .col-md-6:eq(0)');
    const msgBox = document.getElementById("msgInfo");</script>
@stop

