<?php

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
//Dashboard
//login
Route::get('admin', 'loginController@adminIndex')->name('admin.login');
Route::post('admin', 'loginController@adminPosted');

Route::group(['middleware' => 'admin'], function(){

    // dashboard
    Route::get("/admin_panel", 'admin_panel\dashboardController@index')->name('admin.dashboard');
    // received deposits
    Route::get("admin/receivedDeposits", 'admin_panel\depositsController@index')->name('admin.deposits');
    Route::get("admin/receivedDeposits/create", 'admin_panel\depositsController@create')->name('admin.deposits.create');
    Route::post("admin/receivedDeposits/create", 'admin_panel\depositsController@store')->name('admin.deposits.create');
    Route::get("admin/receivedDeposits/delete/{id}", 'admin_panel\depositsController@delete')->name('admin.deposits.delete');

    Route::get('admin/logout', 'loginController@adminLogout')->name('admin.logout');
    Route::get('admin/settings', 'loginController@adminSettingsIndex')->name('admin.settings');
    Route::post('admin/settings', 'loginController@adminSettings')->name('admin.settings');
    //categories
    Route::get('/admin_panel/categories', 'admin_panel\categoriesController@index')->name('admin.categories');
    Route::post('/admin_panel/categories', 'admin_panel\categoriesController@posted');

    Route::get('/admin_panel/categories/edit/{id}', 'admin_panel\categoriesController@edit')->name('admin.categories.edit');
    Route::post('/admin_panel/categories/edit/{id}', 'admin_panel\categoriesController@update');

    Route::get('/admin_panel/categories/delete/{id}', 'admin_panel\categoriesController@delete')->name('admin.categories.delete');
    Route::post('/admin_panel/categories/delete/{id}', 'admin_panel\categoriesController@destroy');


    //products
    Route::get('/admin_panel/products', 'admin_panel\productsController@index')->name('admin.products');

    Route::get('/admin_panel/products/create', 'admin_panel\productsController@create')->name('admin.products.create');
    Route::post('/admin_panel/products/create', 'admin_panel\productsController@store');

    Route::get('/admin_panel/products/edit/{id}', 'admin_panel\productsController@edit')->name('admin.products.edit');
    Route::post('/admin_panel/products/edit/{id}', 'admin_panel\productsController@update');

    Route::get('/admin_panel/products/delete/{id}', 'admin_panel\productsController@delete')->name('admin.products.delete');
    Route::post('/admin_panel/products/delete/{id}', 'admin_panel\productsController@destroy');

    //Keys
    Route::get('/admin_panel/keys', 'admin_panel\keysController@index')->name('admin.keys');

    Route::get('/admin_panel/keys/create', 'admin_panel\keysController@create')->name('admin.keys.create');
    Route::post('/admin_panel/keys/create', 'admin_panel\keysController@store');

    Route::get('/admin_panel/keys/delete/{id}', 'admin_panel\keysController@destroy')->name('admin.keys.delete');


    //order management
    Route::get('/admin_panel/management', 'admin_panel\managementController@manage')->name('admin.orderManagement');

    //competitions
    Route::get('/admin_panel/competitions', 'admin_panel\CompetitionController@create')->name('admin.competitions');;
    Route::post('/admin_panel/competitions', 'admin_panel\CompetitionController@store');

    Route::get('/admin_panel/competition', 'admin_panel\CompetitionController@indexA')->name('comp');
    Route::get('/admin_panel/compajour', 'admin_panel\CompetitionController@amettreajour')->name('mettreajour');
    Route::post('/admin_panel/compajour', 'admin_panel\CompetitionController@misajour');
    Route::get('/admin_panel/showpartic/{id}', 'admin_panel\ParticipantController@show')->name('compPartic');
    Route::get('/admin_panel/editcom/{id}','admin_panel\CompetitionController@edit')->name('editcom');
    Route::get('/admin_panel/destroy/{id}','admin_panel\CompetitionController@destroy')->name('destroy');
    Route::post('/admin_panel/editcom/{id}','admin_panel\CompetitionController@update');
});

Route::get('/login', 'loginController@userIndex')->name('user.login');
Route::post('/login', 'loginController@userLogin');

//signup
Route::get('/signup', 'signupController@userIndex')->name('user.signup');
Route::post('/signup', 'signupController@userSignUp');
Route::post('/check_email', 'signupController@emailCheck')->name('user.signup.check_email');


//user
Route::get('/', 'user\userController@index')->name('user.home');
Route::get('/product/{id}', 'user\userController@view')->name('user.product');

Route::get('/search', 'user\userController@search')->name('user.search');
Route::get('/search?c={id}', 'user\userController@view')->name('user.search.cat');


// Route::get('/settings', 'user\userController@settings')->name('user.settings');

// Route::get('/settings', 'user\userController@settings')->name('user.settings');

Route::get('/settings/{tab}', 'user\userController@settings')->name('user.settings');


//user settings
Route::post('/settings/profile', 'user\userController@changeProfile');
Route::post('/settings/password', 'user\userController@changePassword');
Route::post('/settings/deposit', 'user\userController@deposit');

//Key
Route::get('/key/{id}', 'keyController@displayKey')->name('user.key');

//Product
Route::get('/view/{id}', 'user\userController@view')->name('user.view');
Route::post('/view/{id}', 'user\userController@addToCart');

Route::get('/cart', 'user\userController@cart')->name('user.cart');
Route::post('/cart', 'user\userController@confirm');

Route::post('/edit_cart', 'user\userController@editCart')->name('user.editCart');
Route::post('/delete_item_from_cart', 'user\userController@deleteCartItem')->name('user.deleteCartItem');


Route::get('/logout', 'loginController@userLogout')->name('user.logout');

Route::group(['middleware' => 'user'], function(){
Route::get('/history', 'user\userController@history')->name('user.history');

Route::get('/competiti', 'admin_panel\CompetitionController@index');
Route::post('/competiti', 'user\userController@searchcom');
Route::get('/inscription/{id}', 'user\userController@participer');
Route::get('/desinscription/{id}', 'user\userController@desincrir');
Route::get('/showcompetition/{id}', 'admin_panel\CompetitionController@show')->name('showComp');
Route::get('/liste', 'user\userController@competitions');

});
