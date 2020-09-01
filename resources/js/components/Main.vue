<template>
  <b-container>
    <b-row>
      <div>
        <b-card no-body class="overflow-hidden">
          <b-row no-gutters>
            <b-col md="6">
              <b-card-img
                src="https://picsum.photos/400/400/?image=20"
                alt="Image"
                class="rounded-0"
              ></b-card-img>
            </b-col>
            <b-col md="6">
              <b-card-body title="Buscar Pedidos">
                <b-form>
                  <b-form-group id="input-cod_filial" label="Código da Filial:" label-for="cod_filial">
                    <b-form-input
                      id="cod_filial"
                      v-model="form.filial"
                      required
                      placeholder="Digite o código da Filial"
                    ></b-form-input>
                  </b-form-group>
                 <b-form-group id="input-num_pedido" label="N° do Pedido:" label-for="num_pedido">
                    <b-form-input
                      id="num_pedido"
                      v-model="form.num_pedido"
                      required
                      placeholder="Digite o número do Pedido"
                    ></b-form-input>
                  </b-form-group>

                  <b-button type="submit" variant="primary">Buscar</b-button>
                  <b-button type="reset" variant="danger">Reset</b-button>
                </b-form>
              </b-card-body>
            </b-col>
          </b-row>
        </b-card>
      </div>
    </b-row>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      pedSeparacao: [],
      pedExpedicao: [],
      timePedidos: [],
      form: {}
    };
  },
  mounted() {
    console.log("aqui");
  },
  methods: {},
  filters: {},
};
</script>
<style scoped>
</style>
