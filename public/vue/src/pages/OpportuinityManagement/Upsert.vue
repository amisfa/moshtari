<template>
    <div class="bg-white shadow-3xl rounded-xl p-8">
        <div class="font-weight-bold text-h6">
            {{ opportunityData.id ? 'Edit' : 'Create' }} Opportunity
        </div>
        <v-form lazy-validation v-model="valid" ref="form" @submit.prevent="submit">
            <div class="flex items-center text-lg mb-6 md:mb-8">
                <v-text-field
                    v-model="opportunityData.subject"
                    :rules="rules"
                    label="Subject"
                ></v-text-field>
            </div>
            <div class="flex items-center text-lg mb-6 md:mb-8">
                <v-text-field
                    type="number"
                    v-model="opportunityData.estimated_price"
                    :rules="rules"
                    label="Price"
                ></v-text-field>
            </div>
            <v-btn
                :loading="loading"
                :disabled="!valid"
                :type="submit"
                class="mb-4 bg-gradient-to-b from-gray-700 to-gray-900 font-medium text-white uppercase w-full rounded">
                {{ opportunityData.id ? 'Edit' : 'Create' }}
            </v-btn>
            <v-btn
                @click="resetOpportunityData();$emit('cancel')"
                class="mb-4 bg-gradient-to-b from-gray-700 to-gray-900 font-medium text-white uppercase w-full rounded">
                Cancel
            </v-btn>
        </v-form>
    </div>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import repositories from "../../services/repository-factory.js";

const emit = defineEmits(['submit'])

const props = defineProps(['editData'])

const userName = ref(null)
const email = ref(null)
const password = ref(null)
const valid = ref(false);
const loading = ref(false)
const opportunityData = ref({
    subject: null,
    estimated_price: null
})

let rules = computed(() => {
    return [
        value => !!value || 'Required.',
        value => (value && value.length >= 3) || 'Min 3 characters',
    ]
})

const resetOpportunityData = () => {
    opportunityData.value = {
        subject: null,
        estimated_price: null
    }
}
const submit = async () => {
    loading.value = true
    if (opportunityData.value.id) {
        await repositories.update({...opportunityData.value})
    } else await repositories.store({...opportunityData.value})
    resetOpportunityData()
    emit('submit')
    loading.value = false
}

onMounted(() => {
    if (props.editData) opportunityData.value = {...props.editData}
})
</script>
