<template>
    <div class="small-box">
        <div class="inner">
            <h3>150</h3>
            <p>Novos pedidos</p>
        </div>
        <div class="icon">
            <i class="fa fa-shopping-cart"></i>
            <!--<i class="ion ion-stats-bars"></i>-->
        </div>
        <a href="#" class="small-box-footer">
            Mais informações <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</template>

<script>
    export default {

    }
</script>

<style media="screen">
    .small-box{
        border-radius: 2px;
        position: relative;
        display: block;
        margin-bottom: 20px;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    }
    .small-box > .inner{
        padding: 10px;
    }
    .small-box h3, .small-box p {
        z-index: 5;
        margin: 0 0 10px 0;
    }
    .small-box h3{
        font-size: 38px;
        font-weight: bold;
        white-space: nowrap;
        padding: 0;
    }
    .small-box p{
        font-size: 15px;
    }
    .small-box .icon{
        -webkit-transition: all .3s linear;
        -o-transition: all .3s linear;
        transition: all .3s linear;
        position: absolute;
        top: -10px;
        right: 10px;
        z-index: 0;
        font-size: 90px;
        color: rgba(0,0,0,0.15);
    }
    .small-box>.small-box-footer {
        position: relative;
        text-align: center;
        padding: 3px 0;
        color: #fff;
        color: rgba(255,255,255,0.8);
        display: block;
        z-index: 10;
        background: rgba(0,0,0,0.1);
        text-decoration: none;
    }
</style>