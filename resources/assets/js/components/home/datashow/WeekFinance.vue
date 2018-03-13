<template>
    <el-row class="news">
        WeekFinance 1
        <el-row class="title"> 周营业额数据 </el-row>
        <el-row>
            <chart :options="chartData" class="chart"></chart>
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
        width: 30%;
        color: #FFFFFF;
        font-size: 18px;
        margin-bottom: 2%;
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

            axios.get('/api/home/weekFinance')
                .then(response => {
                    for (let i = _.size(response.data) - 1; i >= 0; i--) {
                        this.date.push(response.data[i].date);
                        this.moneyData.push(response.data[i].money)
                    }

                    var colors = ['#5793f3', '#d14a61', '#675bba'];

                    this.chartData = {
                        color: colors,
                        toolbox: {
                            right: '10%',
                            feature: {
                                saveAsImage: {}
                            }
                        },
                        tooltip: {
                            trigger: 'axis',
                            axisPointer: {
                                type: 'cross'
                            }
                        },

                        xAxis: [
                            {
                                type: 'category',
                                axisTick: {
                                    alignWithLabel: true
                                },
                                axisLine: {
                                    onZero: false,
                                },
                                data: this.date,
                            },
                        ],
                        yAxis: [
                            {
                                type: 'value',
                                name: '营业额',
                                position: 'left',
                                axisLine: {
                                    lineStyle: {
                                        color: colors[0]
                                    }
                                },
                                axisLabel: {
                                    formatter: '{value} 元',
                                }
                            },
                        ],
                        series: [

                            {
                                name: '营业额',
                                type: 'line',
                                smooth: true,
                                data: this.moneyData,
                                markPoint: {
                                    data: [
                                        {
                                            coord: [6, this.moneyData[6]], name: '今日',
                                            label: {
                                                normal: {
                                                    formatter: '{b}'

                                                }
                                            }
                                        }
                                    ]
                                },
                            }
                        ]
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        data() {
            return {
                chartData: null,
                date: [],
                moneyData: [],
            };
        },


    }
</script>