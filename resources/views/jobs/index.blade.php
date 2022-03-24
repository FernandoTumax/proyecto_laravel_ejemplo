    @extends('layouts.app')

    @section('template_title', 'Puestos')

    @section('template_linked_css')
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    @endsection

    @section('content')
        <div class="container">
            <div class="container">

                {{ Breadcrumbs::render('jobs.index') }}

                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0"><i class="fas fa-briefcase text-success mr-2"></i>Puestos</h5>
                            </div>

                            @permission('create.jobs')
                                <div class="col-auto">
                                    <a href="{{ route('jobs.create') }}" class="btn btn-falcon-default btn-sm"><i
                                            class="fas fa-plus"></i> Nuevo Puesto</a>
                                </div>
                            @endpermission

                            </div>
                        </div>
                        <div class="card-body fs--1 border-top">
                            <table id="puestos" class="table table-striped table-bordered shadow-lg mt-1" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Salario</th>
                                        <th scope="col">Bonificación</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>{{ $job->name }}</td>
                                            <td>Q. {{ $job->salary }}</td>
                                            <td>
                                                @if ($job->bonus == null)
                                                    Sin Bonificacion
                                                @else
                                                    Q. {{ $job->bonus }}
                                                @endif
                                            </td>
                                            <td>

                                                @permission('delete.jobs')
                                                    <button class="btn btn-danger btn-sm mx-1" style="min-width: 90px;"
                                                        data-toggle="modal" data-target="#eliminarPuesto{{ $job->id }}"><i
                                                            class="far fa-trash-alt"></i> Eliminar</button>
                                                @endpermission

                                                @permission('view.jobs')
                                                    <a href="{{ route('jobs.show', $job) }}" class="btn btn-success btn-sm mx-1"
                                                        style="min-width: 90px;"><i class="fas fa-eye"></i> Mostrar</a>
                                                @endpermission

                                                @permission('edit.jobs')
                                                    <a href="{{ route('jobs.edit', $job) }}" class="btn btn-info btn-sm mx-1"
                                                        style="min-width: 90px;"><i class="fas fa-pencil-alt"></i> Editar</a>
                                                @endpermission

                                            </td>
                                        </tr>

                                        <!-- Modal eliminar puesto-->
                                        <div class="modal fade" id="eliminarPuesto{{ $job->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Puesto</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('jobs.destroy', $job) }}" method="POST">
                                                            @csrf
                                                            @method('delete')

                                                            <label style="text-align: center" class="form-label">Estas
                                                                seguro de eliminar el puesto
                                                                <strong>{{ $job->name }}</strong>, se eliminara todo lo
                                                                relacionado con el puesto</label>

                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i
                                                                class="fas fa-times"></i> Cancelar</button>

                                                        @permission('delete.jobs')
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="far fa-trash-alt"></i> Eliminar</button>
                                                        @endpermission

                                                    </div>
                                                    </form>
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
        @endsection

    @section('template_scripts')

        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
        <script>
            $('#puestos').DataTable({
                responsive: true,
                autoWidth: false,
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
