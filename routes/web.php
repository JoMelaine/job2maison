<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('auth.content.login');
});

//--Inscription
Route::get('/inscription', function () {
    return view('auth.content.inscription');
});
Route::post('/register/new', [App\Http\Controllers\RegisterController::class,'CreatAccount'])->name('created_Account');

//--Mot de passe oublie

Route::get('/mot_de_passe_oublie', function(){
    return view('auth.content.password');
});
Route::post('/resetpassword',[App\Http\Controllers\AuthController::class,'resetpassword'])->name('resetpassword');
Route::post('/auth/login', [App\Http\Controllers\AuthController::class ,'AuthenticateUser'])->name('connexion');
//-- Deconnexion
Route::get('/deconnexion',[App\Http\Controllers\AuthController::class,'power']);


//--Récupération des informations du candidat               OK

/*
Route::get('/employer/showinfo', [App\Http\Controllers\EmployerController::class,'ReadEmployerInfos']);
Route::get('/employer/updated', [App\Http\Controllers\EmployerController::class,'PageUpdateEmployerInfos'])->name('PageUpdateEmployerInfos');

//--Mise à jour des informations du compte candidat          OK
Route::post('/employer/update/infos', [App\Http\Controllers\EmployerController::class,'UpdateEmployerInfos'])->name('Update_Employer_Infos');
Route::post('/employer/updatedinfos', [App\Http\Controllers\EmployerController::class,'UpdateEmployer']);

//--Lister les informations sur un candidats
Route::get('/employer/read/candidate',[App\Http\Controllers\CandidatEmployerController::class,'ReadCandidate'])->name('read_candidate');
Route::post('/employer/read/candidate/search',[App\Http\Controllers\CandidatEmployerController::class,'SearchCandidate'])->name('search');
Route::post('/search',[App\Http\Controllers\HomeController::class,'Search'])->name('searchhome');
Route::get('/employer/read/candidate/seemore/{code}',[App\Http\Controllers\CandidatEmployerController::class,'SeeMore'])->name('see_more');

Route::get('/employer/delete/contact/{id}',[App\Http\Controllers\EmployerController::class,'DeleteEmployLink']);


//--contact
Route::get('/employer/read/contact',[App\Http\Controllers\ContactEmployerController::class,'Contacts']);
Route::post('/employer/read/candidate/voircontact',[App\Http\Controllers\ContactEmployerController::class,'VoirContact'])->name('voir_contact');
Route::post('/employer/read/candidate/interresse',[App\Http\Controllers\ContactEmployerController::class,'ActiveContrat'])->name('active_contrat');
Route::post('/employer/read/candidate/delete',[App\Http\Controllers\ContactEmployerController::class,'DeleteContact'])->name('delete_contact');

//--contract
Route::get('/employer/read/contrat',[App\Http\Controllers\ContratEmployerController::class,'IndexContrats']);
Route::post('/employer/read/proposercontrat',[App\Http\Controllers\ContratEmployerController::class,'ProposerContrat'])->name('proposer_contract');
 */
