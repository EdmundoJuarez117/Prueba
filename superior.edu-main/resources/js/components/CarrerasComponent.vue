

<template>
	<div>

		<div class="row">
			<div class="col-12 col-sm-12 col-md-10 col-lg-10 mb-2">
				<div class="form-group ">
					<label for="">Nombre</label>
					<input v-model="carreraSearch.nombre"
					type="text" class="form-control">
				</div><!-- .form-group -->
			</div><!-- .col -->

			<div class="col-12 col-sm-12 col-md-offset-3 col-lg-2 mb-2 d-flex">
				<button v-on:click="toList()" type="button" name="button" class="btn btn-info w-100 text-white mt-auto">
					Buscar
				</button>
			</div><!-- .col -->
		</div><!-- .row -->

		<div class="row justify-content-md-end">
			<div class="col-12 col-sm-12 col-md-offset-3 col-lg-2 mb-2">
				<button v-on:click="showForm({})" type="button" name="button" class="btn btn-primary w-100 text-white">
					Agregar
				</button>
			</div><!-- .col -->
		</div><!-- .row -->

		<grid-pagination-component ref="myGrid"  @actionGrid="actionGrid"
		v-bind:columns="columns_grid"
		v-bind:total_datos="todaOk"
		v-bind:datagrid="carreras"
		v-bind:endPoint="myendPoint"
		v-bind:search="carreraSearch"
		>
	</grid-pagination-component>

	<popup-component ref="modalCarrera" :idModal="idModal">
		<template slot="modalHeader">
			<h5 class="modal-title"> {{ tituloModal }} </h5>
		</template>
		<template slot="modalBody">
			<form id="formSucursales">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<!--Input Nombre-->
							<label for="itxt_carrera_nombre">Nombre</label>
							<input v-model="carrera.nombre"
							v-bind:class="{ 'is-invalid': ($v.carrera.nombre.$error), 'is-valid': (!$v.carrera.nombre.$error && $v.carrera.nombre.$dirty)  }"
							id="itxt_carrera_nombre" name="itxt_carrera_nombre" type="text"
							class="form-control"
							>
							<div v-if="!$v.carrera.nombre.required" class="invalid-feedback">Ingrese</div>

							<!--Input Nombre corto-->
							<label for="itxt_carrera_nombre_corto">Nombre corto</label>
							<input v-model="carrera.nombre_corto"
							v-bind:class="{ 'is-invalid': ($v.carrera.nombre_corto.$error), 'is-valid': (!$v.carrera.nombre_corto.$error && $v.carrera.nombre_corto.$dirty)  }"
							id="itxt_carrera_nombre_corto" name="itxt_carrera_nombre_corto" type="text"
							class="form-control"
							>
							<div v-if="!$v.carrera.nombre_corto.required" class="invalid-feedback">Ingrese el nombre corto</div>
							<!--Input Estatus-->
							<label for="itxt_carrera_estatus">Estatus</label>
							<input v-model="carrera.estatus"
							v-bind:class="{ 'is-invalid': ($v.carrera.estatus.$error), 'is-valid': (!$v.carrera.estatus.$error && $v.carrera.estatus.$dirty)  }"
							id="itxt_carrera_estatus" name="itxt_carrera_estatus" type="text"
							class="form-control"
							>
							<div v-if="!$v.carrera.estatus.required" class="invalid-feedback">Ingrese el estatus</div>
						</div><!-- .form-group -->
					</div><!-- .col -->
				</div><!-- .row -->
			</form>
		</template>
		<template slot="modalFooter">
			<button @click="hideForm()" type="button" class="btn btn-secondary">Cancelar</button>
			<button v-on:click="doSave()" type="button" class="btn btn-primary">Guardar</button>
		</template>
	</popup-component>

	<toast-component ref="toastDialog" v-bind:config="configToast" />
</div><!-- -->
</template>



<script>
import PopupComponent from './PopupComponent.vue'
import { required, email, minLength } from "vuelidate/lib/validators";

