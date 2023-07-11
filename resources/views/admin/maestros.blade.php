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
    <div class="card mt-3">
        <div class="card-header">
            <div class="row justify-content-between">
                <h5 class="card-title">Informacion de Maestros</h5>
            {{-- Modals --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar Maestro</button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Agregar Maestro</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('maestros.store') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                                        <input type="text" class="form-control" name="email" value="Ingresa email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nombre(s)</label>
                                        <input type="text" class="form-control" name="nombre" value="Ingresa nombres(s) ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Apellido(s)</label>
                                        <input type="text" class="form-control" name="apellido" value=" Apellido(s)">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Direccion</label>
                                        <input type="text" class="form-control" name="direccion" value="Ingresa la direccion ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" name="fecha_cumple">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Crear</button>
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
                <table id="maestros" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Direccion</th>
                            <th>Fec. de Nacimiento</th>
                            <th>Clase Asignada</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maestros as $maestro)
                            <tr>
                                <td>{{ $maestro->id }}</td>
                                <td>{{ $maestro->firs_name }}</td>
                                <td>{{ $maestro->last_name }}</td>
                                <td>{{ $maestro->address }}</td>
                                <td>{{ $maestro->bith_date }}</td>
                                <td>
                                    @foreach ($classses as $classs)
                                        @if ($maestro->id == $classs->maestro_id)
                                            {{ $classs->name_class }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn" data-toggle="modal"
                                            data-target="#myModal{{ $maestro->id }}">
                                            <i class="far fa-edit"></i>
                                        </button><a href="{{ route('maestros.destroy', $maestro->id) }}"
                                            class="btn">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="myModal{{ $maestro->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Editar Maestro</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('maestros.update', $maestro->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                {{-- <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Id</label>
                                                    <input type="number" class="form-control"
                                                        name="id_estudiante" readonly
                                                        value="{{ $maestro->id }}">
                                                </div> --}}
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1"
                                                        class="form-label">Correo Electronico</label>
                                                    <input type="email" class="form-control"  name="email"
                                                        value="{{ $maestro->email }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1"
                                                        class="form-label">Nombre(s)</label>
                                                    <input type="text" class="form-control" name="nombre"
                                                        value="{{ $maestro->firs_name }} ">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label">Apellidos(s)</label>
                                                    <input type="text" class="form-control" name="apellido"
                                                        value="{{ $maestro->last_name }} ">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label">Direccion</label>
                                                    <input type="text" class="form-control" name="direccion"
                                                        value="{{ $maestro->address }} ">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento</label>
                                                    <input type="date" class="form-control"
                                                        name="fecha_cumple">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar cambios

                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
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
            $('#maestros').DataTable({
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
