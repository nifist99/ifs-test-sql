<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/','DashboardController@index');
Route::get('result','DashboardController@result');
Route::get('pemrograman','DashboardController@pemrograman');

//branch-category
Route::get('branch-category','BranchCategoryController@index');
Route::get('create/branch-category','BranchCategoryController@create');
Route::get('edit/{id}/branch-category','BranchCategoryController@edit');
Route::get('detail/{id}/branch-category','BranchCategoryController@detail');
Route::get('delete/branch-category/{id}','BranchCategoryController@destroy');
Route::post('insert/branch-category','BranchCategoryController@store');
Route::post('update/branch-category','BranchCategoryController@update');

//branch
Route::get('branch','BranchController@index');
Route::get('create/branch','BranchController@create');
Route::get('edit/{id}/branch','BranchController@edit');
Route::get('detail/{id}/branch','BranchController@detail');
Route::get('delete/branch/{id}','BranchController@destroy');
Route::post('insert/branch','BranchController@store');
Route::post('update/branch','BranchController@update');

//branch-assignment
Route::get('branch-assigntment','BranchAssigntmentController@index');
Route::get('create/branch-assigntment','BranchAssigntmentController@create');
Route::get('edit/{id}/branch-assigntment','BranchAssigntmentController@edit');
Route::get('detail/{id}/branch-assigntment','BranchAssigntmentController@detail');
Route::get('delete/branch-assigntment/{id}','BranchAssigntmentController@destroy');
Route::post('insert/branch-assigntment','BranchAssigntmentController@store');
Route::post('update/branch-assigntment','BranchAssigntmentController@update');

//sales
Route::get('sales','SalesController@index');
Route::get('create/sales','SalesController@create');
Route::get('edit/{id}/sales','SalesController@edit');
Route::get('detail/{id}/sales','SalesController@detail');
Route::get('delete/sales/{id}','SalesController@destroy');
Route::post('insert/sales','SalesController@store');
Route::post('update/sales','SalesController@update');


Route::get('sales-transaction','SalesTransactionController@index');
Route::get('create/sales-transaction','SalesTransactionController@create');
Route::get('edit/{id}/sales-transaction','SalesTransactionController@edit');
Route::get('detail/{id}/sales-transaction','SalesTransactionController@detail');
Route::get('delete/sales-transaction/{id}','SalesTransactionController@destroy');
Route::post('insert/sales-transaction','SalesTransactionController@store');
Route::post('update/sales-transaction','SalesTransactionController@update');