/*
//--Mise à jour des informations du compte candidat          OK
Route::post('/candidate/update/infos', [App\Http\Controllers\CandidateController::class,'UpdateCandidateInfos'])->name('update_infoCandidat');
Route::post('/candidate/updated/photo', [App\Http\Controllers\CandidateController::class,'Register_photo']);
Route::get('/candidate/contract',[App\Http\Controllers\ContratCandidatController::class, 'index']);
Route::get('/candidate/notification',[App\Http\Controllers\NotifCandidatController::class, 'index']);
//--Récupération des informations du candidat
Route::get('/candidate/showinfo', [App\Http\Controllers\CandidateController::class,'ReadCandidateInfos']);
Route::post('/candidate/updated', [App\Http\Controllers\CandidateController::class,'UpdatedCandidate']);
Route::get('/candidate/modification', [App\Http\Controllers\CandidateController::class,'PageUpdateCandidateInfos'])->name('modification_btn');
Route::post('/candidat/updatephoto', [App\Http\Controllers\EmployerController::class, 'UpdatephotoEmployer']);
*/
Route::middleware(['CandidateSession'])->prefix('candidate')->group(function() {

    //--Mise à jour des informations du compte candidat          OK


    Route::post('/update/infos', [App\Http\Controllers\CandidateController::class,'UpdateCandidateInfos'])->name('update_infoCandidat');
    Route::post('/updated/photo', [App\Http\Controllers\CandidateController::class,'Register_photo']);
    Route::get('/contract',[App\Http\Controllers\ContratCandidatController::class, 'index']);
    Route::get('/notification',[App\Http\Controllers\NotifCandidatController::class, 'index']);
    //--Récupération des informations du candidat
    Route::get('/showinfo', [App\Http\Controllers\CandidateController::class,'ReadCandidateInfos']);
    Route::post('/updated', [App\Http\Controllers\CandidateController::class,'UpdatedCandidate']);
    Route::get('/modification', [App\Http\Controllers\CandidateController::class,'PageUpdateCandidateInfos'])->name('modification_btn');
    Route::post('/updatephoto', [App\Http\Controllers\EmployerController::class, 'UpdatephotoEmployer']);

});



Route::middleware(['EmployerSession'])->group(function() {

    Route::get('/employer/showinfo/identite', [App\Http\Controllers\EmployerController::class,'Identite']);
    Route::get('/employer/showinfo/infopro', [App\Http\Controllers\EmployerController::class,'InfosProEmployer']);
    Route::get('/employer/showinfo/contact', [App\Http\Controllers\EmployerController::class,'ContactsEmployer']);

    Route::get('/employer/showinfo', [App\Http\Controllers\EmployerController::class,'ReadEmployerInfos']);
    Route::get('/employer/updated', [App\Http\Controllers\EmployerController::class,'PageUpdateEmployerInfos'])->name('PageUpdateEmployerInfos');

    //--Mise à jour des informations du compte candidat          OK
    Route::post('/employer/update/infos', [App\Http\Controllers\EmployerController::class,'UpdateEmployerInfos'])->name('Update_Employer_Infos');
    Route::post('/employer/updatedinfos', [App\Http\Controllers\EmployerController::class,'UpdateEmployer']);

    //--Lister les informations sur un candidats
    Route::get('/employer/read/candidate',[App\Http\Controllers\CandidatEmployerController::class,'ReadCandidate'])->name('read_candidate');
    Route::post('/employer/read/candidate/search',[App\Http\Controllers\CandidatEmployerController::class,'SearchCandidate'])->name('search');
    Route::post('/search',[App\Http\Controllers\HomeController::class,'Search'])->name('searchhome');
    Route::get('/employer/read/candidate/seemore/{code}',[App\Http\Controllers\CandidatEmployerController::class,'SeeMore'])->name('see_more');

    Route::get('/employer/delete/contact/{id}',[App\Http\Controllers\EmployerController::class,'DeleteEmployLink']);


    //--contact
    Route::get('/employer/read/contact',[App\Http\Controllers\ContactEmployerController::class,'Contacts']);
    Route::post('/employer/read/candidate/voircontact',[App\Http\Controllers\ContactEmployerController::class,'VoirContact'])->name('voir_contact');
    Route::post('/employer/read/candidate/interresse',[App\Http\Controllers\ContactEmployerController::class,'ActiveContrat'])->name('active_contrat');
    Route::post('/employer/read/candidate/delete',[App\Http\Controllers\ContactEmployerController::class,'DeleteContact'])->name('delete_contact');

    //--contract
    Route::get('/employer/read/contrat',[App\Http\Controllers\ContratEmployerController::class,'IndexContrats']);
    Route::post('/employer/read/proposercontrat',[App\Http\Controllers\ContratEmployerController::class,'ProposerContrat'])->name('proposer_contract');

});
