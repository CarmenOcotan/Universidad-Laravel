@extends('adminlte::page')

@section('title', 'Clases | Admin')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista de Clases</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Clases</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <h5 class="card-title">Informacion de Clases</h5>
                {{-- Modals --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar clase</button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Agregar Clases</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('clases.store') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nombre de la materia</label>
                                        <input type="text" class="form-control" name="nombre" value=" ">
                                    </div>
                                    <label for="exampleInputEmail2" class="form-label">profesores disponibles</label>
                                    <select class="form-select mb-3 " aria-label="Default select example" name="asignacion">
                                        <option selected>sin asignar</option>
                                        @foreach ($classses as $classs)

                                            {{$classs}}
                                            @foreach ($maestros as $maestro)

                                                @if ($maestro->id == $classs->maestro_id)
                                                    <option value="{{ $maestro->id }}">{{ $maestro->firs_name }}</option>
                                                @else
                                                    
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Agregar Cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-text">
                <table id="clases" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Clase</th>
                            <th>Maestro</th>
                            <th>Alumnos Inscritos</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classses as $classs)
                            <tr>
                                <td>{{ $classs->id }}</td>
                                <td>{{ $classs->name_class }}</td>
                                <td>
                                    @foreach ($maestros as $maestro)
                                        @if ($classs->maestro_id == $maestro->id)
                                            {{ $maestro->firs_name . ' ' . $maestro->last_name }}
                                        @else
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-success" data-toggle="modal"
                                            data-target="#myModal{{ $classs->id }}">
                                            <i class="far fa-edit"></i> Editar
                                        </button><button class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Borrar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="myModal{{ $classs->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Editar Clases</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('clases.update', $classs->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nombre de la
                                                        materia</label>
                                                    <input type="text" class="form-control" name="nombre"
                                                        value=" ">
                                                </div>
                                                <label for="exampleInputEmail2" class="form-label">profesores
                                                    disponibles</label>
                                                <select class="form-select mb-3 " aria-label="Default select example"
                                                    name="asignacion">
                                                    <option selected>sin asignar</option>
                                                    @foreach ($classses as $classs)
                                                        @foreach ($maestro as $maestro)
                                                            @if ($maestro->id == $classs->maestro_id)
                                                            @else
                                                                <option value="{{ $maestro->id }}">
                                                                    {{ $maestro->fist_name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-success">Agregar Cambios</button>
                                        </div>
                                        </form>
                                    </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#clases').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        text: '<i class="far fa-copy" style="color: #5892e9;"></i>',
                        titleAttr: 'Copy'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel" style="color: #1daa2d;"></i>',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf" style="color: #e6180a;"></i>',
                        titleAttr: 'PDF'
                    }
                ]
            });
        });
    </script>
@stop
