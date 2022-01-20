<?php 
use App\Http\Controllers\Users\RoleController as Role;
use App\Http\Controllers\Users\UserController as User;

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth']], function () {

	// User Managements
	Route::resource('roles', Role::class);
	Route::resource('users', User::class); 
});