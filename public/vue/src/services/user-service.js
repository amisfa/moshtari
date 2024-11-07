import $axios from '../configs/axios'

const route = 'users'

const UserService = {
    users(params) {
        return $axios.get(`${route}/`, params)
    },
    activate(userId) {
        return $axios.get(`${route}/${userId}/activate`)
    },
}

export default UserService
