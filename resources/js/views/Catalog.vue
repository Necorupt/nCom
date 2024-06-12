<template>
    <div class="catalog">

        <h1>CATALOG</h1>
        <PathRender :category="$route.params.category" :subcategory="$route.params.subcategory"
            :product="$route.params.product"></PathRender>

        <a v-for="item in catalogItems" :href="'/catalog/' + $route.params.category + '/' + item.slug">
            {{ item.name }}
        </a>
    </div>
</template>

<script setup>
import PathRender from '@/components/Catalog/PathRender.vue'
</script>

<script>
export default {

    data() {
        return {
            catalogItems: []
        }
    },

    mounted() {
        axios.get('/api/category/' + this.$route.params.category + '/enumerateByName').then(Response => {
            this.catalogItems = Response.data;
        })
    }
}
</script>

<style lang="scss" scoped>
.catalog {

    margin-top: 20vh;
}
</style>
