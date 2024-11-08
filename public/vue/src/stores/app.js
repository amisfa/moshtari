import {defineStore} from 'pinia'

export const useAppStore = defineStore('app', {
    state: () => ({
        isOpenedSidebar: true,
        token: null,
        role: null
    }),
    getters: {
        getUsrToken(state) {
            return localStorage.getItem('user-token') || state.token
        },
        clientRoleIsAdmin(state) {
            return (localStorage.getItem('user-role') || state.role) === 'admin'
        }
    },
    actions: {
        setUserToken(token) {
            this.token = token
            localStorage.setItem('user-token', token)
        },
        setUserRole(role) {
            this.role = role
            localStorage.setItem('user-role', role)
        },
    }
})
