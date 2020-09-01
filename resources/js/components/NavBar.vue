
<template>
    <div class="container-fluid bg-light border border-left-0 border-right-0 border-top-0 border-bottom">
        <b-navbar toggleable="lg" class="container vh-10"
                  type="light"
                  variant="light">
            <b-navbar-brand href="#"><img height="50px" src="/images/logo01.png"></b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                    <b-nav-item-dropdown right>
                        <!-- Using 'button-content' slot -->
                        <template v-slot:button-content>
                            <em sty>LOJA</em>
                        </template>
                        <b-dropdown-item href="?loja=1">Loja 1</b-dropdown-item>
                        <b-dropdown-item href="?loja=2">Loja 2</b-dropdown-item>
                        <b-dropdown-item href="?loja=3">Loja 3</b-dropdown-item>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>
<script>
    export default {}
</script>
<style scoped>
    .vh-10 {
        height: 10vh;
    }
</style>
