<template>
    <div class="container">
        <div class="row">
            <div v-bind:class="defineTamanho">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['tamanho'],
        computed:{
            defineTamanho: function(){
                this.tamanho = (this.tamanho || 12);
                if(this.tamanho >= 12 || this.tamanho <= 4){
                    return 'col-md-12';
                }
                if((this.tamanho % 2) != 0){
                    this.tamanho = parseInt(this.tamanho) + 1;
                    return 'col-md-'+this.tamanho+' col-md-offset-'+((12 - this.tamanho)/2);
                }
                return 'col-md-'+this.tamanho+' col-md-offset-'+((12 - this.tamanho)/2);
            }
        }
    }
</script>
