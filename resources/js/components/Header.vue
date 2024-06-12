<template>
    <header>
        <div class="header__top">
            <a href="" class="header__link">Доставка</a>
            <a href="" class="header__link">Контакты</a>
            <a href="" class="header__link">Шоурумы</a>
        </div>

        <div class="header__bottom">
            <img class="header__logo" src="@/resources/images/logo.svg" alt="" />
            <div class="header__navigation">
                <a v-for="item in headerItems"
                    :href="'/catalog/' + item.slug" class="header__link">{{item.name}}</a>
            </div>
            <div class="header__icons"></div>
        </div>
    </header>
</template>

<script>

import  axios  from 'axios';

export default {

    data(){
        return {
            headerItems:[]
        }
    },

    mounted(){
        axios.get('/api/category/enumerate').then(Response=>{
            this.headerItems = Response.data;
        })
    }
}

</script>

<style lang="scss" scoped>
header {
    display: flex;
    flex-direction: column;
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;

    position: -webkit-sticky;
    /* Safari */
    background-color: #ffc845;
    border-bottom: gray solid 1px;
}

.header {
    &__top {
        display: flex;
        flex-direction: row;
        gap: 20px;
        padding-left: 20px;
    }

    &__bottom {
        display: flex;
        flex-direction: row;
        gap: 20px;
        height: 56px;
        background-color: #fff;
    }

    &__logo {
        width: 100px;
        height: auto;
    }

    &__navigation {
        position: relative;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 20px;

        a {
            position: relative;
        }

        a::before {

            position: absolute;
            bottom: 0px;
            content: '';
            background-color: black;
            width: 100%;
            height: 2px;
            opacity: 0;
            transition: 0.7s all;
        }

        a:hover::before {
            opacity: 100;
            transition: 0.7s all;

        }
    }
}
</style>
