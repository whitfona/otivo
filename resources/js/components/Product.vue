<template>
<!--  Image and product name are wrapped in a-tags, the other pages are not built out but they would like
  to pages showing the individual information for that product  -->
    <div class="max-w-[366px] rounded-lg shadow hover:shadow-lg overflow-hidden">
        <a href="#"><img class="w-full" :src=product.productImage alt="{{ product.productName }}"></a>
        <div class="py-8 px-4">
            <a href="#"><h2 class="font-bold text-lg pb-4">{{ product.productName }}</h2></a>
            <p class="line-clamp-4">{{ product.productDescription }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Product",
    props: {
        product: {
            productImage: String,
            productName: String,
            productDescription: String,
        },
    }
}
</script>

<style scoped>

</style>
