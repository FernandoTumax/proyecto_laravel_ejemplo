@extends('layouts.app')

@section('template_title', 'Actualizar Programas/sedes')

@section('content')
    <div class="container">
        <div class="container">
            {{ Breadcrumbs::render('campus.edit', $campus) }}
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0"><i class="fas fa-city text-success mr-2"></i>Editar Programas/sedes</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body fs--1 border-top">
                    <form action="{{route('campus.update', $campus)}}" method="POST" id="formCampus">
                        <input type="hidden" id="campus_id" value="{{$campus->id}}">
                        @csrf
                        @method('put')
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Codigo Unico:</label>
                                    <input type="text" class="form-control" name="code_campus" value="{{old('code_campus', $campus->code_campus)}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre:</label>
                                    <input type="text" class="form-control" value="{{old('name', $campus->name)}}" name="name" onload="createURL(this.value)" onkeypress="createURL(this.value)">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <label for="" class="col-form-label title-input">Direccion</label>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Departamento</label>
                                    <select id="state_id" class="form-control" name="state_id">
                                        <option disabled>Choose...</option>
                                        
                                        
                                        @foreach ($states as $state)
                                            @if (old('state_id') == $campus->state_id)
                                                <option value="{{$state->id}}">{{$state->name}}</option> 
                                            @else
                                                <option value="{{$state->id}}" selected>{{$state->name}}</option>
                                            @endif  

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Municipio</label>
                                    <select name="town_id" id="town_id" class="form-control">
                                        <option disabled>Choose...</option>
                                        @foreach ($towns as $town)
                                        @if (old('town_id') == $campus->town_id)
                                            <option value="{{$town->id}}">{{$town->name}}</option>
                                        @else
                                            <option value="{{$town->id}}" selected>{{$town->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: center">
                                <a href="{{route('campus.show', $campus)}}" class="btn btn-secondary">Regresar</a>
                            </div>
                            <div class="col">
                            </div>
                            <div class="col" style="text-align: center">
                                <button type="submit" class="btn btn-success">Actualizar Programa/Sede</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('template_scripts')
    <script src="{{mix("js/validate-campus.js")}}"></script>
@endsection