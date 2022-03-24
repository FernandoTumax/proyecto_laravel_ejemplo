@extends('layouts.app')

@section('content')

<div class="container">
	<div class="container">
		{{ Breadcrumbs::render('admin') }}
		<div class="card mb-3">
			<div class="card-header">
				<div class="row align-items-center">
					<div class="col">
						<h5 class="mb-0"><span class="fas fa-cogs text-success mr-2" data-fa-transform="down-5"></span>Configuración básicas</h5>
					</div>
				</div>

			</div>
			<div class="card-body fs--1 border-top">
				<div class="row">
					<div class="col">
						<div class="card-deck text-center">
							<div class="card mb-4 box-shadow">
								<div class="card-header">
									<h4 class="my-0 font-weight-normal">
										Programas
									</h4>
								</div>
								<div class="card-body">
									<i class="fas fa-3x fa-house-user"></i>
									<hr>
									<a href="{{ route('campus.index') }}" class="btn btn-block btn-primary">Administrar</a>
								</div>
							</div>
							<div class="card mb-4 box-shadow">
								<div class="card-header">
									<h4 class="my-0 font-weight-normal">
										Puestos
									</h4>
								</div>
								<div class="card-body">
									<i class="fas fa-3x fa-user-cog"></i>
									<hr>
									<a href="{{ route('jobs.index') }}" class="btn btn-block btn-primary">Administrar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card mb-3">
			<div class="card-header">
				<div class="row align-items-center">
					<div class="col">
						<h5 class="mb-0"><span class="fas fa-users text-success mr-2" data-fa-transform="down-5"></span>Gestión de usuarios</h5>
					</div>

				</div>

			</div>
			<div class="card-body fs--1 border-top">
				<div class="row">
					<div class="col">
						<div class="card-deck text-center">
							<div class="card mb-4 box-shadow">
								<div class="card-header">
									<h4 class="my-0 font-weight-normal">
										Usuarios
									</h4>
								</div>
								<div class="card-body">
									<i class="fas fa-3x fa-users"></i>
									<p>
										Administre los usuarios del sistema.
									</p>
									<a href="{{ route('users') }}" class="btn btn-block btn-primary">Administrar</a>
								</div>
							</div>
							<div class="card mb-4 box-shadow">
								<div class="card-header">
									<h4 class="my-0 font-weight-normal">
										Roles
									</h4>
								</div>
								<div class="card-body">
									<i class="fas fa-3x fa-user-tag"></i>
									<p>
										Administre las roles del sistema.
									</p>
									<a href="{{ route('laravelroles::roles.index') }}" class="btn btn-block btn-primary">Administrar</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
@endsection
