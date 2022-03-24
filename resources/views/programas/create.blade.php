@extends('layouts.app')

@section('template_title', 'Agregar Programas/sedes')

@section('content')
    <div class="container">
        <div class="container">
            {{ Breadcrumbs::render('campus.create') }}
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0"><i class="fas fa-city text-success mr-2"></i>Agregar Programas/sedes</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body fs--1 border-top">
                    <form action="{{route('campus.store')}}" method="POST" id="formCampus">

                        @csrf
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Codigo Unico:</label>
                                    <input type="text" class="form-control" id="code_campus" name="code_campus" value="{{old('code_campus')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
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
                                        <option selected disabled>Choose...</option>
                                        @foreach ($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="selectMunicipio">
                                    <label for="inputPassword4">Municipio</label>
                                    <select id="town_id" class="form-control" name="town_id">
                                        <option selected disabled>Choose...</option>
                                        @foreach ($towns as $town)
                                        <option value="{{$town->id}}">{{$town->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                              <div class="col" style="text-align: center">
                                <a href="{{route('campus.index')}}" class="btn btn-secondary">Regresar</a>  
                              </div>
                              <div class="col"></div>
                              <div class="col" style="text-align: center">
                                <button type="submit" class="btn btn-success">Crear Programa/Sede</button>
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
    <script>
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        document.getElementById('state_id').addEventListener('change', (e) => {
            fetch('../campus-ajax/towns',{
                method : 'POST',
                body: JSON.stringify({texto : e.target.value}),
                headers:{
                   'Content-Type': 'application/json',
                   'X-CSRF-Token': csrfToken
                }
            }).then(response => {
                return response.json();
            }).then(data => {
                var options = "";
                $("#town_id option").remove();
                for (let i in data.lista) {
                    options+= '<option value="'+data.lista[i].id+'">'+data.lista[i].name+'</option>';
                }
                document.getElementById("town_id").innerHTML = options;
            }).catch(error => console.error(error))
        })
    </script>
@endsection