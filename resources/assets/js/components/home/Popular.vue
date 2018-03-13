<template>
    <el-row class="news">
        Popular 1
        <el-row class="title"> 最受欢迎TOP3 </el-row>
        <el-row class="content">
            <el-col :span="9" class="number">
                <el-row>
                    单品TOP3

                </el-row>
                <el-row class="single">
                    <el-table :data="singleData" style="width: 100%" :show-header="false">
                        <el-table-column prop="dish" label="菜品">
                        </el-table-column>
                        <el-table-column prop="money" label="价格" width="70">
                        </el-table-column>
                        <el-table-column prop="count" label="数量" width="70">
                        </el-table-column>
                    </el-table>

                </el-row>
            </el-col>
            <el-col :span="15">
                <el-row>
                    套餐TOP3
                </el-row>
                <el-row class="multiple">
                    <el-table :data="multipleData" style="width: 100%" :show-header="false">
                        <el-table-column prop="combine" label="菜品">
                        </el-table-column>
                        <el-table-column prop="money" label="价格" width="70">
                        </el-table-column>
                        <el-table-column prop="count" label="数量" width="70">
                        </el-table-column>
                    </el-table>
                </el-row>
            </el-col>

        </el-row>

    </el-row>


</template>

<style scoped>
    .news {
        border: solid 1px #e6e6e6;
        border-radius: 20px;
    }

    .title {
        margin: -10px auto 0;
        text-align: center;
        border: solid 1px #20a0ff;
        border-radius: 20px;
        background-color: #20a0ff;
        width: 30%;
        color: #FFFFFF;
        font-size: 18px;
        margin-bottom: 2%;
    }

    .single {
        margin-left: 2%;
        margin-right: 2%;

    }

    .number {
        border-right: solid 1px #e6e6e6;

    }

    .el-table td, .el-table th.is-leaf {
        border-bottom: 0px solid #e6ebf5 !important;
    }

    .multiple {
        margin-left: 2%;

        margin-right: 2%;

    }

    .content {
        margin-bottom: 2%;
    }


</style>

<script>

    export default {
        mounted() {

            axios.get('/api/home/singlePopular')
                .then(response => {
                    console.log(response);
                    for (let i = 0; i < _.size(response.data); i++) {
                        response.data[i].money = '￥' + response.data[i].money;
                        response.data[i].count = response.data[i].count + '份';

                    }
                    this.singleData = response.data;


                })
                .catch(function (error) {
                    console.log(error);
                });

            axios.get('/api/home/multiplePopular')
                .then(response => {
                    for (let i = 0; i < _.size(response.data); i++) {
                        response.data[i].money = '￥' + response.data[i].money;
                        response.data[i].count = response.data[i].count + '份';

                    }
                    this.multipleData = response.data;


                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        data() {
            return {
                singleData: [],
                multipleData: [],
            };
        },


    }
</script>