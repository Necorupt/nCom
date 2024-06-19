<template>
    <div class="catalog">

        <h1>{{Info.name}}</h1>
        <PathRender :category="$route.params.category" :subcategory="$route.params.subcategory"
            :product="$route.params.product"></PathRender>

        <div class="categories__list">
            <div v-for="item in catalogItems" class="category__item">
                <img :src='"/" + item.image_url'>
                <a :href="'/catalog/' + $route.params.category + '/' + $route.params.subcategory + '/' + item.slug">{{
                    item.name }}</a>
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
            catalogItems: [],
            Info:{
                name: null,
            },
        }
    },

    mounted() {
        axios.get('/api/subcategory/' + this.$route.params.subcategory + '/enumerate').then(Response => {
            this.catalogItems = Response.data;
        });

        axios.get('/api/subcategory/' + this.$route.params.subcategory + '/getBySlug').then(Response => {
            this.Info = Response.data;
        });
    }
}
</script>

<style lang="scss" scoped>
.catalog {

    margin-top: 20vh;
    padding: 48px;

    .categories__list {
        display: flex;
        flex-direction: row;
        gap: 30px;
    }

    .category__item {
        width: 200px;
        height: 300px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 24px;
        border: gray 1px solid;
    }
}
</style>
