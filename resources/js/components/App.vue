<template>
    <h1 class="text-center">Welcome!</h1>
    {{products}}
</template>

<script>
import Product from "./Product.vue";
export default {
    name: "App",
    components: {Product},
    data() {
        return {
            products: [],
        }
    },
    methods: {
        getProducts() {
            axios.get('/products')
                .then(response => this.products = response.data)
                .catch(error => console.log(error));
        }
    },
    mounted() {
        this.getProducts()
    }
}
</script>

<style scoped>

</style>
