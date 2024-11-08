import $axios from '../configs/axios'

const route = 'opportunities'

const OpportunityService = {
    opportunities(params) {
        return $axios.get(`${route}/`)
    },
    store(params) {
        return $axios.post(`${route}/store`, params)
    },
    update(params) {
        return $axios.post(`${route}/update`, params)
    }
}

export default OpportunityService
