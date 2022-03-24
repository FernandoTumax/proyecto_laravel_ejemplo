@extends('layouts.app')

@section('template_linked_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    <link href="{{ mix('css/employees.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="container">
        <div class="container">
            {{ Breadcrumbs::render('home') }}

            @if (config('laravelusers.enablePackageBootstapAlerts'))
                <div class="row">
                    <div class="col-sm-12">
                        @include('laravelusers::partials.form-status')
                    </div>
                </div>
            @endif


            <div class="card mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0"><span class="fas fa-address-book text-success mr-2"
                                    data-fa-transform="down-5"></span>Empleados</h5>
                        </div>
                        @role('admin')
                        <div class="col-auto">
                            <a href="" class="btn btn-falcon-default btn-sm">Administrar</a>
                        </div>
                        <div class="btncreate">
                            <a href="{{ route('employees.create') }}" class="btn btn-falcon-default btn-sm"><i
                                    class="fas fa-user-plus"></i> Nuevo
                                Empleado</a>
                        </div>
                        @endrole
                    </div>

                </div>
                <div class="card-body fs--1 border-top">


                    <table id="employees" class="table table-striped table-bordered shadow-lg mt-1 " style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">DPI</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Número Celular</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($employees as $employee)
                                <tr>
                                    <th scope="row">{{ $employee->cui }}</th>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->phone_number }}</td>
                                    <td>





                                        @permission('eliminar.empleado')
                                            <button class="btn btn-sm btn-danger btnaccion" type="button" data-toggle="modal"
                                                data-target="#EliminarEmployee{{ $employee->id }}"><i
                                                    class="far fa-trash-alt"></i> Eliminar</button>
                                            @endpermission

                                            <a href="{{ route('employees.show', $employee) }}"
                                                class="btn btn-success btn-sm btnaccion "><i class="fas fa-eye"></i> Ver</a>

                                            @permission('editar.empleado')
                                                <a href="{{ route('employees.edit', $employee) }}"
                                                    class="btn btn-info btn-sm btnaccion "><i class="fas fa-pencil-alt"></i>
                                                    Editar</a>
                                                @endpermission

                                            </td>

                                        </tr>



                                        {{-- MODAL Eliminar Empleado --}}
                                        <div class="modal fade" id="EliminarEmployee{{ $employee->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Empleado</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('employees.destroy', $employee) }}" method="POST">


                                                            <label>¿Está seguro de eliminar al empleado: "{{ $employee->name }}
                                                                {{ $employee->last_name }}"?</label>
                                                            <br><br>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-dismiss="modal"><i
                                                                        class="fas fa-times"></i> Cancelar</button>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"><i
                                                                        class="far fa-trash-alt"></i> Eliminar</button>
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
                        <div class="card-footer border-top text-right">
                            <a class="btn btn-falcon-default btn-sm" href="">
                                <span class="fas fa-file-contract fs--2 mr-1"></span>Reportes
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        @endsection

        @section('template_scripts')
            <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

            <script>
                $('#employees').DataTable({
                    responsive: true,
                    autoWidth: false,
                    "order": [
                        [1, "asc"]
                    ],
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'

                    },
                    "lengthMenu": [
                        [25, 50, -1],
                        [25, 50, "Todos"]
                    ]
                });
            </script>


        @endsection
