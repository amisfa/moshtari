import axios from 'axios'
import {useAppStore} from "../stores/app.js";

const $axios = axios.create({
    baseURL: import.meta.env.VITE_SERVER,
    headers: {
        Accept: 'application/json',
    },
    timeout: 20000,
})

$axios.interceptors.request.use(config => {
    const store = useAppStore();
    const token = store.getUsrToken;
    if (token) {
        config.headers.Authorization = 'Bearer ' + token;
    }
    return config;
}, error => {
    return Promise.reject(error);
});

export default $axios
