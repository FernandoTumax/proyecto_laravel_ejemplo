@extends('layouts.app')

@section('template_title', 'Puesto ' . $job->name)

@section('template_linked_css')
@endsection

@section('content')
 <div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            {{ Breadcrumbs::render('jobs.show', $job) }}
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                    <p>Mostrando el puesto:<strong> {{$job->name}}</strong></p>
                        <div class="float-right">
                            <a href="{{route('jobs.index')}}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Regresar">
                                <i class="fas fa-fw fa-reply-all" aria-hidden="true"></i>
                                Regresar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="text-muted text-center" style="font-size: 40px">
                        <i class="fas fa-briefcase"></i>
                        {{$job->name}}
                    </h4>
                    <br>
                    <div class="row mb-4">
                        <div class="col-3 offset-3 col-sm-4 offset-sm-2 col-md-4 offset-md-2 col-lg-3 offset-lg-3">
                            @permission('edit.jobs')
                                <a href="{{route('jobs.edit', $job)}}" class="btn btn-md btn-warning">
                                    <i class="fas fa-pencil-alt mr-2"></i>Editar Puesto
                                </a>
                            @endpermission
                        </div>
                        <div class="col-3 col-sm-4 col-md-4 col-lg-3">
                            @permission('delete.jobs')
                                <a class="btn btn-danger btn-md" data-toggle="modal" data-target="#eliminarPuesto">
                                    <i class="fas fa-trash-alt mr-2"></i>Eliminar Puesto
                                </a>
                            @endpermission
                        </div>

                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8 col-sm-4">
                                    <strong>
                                        Código Único
                                    </strong>
                                </div>
                                <div class="col-4 col-sm-4">
                                    {{$job->code_job}}
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
                                    {{$job->name}}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8 col-sm-4">
                                    <strong>
                                        Salario
                                    </strong>
                                </div>
                                <div class="col-4 col-sm-4">
                                    Q. {{$job->salary}}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8 col-sm-4">
                                    <strong>
                                        Bonificación
                                    </strong>
                                </div>
                                <div class="col-4 col-sm-4">
                                    @if ($job->bonus == null)
                                        Sin Bonificación
                                    @else
                                        Q. {{$job->bonus}}
                                    @endif
                                </td>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8 col-sm-4">
                                    <strong>
                                        Programas/Sedes
                                    </strong>
                                </div>
                                <div class="col-4 col-sm-4">
                                    @foreach ($campus as $campu)
                                        - {{$campu->name}} <br>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Modal eliminar puesto-->
            <div class="modal fade" id="eliminarPuesto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Puesto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{route('jobs.destroy', $job)}}" method="POST">
                            @csrf
                            @method('delete')

                            <label style="text-align: center" class="form-label">Estas seguro de eliminar el puesto <strong>{{$job->name}}</strong>, se eliminara todo lo relacionado con el puesto</label>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                    </div>
                </form>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

