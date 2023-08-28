<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/','indexWeb');

Route::group(['middleware'=>['auth'],'prefix'=>"admin"], function () {
    Route::get('/', 'dashboardController')->name('dashboard.index');
    Route::resource('material', 'MaterialController')->except(['show']);
    Route::resource('bundle-material', 'BundleController');
    Route::resource('uom', 'UomController')->except(['show']);
    Route::resource('user', 'UserController')->except(['show']);
    Route::get('customer/search', 'customerSearchController')->name('search');
    Route::get('customer/selectjs', 'customerSelectJSController')->name('customer.search');
    Route::resource('customer', 'CustomerController')->except(['show']);
    Route::resource('seller', 'SalesController')->except(['show']);
    Route::resource('ads', 'AdsController')->except(['show']);
    Route::resource('bundle', 'BundleController');
    Route::get('order/history', 'historyOrderController')->name('order.history');
    Route::get('order/datatables', 'orderDatatablesController')->name('order.datatables');
    Route::get('messages/datatables', 'messageDatatablesController')->name('message.datatables');
    Route::get('messages', 'messageController')->name('message.show');

    Route::get('reject/{order}/edit', 'rejectReportController@edit')->name('reject.edit');
    Route::get('reject/{order}', 'rejectReportController@show')->name('reject.show');
    Route::put('reject/{order}/update', 'rejectReportController@update')->name('reject.update');

    Route::resource('order', 'orderController');
    Route::get('completed-order/selectjs', 'completedOrderSelectJsController')->name('completed-order.search');
    Route::get('completed-order/material-report/{id}', 'materialReportFormController')->name('material-report.create');
    Route::get('completed-order/datatables', 'completedOrderDatatablesController')->name('completed-order.datatables');
    Route::get('completed-order/accept/{order}', 'acceptController')->name('completed-order.accept');
    Route::get('completed-order/{order}/pdf', 'completedOrderPDFController')->name('completed-order.pdf');
    Route::resource('completed-order', 'completedOrderController');
    Route::resource('material-out', 'materialOutController');
    Route::resource('material-opname', 'materialOpnameController');
    Route::any('report/order/', 'orderReportController@index')->name('orderReport.index');
    Route::get('report/order/{year}/{month}/pdf', 'orderReportController@pdf')->name('orderReport.pdf');
    Route::any('report/material-reject/', 'materialRejectReportController@index')->name('material-rejectReport.index');
    Route::get('report/material-reject/{year}/{month}/pdf', 'materialRejectReportController@pdf')->name('material-rejectReport.pdf');
    Route::any('report/material-stock/', 'stockMaterialReport@index')->name('material-stock.index');
    Route::get('report/material-stock/pdf', 'stockMaterialReport@pdf')->name('material-stock.pdf');
});
Auth::routes();

