<template>
    <h1>
        ADMIN
    </h1>

    <a href="/Admin/categories"></a>

    <div class="categories__list">
        <a v-for="item in subcategories" :href="'/admin/subcategory/' + item.slug">
            {{ item.name }}
        </a>
    </div>

    <form action="/api/subcategory/create" method="post" @submit.prevent="send" ref="form">
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
            subcategories: [],
            category:[],
        }
    },

    mounted() {
        axios.get('/api/category/'+this.$route.params.name+'/getBySlug').then(Response => {
            this.category = Response.data;
        });

        axios.get('/api/category/'+this.$route.params.name+'/enumerateByName').then(Response => {
            this.subcategories = Response.data;
        });
    },

    methods:{
        send(){
            let formData = new FormData(this.$refs.form);
            formData.append('category_id',this.category.id);
            axios.post('/api/subcategory/create',formData).then(Response=>{
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
