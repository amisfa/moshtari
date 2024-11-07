<template>
    <div class="p-8 w-2/3 m-auto block">
        <v-card title="User List" flat>
            <template v-slot:text>
                <v-text-field
                    class="text-blue-darken-2"
                    v-model="search"
                    @change="changedSearch"
                    label="Search"
                    hide-details
                    single-line
                ></v-text-field>
            </template>
            <v-data-table
                :loading="loading"
                :headers="headers"
                :items="dataItems"
                :search="search">
                <template v-slot:item.actions="{ item }">
                    <v-btn icon color="green" v-on:click="activeUser(item.id)">
                        <v-icon dark>mdi-check</v-icon>
                    </v-btn>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>

<script setup>
import {onMounted, ref} from 'vue'
import repositories from "../../services/repository-factory.js";

const loading = ref(false)
const search = ref('')
const headers = ref([
    {key: 'user_name', title: 'User Name'},
    {key: 'email', title: 'email'},
    {key: 'activated_at', title: 'Activated At'},
    {key: 'actions', title: 'Actions'},
])
const dataItems = ref([])
const getData = async () => {
    loading.value = true
    dataItems.value = (await repositories.users({q: search.value})).data
    loading.value = false
}
const changedSearch = async () => {
    await getData()
}
const activeUser = async (userId) => {
    loading.value = true
    await repositories.activate(userId)
    await getData()
    loading.value = false

}

onMounted(async () => {
    await getData()
})
</script>
