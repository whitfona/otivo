<template>
    <div class="p-4 max-w-[1200px] mx-auto">
        <h1 class="text-center">Welcome!</h1>
        <div class="px-2 py-4 mb-4 flex gap-8 bg-blue-600">
            <div class="flex flex-col">
                <label for="regions" class="pb-2 text-white text-xl font-light">Region</label>

                <select class="px-1 py-2 text-sm" name="locations" id="regions">
                    <option value="Sunshine Coast Region">Sunshine Coast Region</option>
                    <option value="Mackay Region">Mackay Region</option>
                    <option value="Gold Coast Region">Gold Coast Region</option>
                    <option value="Far West">Far West</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="locations" class="pb-2 text-white text-xl font-light">Location</label>

                <select class="px-1 py-2 text-sm" name="locations" id="locations" @change="onChangeLocation($event)">
                    <option value="ACT">Australian Capital Territory</option>
                    <option value="NSW">New South Wales</option>
                    <option value="NT">Northern Territory</option>
                    <option value="Tas">Tasmania</option>
                </select>
            </div>
        </div>
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
            location: ''
        }
    },
    methods: {
        getProducts() {
            axios.get('/products')
                .then(response => this.products = response.data)
                .catch(error => console.log(error));
        },
        onChangeLocation(event) {
            this.location = event.target.value
        },
        getProductsByLocation() {
            axios.get(`/products/state/${this.location}`)
                .then(response => this.products = response.data)
                .catch(error => console.log(error))
        }
    },
    mounted() {
        this.getProducts()
    },
    watch: {
        location: function() {
            this.getProductsByLocation()
        }
    }
}
</script>

<style scoped>

</style>
