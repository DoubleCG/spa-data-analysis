import JWTToken from './../../helpers/JWT'
import { Message } from 'element-ui';

export default {
    actions:{
        logoutRequest({dispatch}){
            dispatch('setAuthUserLogout');
        }

    },
}