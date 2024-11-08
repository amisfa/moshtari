<template>
    <v-app>
        <v-main>
            <v-app>
                <v-app-bar :elevation="2"  v-if="getUsrToken">
                    <v-app-bar-nav-icon
                        @click.stop="$store.isOpenedSidebar = !$store.isOpenedSidebar">
                    </v-app-bar-nav-icon>
                </v-app-bar>
                <v-navigation-drawer temporary v-model="$store.isOpenedSidebar" width="300"  v-if="getUsrToken">
                    <v-list density="compact">
                        <router-link
                            v-for="(item, index) of menuItems"
                            :key="`menu-bar-${index}`"
                            :to="item.to" class="d-flex">
                            <v-list-item
                                :title="item.title"
                                :prepend-icon="item.icon"
                            />
                        </router-link>
                    </v-list>
                </v-navigation-drawer>
                <v-main>
                    <router-view/>
                </v-main>
            </v-app>
        </v-main>
    </v-app>
</template>

<script setup>
import {provide, computed} from "vue";
import {useRoute, useRouter} from "vue-router";
import {useAppStore} from "./stores/app.js";
import {storeToRefs} from "pinia";

const $store = useAppStore();

provide('$store', $store)
provide('$route', useRoute())
provide('$router', useRouter())

const {getUsrToken, clientRoleIsAdmin} = storeToRefs($store);

let menuItems = computed(() => {
    return [
        {
            title: 'dashboard',
            to: {name: 'dashboard'},
            icon: 'mdi-dialpad',
        },
        {
            title: 'Opportunity Management',
            to: {name: 'opportunity-management'},
            icon: 'mdi-dialpad',
        },
        ...clientRoleIsAdmin ? [{
            title: 'User Management',
            to: {name: 'user-management'},
            icon: 'mdi-dialpad',
        }
        ] : [],
    ]
})
</script>
