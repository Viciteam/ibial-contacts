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

Route::get('deals', 'Deals\DealsController@deals');
Route::post('deals', 'Deals\DealsController@register');
Route::get('deals/{user_id}', 'Deals\DealStagesController@userDeals');
Route::delete('deals/{id}', 'Deals\DealsController@deleteDeal');

Route::get('dealstages', 'Deals\DealStagesController@dealstages');
Route::post('dealstages', 'Deals\DealStagesController@register');
Route::delete('dealstages/{id}', 'Deals\DealStagesController@deleteDealStage');
Route::put('dealstages/{id}', 'Deals\DealStagesController@updateStage');

Route::post('projects', 'Projects\ProjectController@register');
Route::get('projects/{user_id}', 'Projects\ProjectController@userProjects');
Route::delete('projects/{id}', 'Projects\ProjectController@deleteProject');
Route::put('projects/{id}', 'Projects\ProjectController@updateProject');

Route::post('projectstage', 'Projects\ProjectStagesController@register');
Route::delete('projectstage/{id}', 'Projects\ProjectStagesController@deleteProjectStage');
Route::put('projectstage/{id}', 'Projects\ProjectStagesController@updateProjectStage');

Route::post('projectitems', 'Projects\ProjectItemsController@register');
Route::delete('projectitems/{id}', 'Projects\ProjectItemsController@deleteProjectItems');
Route::put('projectitems/{id}', 'Projects\ProjectItemsController@updateProjectItems');