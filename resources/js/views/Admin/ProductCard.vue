<template>

    <div class="admin__card" @click="">
        <img class="admin__card-preview" :src="'/' + this.image_url">
        <div class="admin__card-bottom">
            <h4>{{ this.name }}</h4>
            <h3>{{ this.price }}p</h3>
        </div>
    </div>

    <div class="form__wrapper">
        <form ref="form">
            <input name="name" placeholder="Имя товара" v-model="form.name">
            <input name="slug" placeholder="ссылка" v-model="form.slug">
            <input name="price" placeholder="price" v-model="form.price">
            <input name="description" placeholder="Описание" v-model="form.description">
            <input type="button" @click="Update" placeholder="Обновить" value="Обновить">
        </form>
    </div>

</template>

<script>

export default {
    props: {
        name: null,
        price: null,
        image_url: null,
        product_id: null,
        description: null,
        slug: null,
    },
    data() {
        return {
            form: {
                id: this.product_id,
                name: this.name,
                slug: this.slug,
                price: this.price,
                description: this.description
            }
        }
    },
    methods: {
        Update(){

            let formData = new FormData(this.$refs.form);
            formData.append('id',this.product_id);
            axios.post('/api/product/update', formData).then(Response => {
                console.log(Response);
            })

        }
    },
};

</script>

<style lang="scss" scoped>
.admin__card {
    position: relative;
    width: 200px;
    height: 300px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 24px;
    border: gray 0px solid;
    align-items: center;
    transition: all 0.2s ease-in-out;
    background-color: white;

    z-index: 4;

    &:hover {
        position: relative;
        transform: scale(1.1);
        border: gray 1px solid;
        z-index: 20px;
    }

    &-preview {
        width: auto;
        height: 220px;
        object-fit: cover;
    }

    &-bottom {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-align: center;
        width: 100%;
    }

    h3,
    h4,
    h5 {
        margin: 0;

    }
}
</style>
