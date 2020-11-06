<template>
    <div class="container col-12">
        <div v-if="sms_contrat">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Message : </strong> {{sms_contrat}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>

        <div v-if="sms_cont">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Message : </strong> {{sms_cont}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>


        <div class="row">
            <div class="col-4">
                <h3>Vos contacts</h3>
                <div class="card mt-3 " >
                    <div class="card-body border-bottom" v-for="item in cand" :key="item.id">
                        <div class="d-flex justify-content-between">
                        <h6 class="card-title" style="color: #e30d6a">{{item['cand_name']}}</h6>
                    </div>
                    <p class="card-text m-0">{{item['cand_phone1']}}</p>
                    <p class="card-text ">{{item['cand_email']}}</p>
                    <div class="d-flex justify-content-between  m-0">
                        <div>
                            <form action="/employer/read/proposercontrat" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="_token" :value="token">
                                <input type="hidden" :value="item['link_id']" name="id">
                                <input type="hidden" :value="item['link_subcrip_code']" name="subcrip_code">
                                <input type="hidden" :value="item['link_employ_code']" name="employ_code">
                                <input type="hidden" :value="item['link_cand_code']" name="cand_code">
                                <input type="hidden" :value="item['cand_name']" name="cand_name">

                                <button type="submit" class="btn btn-link">Proposer un contract</button>
                            </form>
                        </div>
                        <div>
                            <button class="btn btn-link" v-on:click="modal_detail(item)">Voir plus</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8" v-if="tab_cand.length != 0 && voir_plus == 0">
                <h3>Liste des contacts provisoires</h3>
                <div class="card mt-3" v-for="item in tab_cand" :key="item.id">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img v-if="item['cand_photo']" :src="'/storage/'+item['cand_photo']" class="card-img" alt="photo_candidat">
                            <svg v-else viewBox="0 0 16 16" class="bi bi-person-circle card-img p-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                            </svg>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h4 class="card-title">{{item['cand_name']}}</h4>
                                <p>{{item['cand_address']}} {{item['cand_city']}} {{item['cand_town']}} {{item['cand_country']}}</p>
                                <p class="card-text">Sexe: <small class="text-muted">{{item['cand_gender']}}</small></p>
                                <p class="card-text" v-if="item['cand_birthday']">Date de naissance: <small class="text-muted">{{item['cand_birthday']}}</small></p>
                                <p class="card-text" v-if="item['cand_birthplace']">Lieu de naissance: <small class="text-muted">{{item['cand_birthplace']}}</small></p>
                                <p class="card-text" v-if="item['cand_descrip']">Description: <small class="text-muted">{{item['cand_descrip']}}</small></p>
                                <p class="card-text" v-if="item['cand_job']">Job: <small class="text-muted">{{item['cand_job']}}</small></p>
                                <p class="card-text" v-if="item['cand_job_tasks']">Job_tasks: <small class="text-muted">{{item['cand_job_tasks']}}</small></p>
                                <p class="card-text" v-if="item['cand_job_time']">Job_time: <small class="text-muted">{{item['cand_job_time']}}</small></p>
                                <p class="card-text" v-if="item['cand_diploma']">Diplome: <small class="text-muted">{{item['cand_diploma']}}</small></p>
                                <p class="card-text" v-if="item['cand_job_time']">Salaire: <small class="text-muted">{{item['cand_salary']}}</small></p>
                                <p class="card-text" v-if="item['cand_available']">Handicap: <small class="text-muted">{{item['cand_available']}}</small></p>
                                <form action="/employer/read/candidate/voircontact" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" name="_token" :value="token">
                                    <input type="hidden" name="id" :value="item['provlinks_id']">
                                    <input type="hidden" name="code" :value="item['cand_code']">
                                    <input type="hidden" :value="item['cand_name']" name="cand_name">

                                    <button type="submit" class="btn btn-primary">Voir le contact</button>
                                </form>
                                <a class="btn btn-primary mt-3" :href="'/employer/delete/contact/'+item['provlinks_id']">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-8" v-if="tab_cand.length == 0 || voir_plus == 1">
                <div class="d-flex flex-row bd-highlight ">
                    <div class=" bd-highlight" v-if="tab_cand.length != 0 && voir_plus == 0">
                        <button class="btn btn-link" style="color:black;" v-on:click="preview">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z"/>
                            </svg>
                        </button>
                    </div>
                    <div class=" bd-highlight">
                        <h3>Détails sur le candidat {{tab_details['cand_name']}}</h3>
                    </div>

                </div>


                <div class="card mt-3" >
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img v-if="tab_details['cand_photo']" :src="'/storage/'+tab_details['cand_photo']" class="card-img" alt="photo_candidat">
                            <svg v-else viewBox="0 0 16 16" class="bi bi-person-circle card-img p-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                            </svg>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h4 class="card-title">{{tab_details['cand_name']}}</h4>
                                <p>{{tab_details['cand_address']}} {{tab_details['cand_city']}} {{tab_details['cand_town']}} {{tab_details['cand_country']}}</p>
                                <p class="card-text">Sexe: <small class="text-muted">{{tab_details['cand_gender']}}</small></p>
                                <p class="card-text" v-if="tab_details['cand_birthday']">Date de naissance: <small class="text-muted">{{tab_details['cand_birthday']}}</small></p>
                                <p class="card-text" v-if="tab_details['cand_birthplace']">Lieu de naissance: <small class="text-muted">{{tab_details['cand_birthplace']}}</small></p>
                                <p class="card-text" v-if="tab_details['cand_descrip']">Description: <small class="text-muted">{{tab_details['cand_descrip']}}</small></p>
                                <p class="card-text" v-if="tab_details['cand_job']">Job: <small class="text-muted">{{tab_details['cand_job']}}</small></p>
                                <p class="card-text" v-if="tab_details['cand_job_tasks']">Job_tasks: <small class="text-muted">{{tab_details['cand_job_tasks']}}</small></p>
                                <p class="card-text" v-if="tab_details['cand_job_time']">Job_time: <small class="text-muted">{{tab_details['cand_job_time']}}</small></p>
                                <p class="card-text" v-if="tab_details['cand_diploma']">Diplome: <small class="text-muted">{{tab_details['cand_diploma']}}</small></p>
                                <p class="card-text" v-if="tab_details['cand_job_time']">Salaire: <small class="text-muted">{{tab_details['cand_salary']}}</small></p>
                                <p class="card-text" v-if="tab_details['cand_available']">Handicap: <small class="text-muted">{{tab_details['cand_available']}}</small></p>

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
    props:['cand','token','tab_cand','sms_contrat','sms_cont'],
    data(){
        return{
            tab_details:[],
            voir_plus:0
        }
    },
    mounted(){
        this.voir_plus = 0;
        if(this.tab_cand.length == 0){
            this.modal_detail(this.cand[0])
        }
    },
    methods:{
        modal_detail(detail){
            this.tab_details = detail;
            this.voir_plus = 1;
        },
        preview(){
            this.voir_plus = 0;
        }
    }
}
</script>
