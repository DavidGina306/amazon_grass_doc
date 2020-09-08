<template>
  <div
    class="container-fluid bg-info border border-left-0 border-right-0 border-top-0 border-bottom"
  >
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#">
        <img height="40px" src="/images/logo01.png" />
      </b-navbar-brand>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-item-dropdown right>
            <!-- Using 'button-content' slot -->
            <template v-slot:button-content>
              <i class="fas fa-user"></i>
              <em style="color: white;">
                <b>{{ " "+userFormated.nome }}</b>
              </em>
            </template>
            <b-dropdown-item href="#" v-on:click.prevent="confirm($event)">Sair</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      userFormated: null,
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
              this.logout();
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
  created() {
    this.userFormated = JSON.parse(this.user);
    console.log(this.userFormated);
  },
  methods: {
    confirm(event) {
      this.$toast.question("Você realmente deseja sair ?", "Atençao!", this.question);
    },
    logout() {
      axios.post("/logout").then(({ data }) => {
        console.log(data);
        window.location.href = "/login";
      }).catch((error) => {
        window.location.href = "/login";
      });
    },
  },
  filters: {},
};
</script>
<style scoped>
</style>
