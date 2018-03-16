<template>
    <el-row class="logoPart">
        <el-row>
            <router-link :to="'/'">
                <img class="logo" src="./logo.png" alt="">
            </router-link>
        </el-row>

        <el-row>
            戈子科技欢迎您
        </el-row>
        <el-row>
            WELCOME
        </el-row>
    </el-row>
</template>

<style scoped>
    .logo {
        width: 80%;
        position: relative;
    }

    .logoPart {
        border-right: solid 1px #e6e6e6;
    }
</style>

<script>
    export default {}
</script>