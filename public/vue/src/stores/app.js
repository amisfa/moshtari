import {defineStore} from 'pinia'

export const useAppStore = defineStore('app', {
    state: () => ({
        isOpenedSidebar: true
    }),
    getters: {
        getUsrToken() {
            return localStorage.getItem('user-token')
        },
        clientRoleIsAdmin() {
            return localStorage.getItem('user-role') == 'admin'
        }
    },
    actions: {
        setUserToken(token) {
            localStorage.setItem('user-token', token)
        },
        setUserRole(role) {
            localStorage.setItem('user-role', role)
        },
    }
})
