<template>
    <el-row class="news">
        <br>
        <el-row class="title"  @click.native="go">
            财务概览
        </el-row>
        <el-row class="content">
            <el-col :span="5" class="number">
                <el-row class="orderNumberRow">
                    <el-row class="numTitle">
                        订单数量
                    </el-row>
                    <el-row>
                        总量 <span class="OrderNumber"> {{ OrderNumber }} </span> 件
                    </el-row>
                </el-row>
                <el-row>
                    <el-row class="numTitle">
                        营业额
                    </el-row>
                    <el-row>
                        总计 <span class="TotalMoney">{{ TotalMoney }}</span> 元
                    </el-row>
                </el-row>

            </el-col>
            <el-col :span="19">
                <chart :options="chartData" class="chart"></chart>
            </el-col>

        </el-row>

    </el-row>


</template>

<style scoped>
    .news {
        border: solid 1px #e6e6e6;
        border-radius: 20px;
        margin-left: 1%;
    }

    .title {
        margin: -10px auto 0;
        text-align: center;
        border: solid 1px #888888;
        border-radius: 20px;
        background-color: #888888;
        width: 20%;
        color: #FFFFFF;
        font-size: 18px;
        margin-bottom: 2%;
    }

    .number {
        border-right: solid 1px #e6e6e6;

    }

    .numTitle {
        text-align: left;
        margin-left: 10%;
        font-size: 18px;
        font-weight: bold;
    }

    .content {
        margin-bottom: 2%;
    }

    .orderNumberRow {
        margin-bottom: 10%;
    }

    .OrderNumber {
        font-weight: bold;
        font-size: 17px;
    }

    .TotalMoney {
        font-weight: bold;
        color: #20a0ff;
        font-size: 17px;
    }

    .chart {
        width: calc(100%) !important;
        height: 300px !important;
    }
</style>

<script>
    import echarts from 'echarts'

    export default {
        mounted() {

            axios.get('/api/home/moneyOverView')
                .then(response => {
                    this.OrderNumber = response.data.TodayData[0].count;
                    this.TotalMoney = _.round(response.data.TodayData[0].money);

                    this.data1.push(response.data.TodayData[0].count);
                    this.data1.push(response.data.LastWeekData[0].count);


                    this.data2.push(response.data.TodayData[0].money);
                    this.data2.push(response.data.LastWeekData[0].money);

                    var colors = ['#5793f3', '#d14a61', '#675bba'];


                    this.chartData = {
                        color: colors,

                        tooltip: {
                            trigger: 'axis',
                            axisPointer: {
                                type: 'cross'
                            }
                        },

                        legend: {
                            data: ['订单数量', '营业额']
                        },
                        xAxis: [
                            {
                                type: 'category',
                                axisTick: {
                                    alignWithLabel: true
                                },
                                data: ['今日', '上周同期']
                            }
                        ],
                        yAxis: [
                            {
                                type: 'value',
                                name: '订单数量',
                                position: 'left',
                                axisLine: {
                                    lineStyle: {
                                        color: colors[0]
                                    }
                                },
                                axisLabel: {
                                    formatter: '{value} 件',
                                    show: false,
                                }
                            },
                            {
                                type: 'value',
                                name: '营业额',
                                position: 'right',
                                axisLine: {
                                    lineStyle: {
                                        color: colors[1]
                                    }
                                },
                                axisLabel: {
                                    formatter: '{value} 元',
                                    show: false,
                                }
                            },

                        ],
                        series: [
                            {
                                name: '订单数量',
                                type: 'bar',
                                yAxisIndex: 0,
                                data: this.data1
                            },
                            {
                                name: '营业额',
                                type: 'bar',
                                yAxisIndex: 1,
                                data: this.data2
                            },

                        ]
                    }


                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        methods :{
            go(){
                this.$router.push('/finance');
            }
        },
        data() {
            return {
                OrderNumber: null,
                TotalMoney: null,
                data1: [],
                data2: [],
                chartData: null,
            };
        },


    }
</script>