import $axios from '../configs/axios'

const route = 'auth'

const AuthService = {
    login(params) {
        return $axios.post(`${route}/login`, params)
    },
    register(params) {
        return $axios.post(`${route}/register`, params)
    },
}

export default AuthService
