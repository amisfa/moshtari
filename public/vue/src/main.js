import {createApp} from 'vue'
import router from './router.js'
import App from './App.vue'
import '../../css/app.css'
import {createPinia} from 'pinia'
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'
import {createVuetify} from 'vuetify'
import {useAppStore} from "./stores/app.js";

const pinia = createPinia()
const vuetify = createVuetify({
    theme: {
        defaultTheme: 'dark',
    },
})
router.beforeEach((to, from, next) => {
    const store = useAppStore();
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.getUsrToken) {
            next({name: 'home-page'})
        } else next()
    } else next()
})

const app = createApp(App)
app.use(pinia)
app.use(router)
app.use(vuetify)

app.mount('#app')
