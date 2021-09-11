<?php

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    //****************************************************ROUTE PREMIUMS****************************************//
      Route::get('/', 'Admin\PremiumsController@index')->name('admin.premiums.index');
      Route::get('/premiums/{user}', 'Admin\PremiumsController@show')->name('admin.premiums.show');
      Route::patch('/premiums/{user}', 'Admin\PremiumsController@update')->name('admin.premiums.update');
      Route::delete('/premiums/{user}', 'Admin\PremiumsController@destroy')->name('admin.premiums.destroy');
    //****************************************************END ROUTE PREMIUMS****************************************//

    //****************************************************ROUTE PREMIUM POUR VALIDER LES COURS****************************************//
      Route::get('/premium', 'Admin\PremiumController@index')->name('admin.premium.index');
      Route::get('/premium/show/{product}', 'Admin\PremiumController@show')->name('admin.premium.show');
      Route::patch('/premium/cours/{product}', 'Admin\PremiumController@update')->name('admin.premium.update');
      Route::delete('/premium/cours/{product}', 'Admin\PremiumController@destroy')->name('admin.premium.destroy');
      //****************************************************END ROUTE PREMIUMS****************************************//

      //**************************************************ROUTE ADMINUSER********************************************//
      Route::get('/user/etudiant', 'Admin\AdminUserController@index')->name('admin.users.etudiant.index');
      Route::get('/user/etudiant/validerbulletin/{user}', 'Admin\AdminUserController@validerBulletin')->name('admin.users.etudiant.validerbulletin');
      Route::patch('/user/etudiant/validerbulletin/bullentin/{user}', 'Admin\AdminUserController@validerBulletinUpdate')->name('admin.users.etudiant.validerbulletinupdate');
      Route::get('/user/enseignant', 'Admin\AdminUserController@enseignant')->name('admin.users.enseignant.enseignant');
      Route::get('/user/enseignant/{user}/edit', 'Admin\AdminUserController@enseignantEdit')->name('admin.users.enseignant.enseignantedit');
      Route::patch('/user/enseignant/update/{user}', 'Admin\AdminUserController@enseignantUpdate')->name('admin.users.enseignant.enseignantupdate');
      Route::delete('/user/etudiant/{user}', 'Admin\AdminUserController@destroy')->name('admin.users.etudiant.destroy');
      Route::delete('/user/enseignant/{user}', 'Admin\AdminUserController@destroyenseignant')->name('admin.users.enseignant.destroyenseignant');

      //**************************************************ROUTE ADMINUSER********************************************//
      Route::get('/payment/index', 'Admin\AdminPaymentController@index')->name('admin.payment.index');
      //**************************************************ROUTE ADMIN PAYMENT************************************//
  });