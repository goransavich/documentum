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

Route::get('/', (['as' => 'login', 'uses' => 'LoginController@read']));

Route::post('/', 'LoginController@create');

Route::get('/logout', 'LoginController@destroy');

Route::get('/download/{subject}', 'DownloadController@create');

Route::get('dashboard', 'ServiceController@index');

Route::get('controlpanel/department', 'DepartmentController@read');

Route::post('controlpanel/department', 'DepartmentController@create');

Route::get('controlpanel/municipality', 'MunicipalityController@read');

Route::post('controlpanel/municipality', 'MunicipalityController@create');

Route::get('controlpanel/city', 'CityController@read');

Route::post('controlpanel/city', 'CityController@create');

Route::get('controlpanel/clas', 'ClasController@read');

Route::post('controlpanel/clas', 'ClasController@create');

Route::get('controlpanel/unit', 'UnitController@read');

Route::post('controlpanel/unit', 'UnitController@create');

Route::get('controlpanel/inspection', 'InspectionController@read');

Route::post('controlpanel/inspection', 'InspectionController@create');

Route::get('controlpanel/user', 'UserController@read');

Route::post('controlpanel/user', 'UserController@create');

Route::get('dashboard/create', 'SubjectController@read');

Route::get('getmunicipality', 'SubjectController@getmunicipality');

Route::get('getClas', 'SubjectController@getClas');

Route::get('getUnit', 'SubjectController@getUnit');

Route::post('dashboard/create', 'SubjectController@create');

Route::get('dashboard/create/success', 'SubjectController@success');

Route::get('dashboard/create/{subject}', 'SubjectController@show');

Route::post('dashboard/create/{subject}', 'DocumentController@create');

Route::patch('dashboard/create/{subject}', 'SubjectController@update');

Route::delete('dashboard/create/{subject}', 'DocumentController@delete');

Route::get('dashboard/show/{subject}', 'DocumentController@show');

Route::get('dashboard/search', 'SearchController@read');

Route::post('dashboard/search', 'SearchController@create');

Route::get('reports', 'ReportController@read');

Route::post('reports', 'ReportController@create');

