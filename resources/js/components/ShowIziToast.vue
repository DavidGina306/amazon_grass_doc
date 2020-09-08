<template>
  <span></span>
</template>
<script>
export default {
  props: {
    mensagem: {
      type: String,
      required: true,
    },
    tipo: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      btBuscarDisabled: false,
      btDesmembrarDisabled: false,
      isLoading: false,
      info: {
        timeout: 20000,
        position: "topRight",
      },
    };
  },
  methods: {
    show(tipo) {
      switch (tipo) {
        case "info":
            this.$toast.info(
            `Erro ao alterar <b>${this.form.pedido}</b> da filial <b>${this.form.filial}</b>!`,
            "Erro",
            this.info
          );
          break;

        case "warning":
            this.$toast.warning(
                `Erro ao alterar <b>${this.form.pedido}</b> da filial <b>${this.form.filial}</b>!`,
                "Erro",
                this.info
            );
          break;

        case "success":
           this.$toast.success(
                `Erro ao alterar <b>${this.form.pedido}</b> da filial <b>${this.form.filial}</b>!`,
                "Erro",
                this.info
            );
          break;

        case "error":
          this.$toast.error(
            "Usuário ou senha essão incorretos",
            "Erro",
            this.info
          );
          break;
      }
    },
  },
  created() {
    this.show(this.tipo);
  },
};
</script>
