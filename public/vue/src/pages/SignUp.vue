<template>
    <div class="bg-black dark:bg-gray-800 h-screen overflow-hidden flex items-center justify-center">
        <div class="bg-white lg:w-6/12 md:7/12 w-8/12 shadow-3xl rounded-xl">
            <div
                class="bg-gray-800
                 shadow
                  shadow-gray-200
                   absolute left-1/2
                    transform -translate-x-1/2
                     -translate-y-1/2 rounded-full
                      p-4 md:p-8 text-white text-h2">
                <i class="mdi mdi-account"/>
            </div>
            <v-form lazy-validation v-model="valid" ref="form" class="p-12 md:p-24" @submit.prevent="submit">
                <div class="flex items-center text-lg mb-6 md:mb-8">
                    <v-text-field
                        v-model="userName"
                        :rules="rules"
                        label="User Name"
                    ></v-text-field>
                </div>
                <div class="flex items-center text-lg mb-6 md:mb-8">
                    <v-text-field
                        v-model="email"
                        :rules="rules"
                        label="Email"
                    ></v-text-field>
                </div>
                <div class="flex items-center text-lg mb-6 md:mb-8">
                    <v-text-field
                        type="password"
                        v-model="password"
                        :rules="rules"
                        label="Password"
                    ></v-text-field>
                </div>
                <v-btn
                    :disabled="!valid"
                    type="submit"
                    class="mb-4 bg-gradient-to-b from-gray-700 to-gray-900 font-medium text-white uppercase w-full rounded">
                    Register
                </v-btn>
            </v-form>
        </div>
    </div>
</template>
<script setup>
import {computed, inject, ref} from "vue";
import repositories from "../services/repository-factory.js";
import {useAppStore} from "../stores/app.js";

const $store = useAppStore();
const $router = inject('$router');
const userName = ref(null)
const email = ref(null)
const password = ref(null)
const valid = ref(false);

let rules = computed(() => {
    return [
        value => !!value || 'Required.',
        value => (value && value.length >= 3) || 'Min 3 characters',
    ]
})
const submit = async () => {
    await repositories.register({user_name: userName.value, password: password.value, email: email.value}).then((res)=>{
        $store.setUserRole(res.data.user.user.roleNames.includes('admin') ? 'admin' : 'user')
        $store.setUserToken(res.data.token)
        $router.push({name: 'dashboard'})
    })
}
</script>
