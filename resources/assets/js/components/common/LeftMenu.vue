<template>
    <el-menu class="el-menu-vertical-demo" :router="true">
        common-LeftMenu 1

        <el-menu-item index="/finance">财务管理</el-menu-item>
        <el-menu-item index="/sales">菜品销量查询</el-menu-item>
        <el-menu-item index="/client">客流情况</el-menu-item>
        <el-menu-item index="/orderDetial">订单明细</el-menu-item>
        <el-menu-item index="/orderDetial">其他设置</el-menu-item>
    </el-menu>
</template>


<style scoped>

</style>

<script>
    export default {
    }
</script>