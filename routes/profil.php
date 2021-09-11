<?php

Route::get('/student/profiletudiant/create', 'Profil\ProfilEtudiantController@create')->name('site.profil.etudiant.create');
Route::post('/student/profiletudiant/post', 'Profil\ProfilEtudiantController@store')->name('site.profil.etudiant.store');
 Route::group(['prefix' => 'student', 'middleware' => ['cashier']], function () {
  
    //*****************************************************ROUTE PROFIL ETUDIANT******************************//
    Route::get('/profiletudiant', 'Profil\ProfilEtudiantController@index')->name('site.profil.etudiant.index');
    Route::get('/profiletudiant/bulletinelevenotedevoir', 'Profil\ProfilEtudiantController@userBulleetinNoteDevoir')->name('site.profil.etudiant.bulletinelevenotedevoir');
    Route::get('/profiletudiant/bulletinelevenoteexercice', 'Profil\ProfilEtudiantController@userBulleetinNoteExercice')->name('site.profil.etudiant.bulletinelevenoteexercice');
    Route::get('/profiletudiant/bulletinuserpremiertrimestre', 'Profil\ProfilEtudiantController@userBulleetinElevePremierTrimestre')->name('site.profil.etudiant.bulletinelevepremiertrimestre');
    Route::get('/profiletudiant/bulletinuserdeuxiemetrimestre', 'Profil\ProfilEtudiantController@userBulleetinEleveDeuxiemeTrimestre')->name('site.profil.etudiant.bulletinelevedeuxiemetrimestre');
    Route::get('/profiletudiant/bulletinusertroisiemetrimestre', 'Profil\ProfilEtudiantController@userBulleetinEleveTroisiemeTrimestre')->name('site.profil.etudiant.bulletinelevetroisiemetrimestre');
    Route::get('/profiletudiant/bulletinuserpremiertrimestre/pdf', 'Profil\ProfilEtudiantController@userBulleetinElevePremierTrimestrePdf')->name('pdf.moyenne-result');
    Route::get('/profiletudiant/bulletinuserdeuxiemetrimestre/pdf', 'Profil\ProfilEtudiantController@userBulleetinEleveDeuxiemeTrimestrePdf')->name('pdf.deuxiemetrimestre-result');
    Route::get('/profiletudiant/bulletinusertroisiemetrimestre/pdf', 'Profil\ProfilEtudiantController@userBulleetinEleveTroisiemeTrimestrePdf')->name('pdf.troisiemetrimestre-result');
    Route::get('/profiletudiant/userbulletin/{user}/editetudiant', 'Profil\ProfilEtudiantController@editetudiant')->name('site.profil.etudiant.editetudiant');
    Route::patch('/profiletudiant/updateetudiant/{user}', 'Profil\ProfilEtudiantController@updateetudiant')->name('site.profil.etudiant.updateetudiant');
    //*****************************************************END ROUTE PROFIL ETUDIANT******************************//
     //**********************************************ROUTE CASHIER************************************************//
   Route::get('/profiletudiant/subscribe', 'Profil\ProfilEtudiantController@subscribe')->name('site.profil.etudiant.cashier.subscribe');
   Route::post('/profiletudiant/subscribe/post', 'Profil\ProfilEtudiantController@subscribePost')->name('site.profil.etudiant.cashier.subscribepost');
   // update subscription
   Route::patch('/profiletudiant/subscription/user/{user}', 'Profil\ProfilEtudiantController@updateSubscription')->name('site.profil.etudiant.cashier.subscribeupdate');
   Route::get('/profiletudiant/subscribe/download/{invoice}', 'Profil\ProfilEtudiantController@subscribeDownload');
   Route::delete('/profiletudiant/subscribe/delete/{user}', 'Profil\ProfilEtudiantController@subscribeDelete')->name('site.profil.etudiant.cashier.subscribedelete');
  //**********************************************END ROUTE CASHIER************************************************//
});
/*******************************************ROUTE QUIZ STUDENT******************************************************/
Route::group(['prefix' => 'student', 'middleware' => ['auth', 'cashier']], function () {
    //********************************************QUIZ RESPONSE ***************************************//
   // Route::get('/home', 'Site\HomeController@index')->name('site.home.home');
    //**********************************************FIN DE QUIZ*****************************************//
  //Route::get('/', 'FrontendController@index')->name('frontend');
  //Route::get('/dashboard', 'Site\HomeController@index')->name('student.dashboard');
  Route::get('/takequiz/{quiz}', 'Site\HomeController@takeQuiz')->name('take.quiz');
  Route::get('/show/{quiz}/{question}', 'Site\HomeController@showQuestions')->name('show.questions');
  Route::post('/store/{question}', 'Site\HomeController@storeAnswer')->name('store.answer');
  Route::get('/result/{quiz}', 'Site\HomeController@quizResult')->name('home.result');
  Route::get('/export-excel/{quiz}', 'Site\HomeController@export')->name('quiz.export.excel');
  Route::get('/export-pdf/{quiz}', 'Site\HomeController@createPdf')->name('quiz.export.pdf');
  /*****************************Route quiz maternelle******************************************************/
  Route::get('/dashboard/quizpetitesectionquiz', 'Site\HomeController@index')->name('home.quiz.maternelle.quizpetitesectionquiz');
  Route::get('/dashboard/quizmoyennesectionquiz', 'Site\HomeController@quizMoyenneSectionQuiz')->name('home.quiz.maternelle.quizmoyennesectionquiz');
  Route::get('/dashboard/quizgrandesectionquiz', 'Site\HomeController@quizGrandeSectionQuiz')->name('home.quiz.maternelle.quizgrandesectionquiz');
//*********************************************************Primaire****************************************//
  Route::get('/dashboard/quizprimairecpquiz', 'Site\HomeController@quizPrimaireCpQuiz')->name('home.quiz.primaire.quizprimairecpquiz');
  Route::get('/dashboard/quizprimaireceunquiz', 'Site\HomeController@quizPrimaireCeunQuiz')->name('home.quiz.primaire.quizprimaireceunquiz');
  Route::get('/dashboard/quizprimairecedeuxquiz', 'Site\HomeController@quizPrimaireCedeuxQuiz')->name('home.quiz.primaire.quizprimairecedeuxquiz');
  Route::get('/dashboard/quizprimairecemunquiz', 'Site\HomeController@quizPrimaireCemunQuiz')->name('home.quiz.primaire.quizprimairecemunquiz');
  Route::get('/dashboard/quizprimairecemdeuxquiz', 'Site\HomeController@quizPrimaireCemdeuxQuiz')->name('home.quiz.primaire.quizprimairecemdeuxquiz');
 //*********************************************Collège******************************************//
 Route::get('/dashboard/quizcollegesixiemequiz', 'Site\HomeController@quizCollegeSixiemeQuiz')->name('home.quiz.college.quizcollegesixiemequiz');
 Route::get('/dashboard/quizcollegecinqiemequiz', 'Site\HomeController@quizCollegeCinqiemeQuiz')->name('home.quiz.college.quizcollegecinqiemequiz');
 Route::get('/dashboard/quizcollegequatriemequiz', 'Site\HomeController@quizCollegeQuatriemeQuiz')->name('home.quiz.college.quizcollegequatriemequiz');
 Route::get('/dashboard/quizcollegetroisiemequiz', 'Site\HomeController@quizCollegeTroisiemeQuiz')->name('home.quiz.college.quizcollegetroisiemequiz');
 //**************************************Lycée***********************************************************//
 Route::get('/dashboard/quizlyceesecondequiz', 'Site\HomeController@quizLyceeSecondeQuiz')->name('home.quiz.lycee.quizlyceesecondequiz');
 Route::get('/dashboard/quizlyceepremierequiz', 'Site\HomeController@quizLyceePremiereQuiz')->name('home.quiz.lycee.quizlyceepremierequiz');
 Route::get('/dashboard/quizlyceeterminalequiz', 'Site\HomeController@quizLyceeTerminaleQuiz')->name('home.quiz.lycee.quizlyceeterminalequiz');
//******************************Numeric*******************************************************************//
Route::get('/dashboard/quiznumerichtmlcssbootstrapquiz', 'Site\HomeController@quizNumericHtmlCssBootstrapQuiz')->name('home.quiz.numeric.quiznumerichtmlcssbootstrapquiz');
Route::get('/dashboard/quiznumericjavascriptquiz', 'Site\HomeController@quizNumericJavascriptQuiz')->name('home.quiz.numeric.quiznumericjavascriptquiz');
Route::get('/dashboard/quiznumericphpmysqlquiz', 'Site\HomeController@quizNumericPhpMysqlQuiz')->name('home.quiz.numeric.quiznumericphpmysqlquiz');
Route::get('/dashboard/quiznumericpooquiz', 'Site\HomeController@quizNumericPooQuiz')->name('home.quiz.numeric.quiznumericpooquiz');
Route::get('/dashboard/quiznumericlaravelsymfonyquiz', 'Site\HomeController@quizNumericLaravelSymfonyQuiz')->name('home.quiz.numeric.quiznumericlaravelsymfonyquiz');
Route::get('/dashboard/quiznumericwordpressdjoomlaquiz', 'Site\HomeController@quizNumericWordpressDjoomlaQuiz')->name('home.quiz.numeric.quiznumericwordpressdjoomlaquiz');
  /*****************************End route*******************************************************/

});

   Route::get('/profilenseignantuser/create', 'Profil\ProfilEnseignantController@create')->name('site.profil.enseignant.create');
   Route::post('/profilenseignantuser/store', 'Profil\ProfilEnseignantController@store')->name('site.profil.enseignant.store');
   Route::get('/findMaternelName', 'Profil\ProfilEnseignantController@findMaternelName');
   Route::group(['prefix' => 'teacher', 'middleware' => ['auth', 'teacher']], function () {
      Route::get('/profilenseignantuser', 'Profil\ProfilEnseignantController@index')->name('site.profil.enseignant.index');
      Route::get('/profilenseignantuser/show/{user}', 'Profil\ProfilEnseignantController@show')->name('site.profil.enseignant.show');
      Route::get('/profilenseignantuser/{user}/edit', 'Profil\ProfilEnseignantController@edit')->name('site.profil.enseignant.edit');
      Route::patch('/profilenseignantuser/update/{user}', 'Profil\ProfilEnseignantController@update')->name('site.profil.enseignant.update');
      Route::delete('/profilenseignantuser/delete/{user}', 'Profil\ProfilEnseignantController@destroy')->name('site.profil.enseignant.destroy');
      //*************************************PARTIE CI-DESSOUS NON COMPLETER *********************************//
      Route::get('/profilenseignantuser/userstudent', 'Profil\ProfilEnseignantController@QuizStudent')->name('site.profil.enseignant.quizresultstudent');
      Route::get('/profilenseignantuser/resultquizstudent/{quiz}', 'Profil\ProfilEnseignantController@QuizStudentResult')->name('site.profil.enseignant.quizstudent');
      Route::get('/profilenseignantuser/resultquizstudentteacher/{quiz}', 'Profil\ProfilEnseignantController@QuizStudentResultTeacher')->name('site.profil.enseignant.quizstudentteacher');

      //****************************************************SELECT ELEVE MATERNELLE POUR NOTRE NOTE****************************** */
      Route::get('/profilenseignantuser/selectelevematernelun', 'Profil\TeacherBulletinMaternelleController@selectEleveMaternelUn')->name('site.profil.bulletin.maternelle.selectelevematernelle.selectelevematernelun');
      Route::get('/profilenseignantuser/selectelevematerneldeux', 'Profil\TeacherBulletinMaternelleController@selectEleveMaternelDeux')->name('site.profil.bulletin.maternelle.selectelevematernelle.selectelevematerneldeux');
      Route::get('/profilenseignantuser/selectelevematerneltrois', 'Profil\TeacherBulletinMaternelleController@selectEleveMaternelTrois')->name('site.profil.bulletin.maternelle.selectelevematernelle.selectelevematerneltrois');
      //****************************************************END SELECT ELEVE MATERNELLE POUR NOTRE NOTE****************************** */
      
      //****************************************************SELECT ELEVE PRIMAIRE POUR NOTRE NOTE****************************** */
      Route::get('/profilenseignantuser/selecteleveprimairecp', 'Profil\TeacherBulletinMaternelleController@selectElevePrimaireCp')->name('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecp');
      Route::get('/profilenseignantuser/selecteleveprimaireceun', 'Profil\TeacherBulletinMaternelleController@selectElevePrimaireCeun')->name('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimaireceun');
      Route::get('/profilenseignantuser/selecteleveprimairecedeux', 'Profil\TeacherBulletinMaternelleController@selectElevePrimaireCedeux')->name('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecedeux');
      Route::get('/profilenseignantuser/selecteleveprimairecemun', 'Profil\TeacherBulletinMaternelleController@selectElevePrimaireCemun')->name('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecemun');
      Route::get('/profilenseignantuser/selecteleveprimairecemdeux', 'Profil\TeacherBulletinMaternelleController@selectElevePrimaireCemdeux')->name('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecemdeux');
       //****************************************************END SELECT ELEVE PRIMAIRE POUR NOTRE NOTE****************************** */
       //****************************************************SELECT ELEVE COLLEGE POUR NOTRE NOTE****************************** */
      Route::get('/profilenseignantuser/selectelevecollegesixieme', 'Profil\TeacherBulletinMaternelleController@selectEleveColegeSixieme')->name('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegesixieme');
      Route::get('/profilenseignantuser/selectelevecollegecinqieme', 'Profil\TeacherBulletinMaternelleController@selectEleveColegeCinqieme')->name('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegecinqieme');
      Route::get('/profilenseignantuser/selectelevecollegequatrieme', 'Profil\TeacherBulletinMaternelleController@selectEleveColegeQuatrieme')->name('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegequatrieme');
      Route::get('/profilenseignantuser/selectelevecollegetroisieme', 'Profil\TeacherBulletinMaternelleController@selectEleveColegeTroisieme')->name('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegetroisieme');
       //****************************************************END SELECT ELEVE COLLEGE POUR NOTRE NOTE****************************** */
        //****************************************************SELECT ELEVE LYCEE POUR NOTRE NOTE****************************** */
      Route::get('/profilenseignantuser/selectelevelyceeseconde', 'Profil\TeacherBulletinMaternelleController@selectEleveLyceeSeconde')->name('site.profil.bulletin.maternelle.selectelevelycee.selectelevelyceeseconde');
      Route::get('/profilenseignantuser/selectelevelyceepremiere', 'Profil\TeacherBulletinMaternelleController@selectEleveLyceePremiere')->name('site.profil.bulletin.maternelle.selectelevelycee.selectelevelyceepremiere');
      Route::get('/profilenseignantuser/selectelevelyceeterminale', 'Profil\TeacherBulletinMaternelleController@selectEleveLyceeTerminale')->name('site.profil.bulletin.maternelle.selectelevelycee.selectelevelyceeterminale');
      //****************************************************END SELECT ELEVE LYCEE POUR NOTRE NOTE****************************** */
       //****************************************************SELECT ELEVE NUMERIC POUR NOTRE NOTE A COMPLETE****************************** */
      Route::get('/profilenseignantuser/selectelevenumeric/htmlcssbootstrap', 'Profil\TeacherBulletinMaternelleController@selectEleveNumeriqueHtmlCssBootstrap')->name('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquehtmlcssbootstrap');
      Route::get('/profilenseignantuser/selectelevenumeric/javascript', 'Profil\TeacherBulletinMaternelleController@selectEleveNumeriqueJavascript')->name('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquejavascript');
      Route::get('/profilenseignantuser/selectelevenumeric/phpmysql', 'Profil\TeacherBulletinMaternelleController@selectEleveNumeriquePhpMysql')->name('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquephpmysql');
      Route::get('/profilenseignantuser/selectelevenumeric/poo', 'Profil\TeacherBulletinMaternelleController@selectEleveNumeriquePoo')->name('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquepoo');
      Route::get('/profilenseignantuser/selectelevenumeric/laravelsymfony', 'Profil\TeacherBulletinMaternelleController@selectEleveNumeriqueLaravelSymfony')->name('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquelaravelsymfony');
      Route::get('/profilenseignantuser/selectelevenumeric/wordpressdjoomla', 'Profil\TeacherBulletinMaternelleController@selectEleveNumeriqueWordpressdDjoomla')->name('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquewordpressdjoomla');
        //****************************************************END SELECT ELEVE NUMERIC POUR NOTRE NOTE****************************** */
      Route::get('/profilenseignantuser/showbulletinuser/{user}', 'Profil\TeacherBulletinMaternelleController@showbulletinuser')->name('site.profil.bulletin.maternelle.showbulletinuser');
      Route::get('/profilenseignantuser/createnote', 'Profil\TeacherBulletinMaternelleController@create')->name('site.profil.bulletin.maternelle.create');
      Route::post('/profilenseignantuser/postnote', 'Profil\TeacherBulletinMaternelleController@store')->name('site.profil.bulletin.maternelle.store');
    //****************************************************ADD NOTE TEACHER BY USER****************************** */ 
     
//*****************************************************ROUTE PRODUCT MATERNEL*******************************//
      Route::get('/profilenseignantuser/addcreate', 'Profil\ProfilEnseignantController@addcreate')->name('site.profil.maternel.addcreate');
      Route::post('/profilenseignantuser/addstore', 'Profil\ProfilEnseignantController@addstore')->name('site.profil.maternel.addstore');
      Route::get('/profilenseignantuser/{product}/editcreate', 'Profil\ProfilEnseignantController@editcreate')->name('site.profil.maternel.editcreate');
      Route::get('/profilenseignantuser/showcreate/{product}', 'Profil\ProfilEnseignantController@showcreate')->name('site.profil.maternel.showcreate');
      Route::patch('/profilenseignantuser/editupdate/{product}', 'Profil\ProfilEnseignantController@editupdate')->name('site.profil.maternel.editupdate');
      Route::delete('/profilenseignantuser/deletedestroy/{product}', 'Profil\ProfilEnseignantController@deletedestroy')->name('site.profil.maternel.deletedestroy');
     
      //*****************************************************END ROUTE PRODUCT MATERNEL*******************************//

    //*****************************************************ROUTE PROFIL ENSEIGNANT******************************//
      Route::resource('quiz', 'QuizController');
      Route::resource('question', 'QuestionController');

  });
