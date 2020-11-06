<template>
    <div class="container">
        <div v-if="message">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Message !</strong> {{message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>

        <div>
            <form action="/employer/read/candidate/search" enctype="multipart/form-data" method="POST" class="my-3 col-12">
                <input type="hidden" name="_token" :value="token">
                <div class="row">
                    <div class="form-group mb-0 col-3">
                        <select name="job" class="form-control">
                            <option value="" selected>Choisir le métier ...</option>
                            <option v-for="item in metier" :key="item.id" :value="item['job_name']">{{item['job_name']}}</option>
                        </select>
                    </div>
                    <div class="form-group mb-0 col-2">
                        <input type="text" name="salaire" class="form-control" placeholder="Entrez salaire maximun..">
                        <!-- <select v-model="sal"  class="form-control">
                            <option value="">Choisir l'interval salariale...</option>
                            <option v-for="item in salaire" :key="item.id" :value="item">{{item}}</option>
                        </select> -->
                        <!-- <input type="text" name="salaire" placeholder="Tranche salariale" class="form-control"> -->
                    </div>
                    <div class="form-group mb-0 col-2">
                        <select name="ville" class="form-control">
                            <option value="" selected>Choisir une ville</option>
                            <option v-for="item in ville" :key="item.id" :value="item">{{item}}</option>
                        </select>

                    </div>

                    <div class="form-group mb-0 col-2">
                        <button class="btn btn-primary">Rechercher</button>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-12">
            <div class="row">
                <div class="col-3 mb-3" v-for="item in tab_cand" :key="item.id">
                    <div class="card cand_card">
                        <div class="banner">
                            <img v-if="item['cand_photo']" :src="'/storage/'+ item['cand_photo']" class="img" alt="photo_candidat">
                            <svg v-else  viewBox="0 0 16 16" class="bi bi-person-circle img" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                            </svg>
                        </div>
                        <h4 class="name">{{item['cand_name']}}</h4>
                        <div class="title">{{item['cand_town']}}, {{item['cand_city']}}</div>
                        <div class="actions">
                            <div class="follow-info">
                                <p>
                                    <span >Métier :</span>
                                    <span style="font-weight: 600; font-size:15px" v-if="item['cand_job']">{{item['cand_job']}}</span>
                                    <span style="font-weight: 600; font-size:15px" v-else>Néant</span>
                                </p>
                                <p>
                                    <span>Salaire :</span>
                                    <span style="font-weight: 600; font-size:15px" v-if="item['cand_salary']">{{item['cand_salary']}} F.CFA </span>
                                    <span style="font-weight: 600; font-size:15px" v-else> Non précisé</span>
                                </p>
                            </div>
                            <div class="follow-btn">
                                <button type="button" v-on:click="modal_func(item)" class="btn btn-primary btn_plus" data-toggle="modal" data-target="#staticBackdrop">
                                    Voir plus
                                </button>
                                <!-- <a :href="'/employer/read/candidate/seemore/'+item['cand_code']" class="btn btn-primary btn_plus">Voir plus</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{tab_detail['cand_name']}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <div class="card " >
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img v-if="tab_detail['cand_photo']" :src="'/storage/'+tab_detail['cand_photo']" class="card-img" alt="photo_candidat">
                                        <svg v-else  viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                        </svg>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4 class="card-title">{{tab_detail['cand_name']}}</h4>
                                            <p>{{tab_detail['cand_address']}} {{tab_detail['cand_city']}} {{tab_detail['cand_town']}} {{tab_detail['cand_country']}}</p>
                                            <p class="card-text">Sexe: <small class="text-muted">{{tab_detail['cand_gender']}}</small></p>
                                            <p class="card-text" v-if="tab_detail['cand_birthday']">Date de naissance: <small class="text-muted">{{tab_detail['cand_birthday']}}</small></p>
                                            <p v-else>Date de naissance: <small class="text-muted">Indéfini</small></p>
                                            <p class="card-text" v-if="tab_detail['cand_birthplace']">Lieu de naissance: <small class="text-muted">{{tab_detail['cand_birthplace']}}</small></p>
                                            <p class="card-text" v-if="tab_detail['cand_descrip']">Description: <small class="text-muted">{{tab_detail['cand_descrip']}}</small></p>
                                            <p class="card-text" v-if="tab_detail['cand_job']">Job: <small class="text-muted">{{tab_detail['cand_job']}}</small></p>
                                            <p class="card-text" v-if="tab_detail['cand_job_tasks']">Job_tasks: <small class="text-muted">{{tab_detail['cand_job_tasks']}}</small></p>
                                            <p class="card-text" v-if="tab_detail['cand_job_time']">Job_time: <small class="text-muted">{{tab_detail['cand_job_time']}}</small></p>
                                            <p class="card-text" v-if="tab_detail['cand_diploma']">Diplome: <small class="text-muted">{{tab_detail['cand_diploma']}}</small></p>
                                            <p class="card-text" v-if="tab_detail['cand_job_time']">Salaire: <small class="text-muted">{{tab_detail['cand_salary']}}</small></p>
                                            <p class="card-text">Handicap: <small class="text-muted">{{tab_detail['cand_available']}}</small></p>
                                            <form action="/employer/read/candidate/interresse" enctype="multipart/form-data" method="POST">
                                                <input type="hidden" name="_token" :value="token" >
                                                <input type="hidden" name="code" :value="tab_detail['cand_code']">
                                                <button class="btn btn-primary mt-2">Ajouter à ma liste provisoire</button>
                                            </form>
                                            <!-- <form action="/employer/read/candidate" enctype="multipart/form-data" method="GET">
                                                <button class="btn btn-primary mt-2">Fermer</button>
                                            </form> -->
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            tab_detail:[],
            job:null,
            sal:null,
            val_ville:null,
            tab_cand:[]
        }

    },
    props:['metier','candidat','salaire','ville','token','message','tab_search'],
    mounted(){
        if(!this.tab_search ){
            this.tab_cand = this.candidat;
        }
        if(this.tab_search ){
             this.tab_cand = this.tab_search;
        }

    },
    methods:{
        modal_func(data){
            this.tab_detail = data;

        },


    }
}
</script>
