<template>
    <div v-if="isError">
        <h1 class="text-center text-red-600 text-xl pt-6">Sorry, there was an error getting the products, please try again.</h1>
    </div>
    <div v-else class="p-4 max-w-[1200px] mx-auto">
        <div class="px-2 py-4 mb-4 sm:flex gap-8 bg-blue-600">
            <div class="flex flex-col">
                <label for="regions" class="pb-2 text-white text-xl font-light">Region</label>
                <select class="px-1 py-2 text-sm" name="regions" id="regions" @change="onChangeRegion($event)">
                    <option value="-1" selected>All Regions</option>
                    <option v-for="region in regions" :value="region.regionID">
                        {{ region.name }}
                    </option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="locations" class="pb-2 text-white text-xl font-light">Location</label>
                <select class="px-1 py-2 text-sm" name="locations" id="locations" @change="onChangeLocation($event)">
                    <option value="-1" selected>All Locations</option>
                    <option v-for="location in locations" :value="location.Code">
                        {{ location.Name }}
                    </option>
                </select>
            </div>
        </div>

        <div v-if="isLoading">
            <h1 class="text-center text-xl pt-6">Loading...</h1>
        </div>
        <div v-else class="flex flex-wrap gap-6 justify-center">
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
            locations: [],
            regions: [],
            location: '',
            region: '',
            isLoading: true,
            isError: false,
        }
    },
    methods: {
        getProducts() {
            axios.get('/products')
                .then(response => {
                    this.products = response.data
                    this.isLoading = false
                })
                .catch(error => {
                    this.isError = true
                    console.log(error)
                })
        },
        getLocations() {
            axios.get('/locations')
                // This was sorted on the backend but is not showing sorted in the UI, I don't want to sort it again
                // on the front end, not sure on the best approach of sorting on the backend or frontend
                .then(response => this.locations = response.data)
                .catch(error => {
                    this.isError = true
                    console.log(error)
                })
        },
        getRegions() {
            axios.get('/regions')
                // This was sorted on the backend but is not showing sorted in the UI, I don't want to sort it again
                // on the front end, not sure on the best approach of sorting on the backend or frontend
                .then(response => this.regions = response.data)
                .catch(error => {
                    this.isError = true
                    console.log(error)
                })
        },
        onChangeLocation(event) {
            this.location = event.target.value
        },
        onChangeRegion(event) {
            this.region = event.target.value
        },
        getProductsByLocation() {
            this.isLoading = true
            axios.get(`/products/state/${this.location}`)
                .then(response => {
                    this.products = response.data
                    this.isLoading = false
                })
                .catch(error => {
                    this.isError = true
                    console.log(error)
                })
        },
        getProductsByRegion() {
            this.isLoading = true
            axios.get(`/products/region/${this.region}`)
                .then(response => {
                    this.products = response.data
                    this.isLoading = false
                })
                .catch(error => {
                    this.isError = true
                    console.log(error)
                })
        }
    },
    mounted() {
        this.getProducts()
        this.getLocations()
        this.getRegions()
    },
    watch: {
        location: function() {
            this.location === '-1' ? this.getProducts() : this.getProductsByLocation()
        },
        region: function() {
            this.region === '-1' ? this.getProducts() : this.getProductsByRegion()
        }
    }
}
</script>
