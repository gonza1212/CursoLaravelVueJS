<template>
	<div>
		<div class="alert alert-success" v-if="saved">
			<strong>Success!</strong> Your Pedido has been saved successfully.
		</div>

		<div class="well well-sm" id="vianda-form">
			<form class="form-horizontal" method="post" @submit.prevent="onSubmit">
				<div class="form-group">
					<label>Persona</label>
					<!-- <input type="text" v-model="pedido.persona_id" class="form-control input-sm" placeholder="Nombre de la vianda"> -->
					<select v-model="pedido.persona_id" class="form-control input-sm">
						<option v-for="persona in personas" v-if="personas" v-bind:value="persona.id">{{persona.nombre}} {{persona.apellido}}</option>
                    </select>
				</div>
				<div class="form-group">
					<label>Vianda</label>
                    <select v-model="pedido.vianda_id" class="form-control input-sm">
						<option v-for="vianda in viandas" v-if="viandas" v-bind:value="vianda.id">{{vianda.nombre}} - (${{vianda.precio}})</option>
                    </select>
				</div>
				<div class="form-group">
					<label>Fecha</label>
					<input type="date" v-model="pedido.fecha_solicitud" class="form-control input-sm">
					<input type="hidden" v-model="pedido.fecha_entrega" class="form-control input-sm" value="null">
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
			personas: [],
			viandas: [],
			pedido: {
				persona_id: null,
				vianda_id: null,
				fecha_solicitud: new Date(),
				fecha_entrega: null,
			}
		};
	},

	created() {
		this.fetch();
	},

	methods: {
		fetch(page = 1) {
            axios.get('api/personas?page=')
            .then(({data}) => {
                this.personas = data.data;
                this.pageCount = data.meta.last_page;
			});
			axios.get('api/viandas?page=')
            .then(({data}) => {
                this.viandas = data.data;
                this.pageCount = data.meta.last_page;
            });
        },

		onSubmit() {
			this.saved = false;
			axios.post('api/pedidos', this.pedido)
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
			this.pedido = {persona_id: null, vianda_id: null, fecha_solicitud: new Date(), fecha_entrega: null};
		}
	},

	filters: {
        ponerFecha: function () {
            return new Date();
        }
    }
}
</script>