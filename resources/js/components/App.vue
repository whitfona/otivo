<template>
    <div class="p-4">
        <h1 class="text-center">Welcome!</h1>
        <div class="flex flex-wrap gap-6 justify-center">
            <div v-for="product in products">
                <product :product="product" />
            </div>
        </div>
    </div>
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
