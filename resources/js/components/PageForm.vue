
<template>
  <b-container class="bv-example-row">
    <div class="mt-5 mb-2">
      <b-card title="Desmembramento" sub-title="Atualização de desmembramento">
        <b-card-text>
          <!-- Some quick example text to build on the
          <em>card title</em> and make up the bulk of the card's
          content.-->
        </b-card-text>

        <b-card-text>
          <div>
            <b-form @submit="onSubmit">
              <b-form-group id="input-filial" label="Número da Filial:" label-for="id_flial">
                <b-form-select v-model="form.filial" :options="options" required></b-form-select>
              </b-form-group>
              <b-form-group id="input-pedido" label="Número do Pedido:" label-for="id_pedido">
                <b-form-input
                  id="id_pedido"
                  v-mask="'##############'"
                  v-model="form.pedido"
                  required
                  placeholder="Diginte o número do Pedido"
                ></b-form-input>
              </b-form-group>
              <b-button type="submit" variant="primary">
                <i class="fa fa-search"></i> Buscar
              </b-button>
              <b-button type="reset" variant="secondary">
                <i class="fas fa-eraser"></i> Limpar
              </b-button>
            </b-form>
            <b-card class="mt-3" header="Listagem de Pedidos">
              <div class="table-responsive mt-1 vh-65 overflow-hidden table-striped">
                <table v-if="pedidos.length > 0" class="table overflow-auto">
                  <thead>
                    <tr class="text-black-50">
                      <th class="border-0" style="width: 300px">#</th>
                      <th class="border-0">PEDIDO</th>
                      <th class="border-0">
                        <i class="fa fa-user" /> DATA
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in  pedidos" :key="index">
                      <td>
                        <b-button variant="primary" @click="confirmarDesmembramento">
                          <i class="fa fa-save" aria-hidden="true"></i> Desmembrar
                        </b-button>
                      </td>
                      <td>{{item.numped}}</td>
                      <td class>
                        <span>
                          <i class="far fa-clock" />
                          {{item.data}}
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <h4 class="text-center p-2 text-black-50" v-else>Sem Pedido</h4>
              </div>
            </b-card>
          </div>
        </b-card-text>
      </b-card>
    </div>
  </b-container>
</template>
<script>
export default {
  data() {
    return {
      form: {},
      pedidos: {},
      options: [
        { value: null, text: "Selecione a Filial" },
        { value: 1, text: "FILIAL - 1" },
        { value: 2, text: "FILIAL - 2" },
        { value: 3, text: "FILIAL - 3" },
        { value: 15, text: "FILIAL - 15" },
        { value: 16, text: "FILIAL - 16" },
      ],
      question: {
        timeout: 20000,
        close: false,
        overlay: true,
        toastOnce: true,
        id: "question",
        zindex: 999,
        position: "center",
        buttons: [
          [
            "<button><b>Sim</b></button>",
                (instance, toast) =>{
                    console.log(this);
                instance.hide({ transitionOut: "fadeOut" }, toast, "button");
                },
                true,
          ],
          [
            "<button>NO</button>",
            (instance, toast) =>{
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            },
          ],
        ],
        onClosing: (instance, toast) => {
          console.info("Closing | closedBy: ");
        },
        onClosed:(instance, toast) => {
          console.info("Closed | closedBy: ");
        },
      },
    };
  },
  methods: {
    confirmarDesmembramento() {
      this.$toast.question("Are you sure about that?", "Hey", this.question);
    },
    submmitDesemembramento() {
      axios
        .post("/desmembramento/updatePedido", this.form)
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.error(err);
        });
    },
    onSubmit(evt) {
      evt.preventDefault();
      axios
        .get(
          `/desmembramento/filial/${this.form.filial}/pedido/${this.form.pedido}`
        )
        .then(({ data }) => {
          if (Object.keys(data.data).length > 0) {
            this.pedidos = data.data;
          } else {
            console.log("veio pra ca");
            this.pedidos = [];
            this.$swal({
              title: "<strong> Atenção! </strong>",
              icon: "info",
              text: `Pedido de número ${this.form.pedido} na filial ${this.form.filial} não encontrado para desmembramento.`,
              showCloseButton: true,
              focusConfirm: false,
              confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',
              confirmButtonAriaLabel: "Ok!",
            });
          }
        })
        .catch((err) => {
          this.$swal({
            icon: "error",
            title: "Oops...",
            text: "Erro ao buscar Pedido!",
          });
        });
      setTimeout(() => {}, 2000);
    },
    onReset(evt) {
      evt.preventDefault();
      // Reset our form values
      this.form.email = "";
      this.form.name = "";
      this.form.food = null;
      this.form.checked = [];
      // Trick to reset/clear native browser form validation state
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
  },
  created() {
    this.form.filial = null;
    this.$toast.question('Are you sure about that?', 'Hey', this.question)
  },
};
</script>
<style scoped>
</style>
