@extends('layouts.app')

@section('title', 'Nuevo Empleado')

@section('content')

    <div class="container">
        <div class="container">
            {{ Breadcrumbs::render('employees.create') }}
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0"><i class="fas fa-user-plus text-success mr-2"></i>Agregar Empleado</h5>
                        </div>
                    </div>
                </div>

                <div class="card-body fs--1 border-top">
                    <form id="form-empleado" action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first">Nombres:</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last">Apellidos:</label>
                                    <input type="text" class="form-control" name="last_name">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company">DPI:</label>
                                    <input type="text" class="form-control" name="cui" maxlength="13" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Dirección:</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control" name="date_birth">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Teléfono Móvil:</label>
                                    <input type="text" class="form-control" name="phone_number"  maxlength="8">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Teléfono Casa:</label>
                                    <input type="phone" class="form-control" name="home_phone"  maxlength="8">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">NIT:</label>
                                    <input type="text" class="form-control" name="nit" maxlength="9">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Medio de pago:</label>
                                <select id="payment" class="form-control" name="payment">
                                    <option  selected disabled>Seleccione el método de pago...</option>
                                    <option value="cheque">cheque</option>
                                    <option  value="nomina">nomina</option>
                                </select>

                                <br>

                                <div id="date-nomina" style="display: none" >

                                    <div >
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Número de cuenta:</label>
                                                <input type="text" class="form-control" name="bank_account">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Banco:</label>
                                                <select id="bank" class="form-control" name="bank">
                                                    <option  selected disabled>Seleccione el banco...</option>
                                                    <option value="Industrial">Industrial</option>
                                                    <option  value="Banrural">Banrural</option>
                                                    <option  value="Agromercantil">Agromercantil</option>
                                                    <option  value="G&T">G&T</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">IGSS:</label>
                                                <input type="text" class="form-control" name="igss">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Porcentaje de IGSS:</label>
                                                <input type="number" class="form-control" name="percentage_igss">
                                            </div>
                                        </div>

                                    </div>

                                </div>



                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Puesto:</label>
                                <select class="form-control" name="job_id">
                                    <option selected disabled>Seleccione el puesto...</option>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}">{{ $job->name }}</option>
                                    @endforeach


                                </select>
                            </div>



                        </div>

                        <label for="">Género:</label>
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="masculino" value="masculino">
                                <label class="form-check-label" for="masculino">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="Femenino" value="femenino">
                                <label class="form-check-label" for="femenino">Femenino</label>
                            </div>
                            <br>
                            <label id="gender-error" class="error" for="gender"></label>
                        </div>
                        <br>

                        <label for="">Estado Civil:</label>
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="marital_status" id="Soltero"
                                    value="soltero">
                                <label class="form-check-label" for="Soltero">Soltero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="marital_status" id="Casado"
                                    value="casado">
                                <label class="form-check-label" for="Casado">Casado</label>
                            </div>
                            <br>
                            <label id="marital_status-error" class="error" for="marital_status"></label>
                            <br><br>

                        </div>

                        <label for="">Jubilación</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="retirement" value="1">
                            <label class="form-check-label" for="flexCheckDefault">
                                Jubilado
                            </label>
                        </div>
                        <div class="col-md-6">

                        </div>

                        <br>

                        <div class="float-right">
                            <button type="submit" class="btn btn-success">Crear Empleado</button>
                        </div>

                        <div class="float-left">
                            <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="container">

    </div>

@endsection

@section('template_scripts')

    <script src="{{ mix('js/employees.js') }}"></script>



@endsection
