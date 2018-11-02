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


Route::get('/user/{id}/up_address',function($id){

    //used first() to return object of address
    // u can use many different way to query where like below
    //$address        =   Address::where('user_id',$id)->first();
    //$address        =   Address::where('user_id','=',$id)->first();
    $address        =   Address::whereUserId($id)->first();

    $address->name  =   "Update address to ABC Dallas, TX";
    $address->update();

});

Route::get('/user/{id}/address',function($id){

    return User::findOrFail($id)->address->name;
});

Route::get('/user/{id}/del_address',function($id){
    $user   =   User::findOrFail($id);
    
    if($user->address->delete()){
        return 'Delete successfully';
    }
    
    return 'Delete failed';
    
});