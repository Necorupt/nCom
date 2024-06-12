<template>
    <div class="catalog">


        <PathRender :category="$route.params.category" :subcategory="$route.params.subcategory"
            :product="$route.params.product"></PathRender>

            <h1>{{product.name}}</h1>
    </div>
</template>

<script setup>
import PathRender from '@/components/Catalog/PathRender.vue'
</script>

<script>
export default {

    data() {
        return {
            product:{

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
}
</style>
