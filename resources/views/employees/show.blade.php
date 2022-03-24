@extends('layouts.app')

@section('template_title', 'Mostrando Empleado')

@section('template_linked_css')

    <link href="{{ mix('css/employees.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                {{ Breadcrumbs::render('employees.show', $employee) }}
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-right">
                                <a href="{{ route('home') }}" class="btn btn-light btn-sm float-right"
                                    data-toggle="tooltip" data-placement="left" title="Regresar al home">
                                    <i class="fas fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Regresar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="text-muted text-center">
                            {{ $employee->name }} {{ $employee->last_name }}
                        </h4>
                        <br>

                        <div class="row mb-4">
                            <div class="col-3 offset-3 col-sm-4 offset-sm-2 col-md-4 offset-md-2 col-lg-3 offset-lg-3">

                                @permission('editar.empleado')
                                    <a href="{{ route('employees.edit', $employee) }}"
                                        class="btn d-none d-sm-none d-md-block btn-warning">
                                        <i class="fas fa-pencil-alt"></i> Editar Empleado
                                    </a>
                                    <a class="btn btn-warning d-block d-md-none"><i class="fas fa-pencil-alt"></i></a>
                                    @endpermission
                                </div>
                                <div class="col-3 col-sm-4 col-md-4 col-lg-3">
                                    @permission('eliminar.empleado')
                                    <a data-toggle="modal" data-target="#EliminarEmployee{{ $employee->id }}"
                                        class="btn d-none d-sm-none d-md-block btn-danger">
                                        <i class="fas fa-trash-alt "></i> Eliminar Empleado
                                    </a>
                                    <a class="btn btn-danger d-block d-md-none"><i class="fas fa-trash-alt"></i></a>
                                    @endpermission
                                </div>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                DPI
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->cui }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Nombres
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->name }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Apellidos
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->last_name }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Puesto
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->job->name }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Dirección
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->address }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Fecha de nacimineto
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->date_birth }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Edad
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->age }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Número de teléfono
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->phone_number }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Número teléfonico de casa
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->home_phone }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                NIT
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->nit }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Medio de pago
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->payment }}
                                        </div>
                                    </div>
                                </li>


                                {{-- Datos si el pago es por nomina --}}

                                @if ($employee->payment == 'nomina')
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-8 col-sm-4">
                                                <strong>
                                                    Número de Cuenta
                                                </strong>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                {{ $employee->bank_account }}
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-8 col-sm-4">
                                                <strong>
                                                    Banco
                                                </strong>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                {{ $employee->bank }}
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-8 col-sm-4">
                                                <strong>
                                                    IGSS
                                                </strong>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                {{ $employee->igss }}
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-8 col-sm-4">
                                                <strong>
                                                    Porcentaje de IGSS
                                                </strong>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                {{ $employee->percentage_igss }}
                                            </div>
                                        </div>
                                    </li>
                                @endif


                                {{-- Datos si el pago es por nomina --}}

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Género
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->gender }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Estado Civil
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            {{ $employee->marital_status }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-8 col-sm-4">
                                            <strong>
                                                Jubilación
                                            </strong>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            @if ($employee->retirement == 1)
                                                jubilado
                                            @else
                                                no jubilado
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL Eliminar Empleado --}}
        <div class="modal fade" id="EliminarEmployee{{ $employee->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Empleado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('employees.destroy', $employee) }}" method="POST">


                            <label>¿Esta seguro de eliminar al empleado: "{{ $employee->name }}
                                {{ $employee->last_name }}"?</label>
                            <br><br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fas fa-times"></i>
                                    Cancelar</button>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                    Eliminar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
