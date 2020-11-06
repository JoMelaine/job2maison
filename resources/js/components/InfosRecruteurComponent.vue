<template>
<div class="col-12">

    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Identité</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Contacts</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Informations Professionnelles</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
            </div>
        </div>
    </div>
</div>
    <!-- <div   style="margin-left: 30px; margin-right:30px; background: white">

        <div class="col-12 p-3">
            <div class="row infos">
                <div class="col-4 infos-item" >
                    <div class="image-upload  ">
                        <label  for="file-input" >
                            <img :src="'/storage/'+infos['employ_photo']"  class="img" alt="photo_profil">
                        </label>

                        <input id="file-input" v-on:change="photo_updated" type="file" />
                    </div>

                    <h2>
                        <input class="input_update_item  py-3"   v-model="infos['employ_name']"  @blur="infosupdated('employ_name')"  type="text"  >
                    </h2>
                    <h6 class="py-2">
                        <select class="input_update_item" v-model="infos['employ_city']" v-on:change="infosupdated('employ_city')">
                            <option :value="infos['employ_city']" selected>{{infos['employ_city']}}</option>
                            <option value="Adjame" >Adjame</option>
                            <option value="Cocody" >Cocody</option>
                        </select>
                        <select class="input_update_item" v-model="infos['employ_town']" v-on:change="infosupdated('employ_town')">
                            <option :value="infos['employ_town']" selected>{{infos['employ_town']}}</option>
                            <option value="Abidjan" >Abidjan</option>
                            <option value="Yamoussoukro" >Yamoussoukro</option>
                        </select>
                        <select class="input_update_item" v-model="infos['employ_country']" v-on:change="infosupdated('employ_country')">
                            <option :value="infos['employ_country']" selected>{{infos['employ_country']}}</option>
                            <option value="Benin" >Benin</option>
                            <option value="Togo" >Togo</option>
                        </select>
                    </h6>
                    <p class="py-2">
                        <input class="input_update_item"  v-model="pwd" placeholder="Modifier le mot de passe" type="text"  >
                    </p>
                    <p class="py-2">
                        <select name="" id="" class="input_update_item" v-model="infos['employ_gender']" v-on:change="infosupdated('employ_gender')">
                            <option :value="infos['employ_gender']">{{infos['employ_gender']}}</option>
                            <option  v-for="value in tab_genre" :key="value.id">{{value}}</option>
                        </select>
                        <select name="" id="" class="input_update_item" v-model="infos['employ_marital_status']" v-on:change="infosupdated('employ_marital_status')">
                            <option :value="infos['employ_marital_status']">{{infos['employ_marital_status']}}</option>
                            <option  v-for="value in marital_status" :key="value.id">{{value}}</option>
                        </select>
                    </p>
                </div>
                <div class="col-8">

                    <h2 class="infos_item_h2" >Informations professionnelles</h2>
                    <div class="infos_item_h2_div d-flex bd-highlight">
                        <div class="p-2 flex-fill bd-highlight">Profession</div>
                        <div class="p-2 flex-fill bd-highlight">
                            <input class="input_update"  v-model="infos['employ_job']"  @blur="infosupdated('employ_job')"  type="text">
                        </div>
                    </div>
                    <div class=" d-flex bd-highlight">
                        <div class="p-2 flex-fill bd-highlight">Entreprise</div>
                        <div class="p-2 flex-fill bd-highlight">
                            <input class="input_update"  v-model="infos['employ_job_place']"  @blur="infosupdated('employ_job_place')"  type="text">
                        </div>
                    </div>

                    <h2 class="infos_item_h2" >Contacts</h2>
                    <div class="infos_item_h2_div d-flex bd-highlight">
                        <div class="p-2 flex-fill bd-highlight">Téléphone 1 </div>
                        <div class="p-2 flex-fill bd-highlight">
                            <input class="input_update"  v-model="infos['employ_phone1']"  @blur="infosupdated('employ_phone1')"  type="text">
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-fill bd-highlight">Téléphone 2 </div>
                        <div class="p-2 flex-fill bd-highlight">
                            <input class="input_update"  v-model="infos['employ_phone2']"  @blur="infosupdated('employ_phone2')"  type="text"  >
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-fill bd-highlight">WhatsApp</div>
                        <div class="p-2 flex-fill bd-highlight">
                            <input class="input_update"  v-model="infos['employ_wapp']"  @blur="infosupdated('employ_wapp')"  type="text"  >
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-fill bd-highlight">Email</div>
                        <div class="p-2 flex-fill bd-highlight">
                            <input class="input_update"  v-model="infos['employ_email']"  @blur="infosupdated('employ_email')"  type="text"  >
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div> -->

</template>


<script>
    export default {
        props:['infos','tab_genre','marital_status'],
        data(){
            return{

            }
        },
        mounted() {

        },
        methods:{
            async infosupdated(name){
                const { data } = await window.axios.post('/employer/updatedinfos',{
                    name:name,
                    val: this.infos[name]
                });


            },

           async  photo_updated(event){

               let dat = new FormData();
                dat.append('file', event.target.files[0]);

               const { data } = await window.axios.post('/candidat/updatephoto',{
                   photo : data
               })

            }


        }
    }
</script>
