<template>
    <div>
        <div class="form-inline">
            <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
            <modal-link v-if="criar && modal" tipo="button" nome="adicionar" titulo="Criar"></modal-link>
            <div class="form-group pull-right">
                <input type="search" placeholder="Buscar" class="form-control" v-model="buscar"/>
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
                    <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                    <modal-link v-if="criar && modal" v-bind:item="item" v-bind:url="detalhe" tipo="link" nome="detalhe" titulo="Detalhe |"></modal-link>

                    <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                    <modal-link v-if="criar && modal" v-bind:item="item" v-bind:url="editar" tipo="link" nome="editar" titulo="Editar |"></modal-link>

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
        props: ['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'ordem', 'ordemcol', 'modal'],
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
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol] ) { return 1;}
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol] ) { return -1;}
                        return 0;
                    });
                }else{
                    this.itens.sort(function(a,b){
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol] ) { return 1;}
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol] ) { return -1;}
                        return 0;
                    });
                }

                if(this.buscar) {
                    return this.itens.filter(res => {
                        var arr = Object.values(res);
                        for (let k = 0; k < arr.length; k++) {
                            if ((arr[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0) {
                                return true;
                            }
                        }
                        return false;
                    });
                }
                return this.itens;
            }
        }
    }
</script>
