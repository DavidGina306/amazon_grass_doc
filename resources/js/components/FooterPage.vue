<template>
         <footer class="fixarRodape text-center">
            <small>&copy; 2020 CAA - Comércio Amazonense de Alumínio </small>
            <img height="40px" :src="image">
        </footer>
</template>

<script>
export default {
    props: {
    image: {
      type: String,
      required: true,
    }
  },
}
</script>
