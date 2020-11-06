<template>
    <div>

                <div class="col-sm-12">
                    <div class="row bande_stat" >
                        <div class="col-4 text-center p-3" style="border: 1px solid #eee">
                            <p class="bande_stat_p">1000+</p>
                            <p class="bande_stat_p_item" >Candidats enregistrés</p>
                        </div>
                        <div class="col-4 text-center p-3" style="border: 1px solid #eee">
                            <p class="bande_stat_p">500</p>
                            <p class="bande_stat_p_item" >Emplois crées</p>
                        </div>
                        <div class="col-4 text-center p-3" style="border: 1px solid #eee">
                            <p class="bande_stat_p">100</p>
                            <p class="bande_stat_p_item">Offres d'emploi publiées</p>
                        </div>
                    </div>
                </div>


                <div v-if="tab_search && tab_search.length != 0">
                    <div class="swiper-container">
                        <h1 class="text-center" style="color:#20123a; font-weight: bold; padding-top:30px">Resultats de la recherche... </h1>
                        <p class="text-center" style="color:#20123a; padding-botton:30px">{{job}} <span v-if="villes">, {{villes}}</span> <span v-if="salaire"> , {{salaire}}</span></p>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"   v-for="item in tab_search" :key="item.id">
                                <div class="card" style="width: 18rem;">
                                    <img v-if="item['cand_photo']" width="300px" height="250px" :src="'/storage/'+ item['cand_photo']" class="card-img-top p-3" alt="...">
                                    <svg v-else  viewBox="0 0 16 16" style="width:300px; height:250px" class="bi bi-person-circle p-3 " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                    </svg>
                                    <div class="card-body">
                                        <h4 class="name " style=" color:#e30d6a">{{item['cand_name']}}</h4>
                                        <div style="color::#e30d6a; font-size:13px">{{item['cand_town']}}, {{item['cand_city']}}</div>
                                        <p>
                                            <span style="font-weight: 600; font-size:15px;" v-if="item['cand_job']">{{item['cand_job']}}</span>
                                            <span style="font-weight: 600; font-size:15px;" v-else>Néant</span>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div v-if="tab_search.length > 3" class="swiper-button-next " ></div>
                        <div v-if="tab_search.length > 3" class="swiper-button-prev "></div>

                    </div>

                </div>
                <div v-else>
                    <div class="swiper-container">
                        <h1 class="text-center" style="color:#20123a; font-weight: bold; padding:30px">Candidats à la une</h1>

                        <div class="swiper-wrapper">
                            <div class="swiper-slide"   v-for="item in cand" :key="item.id">
                                <div class="card" style="width: 18rem;">
                                    <img v-if="item['cand_photo']" width="300px" height="250px" :src="'/storage/'+ item['cand_photo']" class="card-img-top p-3" alt="...">
                                    <svg v-else  viewBox="0 0 16 16" style="width:300px; height:250px" class="bi bi-person-circle p-3 " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                    </svg>
                                    <div class="card-body">
                                        <h4 class="name " style=" width: 100%;  white-space: nowrap;  color:#e30d6a; overflow: hidden; text-overflow: ellipsis;">{{item['cand_name']}}</h4>
                                        <div style="font-size:13px; width: 100%;  white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{item['cand_town']}}, {{item['cand_city']}}</div>
                                        <p>
                                            <span style="font-weight: 600; font-size:15px; width: 100%;  white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" v-if="item['cand_job']">{{item['cand_job']}}</span>
                                            <span style="font-weight: 600; font-size:13px; font-weight: normal;" v-else>Non défini</span>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="swiper-button-next " ></div>
                        <div class="swiper-button-prev "></div>

                    </div>
                </div>
                <div class="col-sm-12 p-5" style="height:350px">
                    <div class="row">
                        <div class="col-4 footer" >
                            <h4 class="text-center " >Qui Sommes-Nous ?</h4>
                            <div style="text-align: justify;">
                                JOB de MAISON est la Plateforme d'emploi dédiée au recrutement de votre Personnel de Maison et autres métiers affiliés.
                                Elle se propose comme une alternative aux agences de recrutement,
                                avec des solutions de recrutement plus rapide,
                                efficace et économique par la mise en relation directe avec les Candidats.
                                <p style="font-size: 12px;">
                                    <br>Enregistré en Cote d'Ivoire au RCCM CI-TDI-2020-A-552
                                    <br>N° Compte Contribuable 2043791T
                                </p>
                            </div>
                        </div>
                        <div class="col-4 footer text-center " >
                            <h4 class="text-center ">Contacts</h4>
                            <p>Service commercial<b><br>+225 08 89 11 98<br>+225 03 14 03 14<br>info@job2maison.com</b></p>
                            <p>Support technique<br><b>support@job2maison.com</b></p>
                        </div>
                        <div class="col-4 footer" >
                            <h4 class="text-center ">Suivez nous sur ...</h4>
                            <div class="text-center">
                                <img src="images/facebook.png?3a3d42054e4fd4c6bd687ddb43a771e0" class="mr-sm-2" width="40px" height="40px" alt="">
                                <img src="images/whatsapp.png?66d7ecbf4da35eb12c91fb65ef454b73" class="mr-sm-2" width="40px" height="40px" alt="">
                            </div>
                            <div class="col-sm-12 py-4">
                                <br>
                                <h5  style="color:#e30d6a;" >Newsletter</h5>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Entrez votre email">
                                    </div>
                                    <button class="btn btn-primary col-sm-3 btn-inscrit" >S'inscrire</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-sm-12" style="background:#20123a">
                    <div class="p-3 text-center">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="/cgu" style="color:white">Conditions Générales d’Utilisation</a>
                            </div>
                            <div class="col-sm-4">
                                <a href="/cgu#termes" style="color:white">Termes de confidentialité</a>
                            </div>
                            <div class="col-sm-4">
                                <a href="/faq" style="color:white"> Foire Aux Questions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</template>

<script>

    import 'swiper/swiper-bundle.css';
    import Swiper, { Navigation, Pagination } from 'swiper';

    Swiper.use([Navigation, Pagination]);

export default {
    data(){
        return{
            tab_cand: []
        }
    },

    props: ['data','ville','cand','token','tab_search','job','salaire','villes'],
    mounted(){


        new Swiper('.swiper-container', {
            slidesPerView: 4,
            spaceBetween: 30,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            mousewheel: true,
            keyboard: true,
        });
    }

}
</script>

<style>

    .swiper-container {
      width: 100%;
      height: 100%;
      background: white;
      padding: 15px;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

</style>
