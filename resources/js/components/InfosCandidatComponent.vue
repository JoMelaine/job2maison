<template>
    <div style="margin-left: 30px; margin-right:30px; background: white">
        <div class="col-12 p-3">
            <div class="row infos">
                <div class="col-4 infos-item" >
                    <div class="image-upload  ">
                        <label  for="file-input" >
                            <img :src="'/storage/'+infos['cand_photo']"  class="card-img"  alt="photo_profil">
                        </label>

                        <input id="file-input"  type="file" />
                    </div>

                    <h2>
                        <input class="input_update_item  py-3"   v-model="infos['cand_name']"  @blur="infosupdated('cand_name')"  type="text"  >
                    </h2>

                    <h6 class="py-2">
                        <select class="input_update_item" v-model="infos['cand_city']" v-on:change="infosupdated('cand_city')">
                            <option :value="infos['cand_city']" selected>{{infos['cand_city']}}</option>
                            <option value="Adjame" >Adjame</option>
                            <option value="Cocody" >Cocody</option>
                        </select>
                        <select class="input_update_item" v-model="infos['cand_town']" v-on:change="infosupdated('cand_town')">
                            <option :value="infos['cand_town']" selected>{{infos['cand_town']}}</option>
                            <option value="Abidjan" >Abidjan</option>
                            <option value="Yamoussoukro" >Yamoussoukro</option>
                        </select>
                        <select class="input_update_item" v-model="infos['cand_country']" v-on:change="infosupdated('cand_country')">
                            <option :value="infos['cand_country']" selected>{{infos['cand_country']}}</option>
                            <option value="Benin" >Benin</option>
                            <option value="Togo" >Togo</option>
                        </select>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <!--
                        <div class="card-img-overlay">
                            <div class="card-label">

                                <div class="button-wrapper">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-camera" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M15 12V6a1 1 0 0 0-1-1h-1.172a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 9.173 3H6.828a1 1 0 0 0-.707.293l-.828.828A3 3 0 0 1 3.172 5H2a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                                        <path fill-rule="evenodd" d="M8 11a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        <path d="M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                    </svg>
                                    <input type="file" name="upload" v-on:change="image($event)"  id="upload" class="upload-box" >
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                                Informations personnelles
                        </div>
                        <div class="card-body">
                        <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight">Genre </div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <select name="" id="" class="input_update" v-model="infos['cand_gender']" v-on:change="infosupdated('cand_gender')">
                                                <option :value="infos['cand_gender']">{{infos['cand_gender']}}</option>
                                                <option  v-for="value in tab_genre" :key="value.id">{{value}}</option>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight">Date de naissance </div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="date"  class="input_update" v-model="infos['cand_birthday']" @blur="infosupdated('cand_birthday')">
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> Lieu de naissance</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                </div>




                            </div>
                </div>

                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <input class="input_update"  v-model="infos['cand_name']"  @blur="infosupdated('employ_name')"  type="text"  >
                            </h5>
                            <p style="font-weight: 700;">Mot de passe : </p>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="title-p-blue mt-2">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                                <div class="card-header">
                                       Qualification professionnelle
                                </div>
                                <div class="card-body">
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight">Job </div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <select name="" id="" class="input_update" v-model="infos['cand_gender']" v-on:change="infosupdated('cand_gender')">
                                                <option :value="infos['cand_gender']">{{infos['cand_gender']}}</option>
                                                <option  v-for="value in tab_genre" :key="value.id">{{value}}</option>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight">Tasks </div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="date"  class="input_update" v-model="infos['cand_birthday']" @blur="infosupdated('cand_birthday')">
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> Horaire</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> Place</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> Diplome</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> School</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> Salaire</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> Annees d'experience</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                </div>




                    </div>

                </div>
                <div class="col-3">
                    <div class="card ">
                                <div class="card-header">
                                       Infos sur le tuteur
                                </div>
                                <div class="card-body">
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight">Job </div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <select name="" id="" class="input_update" v-model="infos['cand_gender']" v-on:change="infosupdated('cand_gender')">
                                                <option :value="infos['cand_gender']">{{infos['cand_gender']}}</option>
                                                <option  v-for="value in tab_genre" :key="value.id">{{value}}</option>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight">Tasks </div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="date"  class="input_update" v-model="infos['cand_birthday']" @blur="infosupdated('cand_birthday')">
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> Horaire</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> Place</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> Diplome</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> School</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> Salaire</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-fill bd-highlight"> Annees d'experience</div>
                                        <div class="p-2 flex-fill bd-highlight">
                                            <input type="text" v-model="infos['cand_birthplace']" @blur="infosupdated('cand_birthplace')"  class="input_update" >
                                        </div>
                                    </div>
                                </div>




                    </div>
                </div>
            </div>
        </div>


    </div> -->
</template>

<script>
export default {
    props:['infos','m_photo','tab_genre'],
    data(){
        return{

        }
    },
    methods:{
         async infosupdated(name){
             console.log(this.infos[name]);
                const { data } = await window.axios.post('/candidate/updated',{
                    name:name,
                    val: this.infos[name]
                });


            },

           async image(event){
                const { data } = await window.axios.post('/candidate/updated/photo',{
                    cand_photo: event.target.files[0]['name']
                });

                console.log(event.target.files[0]['name'])
            }

    }
}
</script>

<style>

</style>
