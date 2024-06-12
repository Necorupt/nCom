<template>
    <div class="catalog__path">
        <a class="catalog__path-link" v-for="item in pathItems" :href="item.link"> {{ item.name }} </a>
    </div>
</template>

<script>
export default {
    props: {
        category: undefined,
        subcategory: undefined,
        product: undefined,
    },
    data() {
        return {
            pathItems: [],
        };
    },
    mounted() {

        this.pathItems.push({ name: 'каталог', link: "/catalog/"});

        if (this.category != undefined)
            this.pathItems.push({ name: this.category, link: "/catalog/" + this.category });

        if (this.subcategory != undefined)
            this.pathItems.push({
                name: this.subcategory,
                link: "/catalog/"  + this.category + '/' + this.subcategory,
            });

        if (this.product != undefined)
            this.pathItems.push({
                name: this.product,
                link: "/catalog/" + this.category + "/" + this.subcategory + "/" + this.product,
            });
    },
};
</script>

<style lang="scss" scoped>
.catalog__path {
    display: flex;
    flex-direction: row;
    position: relative;

    &-link{
        position: relative;
        text-decoration: none;
        color: gray;
        font-size: 0.875rem;
        font-weight: 500;
        font: normal 0.9375rem / 1.2 Manrope, Helvetica, "Open Sans", Arial,
            sans-serif;
    }

    &-link::after{
        position: relative;
        text-decoration: none;
        color: gray;
        font-size: 0.875rem;
        font-weight: 500;
        font: normal 0.9375rem / 1.2 Manrope, Helvetica, "Open Sans", Arial,
            sans-serif;
        content: '>>'
    }

    &-link::before{

        position: absolute;
        bottom: 0px;
        content: '';
        background-color:  black;
        width: 100%;
        height: 2px;
        opacity: 0;
        transition: 0.7s all;
    }

    &-link:hover::before{
        opacity: 100;
        transition: 0.7s all;

    }
}
</style>
