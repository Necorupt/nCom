<template>
    <Header></Header>
    <router-view></router-view>
    <Footer></Footer>
</template>

<script setup>

import Header from '@/components/Header.vue';
import Footer from './components/Footer.vue';

</script>

<style>

body{
    padding: 0;
    margin: 0;
    background-color: #f6f8f9;
}

</style>
