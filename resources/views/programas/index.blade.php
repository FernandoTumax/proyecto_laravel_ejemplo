@extends('layouts.app')

@section('template_title', 'Programas/sedes')

@section('template_linked_css')
@endsection

@section('content')

    <div class="container">
        <div class="container">
            {{ Breadcrumbs::render('campus.index') }}
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0"><i class="fas fa-city text-success mr-2"></i>Programas/sedes</h5>
                        </div>
                        <div class="col-auto">
                            @permission('create.campus')
                            <a href="{{route('campus.create')}}" class="btn btn-falcon-default btn-sm"><i class="fas fa-plus mr-1"></i>Nuevo Programa/Sede</a> 
                            @endpermission
                            
                        </div>
                    </div>
                </div>
                <div class="card-body fs--1 border-top">
                    <table id="programas" class="table table-striped table-bordered shadow-lg mt-1" style="width:100%">
                        <thead>
                          <tr>
                            <th scope="col">Código único del programa/sede</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($campus as $campu)
                            <tr>
                                <th scope="row">{{$campu->code_campus}}</th>
                                <td>{{$campu->name}}</td>
                                <td>{{$campu->town->name}}, {{$campu->state->name}}</td>
                                <td>
                                    @permission('delete.campus')
                                        <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#EliminarCampus{{ $campu->id }}">
                                            <i class="far fa-trash-alt"></i> Eliminar
                                        </button>
                                    @endpermission
                                    @permission('view.campus')
                                        <a href="{{route('campus.show', $campu)}}" class="btn btn-success btn-sm mx-1">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                    @endpermission
                                    
                                    @permission('edit.campus')
                                    <a href="{{route('campus.edit', $campu)}}" class="btn btn-info btn-sm mx-1">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </a> 
                                    @endpermission
                                </td>
                              </tr>
                              {{-- MODAL Eliminar Programa/Sede --}}
                              <div class="modal fade" id="EliminarCampus{{ $campu->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Programa/sede</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{route('campus.destroy', $campu)}}" method="POST">


                                                <label>¿Esta seguro de eliminar al empleado: " {{ $campu->name }} "?</label>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-dismiss="modal"><i
                                                            class="fas fa-times"></i> Cancelar</button>
                                                    @csrf
                                                    @method('DELETE')
                                                    @permission('delete.campus')
                                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                                                    @endpermission
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
    </div>   
    
    @section('template_scripts')
        @if (session('eliminar') == 'ok')
            <script>
                Swal.fire(
                    'Programa/Sede eliminado con exito!!!',
                    'Tu programa/sede fue eliminado de la base de datos',
                    'success'
                    )
            </script>
        @endif
        <script>
            $(document).ready(function(){
                $('#programas').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                    },
                    "lengthMenu": [ [25, 50, -1], [25, 50, "All"] ]
                });
            });
        </script>

    @endsection

@endsection