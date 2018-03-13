<template>
    <el-menu :default-active="activeIndex2" class="el-menu-demo" mode="horizontal" @select="handleSelect">
        common-TopNav 1

        <el-row type="flex" align="middle">

            <el-col :span="5" :offset="17" v-if="user.authenticated">
                <el-cascader
                        :options="options"
                        v-model="selectedOptions"
                        @change="handleChange">
                </el-cascader>

            </el-col>
            <el-col :span="2" v-if="user.authenticated">
                <el-menu-item index="3" @click="logout"  class="logout">登出</el-menu-item>
            </el-col>
        </el-row>
    </el-menu>
</template>

<style scoped>

</style>

<script>
    import {mapState} from 'vuex'
    import JWTToken from './../../helpers/JWT'

    export default {
        mounted() {
            window.localStorage.setItem('floor',this.selectedOptions[0]);
            window.localStorage.setItem('device',this.selectedOptions[1]);
        },
        data() {
            return {
                activeIndex: '1',
                activeIndex2: '1',
                options: [{
                    "value": "4",
                    "label": "4楼设备",
                    "children": [
                        {
                            "value": "300010101",
                            "label": "300010101"
                        },
                        {
                            "value": "300010102",
                            "label": "300010102"
                        }
                    ]
                },
                    {
                        "value": "5",
                        "label": "5楼设备",
                        "children": [
                            {
                                "value": "3000102",
                                "label": "全部"
                            },
                        ]
                    }],
                selectedOptions: ['4','300010101'],

            };
        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            },
            logout() {
                this.$store.dispatch('logoutRequest').then(response => {
                    this.$router.push('/login');
                })
            },
            handleChange(value) {
                console.log(this.selectedOptions);

                console.log(value);
                window.localStorage.setItem('floor',value[0]);
                window.localStorage.setItem('device',value[1]);
            }
        },
        computed: {
            ...mapState({
                user: state => state.AuthUser
            })
        }
    }
</script>