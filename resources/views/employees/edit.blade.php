@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')

    <div class="container">
        <div class="container">
            {{ Breadcrumbs::render('employees.edit', $employee) }}
            <div class="card mb-3">

                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">

                            <h5 class="mb-0"><i class="fas fa-user-edit text-success mr-2"></i>Editar Empleado</h5>
                        </div>
                    </div>
                </div>

                <div class="card-body fs--1 border-top">
                    <form id="form-empleado" action="{{ route('employees.update', $employee) }}" method="POST">
                        <input type="hidden" id="cui_id" value="{{ $employee->id }}">
                        <input type="hidden" id="nit_id" value="{{ $employee->id }}">
                        @csrf
                        @method('put')
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first">Nombres:</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $employee->name) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last">Apellidos:</label>
                                    <input type="text" class="form-control" name="last_name"
                                        value="{{ old('name', $employee->last_name) }}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company">DPI:</label>
                                    <input type="text" class="form-control" name="cui"
                                        value="{{ old('name', $employee->cui) }}" maxlength="13">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Dirección:</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ old('name', $employee->address) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control" name="date_birth"
                                        value="{{ old('name', $employee->date_birth) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Teléfono Móvil:</label>
                                    <input type="phone" class="form-control" name="phone_number"
                                        value="{{ old('name', $employee->phone_number) }}" maxlength="8">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Teléfono Casa:</label>
                                    <input type="phone" class="form-control" name="home_phone"
                                        value="{{ old('name', $employee->home_phone) }}" maxlength="8">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">NIT:</label>
                                    <input type="text" class="form-control" name="nit"
                                        value="{{ old('name', $employee->nit) }}" maxlength="9">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Medio de pago:</label>
                                <select id="payment" class="form-control" name="payment">
                                    <option {{ $employee->payment == 'cheque' ? 'selected' : '' }} value="cheque">cheque
                                    </option>
                                    <option {{ $employee->payment == 'nomina' ? 'selected' : '' }} value="nomina">nomina
                                    </option>
                                </select>
                                <br>

                                <div id="date-nomina" style="display: none">

                                    <div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Número de cuenta:</label>
                                                <input type="text" class="form-control" name="bank_account"
                                                    value="{{ old('name', $employee->bank_account) }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Banco:</label>
                                                <select id="bank" class="form-control" name="bank">
                                                    <option selected disabled>Seleccione el banco...</option>
                                                    <option {{ $employee->bank == 'Industrial' ? 'selected' : '' }}
                                                        value="Industrial">Industrial</option>
                                                    <option {{ $employee->bank == 'Banrural' ? 'selected' : '' }}
                                                        value="Banrural">Banrural</option>
                                                    <option {{ $employee->bank == 'Agromercantil' ? 'selected' : '' }}
                                                        value="Agromercantil">Agromercantil</option>
                                                    <option {{ $employee->bank == 'G&T' ? 'selected' : '' }} value="G&T">
                                                        G&T</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">IGSS:</label>
                                                <input type="text" class="form-control" name="igss"
                                                    value="{{ old('name', $employee->igss) }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Porcentaje de IGSS:</label>
                                                <input type="number" class="form-control" name="percentage_igss"
                                                    value="{{ old('name', $employee->percentage_igss) }}">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div id="form-nomina">
                                    @if ($employee->payment != 'cheque')

                                        <div id="">

                                            <div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">Número de cuenta:</label>
                                                        <input type="text" class="form-control" name="bank_account"
                                                            value="{{ old('name', $employee->bank_account) }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">Banco:</label>
                                                        <select id="bank" class="form-control" name="bank">
                                                            <option selected disabled>Seleccione el banco...</option>
                                                            <option
                                                                {{ $employee->bank == 'Industrial' ? 'selected' : '' }}
                                                                value="Industrial">Industrial</option>
                                                            <option {{ $employee->bank == 'Banrural' ? 'selected' : '' }}
                                                                value="Banrural">Banrural</option>
                                                            <option
                                                                {{ $employee->bank == 'Agromercantil' ? 'selected' : '' }}
                                                                value="Agromercantil">Agromercantil</option>
                                                            <option {{ $employee->bank == 'G&T' ? 'selected' : '' }}
                                                                value="G&T">G&T</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">IGSS:</label>
                                                        <input type="text" class="form-control" name="igss"
                                                            value="{{ old('name', $employee->igss) }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">Porcentaje de IGSS:</label>
                                                        <input type="number" class="form-control" name="percentage_igss"
                                                            value="{{ old('name', $employee->percentage_igss) }}">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    @endif
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Puesto:</label>
                                <select id="input" class="form-control" name="job_id">
                                    <option selected disabled>Seleccione el puesto...</option>
                                    @foreach ($jobs as $job)

                                        <option {{$job->id  == $employee->job_id ? 'selected' : '' }}   value="{{ $job->id }}"> {{ $job->name }} </option>


                                    @endforeach


                                </select>
                            </div>

                        </div>

                        <label for="">Género:</label>
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">



                                <input class="form-check-input" type="radio" name="gender" id="masculino" value="masculino"
                                    {{ $employee->gender == 'masculino' ? 'checked' : '' }}>
                                <label class="form-check-label" for="masculino">masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="femenino" value="femenino"
                                    {{ $employee->gender == 'femenino' ? 'checked' : '' }}>
                                <label class="form-check-label" for="femenino">femenino</label>
                            </div>

                        </div>
                        <br>

                        <label for="">Estado Civil:</label>
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="marital_status" id="Soltero"
                                    value="Soltero" {{ $employee->marital_status == 'soltero' ? 'checked' : '' }}>
                                <label class="form-check-label" for="Soltero">Soltero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="marital_status" id="Casado"
                                    value="Casado" {{ $employee->marital_status == 'casado' ? 'checked' : '' }}>
                                <label class="form-check-label" for="Casado">Casado</label>
                            </div>
                            <br><br>

                        </div>

                        <label for="">Jubilación</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="retirement" value="1"
                                {{ $employee->retirement == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">
                                Jubilado
                            </label>
                        </div>
                        <div class="col-md-6">

                        </div>

                        <br>

                        <div class="float-right">
                            <button type="submit" class="btn btn-success">Actualizar Empleado</button>
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
