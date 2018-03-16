<template>
    <el-row>
        <el-row>
            <el-col :span="10" class="news">
                <news></news>
            </el-col>
            <el-col :span="14" class="popular">
                <popular></popular>
            </el-col>
        </el-row>
        <el-row class="dataShow">
            <data-show></data-show>
        </el-row>
        <el-row v-show="false" @click="gotop" class="page-component-up">
            <i @click="gotop" class="el-icon-caret-top"></i>
        </el-row>

    </el-row>
</template>

<style scoped>
    .dataShow {
        margin-top: 3%;
        text-align: -webkit-center;

    }

    .news {
        text-align: -webkit-center;

    }

    .popular {
        text-align: -webkit-center;

    }

    .page-component-up {
        background-color: #fff;
        position: fixed;
        right: 100px;
        bottom: 150px;
        width: 40px;
        height: 40px;
        border-radius: 20px;
        cursor: pointer;
        transition: .3s;
        box-shadow: 0 0 6px rgba(0, 0, 0, .12);
    }

    .el-icon-caret-top {
        color: #409eff;
        display: block;
        line-height: 40px;
        text-align: center;
        font-size: 18px;
    }
</style>

<script>
    import News from '../home/News';
    import Popular from '../home/Popular';
    import DataShow from '../home/DataShow';


    export default {
        mounted() {
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 50) {
                    $('.page-component-up').fadeIn()
                } else {
                    $('.page-component-up').fadeOut()
                }
            })
        },
        methods: {
            gotop() {
                $('body,html').animate({scrollTop: 0}, 800)
            }
        },
        components: {
            News,
            Popular,
            DataShow
        }
    }
</script>
