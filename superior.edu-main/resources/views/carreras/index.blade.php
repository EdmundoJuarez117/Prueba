@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-12">
			<div class="card border border-1 border-light shadow-sm mb-3">
				<div class="card-header bg-primary text-white">{{ $seccion_titulo }}</div>

				<div class="card-body">

					<!--Here vue.js component -->
					<carrera-component
					v-bind:carreras="{{ json_encode($carreras) }}"
					v-bind:total="{{ json_encode($totalData) }}"></carrera-component>

				</div><!-- .card-body -->
			</div><!-- .card -->
		</div><!-- .col -->
	</div><!-- .row -->

@endsection
