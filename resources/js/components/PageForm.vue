
<template>
  <b-container class="bv-example-row">
    <div class="mt-5 mb-2">

      <b-card
        title="Desmembramento"
        sub-title=""
      >
        <b-card-text>
          <!-- Some quick example text to build on the
          <em>card title</em> and make up the bulk of the card's
          content.-->
        </b-card-text>
         <loading
            backgroundColor="#e5dede"
            :opacity="0.3"
            :active.sync="isLoading"
            :is-full-page="false"
        ></loading>
        <b-card-text>
          <div>
            <b-form @submit="onSubmit" @reset="onReset">
              <b-form-group id="input-filial" label="Filial:" label-for="id_flial">
                <b-form-select v-model="form.filial" :options="options" required @change="mudou()"></b-form-select>
              </b-form-group>
              <b-form-group id="input-pedido" label="Pedido:" label-for="id_pedido">
                <b-form-input
                  id="id_pedido"
                  v-mask="'##############'"
                  v-model="form.pedido"
                  required
                  placeholder="Digite o número do Pedido"
                ></b-form-input>
              </b-form-group>
              <b-button :disabled="btBuscarDisabled" type="submit" variant="primary">
                <i class="fa fa-search"></i> Buscar
              </b-button>
              <b-button type="reset" variant="secondary">
                <i class="fas fa-eraser"></i> Limpar
              </b-button>
            </b-form>
            <b-card class="mt-3" header="Pedidos">
              <div class="table-responsive mt-1 vh-65 overflow-hidden table-striped">
                <table v-if="pedidos.length > 0" class="table overflow-auto">
                  <thead>
                    <tr class="text-black-50">
                      <th class="border-0" style="width: 300px">#</th>
                      <th class="border-0">PEDIDO</th>
                      <th class="border-0">
                        <i class="fas fa-calendar-alt"></i> DATA
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in  pedidos" :key="index">
                      <td>
                        <b-button
                          :disabled="btDesmembrarDisabled"
                          variant="primary"
                          @click="confirmarDesmembramento"
                        >
                          <i class="fa fa-save" aria-hidden="true"></i> Desmembrar
                        </b-button>
                      </td>
                      <td>{{item.numped}}</td>
                      <td class>
                        <span>{{formatDate(item.data)}}</span>
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
const moment = require("moment");
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";
export default {
  props: {
    user: {
      type: String,
      required: true,
    },
    urlPedido: {
        type: String,
        required: false
    }
  },
  data() {
    return {
      btBuscarDisabled: false,
      btDesmembrarDisabled: false,
      isLoading: false,
      info: {
        timeout: 20000,
        position: "center",
      },
      form: {},
      userFormated: null,
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
            (instance, toast) => {
              this.submmitDesemembramento();
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            },
            true,
          ],
          [
            "<button>Não</button>",
            (instance, toast) => {
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            },
          ],
        ],
        onClosing: (instance, toast) => {
          console.info("Closing | closedBy: ");
        },
        onClosed: (instance, toast) => {
          console.info("Closed | closedBy: ");
        },
      },
    };
  },
  methods: {
    confirmarDesmembramento() {
      let str = `Você realmente deseja desmembrar o <b>pedido ${this.form.pedido}</b> na <b>Filial ${this.form.filial}</b> ?`;
      this.$toast.question(str, "Atençao!", this.question);
    },
    submmitDesemembramento() {
      this.isLoading = true;
      this.btDesmembrarDisabled = true;
      axios
        .post("/desmembramento/updatePedido", this.form)
        .then(({ data }) => {
          this.isLoading = false;
          if ((data.data = 1)) {
            this.pedidos = [];
            this.$toast.success(
              `Pedido  <b>${this.form.pedido}</b> na Filial <b>${this.form.filial}</b> desmembrado com suceso!`,
              "Sucesso",
              this.info
            );
            this.form.filial = null;
            this.form.pedido = "";
          } else {
            this.$toast.warning(
              `Não foi possivel alterar o <b> Pedido ${this.form.pedido}</b> da <b>Filial ${this.form.filial}</b>!`,
              "Atenção",
              this.info
            );
          }
          this.btDesmembrarDisabled = false;
        })
        .catch((err) => {
          console.log(err);
          this.isLoading = false;
          this.$toast.error(
            `Erro ao alterar <b>${this.form.pedido}</b> da filial <b>${this.form.filial}</b>!`,
            "Erro",
            this.info
          );
          this.btDesmembrarDisabled = false;
        });
    },
    onSubmit(evt) {
      evt.preventDefault();
      this.isLoading = true;
      this.btBuscarDisabled = true;
      axios
        .get(
          `/desmembramento/filial/${this.form.filial}/pedido/${this.form.pedido}`
        )
        .then(({ data }) => {
          if (Object.keys(data.data).length > 0) {
            this.pedidos = data.data;
            this.isLoading = false;
            this.btBuscarDisabled = false;
          } else {
            this.pedidos = [];
            this.isLoading = false;
            this.$toast.info(
              `Pedido de número <b>${this.form.pedido}</b> na filial <b>${this.form.filial}</b> não encontrado para desmembramento.`,
              "Sem Resultado",
              this.info
            );
            this.btBuscarDisabled = false;
          }
        })
        .catch((err) => {
          this.isLoading = false;

          this.$toast.error(
            `Erro ao alterar <b>${this.form.pedido}</b> da filial <b>${this.form.filial}</b>!`,
            "Erro",
            this.info
          );
          this.btBuscarDisabled = false;
        });
      setTimeout(() => {}, 2000);
    },
    onReset(evt) {
      evt.preventDefault();
      this.form.filial = null;
      this.form.pedido = "";
      console.log(this.pedidos);
      this.pedidos = [];
    },
    formatDate(dateToFormat) {
      return moment(dateToFormat).format("DD/MM/YYYY");
    },
    mudou() {
      console.log("mudou");
    },
  },
  created() {
    this.form.filial = null;
    this.userFormated = JSON.parse(this.user);
    this.form.user = this.userFormated;
  },
};
</script>
<style scoped>
</style>
