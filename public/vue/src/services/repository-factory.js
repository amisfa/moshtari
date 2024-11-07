import AuthService from './auth-service'
import UserService from "./user-service.js";

let repositories = {
    ...AuthService,
    ...UserService
}
export default repositories
