<template>

    <el-row class="main">
        <el-col :span="3" v-if="user.authenticated" class="leftMenu">
            <el-row>
                <logo></logo>
            </el-row>
            <el-row class="gapForLogo"></el-row>
            <el-row>
                <left-menu></left-menu>
            </el-row>

        </el-col>
        <el-col :span="21">
            <el-row>
                <top-nav></top-nav>
            </el-row>
            <el-row class="content">
                <router-view></router-view>
            </el-row>
        </el-col>
    </el-row>
</template>


<style scoped>
    .leftMenu {
        text-align: center;
    }
    .content{
        margin-top: 2%;
        margin-left: 2%;
    }
    .gapForLogo {
        min-height: 20px;
        border-right: solid 1px #e6e6e6;
    }
    .main{
        min-height: 100%;
    }
</style>

<script>
    import TopNav from './common/TopNav'
    import LeftMenu from './common/LeftMenu'
    import {mapState} from 'vuex'
    import JWTToken from './../helpers/JWT'
    // import Loading from './common/Loading'
    import Logo from './common/Logo'
    import Cookie from 'js-cookie'

    export default {
        created() {
            if (JWTToken.getToken()) {
                this.$store.dispatch('setAuthUser');
            }else if(Cookie.get('auth_id')) {
                this.$store.dispatch('refreshToken');
            }
            console.log('app load')
            LoadingImg.style.visibility = 'hidden';
        },
        mounted() {
        },
        components: {
            TopNav,
            LeftMenu,
            Logo,
            // Loading,
        },
        data() {
            return {};
        },
        computed: {
            ...mapState({
                user: state => state.AuthUser
            }),
        }

    }
</script>