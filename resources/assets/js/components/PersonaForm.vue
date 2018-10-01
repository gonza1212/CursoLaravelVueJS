<template>
	<div>
		<div class="alert alert-success" v-if="saved">
			<strong>Success!</strong> Your Persona has been saved successfully.
		</div>

		<div class="well well-sm" id="persona-form">
			<form class="form-horizontal" method="post" @submit.prevent="onSubmit">
				<div class="form-group">
					<label>Nombre</label>
					<input type="text" v-model="persona.nombre" class="form-control input-sm" placeholder="Nombre de la persona">
				</div>
				<div class="form-group">
					<label>Apellido</label>
					<textarea v-model="persona.apellido" class="form-control input-sm" placeholder="Apellido"></textarea>
				</div>
				<div class="form-group">
					<label>email</label>
					<input type="email" v-model="persona.email" class="form-control input-sm" placeholder="email de la persona">
				</div>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
</template>

<script>
export default {

	data() {
		return {
			errors: [],
			saved: false,
			persona: {
				nombre: null,
				apellido: null,
				email: null
			}
		};
	},

	methods: {
		onSubmit() {
			this.saved = false;

			axios.post('api/personas', this.persona)
			.then(({data}) => this.setSuccessMessage())
			.catch(({response}) => this.setErrors(response));
		},

		setErrors(response) {
			this.errors = response.data.errors;
		},

		setSuccessMessage() {
			this.reset();
			this.saved = true;
		},

		reset() {
			this.errors = [];
			this.persona = {nombre: null, apellido: null, email: null};
		}
	}
}
</script>