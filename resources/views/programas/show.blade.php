@extends('layouts.app')

@section('template_title', 'Mostrando Campus')

@section('content')
    <div class="container">
        <div class="row"> 
            <div class="col-lg-10 offset-lg-1">
                {{ Breadcrumbs::render('campus.show', $campus) }}
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <p>Mostrando Campus:<strong> {{$campus->name}}</strong></p>
                            <div class="float-right">
                                <a href="{{route('campus.index')}}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Regresar al home">
                                    <i class="fas fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Regresar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="text-muted text-center">
                            {{$campus->name}}
                        </h4>
                        <p class="text-center">
                            {{$campus->town->name}}, {{$campus->state->name}}
                        </p>
                        <div class="row mb-4">
                            <div class="col-3 offset-3 col-sm-4 offset-sm-2 col-md-4 offset-md-2 col-lg-3 offset-lg-3">
                                @permission('edit.campus')
                                <a href="{{route('campus.edit', $campus)}}" class="btn btn-block btn-md btn-warning">
                                    <i class="fas fa-pencil-alt mr-2"></i>Editar Programa/Sede
                                </a>
                                @endpermission
                            </div>
                            <div class="col-3 col-sm-4 col-md-4 col-lg-3">
                                @permission('delete.campus')
                                <a data-toggle="modal" data-target="#EliminarCampus{{ $campus->id }}" class="btn btn-danger btn-md btn-block">
                                    <i class="fas fa-trash-alt mr-2"></i>Eliminar Programa/Sede
                                </a>
                                @endpermission
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-8 col-sm-4">
                                        <strong>
                                            Código único (Generado por la base de datos)
                                        </strong>
                                    </div>
                                    <div class="col-4 col-sm-4">
                                        {{$campus->id}}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-8 col-sm-4">
                                        <strong>
                                            Código único (Generado por el usuario)
                                        </strong>
                                    </div>
                                    <div class="col-4 col-sm-4">
                                        {{$campus->code_campus}}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-8 col-sm-4">
                                        <strong>
                                            Nombre
                                        </strong>
                                    </div>
                                    <div class="col-4 col-sm-4">
                                        {{$campus->name}}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-8 col-sm-4">
                                        <strong>
                                            Departamento de la sede
                                        </strong>
                                    </div>
                                    <div class="col-4 col-sm-4">
                                        {{$campus->state->name}}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-8 col-sm-4">
                                        <strong>
                                            Municipio de la sede
                                        </strong>
                                    </div>
                                    <div class="col-4 col-sm-4">
                                        {{$campus->town->name}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL Eliminar Programa/Sede --}}
    <div class="modal fade" id="EliminarCampus{{ $campus->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Programa/Sede</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('campus.destroy', $campus)}}" method="POST">


                        <label>¿Esta seguro de eliminar al empleado: "{{ $campus->name }}"?</label>
                        <br><br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fas fa-times"></i>
                                Cancelar</button>
                            @csrf
                            @method('DELETE')
                            @permission('edit.campus')
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                Eliminar</button>
                            @endpermission
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('template_scripts')
    {{-- <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Esta seguro/a de querer eliminar este programa/sede?',
            text: "Recuerde que si lo elimina ya no se podra recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo eliminar'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
        })
    </script> --}}
@endsection