export default {

	components: { PopupComponent },

	props: [
		'carreras',
		'total'
	],

	data(){
		return {
			carrera: {
				id: 0,
				nombre: "",
			},

			carreraSearch: {
				nombre: ""
			},

			myendPoint: "carreras",

			columns_grid: {
				'id': {
					'type': 'text',
					'header': 'ID',
					'width': '10%'
				},
				'nombre': {
					'type': 'text',
					'header': 'NOMBRE',
					'width': '80%'
				},
				'nombre_corto':{
					'type': 'text',
					'header': 'NOMBRE_CORTO',
					'width': '5%' 
				},
				'estatus':{
					'type': 'text',
					'header': 'ESTATUS',
					'width': '10%' 
				},
				'edit': {
					'type': 'button',
					'header': 'EDITAR',
					'width': '5%',
					'config':{
						'action': 'edit',
						'text': '<i class="bi bi-pencil-fill"></i>',
						'class': 'btn btn-sm btn-secondary'}
					},
					'eliminar': {
						'type': 'button',
						'header': 'ELIMINAR',
						'width': '5%',
						'config': {
							'action': 'delete',
							'text': '<i class="bi bi-trash-fill"></i>',
							'class':'btn btn-sm btn-danger'
						}
					}
				},
				data_grid:null,

				idModal: "modalCarrera",
				tituloModal: '',

				configToast:{
					type: "",
					message: ""
				},

				todaOk: this.total,
			}

		},

		validations: {
			carrera: {
				nombre: { required },
				nombre_corto: { required },
				estatus: { required }
			}
		},

		methods: {
			showForm( data={} ) {
				this.carrera.id = (data.id === undefined)?0:data.id;

				if(this.carrera.id > 0){
					this.carrera.id = data.id;
					this.tituloModal = "Editar";
					this.carrera.nombre = data.nombre;
					this.carrera.nombre_corto = data.nombre_corto;
					this.carrera.estatus = data.estatus;
				}else if (this.carrera.id == 0) {
					this.carrera.id = 0;
					this.tituloModal = "Agregar";
				}

				this.$refs.modalCarrera.open({contextClass:'bg-primary'});
			},

			validateForm() {
				this.$v.carrera.$touch();
				if(this.$v.carrera.$invalid){
					this.configToast.type = "error";
					this.configToast.message = "Atienda las indicaciones";

					this.$refs.toastDialog.open();
					return;
				}
			},

			resetFields() {
				this.carrera.id = 0;
				this.carrera.nombre = "";
				this.carrera.nombre_corto = "";
				this.carrera.estatus = "";
			},

			hideForm() {
				this.$v.carrera.$reset();
				this.resetFields();
				this.$refs.toastDialog.close();
				this.$refs.modalCarrera.close();
			},

			doSave() {
				this.validateForm();
				if( !this.$v.carrera.$invalid ){
					if(this.carrera.id > 0){
						this.doUpdate();
					}else if (this.carrera.id == 0) {
						this.doCreate();
					}
				}
			},

			doCreate() {
				let me = this;
				let url = appURL + 'carreras';

				let laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				axios.defaults.headers.common['X-CSRF-TOKEN'] = laravelToken;

				axios.post(url, this.carrera)
				.then( (response) => {
					if(!response.data.result){
						me.configToast.type = "error";
						me.configToast.message = response.data.message;
						// me.$refs.toastDialog.open();
					}else{
						me.configToast.type = "success";
						me.configToast.message = "Carrera agregada correctamente";

						me.todaOk ++; // update value with + 1, for re-reder grid pagination

						me.hideForm();
						me.toList();
					}
				})
				.catch( (error) => {
					if(error.response.status == 422){ // catch validation error Laravel API
						me.configToast.type = "error";
						me.configToast.message = error.response.data.errors.nombre[0];
					}
				})
				.finally( () => {
					me.$refs.toastDialog.open();
				});
			},

			actionGrid(action, data){
				if(action=='edit'){
					this.carrera.id = data.id;
					this.carrera.nombre = data.nombre;
					this.carrera.nombre_corto = data.nombre_corto;
					this.carrera.estatus = data.estatus;

					this.showForm(this.carrera);
				}else if (action=='delete') {
					this.configToast.type = "info";
					this.configToast.message = "Eliminación pendiente, es necesario desarrollar módulos con FK de carrera";
					this.$refs.toastDialog.open();
				}
			},

			doUpdate() {
				let me = this;
				let url = appURL + 'carreras/'+this.carrera.id;

				let laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				axios.defaults.headers.common['X-CSRF-TOKEN'] = laravelToken;

				axios.put(url, this.carrera).
				then(async (response) => {
					if(!response.data.result){
						me.configToast.type = "error";
						me.configToast.message = response.data.message;
					}else{
						me.configToast.type = "success";
						me.configToast.message = "Carrera editada correctamente";
						me.hideForm();
						me.toList();
					}
				})
				.catch(function (error) {
					if(error.response.status == 422){ // catch validation error Laravel API
						me.configToast.type = "error";
						me.configToast.message = error.response.data.errors.nombre[0];
					}
				})
				.finally(() => {
					me.$refs.toastDialog.open();
				});
			},

			toList() {
				// console.info("this.modalidadSearch");
				// console.info( JSON.stringify(this.modalidadSearch) );

				this.$refs.myGrid.getPagination(0, JSON.stringify(this.carreraSearch));
			},

			confirmDelete(responseConfirm) {
			},

		},

		created() {
		},

		mounted(){
		},

		watch: {
		},


	}

	</script>

	<style>
	</style>
