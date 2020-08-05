<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('contacts/{user_id}', 'Contacts\ContactsController@contacts');
Route::post('contacts', 'Contacts\ContactsController@register');
Route::put('contacts/{id}', 'Contacts\ContactsController@contactsUpdate');
Route::delete('contacts/{id}', 'Contacts\ContactsController@contactsDelete');