<template>
    <h1>
        ADMIN
    </h1>

    <a href="/Admin/categories">Категории</a>

    <!--<form action="/logout" method="post" @submit.prevent="logout" ref="form">
        <input name="logout" type="submit" >
    </form>
-->
</template>

<script>
export default {
    methods:{
        logout(){
            let formData = new FormData(this.$refs.form);
            axios.post('/logout').then(() => { location.href = '/';});
        }
    }
};
</script>

<style lang="scss" scoped>
h1 {
    margin-top: 20vh;
}
</style>
