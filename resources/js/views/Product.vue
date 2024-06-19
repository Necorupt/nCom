<template>
    <div class="catalog">

        <PathRender :category="$route.params.category" :subcategory="$route.params.subcategory"
            :product="$route.params.product"></PathRender>

        <div class="product__info">
            <div class="product__info-left">
                <img class="product__info-preview" :src="'/'+product.image_url">
            </div>
            <div class="product__info-right">
                <h1>{{ product.name }}</h1>
                <h1>Цена {{ product.price }}р</h1>
            </div>
        </div>
    </div>
</template>

<script setup>
import PathRender from '@/components/Catalog/PathRender.vue'
</script>

<script>
export default {

    data() {
        return {
            product: {

            }
        }
    },

    mounted() {
        axios.get('/api/product/' + this.$route.params.product + '/getBySlug').then(Response => {
            this.product = Response.data;
            console.log(this.product);
        })
    }
}
</script>

<style lang="scss" scoped>

.catalog {
    margin-top: 20vh;
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.product__info{
    display: flex;
    flex-direction: row;
    gap: 24px;
    width: calc(100% - 24px * 2);
    padding: 24px;

    &-left{
        width: 800px;
        height: 400px;
    }

    &-preview{
        width: 800px;
        height: 400px;
        object-fit: cover;
    }
}

</style>
