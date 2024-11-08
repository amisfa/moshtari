<template>
    <div class="p-8 w-2/3 m-auto block">
        <v-dialog v-model="createEditDialogs" max-width="700">
            <Upsert @submit="createEditDialogs = !createEditDialogs; getData"
                    @cancel="createEditDialogs = !createEditDialogs; editData = null"
                    :edit-data="editData"/>
        </v-dialog>
        <v-card title="" flat>
            <v-list-item class="px-6" height="88">
                <template v-slot:prepend>
                    <v-avatar color="surface-light" size="32">🎯</v-avatar>
                </template>
                <template v-slot:title>Opportunities</template>
                <template v-slot:append>
                    <v-btn
                        @click="createEditDialogs = !createEditDialogs"
                        class="text-none"
                        color="primary"
                        text="Create opportunity"
                        variant="text"
                        slim
                    ></v-btn>
                </template>
            </v-list-item>
            <template v-slot:text>
                <div class="flex justify-space-between">
                    <div class="px-2 w-1/2">
                        <v-text-field
                            class="text-blue-darken-2"
                            v-model="search"
                            @change="changedSearch"
                            label="Search"
                            hide-details
                            single-line
                        ></v-text-field>
                    </div>
                    <div class="px-2 w-1/2">
                        <v-select
                            v-model="filter"
                            :items="filterItems"
                            @update:modelValue="changedFilter"
                            item-title="name"
                            item-value="id"
                            label="Filter"
                        ></v-select>
                    </div>
                </div>
            </template>
            <v-data-table
                :loading="loading"
                :headers="headers"
                :items="dataItems"
                :search="search">
                <template v-slot:item.edit="{ item }">
                    <v-btn icon color="green" v-on:click="editData = {...item}; createEditDialogs = !createEditDialogs">
                        <v-icon dark>mdi-pencil</v-icon>
                    </v-btn>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>

<script setup>
import {onMounted, ref} from 'vue'
import repositories from "../../services/repository-factory.js";
import Upsert from "./Upsert.vue";

const loading = ref(false)
const search = ref('')
const filter = ref(null)

const filterItems = ref([
    {id: 'new', name: 'New'},
    {id: 'pending', name: 'Pending'},
    {id: 'won', name: 'Won'},
    {id: 'lost', name: 'Lost'},
])
const headers = ref([
    {key: 'subject', title: 'Subject'},
    {key: 'estimated_price', title: 'Estimated Price'},
    {key: 'status', title: 'Status'},
    {key: 'edit', title: 'edit'},
])
const dataItems = ref([])
let createEditDialogs = ref(false)
let editData = ref(null)
const getData = async () => {
    loading.value = true
    dataItems.value = (await repositories.opportunities({q: search.value, filter: filter.value})).data
    loading.value = false
}
const changedSearch = async () => {
    await getData()
}
let changedFilter = async () => {
    await getData()
}

onMounted(async () => {
    await getData()
})
</script>

<style>
.v-select .v-field .v-field__input > input {
    opacity: 0 !important;
}
</style>
