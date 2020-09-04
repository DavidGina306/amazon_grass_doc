<template>
  <div
    class="container-fluid bg-info border border-left-0 border-right-0 border-top-0 border-bottom"
  >
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#"><img height="40px" src="/images/logo01.png"></b-navbar-brand>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-item-dropdown right>
            <!-- Using 'button-content' slot -->
            <template v-slot:button-content>
              <em>Usuário </em>
            </template>
            <b-dropdown-item href="/logout">Sair</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>

export default {
  data() {
    return {};
  },
  mounted() {},
  methods: {},
  filters: {},
};
</script>
<style scoped>
</style>
