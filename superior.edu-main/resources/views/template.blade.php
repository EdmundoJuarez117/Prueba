@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-12">
			<div class="card border border-1 border-light shadow-sm mb-3">
				<div class="card-header bg-primary text-white">{{ $seccion_titulo }}</div>

				<div class="card-body">
					<form id="form_section" onsubmit="return false;">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
								<?= $grid ?>
							</div><!-- .col -->
						</div><!-- .row -->

						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
								<div class="form-group">
									<label for="itxt_section_search" class="form-label">Input text</label>
									<input type="text" id="itxt_section_search" name="itxt_marca_search" value="" placeholder="" autofocus="" class="form-control text-uppercase">
								</div><!-- .form-group -->
							</div><!-- .col -->
						</div><!-- .row -->

						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
								<div class="form-group">
									<label for="itxt_producto_descripcion" class="form-label">Textarea</label>
									<textarea
									id="itxt_producto_descripcion"
									name="itxt_producto_descripcion"
									class="form-control"
									rows="5"
									></textarea>
								</div><!-- .form-group -->
							</div><!-- .col -->
						</div><!-- .row -->

						<div class="row">
							<div class="col-12 mb-3">
								<div class="form-group">
									<label for="slc_producto_iddepartamento" class="form-label">Select</label>
									<select id="slc_producto_iddepartamento" name="slc_producto_iddepartamento" type="text" class="form-select">
										<option>Optine One</option>
										<option>Optine Two</option>
									</select>
								</div><!-- .form-group -->
							</div><!-- .col -->
						</div><!-- .row -->

						<div class="row">
							<div class="col-12 mb-3">
								<div class="form-group">
									<label for="itxt_producto_imagen_1" class="form-label">input file</label><br>
									<input
									id="itxt_producto_imagen_1" name="itxt_producto_imagen_1" type="file" accept="image/*"
									class="form-control"
									>
								</div><!-- .form-group -->
							</div><!-- .col -->
						</div><!-- .row -->

						<div class="row">
							<h6>Buttons solid</h6>
							<div class="col-12 col-md-2 d-flex flex-column">
								<button type="submit" class="btn btn-primary text-white mt-auto"
								data-bs-toggle="tooltip" data-bs-placement="right" title="Buscar">
								Primary
							</button>
						</div>
						<div class="col-12 col-md-2 d-flex flex-column">
							<button type="submit" class="btn btn-secondary text-white mt-auto"
							data-bs-toggle="tooltip" data-bs-placement="right" title="Buscar">
							Secondary
						</button>
					</div>
					<div class="col-12 col-md-2 d-flex flex-column">
						<button type="submit" class="btn btn-info text-white mt-auto"
						data-bs-toggle="tooltip" data-bs-placement="right" title="Buscar">
						Info
					</button>
				</div>
				<div class="col-12 col-md-2 d-flex flex-column">
					<button type="submit" class="btn btn-success text-white mt-auto"
					data-bs-toggle="tooltip" data-bs-placement="right" title="Buscar">
					Success
				</button>
			</div>
			<div class="col-12 col-md-2 d-flex flex-column">
				<button type="submit" class="btn btn-warning text-primary mt-auto"
				data-bs-toggle="tooltip" data-bs-placement="right" title="Buscar">
				Warning
			</button>
		</div>
		<div class="col-12 col-md-2 d-flex flex-column">
			<button type="submit" class="btn btn-danger text-white mt-auto"
			data-bs-toggle="tooltip" data-bs-placement="right" title="Buscar">
			Danger
		</button>
	</div>
</div><!-- .row -->

</form>


</div><!-- .card-body -->
</div><!-- .card -->
</div><!-- .col -->
</div><!-- .row -->


@endsection
