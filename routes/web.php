<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChequesController;
use App\Http\Controllers\AdherantController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\StatistiquesController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\FournisseursController;
use App\Http\Controllers\ArticleController;


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

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function() {

    Route::get('/', [DashboardController::class, 'Showdashboard'])->name('dashboard.index');
    Route::get('/profile/{name}', [DashboardController::class, 'Showprofile'])->name('dashboard.profile');
    Route::post('/changePassword', [DashboardController::class, 'changePasswordPost'])->name('changepasswordpost');
    Route::post('/profile/{id}', [DashboardController::class, 'UpdateProfile'])->name('updateprofile');
 
    Route::get('/profile/agenda/{id}', [ReminderController::class, 'indexRend'])->name('calendar');
    Route::post('/profile/agenda/', [ReminderController::class, 'Actionrendez'])->name('add.reminder');

    Route::get('/profile/reminder/create', [ReminderController::class, 'createReminder'])->name('rcreatesms');
    Route::post('/profile/reminder/post', [ReminderController::class, 'storeReminder'])->name('storeReminder');
    
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/stats-cheques', ChequesController::class);
    Route::resource('/adherants', AdherantController::class);
    Route::resource('/amicals', SocieteController::class);
    Route::resource('/companys', CompanyController::class);
    Route::resource('/certificats', CertificatController::class);
    //Route::resource('/demandes', DemandeController::class);
    Route::resource('/statistiques', StatistiquesController::class);
    Route::resource('/factures', FactureController::class);
    Route::resource('/emps', EmployeesController::class);
    Route::resource('/fournisseurs', FournisseursController::class);
    Route::resource('/articles', ArticleController::class);

    ///////Tranche for any adherant/////////////
    Route::post('/adherants/inserttranch', [AdherantController::class, 'InsertTranch'])->name('tranch.add');
    Route::get('/adherants/del/tranch/{id}', [AdherantController::class, 'destroyTranch'])->name('tranch.del');   
    ///////ENd tranch section for any adherant///////////
    ////////query list adherant for any amical by id//////////
    Route::get('/fulllist/{id}', [AdherantController::class, 'GetAll'])->name('fullist');
    //////////End query amical by id /////////////////////////
    Route::get('/adherants/show/cert/{id}', [AdherantController::class, 'showCert'])->name('show.cert');
    Route::post('/image-upload/{id}', [AdherantController::class, 'fileUpload'])->name('imageUpload');
    Route::post('/upload/{id}', [ChequesController::class, 'UploadCheque'])->name('upcheques');
    Route::post('/scan-up/{id}', [EmployeesController::class, 'ScanEmpup'])->name('scanup');
    ////////Genere le fiche authorization du paiement////////
    Route::get('/generer/certificat/authorization/{id}', [AdherantController::class, 'ShowAdherantcert'])->name('newcert');
    Route::post('/generer/certificat/authorization/{id}', [AdherantController::class, 'UpdateArdetails'])->name('generernewcert');
    /////////Generer  la fiche de confirmation du paiemnet
    Route::get('/generer/certificat/confirmation/{id}', [AdherantController::class, 'Itbatbidafaa'])->name('newconfirmation');
    /////////Generer  la fiche demande d' annulation //////8//// 
    Route::get('/generer/certificat/annulation/{id}', [AdherantController::class, 'Demandedannulation'])->name('annulation');
    ////////Generation du PDF CALCULATION rapport//////
    Route::get('pdf/preview/{id}', [PdfController::class, 'previewRapport'])->name('pdf.preview');
    /////////end  calculation //////////////////////////
    Route::get('doc/authorisation/{id}', [PdfController::class, 'ShowAuthorisation'])->name('doc.show');
    ////////THis is just for loading facture over ajax////////
    Route::get('/companyajax', [CompanyController::class, 'Complistajax'])->name('company.ajax');
    ////////THis is just for loading facture over ajax////////
    Route::get('/factureajax', [FactureController::class, 'Falistajax'])->name('factures.ajax');
    ////////THis is just for loading roles over ajax////////
    Route::get('/rolesajax', [RoleController::class, 'Rolelistajax'])->name('roles.ajax');
    ////////THis is just for loading users over ajax////////
    Route::get('/usersajax', [UserController::class, 'Userlistajax'])->name('users.ajax');
    //////This is just a test for loading datas using ajax /////
    Route::get('/adherantsajax', [AdherantController::class, 'Adlistajax'])->name('adherants.ajax');
    ////////End test page over loading////////
    //////This is just a test for loading datas checques using ajax /////
    Route::get('/chequesajax', [ChequesController::class, 'Chelistajax'])->name('cheques.ajax');
    ///////////////////this just for amical ajax ////////////////
    Route::get('/amicalsajax', [SocieteController::class, 'Amicalslistajax'])->name('amicals.ajax');
    ///////////////////this just for employees ajax ////////////////
    Route::get('/employeesajax', [EmployeesController::class, 'Employeeslistajax'])->name('employees.ajax');
    ///////////////////this just for Fournisseurs ajax ////////////////
    Route::get('/fournisseursajax', [FournisseursController::class, 'FournisseurAjax'])->name('fournisseursajax');
    /////Destroy company ///////
    Route::get('/companys/del/{id}', [CompanyController::class, 'destroy'])->name('dell.company');
    /////Destroy Document of Employees//////////////
    Route::get('/emp/docs/del/{id}', [EmployeesController::class, 'destroyEmpDoc'])->name('delldocemp');
    /////Destroy Chèque document//////////////
    Route::get('/ch/del/{id}', [ChequesController::class, 'destroyCheque'])->name('delcheque');
    Route::post('/employees/store/paiement', [EmployeesController::class, 'storePaiementEmployee'])->name('storeipaiementforemp');
    Route::get('/employees/paiement/all/{id}', [EmployeesController::class, 'showPaiements'])->name('getpaiements');
    Route::delete('/employees/paiement/del/{id}', [EmployeesController::class, 'destroyPaiement'])->name('delpaiement');
    Route::get('/employees/contract/{id}', [EmployeesController::class, 'showContract'])->name('showcontract');
    Route::get('/employees/rapport/{id}', [EmployeesController::class, 'showRapport'])->name('showrapport');

    ///////////////////this just for articles ajax ////////////////
    Route::get('/articlesajax', [ArticleController::class, 'ArticlesShowAjax'])->name('articles.ajax');
    Route::get('/articles/del/{id}', [ArticleController::class, 'destroyArticle'])->name('delarticle');

    //////Facturation/////////////
    Route::post('/factures/store/', [FactureController::class, 'store'])->name('newfacture');
    Route::get('/invoicesprod/json/{id}', [ArticleController::class, 'InvoicesProductShowAjax'])->name('invoiceprod');
    Route::post('/invoices/store/product', [ArticleController::class, 'storeProdforInvoice'])->name('storeprodforinvoice');
    Route::delete('/invoices/prod/del/{id}', [ArticleController::class, 'destroyProdArticle'])->name('delinvoice');

    
    Route::get('/logout', [DashboardController::class, 'logout'])->name('log.out');

});