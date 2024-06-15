<template>
    <h1>
        ADMIN
    </h1>

    <a href="/Admin/categories"></a>

    <div class="categories__list">
        <a v-for="item in products" :href="'/admin/category/' + item.slug">
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
            products: [],
            subcategory:[],
        }
    },

    mounted() {
        axios.get('/api/subcategory/'+this.$route.params.name+'/getBySlug').then(Response => {
            this.subcategory = Response.data;
        });

        axios.get('/api/subcategory/'+this.$route.params.name+'/enumerate').then(Response => {
            this.products = Response.data;
        });
    },

    methods:{
        send(){
            let formData = new FormData(this.$refs.form);
            formData.append('subcategory_id',this.subcategory.id);
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
