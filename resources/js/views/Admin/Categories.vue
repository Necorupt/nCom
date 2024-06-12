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
</template>

<script>
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
