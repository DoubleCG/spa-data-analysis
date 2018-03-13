<template>
    <el-row class="news">
        popularTop5
        <el-row class="title"> 最受欢迎TOP5 </el-row>
        <el-row>
            <el-col :span="10" class="leftPart">
                <div class="subTitle">单品TOP5</div>

                    <el-col :span="8" :offset="1">
                        <div v-for="(food, index) in foodData" :key="food.foodname" v-if="index<5">
                            {{ food.foodname }}
                        </div>
                    </el-col>
                    <el-col :span="7">
                        <div v-for="(food, index) in foodData" :key="food.foodname" v-if="index<5">
                            ￥{{ food.price }}
                        </div>
                    </el-col>
                    <el-col :span="8">
                        <div v-for="(food, index) in foodData" :key="food.foodname" v-if="index<5">
                            {{ food.count }}份
                        </div>
                    </el-col>


            </el-col>


            <el-col :span="14">
                <div class="subTitle">套餐TOP5</div>

                    <el-col :span="10" :offset="1">
                        <div v-for="(food, index) in packageData" :key="food.package" v-if="index<5">
                            {{ food.package }}
                        </div>
                    </el-col>
                    <el-col :span="6">
                        <div v-for="(food, index) in packageData" :key="food.package" v-if="index<5">
                            ￥{{ food.price }}
                        </div>
                    </el-col>
                    <el-col :span="4">
                        <div v-for="(food, index) in packageData" :key="food.package" v-if="index<5">
                            ￥{{ food.sales }}
                        </div>
                    </el-col>
                    <el-col :span="3">
                        <div v-for="(food, index) in packageData" :key="food.package" v-if="index<5">
                            {{ food.count }}份
                        </div>
                    </el-col>

            </el-col>
        </el-row>


    </el-row>


</template>

<style scoped>
    .news {
        border: solid 1px #e6e6e6;
        border-radius: 20px;
        margin-right: 1%;
        margin-bottom: 2%;
    }

    .title {
        margin: -10px auto 0;
        text-align: center;
        border: solid 1px #888888;
        border-radius: 20px;
        background-color: #888888;
        width: 30%;
        color: #FFFFFF;
        font-size: 18px;
        margin-bottom: 2%;
    }

    .subTitle{
        font-size: 20px;
        text-align: center;
        font-weight: bold;
        margin-bottom: 2%;
    }

    .chart {
        width: calc(100%) !important;
        height: 300px !important;
    }


    .leftPart{
        border-right-style: solid;
        border-right-width: 1px;
        margin-bottom: 2%;

    }


</style>

<script>
    export default {
        mounted() {
        },
        data() {
            return {
                foodData: [],
                packageData: []
            };
        },

        methods: {
            postData() {

                let queryData = {
                    timeStart: this.date[0],
                    timeEnd: this.date[1],
                    device: window.localStorage.getItem('device'),
                };

                axios.get('/api/sales/popularFood', {
                    params: queryData
                })
                    .then(response => {
                        this.foodData = [];
                        this.packageData = [];
                        this.foodData = response.data;
                    }).catch(function (error) {
                    console.log(error);
                });


                axios.get('/api/sales/popularPackage', {
                    params: queryData
                })
                    .then(response => {
                        console.log(response.data);
                        this.packageData = response.data;
                    }).catch(function (error) {
                    console.log(error);
                });



            }
        },

        watch: {
            date: function () {
                this.postData();
            }
        },


        props: {
            'date': {
                required: false
            }
        },


    }
</script>