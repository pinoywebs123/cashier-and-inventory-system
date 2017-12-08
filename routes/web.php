<?php

use App\User;

Route::get('/add', function(){
	$user = new User;
	$user->username = 'admin123'; 
	$user->email = 'admin@yahoo.com';
	$user->password = bcrypt('admin123');
	$user->save();

});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['prefix'=> 'auth'], function(){

	Route::get('/login', [
		'as'=> 'login',
		'uses'=> 'AuthController@login'
	]);

	Route::post('/logincheck', [
		'as'=> 'login_check',
		'uses'=> 'AuthController@login_check'
	]);
});

Route::group(['prefix'=> 'staff'], function(){

	Route::get('/main', [
		'as'=> 'staff_main',
		'uses'=> 'StaffController@staff_main'
	]);

	Route::get('/logout', [
		'as'=> 'staff_logout',
		'uses'=> 'StaffController@staff_logout'
	]);

	Route::get('/items', [
		'as'=> 'staff_items',
		'uses'=> 'StaffController@staff_items'
	]);

	Route::get('/orders', [
		'as'=> 'staff_orders',
		'uses'=> 'StaffController@staff_orders'
	]);

	Route::get('/totals', [
		'as'=> 'staff_totals',
		'uses'=> 'StaffController@staff_totals'
	]);

	Route::get('/reports', [
		'as'=> 'staff_reports',
		'uses'=> 'StaffController@staff_reports'
	]);
});
