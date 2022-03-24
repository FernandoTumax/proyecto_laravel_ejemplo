@extends('layouts.app')

@section('template_title', 'Agregar Puesto')

@section('content')
<div class="container">
    <div class="container">

        {{ Breadcrumbs::render('jobs.create') }}

        <div class="card mb-3">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0"><i class="fas fa-plus text-success mr-2"></i>Agregar Puesto</h5>
                    </div>
                </div>
            </div>
            <div class="card-body fs--1 border-top">

                <form action="{{route('jobs.store')}}" id="form-crear" method="POST">
                    @csrf

                <div class="class-group">

                    <div class="row">
                        <div class="col-3">
                            {!! Form::label('code_job', 'Código Único') !!}
                            {!! Form::text('code_job', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-9">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            {!! Form::label('salary', 'Salario') !!}
                            {!! Form::number('salary', null, ['class' => 'form-control', 'min' => '1']) !!}

                        </div>

                        <div class="col">
                            {!! Form::label('bonus', 'Bonificación', ['class' => 'mr-3']) !!}
                            <input type="checkbox" class="checkshow" name="question">

                            <div class="div_a_mostrar">
                                {!! Form::number('bonus', null, ['class' => 'form-control', 'min' => '1']) !!}
                            </div>
                        </div>
                    </div>

                    <br>

                    {!! Form::label('campus', 'Programas/Sedes') !!} <br>
                    @foreach ($campus as $campu)

                        <label class="mr-2">
                            {!! Form::checkbox('campus[]', $campu->id, false) !!}
                            {{$campu->name}}
                        </label>

                     @endforeach
                     <br>
                    <label id="campus-error" class="error" for="campus[]"></label>

                </div>

                <br>

                <div class="row">
                    <div class="col-sm-9">
                        <a class="btn btn-secondary" href="{{route('jobs.index')}}" >Cancelar</a>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col-sm-9">
                        @permission('create.jobs')
                            {!! Form::submit('Crear puesto', ['class' => 'btn btn-success']) !!}
                        @endpermission
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('template_scripts')
    <script src="{{ mix('js/job_titles.js') }}"></script>
@endsection
