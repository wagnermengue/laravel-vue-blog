<template>
    <div>
        <a v-if="criar" v-bind:href="criar">Criar</a>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th v-for="titulo in titulos">{{titulo}}</th>
                <th v-if="detalhe || editar || deletar">Ação</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in itens">
                <td v-for="i in item">{{i}}</td>
                <td v-if="detalhe || editar || deletar">|
                    <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                    <a v-if="editar" v-bind:href="editar">Editar |</a>
                    <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post" style="display: inline">
                        <input type="hidden" name="_method" value="DELETE"/>
                        <input type="hidden" name="_token" v-bind:value="token"/>
                        <a v-if="deletar" v-on:click="executaForm(index)">Apagar</a> |
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token'],
        methods: {
            executaForm: function(index){
                document.getElementById(index).submit();
            }
        }
    }
</script>
