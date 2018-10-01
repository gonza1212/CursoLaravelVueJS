<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="float-left">
                    <h1>Pedidos</h1>
                </div>
                <div class="float-right">
                    <div class="btn-group">
                        <a class="btn btn-info" href="/pedido" role="button">Crear Pedido</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-container">
                  <table id="mytable" class="table table-bordred table-striped">
                     <thead>
                       <th>Persona</th>
                       <th>Vianda</th>
                       <th>Solicitada</th>
                       <th>Entregada</th>
                   </thead>
                   <tbody>
                    <tr v-for="pedido in pedidos" v-if="pedidos">
                      <td>{{pedido.persona_id}}</td>
                      <td>{{pedido.vianda_id}}</td>
                      <td>{{pedido.fecha_solicitud | parseDate }}</td>
                      <td>{{pedido.fecha_entrega}}</td>
                  </tr>
                  <tr v-if="!pedidos">
                      <td colspan="8">No hay registro !!</td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</div>
</div>
</template>

<script>
export default {

    data() {
        return {
            pedidos: [],
            pageCount: 1,
            endpoint: 'api/pedidos?page='
        };
    },

    created() {
        this.fetch();
    },

    methods: {
        fetch(page = 1) {
            axios.get(this.endpoint + page)
            .then(({data}) => {
                this.pedidos = data.data;
                this.pageCount = data.meta.last_page;
            });
        },

        removePedido(id) {
            this.pedidos = _.remove(this.pedidos, function (pedido) {
                return pedido.id !== id;
            });
        }
    },

    filters: {
        parseDate: function (fecha) {
            return new Date(fecha).toDateString();
        }
    }

}
</script>