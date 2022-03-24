@extends('layouts.app')

@section('template_title', 'Editar Puesto ' . $job->name)

@section('content')
<div class="container">
    <div class="container">

        {{ Breadcrumbs::render('jobs.edit', $job) }}

        <input type="hidden" id="job_id" value="{{$job->id}}">

        <div class="card mb-3">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0"><i class="fas fa-pencil-alt text-success mr-2"></i>Editar Puesto</h5>
                    </div>
                </div>
            </div>
            <div class="card-body fs--1 border-top">

                {!! Form::model($job, ['route' => ['jobs.update', $job], 'method' => 'put', 'id' => 'form-editar']) !!}

                <div class="class-group">

                    <div class="row">
                        <div class="col-3">
                            {!! Form::label('code_jobs', 'Código Único') !!}
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
                            <input type="checkbox" class="checkshow" name="question"
                            {{ $job->bonus != null ? 'checked' : '' }}>

                            <div class="div_a_mostrar">
                                {!! Form::number('bonus', null, ['class' => 'form-control', 'min' => '1']) !!}
                            </div>

                            @if ( $job->bonus != null)
                                {!! Form::number('bonus', null, ['class' => 'form-control', 'min' => '1']) !!}
                            @endif
                        </div>
                    </div>

                    <br>

                    @foreach ($campus as $campu)

                        <label class="mr-2">
                            {!! Form::checkbox('campus[]', $campu->id, true) !!}
                            {{$campu->name}}
                        </label>

                    @endforeach

                    @foreach ($noCampus as $campu)

                        <label class="mr-2">
                            {!! Form::checkbox('campus[]', $campu->id, false) !!}
                            {{$campu->name}}
                        </label>

                    @endforeach

                    {{-- @foreach ($allCampus as $campu)
                        <input class="form-check-input" type="checkbox" name="campus" value="{{$campu->id}}"
                        {{ $campu->id == $job->campus ? 'checked' : '' }}>
                    @endforeach --}}

                    <label id="campus-error" class="error" for="campus[]"></label>

                </div>

                <br> <br>

                <div class="row">
                    <div class="col" style="text-align: center">
                        <a class="btn btn-secondary" href="{{route('jobs.index')}}" >Cancelar</a>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col" style="text-align: center">

                        @permission('edit.jobs')
                            {!! Form::submit('Actualizar puesto', ['class' => 'btn btn-success']) !!}
                        @endpermission
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection

@section('template_scripts')
    <script src="{{ mix('js/job_titles.js') }}"></script>
@endsection
