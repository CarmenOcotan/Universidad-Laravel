@extends('adminlte::page')

@section('title', 'Permisos | Admin')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista de Permisos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Permisos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h5 class="card-title ">Informacion de Permisos</h5>
            </div>
            <div class="card-text">
                <table id="permisos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email/Usuario</th>
                            <th>Permiso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admin as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td class="">
                                    @if ($usuario->hasRole('admin'))
                                        <span class="bg-warning text-white rounded p-1">Admin</span>
                                    @elseif ($usuario->hasRole('maestro'))
                                        <span class="bg-primary text-white rounded p-1">Maestro</span>
                                    @elseif ($usuario->hasRole('alumno'))
                                        <span class="bg-secondary text-white rounded p-1">Alumno</span>
                                    @else
                                        <span class="bg-info text-white rounded p-1">Sin asignación</span>
                                    @endif
                                </td>
                                <td>{{ $usuario->active }}</td>
                                <td class="text-center d-flex justify-content-center" style="">
                                    <a href="#" class="text-info mx-2 editar-icono" data-id="" data-toggle="modal"
                                        data-target="#editarModal{{ $usuario->id }}"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>

                            {{-- Modal --}}
                            <div class="modal fade" id="editarModal{{ $usuario->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editarModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarModalLabel">Editar Permiso</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Aquí puedes agregar los campos de edición -->
                                            <form action="{{ route('admin.update', $usuario->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="emmail">Email del Usuario: </label>
                                                    <input type="text" class="form-control" id="nombre"
                                                        value="{{ $usuario->email }}" name="email">
                                                </div>
                                                <div class="mb-3 flex gap-3 justify-content-center">
                                                    <label for="roles" class="flex align-bottom w-48 form-label">
                                                        Rol del Usuario
                                                    </label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="rol" id="roles">
                                                            @foreach ($roles as $rol)
                                                                @if ($usuario->hasRole($rol->name))
                                                                    <option value="{{ $rol->name }}" selected>{{ $rol->name}}</option>
                                                                    @else
                                                                    <option value="{{$rol->name}}">{{$rol->name}}</option>
                                                                    @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input bg-success"
                                                        id="customSwitch1" {{ $usuario === 'Activo' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customSwitch1">Usuario
                                                        Activo</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                </div>
                                            </form>
                                        </div>
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
            $('#permisos').DataTable({
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
