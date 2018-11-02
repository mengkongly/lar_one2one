<?php

use App\User;
use App\Address;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user/{id}/in_address/',function($id){
    $user       =   User::findOrFail($id);

    //$address    =   new Address(['name'=>'4464 Sapphire Dr, Frisco, TX']);
    $address    =   new Address(['name'=>'44 Legacy, Frisco, TX']);


    // address() is call function in User model
    if($user->address()->save($address)){
        return 'Insert successfully';
    }
    return 'Insert failed';

});