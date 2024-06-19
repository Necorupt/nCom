<template>

    <div class="admin__subcategory">

        <h1>
            {{ subcategory.name }}
        </h1>

        <a href="/Admin/categories"></a>

        <div class="categories__list">
            <ProductCard v-for="item in products" :name="item.name" :slug="item.slug" :image_url="item.image_url"
                :price="item.price" :product_id="item.id">
            </ProductCard>
        </div>


        <form action="/api/product/create" method="post" @submit.prevent="send" ref="form">
            <input name="name" placeholder="Имя">
            <input name="slug" placeholder="Ссылка">
            <input name="image" type="file" placeholder="image">
            <input name="submit" type="submit">
        </form>

    </div>
</template>

<script setup>
import ProductCard from './ProductCard.vue';
</script>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            products: [],
            subcategory: [],
        }
    },

    mounted() {
        axios.get('/api/subcategory/' + this.$route.params.name + '/getBySlug').then(Response => {
            this.subcategory = Response.data;
        });

        axios.get('/api/subcategory/' + this.$route.params.name + '/enumerate').then(Response => {
            this.products = Response.data;
        });
    },

    methods: {
        send() {
            let formData = new FormData(this.$refs.form);
            formData.append('subcategory_id', this.subcategory.id);
            axios.post('/api/product/create', formData).then(Response => {
                console.log(Response);
            })
        }
    }
}
</script>
<style lang="scss" scoped>

.categories {
    &__list {
        display: flex;
        flex-direction: row;
        gap: 20px;
    }
}


.admin{
    &__subcategory{
        margin-top: 200px;
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 24px;
    }
}
</style>
