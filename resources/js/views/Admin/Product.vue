<template>
    <h1>
        ADMIN
    </h1>

    <a href="/Admin/categories"></a>

    <div class="categories__list">
        <a v-for="item in categories" :href="'/admin/category/' + item.slug">
            {{ item.name }}
        </a>
    </div>

    <form action="/api/product/create" method="post" @submit.prevent="send" ref="form">
        <input name="name" placeholder="Имя">
        <input name="slug" placeholder="Ссылка">
        <input name="submit" type="submit" >
    </form>


</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            categories: []
        }
    },

    mounted() {
        axios.get('/api/category/enumerate').then(Response => {
            this.categories = Response.data;
        })
    },

    methods:{
        send(){
            let formData = new FormData(this.$refs.form);
            axios.post('/api/product/create',formData).then(Response=>{
                console.log(Response);
            })
        }
    }
}
</script>
<style lang="scss" scoped>
h1 {
    margin-top: 20vh;
}

.categories {
    &__list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
}
</style>
