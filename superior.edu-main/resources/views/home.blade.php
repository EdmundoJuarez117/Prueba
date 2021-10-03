@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-12 col-md-9">
			<div class="row">
				<div class="col-12 col-md-3">
					<div class="card border border-1 border-light shadow-sm mb-3">
						<div class="card-header bg-primary text-white">Alumnos activos</div>
						<div class="card-body text-center">
							<p class="fs-1 text-secondary">
								{{ $studentsCountActive }}
							</p>
						</div><!-- .card-body -->
					</div><!-- .card -->
				</div><!-- .col -->
				<div class="col-12 col-md-3">
					<div class="card border border-1 border-light shadow-sm mb-3">
						<div class="card-header bg-primary text-white">Alumnos egresados</div>
						<div class="card-body text-center">
							<p class="fs-1 text-secondary">
								{{ $studentsCountEgresados }}
							</p>
						</div><!-- .card-body -->
					</div><!-- .card -->
				</div><!-- .col -->

				<div class="col-12 col-md-3">
					<div class="card border border-1 border-light shadow-sm mb-3">
						<div class="card-header bg-primary text-white">Personal docente</div>
						<div class="card-body text-center">
							<p class="fs-1 text-secondary">
								{{ $personalCount }}
							</p>
						</div><!-- .card-body -->
					</div><!-- .card -->
				</div><!-- .col -->


				<div class="col-12 col-md-3">
					<div class="card border border-1 border-light shadow-sm mb-3">
						<div class="card-header bg-primary text-white">Carreras</div>
						<div class="card-body text-center">
							<p class="fs-1 text-secondary">
								{{ $carrerasCount }}
							</p>
						</div><!-- .card-body -->
					</div><!-- .card -->
				</div><!-- .col -->
				<div class="col-12 col-md-3">
					<div class="card border border-1 border-light shadow-sm mb-3">
						<div class="card-header bg-primary text-white">Planes de estudio</div>
						<div class="card-body text-center">
							<p class="fs-1 text-secondary">
								{{ $planesStudioCount }}
							</p>
						</div><!-- .card-body -->
					</div><!-- .card -->
				</div><!-- .col -->
			</div><!-- .row -->




		</div><!-- .col -->
		<div class="col-12 col-md-3">
			<div class="card border border-1 border-light shadow-sm mb-3">
				<div class="card-header bg-success text-white">Accesos directos</div>
				<div class="card-body">
					<div class="list-group list-group-flush">
						<a href="#" class="list-group-item list-group-item-action">
					    <div class="d-flex w-100 justify-content-between">
					      <h5 class="mb-1">Alumnos</h5>
					    </div>
					    <small class="text-muted">Consultar</small>
					  </a>
					  <a href="#" class="list-group-item list-group-item-action">
					    <div class="d-flex w-100 justify-content-between">
					      <h5 class="mb-1">Reportes</h5>
					    </div>
					    <small class="text-muted">Generar</small>
					  </a>
						<a href="#" class="list-group-item list-group-item-action">
					    <div class="d-flex w-100 justify-content-between">
					      <h5 class="mb-1">Carreras</h5>
					    </div>
					    <small class="text-muted">Consultar</small>
					  </a>
						<a href="#" class="list-group-item list-group-item-action">
					    <div class="d-flex w-100 justify-content-between">
					      <h5 class="mb-1">Planes de estudio</h5>
					    </div>
					    <small class="text-muted">Consultar</small>
					  </a>
						<a href="#" class="list-group-item list-group-item-action">
					    <div class="d-flex w-100 justify-content-between">
					      <h5 class="mb-1">Personal docente</h5>
					    </div>
					    <small class="text-muted">Consultar</small>
					  </a>
						<a href="#" class="list-group-item list-group-item-action">
					    <div class="d-flex w-100 justify-content-between">
					      <h5 class="mb-1">Sesión</h5>
					    </div>
					    <small class="text-muted">Cerrar</small>
					  </a>
					</div>

				</div><!-- .card-body -->
			</div><!-- .card -->
		</div><!-- .col -->
	</div><!-- .row -->

@endsection
