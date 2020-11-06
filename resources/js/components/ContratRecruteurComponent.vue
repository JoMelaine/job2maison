<template>
    <div  class="container col-12">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <div class="card mt-3 ">
                    <div v-for="item in data" :key="item.id" class="card-body border-bottom">
                        <h5 class="card-title" style="color: #e30d6a">{{item['cand_name']}}</h5>
                        <p class="card-text m-0">{{item['cand_phone1']}}</p>
                        <p class="card-text mb-3">{{item['cand_email']}}</p>
                        <div class="d-flex justify-content-between">

                            <div class="pt-4">
                                <button class="btn btn-link" v-on:click="voir_plus(item)">Voir plus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>

    </div>
</template>

<script>
export default {
    props:['data'],
    data(){
        return{
            tab_details:[]
        }
    },
    methods:{
        voir_plus(data){
            this.tab_details = data;
        }
    }
}
</script>

<style>

</style>
