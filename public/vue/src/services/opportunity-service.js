import $axios from '../configs/axios'

const route = 'opportunities'

const OpportunityService = {
    opportunities(params) {
        return $axios.get(`${route}/`, {params})
    },
    store(params) {
        return $axios.post(`${route}/store`, params)
    },
    update(params) {
        return $axios.post(`${route}/update`, params)
    },
    changeStatus(params) {
        return $axios.post(`${route}/${params.id}/change-status`, {status: params.status})
    }
}

export default OpportunityService
