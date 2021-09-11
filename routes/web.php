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
//*******************************************ROUTE ECOLEPRIVENUMERIC*******************************//
    Route::get('/', 'Site\EcolePriveNumericController@index')->name('site.ecoleprivenumeric.index');
    Route::get('/file', 'Site\EcolePriveNumericController@file')->name('site.ecoleprivenumeric.file');
    Route::get('/contact', 'Site\ContactFormController@create')->name('site.contacts.create');
    Route::post('/contact', 'Site\ContactFormController@store')->name('site.contacts.store');
//*******************************************END ROUTE ECOLEPRIVENUMERIC*******************************//
Route::group(['prefix' => 'student', 'middleware' => ['auth', 'cashier']], function () {
      //*******************************************ADDFILE STUDENTS ***********************************//
      
   Route::post('/profiletudiant/addfile/post', 'Profil\ImageController@postfiles')->name('site.profil.etudiant.image.postfile');
   Route::post('/profiletudiant/addfile/postquizfile', 'Profil\ImageController@postfilesQuiz')->name('site.profil.etudiant.image.postquizfile');
 /********************************************end add file student*************************************** */
//*******************************************ROUTE ECOLEMATERNELLE*******************************//
    Route::get('/ecolematernelle', 'Site\MaternelController@index')->name('site.maternelle.index');
    Route::get('/ecolematernelle/profilenseignantmaternelle', 'Site\MaternelController@profilEnseignantMaternelle')->name('site.maternelle.profil');
    Route::get('/ecolematernelle/petitesection', 'Site\MaternelController@petiteSection')->name('site.maternelle.classe.petitesection');
    Route::get('/ecolematernelle/moyennesection', 'Site\MaternelController@MoyenneSection')->name('site.maternelle.classe.moyennesection');
    Route::get('/ecolematernelle/grandesection', 'Site\MaternelController@grandeSection')->name('site.maternelle.classe.grandesection');
  
//*******************************************END ROUTE ECOLEMATERNELLE*******************************//
//*******************************************ROUTE ECOLEPRIMAIRE*******************************//
    Route::get('/ecoleprimaire', 'Site\PrimaireController@index')->name('site.primaire.index');
    Route::get('/ecoleprimaire/profilenseignantprimaire', 'Site\PrimaireController@profilEnseignantPrimaire')->name('site.primaire.profil');
    Route::get('/ecoleprimaire/cepe', 'Site\PrimaireController@cepe')->name('site.primaire.classe.cepe');
    Route::get('/ecoleprimaire/ceun', 'Site\PrimaireController@ceun')->name('site.primaire.classe.ceun');
    Route::get('/ecoleprimaire/cedeux', 'Site\PrimaireController@cedeux')->name('site.primaire.classe.cedeux');
    Route::get('/ecoleprimaire/cemun', 'Site\PrimaireController@cemun')->name('site.primaire.classe.cemun');
    Route::get('/ecoleprimaire/cemdeux', 'Site\PrimaireController@cemdeux')->name('site.primaire.classe.cemdeux');
//*******************************************END ROUTE ECOLEPRIMAIRE*******************************//

//*******************************************ROUTE COLLEGE*******************************//
    Route::get('/ecolecollege', 'Site\CollegeController@index')->name('site.college.index');
    Route::get('/ecolecollege/profilenseignantcollege', 'Site\CollegeController@profilEnseignantCollege')->name('site.college.profil');
    Route::get('/ecolecollege/sixieme', 'Site\CollegeController@sixieme')->name('site.college.classe.sixieme');
    Route::get('/ecolecollege/cinqieme', 'Site\CollegeController@cinqieme')->name('site.college.classe.cinqieme');
    Route::get('/ecolecollege/quatrieme', 'Site\CollegeController@quatrieme')->name('site.college.classe.quatrieme');
    Route::get('/ecolecollege/troisieme', 'Site\CollegeController@troisieme')->name('site.college.classe.troisieme');

   //*******************************************END ROUTE COLLEGE*******************************//
   //*******************************************ROUTE LYCEE*******************************//
    Route::get('/ecolelycee', 'Site\LyceeController@index')->name('site.lycee.index');
    Route::get('/ecolelycee/profilenseignantlycee', 'Site\LyceeController@profilEnseignantLycee')->name('site.lycee.profil'); 
    Route::get('/ecolelycee/seconde', 'Site\LyceeController@seconde')->name('site.lycee.classe.seconde');
    Route::get('/ecolelycee/premiere', 'Site\LyceeController@premiere')->name('site.lycee.classe.premiere');
    Route::get('/ecolelycee/terminale', 'Site\LyceeController@terminale')->name('site.lycee.classe.terminale');
    Route::get('/ecolelycee/terminaleshow/{product}/{slug?}', 'Site\LyceeController@terminaleshow')->name('site.lycee.terminalelshow');
     //********************************************** ROUTE COMMENTS*************************************************//
     Route::post('/comments/store', 'Site\CommentsController@store')->name('comments.store');
    //*************************************************fIN ROUTE COMMENTS*******************************************//
    //*******************************************ROUTE MODULE NUMERIC*******************************//
    Route::get('/modulenumeric/module/index', 'Site\ModuleNumericController@index')->name('site.numeric.index');
    Route::get('/modulenumeric/profil', 'Site\ModuleNumericController@profilEnseignantNumeric')->name('site.numeric.profil');
    Route::get('/modulenumeric/phpmysql', 'Site\ModuleNumericController@phpMysql')->name('site.numeric.classe.phpmysql');
    Route::get('/modulenumeric/poo', 'Site\ModuleNumericController@poo')->name('site.numeric.classe.poo');
    Route::get('/modulenumeric/javascript', 'Site\ModuleNumericController@javascript')->name('site.numeric.classe.javascript');
    Route::get('/modulenumeric/htmlcssbootstrap', 'Site\ModuleNumericController@htmlcssbootstrap')->name('site.numeric.classe.htmlcssbootstrap');
    Route::get('/modulenumeric/laravelsymfony', 'Site\ModuleNumericController@laravelsymfony')->name('site.numeric.classe.laravelsymfony');
    Route::get('/modulenumeric/wordpressdjoomla', 'Site\ModuleNumericController@wordpressdjoomla')->name('site.numeric.classe.wordpressdjoomla');
//*******************************************END ROUTE MODULE NUMERIC************************************************//
});
//*******************************************END ROUTE LYCEE******************************************************//

Auth::routes(['register' => false]);

require 'profil.php';
require 'admin.php';

