import AuthService from './auth-service'
import UserService from "./user-service.js";
import OpportunityService from "./opportunity-service.js";

let repositories = {
    ...AuthService,
    ...UserService,
    ...OpportunityService
}
export default repositories
