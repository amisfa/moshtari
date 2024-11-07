<template>
    <v-app>
        <v-main>
            <default-layout>
                <router-view/>
            </default-layout>
        </v-main>
    </v-app>
</template>

<script setup>
import {provide} from "vue";
import {useAppStore} from "./stores/app.js";
import {useRoute, useRouter} from "vue-router";
import DefaultLayout from "./layouts/defaultLayout.vue";

const $store = useAppStore()
provide('$store', $store)
provide('$route', useRoute())
provide('$router', useRouter())

</script>
