<template>
    <div>
        <div class="form-inline">
            <a v-if="criar" v-bind:href="criar">Criar</a>
            <div class="form-group pull-right">
                <input type="search" placeholder="Buscar" class="form-control" v-model="buscar"/>{{buscar}}
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos">{{titulo}}</th>
                <th v-if="detalhe || editar || deletar">Ação</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in lista">
                <td v-for="i in item">{{i}}</td>
                <td v-if="detalhe || editar || deletar">|
                    <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                    <a v-if="editar" v-bind:href="editar">Editar |</a>
                    <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post" style="display: inline">
                        <input type="hidden" name="_method" value="DELETE"/>
                        <input type="hidden" name="_token" v-bind:value="token"/>
                        <a style="cursor:pointer" v-if="deletar" v-on:click="executaForm(index)">Apagar</a> |
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'ordem', 'ordemcol'],
        data: function () {
            return {
                buscar : '',
                ordemAux: this.ordem || 'asc',
                ordemColAux: this.ordemcol || 0
            }
        },
        methods: {
            executaForm: function(index){
                document.getElementById(index).submit();
            },
            ordenaColuna: function(coluna){
                this.ordemColAux = coluna;
                if(this.ordemAux.toLowerCase() == 'asc'){
                    this.ordemAux = 'desc';
                }else{
                    this.ordemAux = 'asc';
                }
            }
        },
        computed: {
            lista: function(){

                let ordem = this.ordemAux;
                let ordemCol = this.ordemColAux;

                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == 'asc'){
                    this.itens.sort(function(a,b){
                        if(a[ordemCol] > b[ordemCol]){return 1};
                        if(a[ordemCol] < b[ordemCol]){return -1};
                        return 0;
                    });
                }else{
                    this.itens.sort(function(a,b){
                        if(a[ordemCol] < b[ordemCol]){return 1};
                        if(a[ordemCol] > b[ordemCol]){return -1};
                        return 0;
                    });
                }


                return this.itens.filter(res => {
                    for(let k = 0; k < res.length; k++){
                        if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                            return true;
                        }
                    }
                    return false;
                });
                return this.itens;
            }
        }
    }
</script>
