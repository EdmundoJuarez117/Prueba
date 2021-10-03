

<template>
	<div>

		<div class="row">
			<div class="col-12 col-sm-12 col-md-10 col-lg-10 mb-2">
				<div class="form-group ">
					<label for="">Nombre</label>
					<input v-model="planestudioSearch.nombre"
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
		v-bind:datagrid="planestudios"
		v-bind:endPoint="myendPoint"
		v-bind:search="planestudioSearch"
		>
	</grid-pagination-component>

	<popup-component ref="modalPlanestudio" :idModal="idModal">
		<template slot="modalHeader">
			<h5 class="modal-title"> {{ tituloModal }} </h5>
		</template>
		<template slot="modalBody">
			<form id="formSucursales">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<!--Input Nombre-->
							<label for="itxt_planestudio_nombre">Nombre</label>
							<input v-model="planestudio.nombre"
							v-bind:class="{ 'is-invalid': ($v.planestudio.nombre.$error), 'is-valid': (!$v.planestudio.nombre.$error && $v.planestudio.nombre.$dirty)  }"
							id="itxt_planestudio_nombre" name="itxt_planestudio_nombre" type="text"
							class="form-control"
							>
							<div v-if="!$v.planestudio.nombre.required" class="invalid-feedback">Ingrese</div>

							<!--Input Nombre corto-->
							<label for="itxt_planestudio_nombre_corto">Nombre corto</label>
							<input v-model="planestudio.nombre_corto"
							v-bind:class="{ 'is-invalid': ($v.planestudio.nombre_corto.$error), 'is-valid': (!$v.planestudio.nombre_corto.$error && $v.planestudio.nombre_corto.$dirty)  }"
							id="itxt_planestudio_nombre_corto" name="itxt_planestudio_nombre_corto" type="text"
							class="form-control"
							>
							<div v-if="!$v.planestudio.nombre_corto.required" class="invalid-feedback">Ingrese el nombre corto</div>
							<!--Input Estatus-->
							<label for="itxt_planestudio_estatus">Estatus</label>
							<input v-model="planestudio.estatus"
							v-bind:class="{ 'is-invalid': ($v.planestudio.estatus.$error), 'is-valid': (!$v.planestudio.estatus.$error && $v.planestudio.estatus.$dirty)  }"
							id="itxt_planestudio_estatus" name="itxt_planestudio_estatus" type="text"
							class="form-control"
							>
							<div v-if="!$v.planestudio.estatus.required" class="invalid-feedback">Ingrese el estatus</div>
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
		'planestudios',
		'total'
	],

	data(){
		return {
			planestudio: {
				id: 0,
				nombre: "",
			},

			planestudioSearch: {
				nombre: ""
			},

			myendPoint: "planestudios",

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

				idModal: "modalPlanestudio",
				tituloModal: '',

				configToast:{
					type: "",
					message: ""
				},

				todaOk: this.total,
			}

		},

		validations: {
			planestudio: {
				nombre: { required },
				nombre_corto: { required },
				estatus: { required }
			}
		},

		methods: {
			showForm( data={} ) {
				this.planestudio.id = (data.id === undefined)?0:data.id;

				if(this.planestudio.id > 0){
					this.planestudio.id = data.id;
					this.tituloModal = "Editar";
					this.planestudio.nombre = data.nombre;
					this.planestudio.nombre_corto = data.nombre_corto;
					this.planestudio.estatus = data.estatus;
				}else if (this.planestudio.id == 0) {
					this.planestudio.id = 0;
					this.tituloModal = "Agregar";
				}

				this.$refs.modalPlanestudio.open({contextClass:'bg-primary'});
			},

			validateForm() {
				this.$v.planestudio.$touch();
				if(this.$v.planestudio.$invalid){
					this.configToast.type = "error";
					this.configToast.message = "Atienda las indicaciones";

					this.$refs.toastDialog.open();
					return;
				}
			},

			resetFields() {
				this.planestudio.id = 0;
				this.planestudio.nombre = "";
				this.planestudio.nombre_corto = "";
				this.planestudio.estatus = "";
			},

			hideForm() {
				this.$v.planestudio.$reset();
				this.resetFields();
				this.$refs.toastDialog.close();
				this.$refs.modalPlanestudio.close();
			},

			doSave() {
				this.validateForm();
				if( !this.$v.planestudio.$invalid ){
					if(this.planestudio.id > 0){
						this.doUpdate();
					}else if (this.planestudio.id == 0) {
						this.doCreate();
					}
				}
			},

			doCreate() {
				let me = this;
				let url = appURL + 'planestudios';

				let laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				axios.defaults.headers.common['X-CSRF-TOKEN'] = laravelToken;

				axios.post(url, this.planestudio)
				.then( (response) => {
					if(!response.data.result){
						me.configToast.type = "error";
						me.configToast.message = response.data.message;
						// me.$refs.toastDialog.open();
					}else{
						me.configToast.type = "success";
						me.configToast.message = "Plan de estudio agregado correctamente";

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
					this.planestudio.id = data.id;
					this.planestudio.nombre = data.nombre;
					this.planestudio.nombre_corto = data.nombre_corto;
					this.planestudio.estatus = data.estatus;

					this.showForm(this.planestudio);
				}else if (action=='delete') {
					this.configToast.type = "info";
					this.configToast.message = "Eliminación pendiente, es necesario desarrollar módulos con FK de planestudio";
					this.$refs.toastDialog.open();
				}
			},

			doUpdate() {
				let me = this;
				let url = appURL + 'planestudios/'+this.planestudio.id;

				let laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				axios.defaults.headers.common['X-CSRF-TOKEN'] = laravelToken;

				axios.put(url, this.planestudio).
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

				this.$refs.myGrid.getPagination(0, JSON.stringify(this.planestudioSearch));
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
