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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nutrition/customer', function () {
    return view('customer.index');
});

Route::GET('/nutrition/customer', 'CustomerController@index')->name('customer.index');


//cusotmer

 	Route::get('/nutrition/customer', 'CustomerController@index')->name('customer.index');

 	Route::get('/nutrition/customer/{id}/edit','CustomerController@edit')->name('customer.edit');

    Route::get('/nutrition/customer/{id}/delete','CustomerController@destroy')->name('customer.destroy');

    Route::get('/nutrition/customer/create','CustomerController@create')->name('customer.create');

    Route::post('/nutrition/customer/create','CustomerController@store')->name('customer.store');

    Route::post('/nutrition/customer/update','CustomerController@update')->name('customer.update');

    Route::get('get-sector-list','CustomerController@getSectorList');
    Route::get('get-cell-list','CustomerController@getCellList');


    //cusotmer

  Route::get('/nutrition/appointment', 'AppointmentController@index')->name('appointment.index');

  Route::get('/nutrition/appointment/{id}/edit','AppointmentController@edit')->name('appointment.edit');

    Route::get('/nutrition/appointment/{id}/delete','AppointmentController@destroy')->name('appointment.destroy');

    Route::get('/nutrition/appointment/create','AppointmentController@create')->name('appointment.create');

    Route::post('/nutrition/appointment/create','AppointmentController@store')->name('appointment.store');

    Route::post('/nutrition/appointment/update','AppointmentController@update')->name('appointment.update');


// consultation payment

    Route::get('/nutrition/payment', 'PaymentController@index')->name('payment.index');

 	Route::get('/nutrition/payment/{id}/edit','PaymentController@edit')->name('payment.edit');

    Route::get('/nutrition/payment/{id}/delete','PaymentController@destroy')->name('payment.destroy');

    Route::get('/nutrition/payment/{id}/create','PaymentController@create')->name('payment.create');

    Route::post('/nutrition/payment/create','PaymentController@store')->name('payment.store');

    Route::post('/nutrition/payment/update','PaymentController@update')->name('payment.update');

   Route::get('/nutrition/payment/daily', 'PaymentController@dailySalesReport')->name('payment.daily'); 



       // some receptionist report

       Route::get('/nutrition/payment/report/first', 'PaymentController@first')->name('report.first');

       Route::get('/nutrition/payment/report/second', 'PaymentController@second')->name('report.second');

       Route::get('/nutrition/payment/report/more', 'PaymentController@more')->name('report.more');

        Route::get('/nutrition/payment/report/daily', 'PaymentController@daily')->name('report.daily.payment');

        Route::post('/nutrition/payment/report/summaryBetween', 'PaymentController@betweenDateSalesReport')->name('report.between.receptionist');



       //cunsultation process

       // consultation payment

    Route::get('/nutrition/consultation', 'CunsultationController@index')->name('consultation.index');


    Route::get('/nutrition/consultation/{id}/edit','CunsultationController@edit')->name('consultation.edit');

    Route::get('/nutrition/consultation/{id}/delete','CunsultationController@destroy')->name('consultation.destroy');

    // Route::get('/nutrition/consultation/create','CunsultationController@create')->name('consultation.create');

    Route::post('/nutrition/consultation/create','CunsultationController@store')->name('consultation.store');

    Route::post('/nutrition/consultation/update','CunsultationController@update')->name('consultation.update');

       Route::get('/nutrition/consultation/daily', 'CunsultationController@dailySalesReport')->name('consultation.daily');

       Route::get('/nutrition/consultation/customer', 'CunsultationController@customerCunsultation')->name('consultation.customer');

       Route::get('/nutrition/consultation/{id}/create','CunsultationController@create')->name('consultation.create'); 

       Route::post('/nutrition/consultation/nutrition','CunsultationController@saveNutrition')->name('consultation.nutrition');

       Route::get('/nutrition/consultation/{id}/report','CunsultationController@report')->name('consultation.report'); 


       //report on doctor 

       //history

        Route::get('/nutrition/consultation/report/customer', 'CunsultationController@customer')->name('report.customer');

         Route::get('/nutrition/consultation/customer/{customer_id}/history','CunsultationController@history')->name('history.report');

         //daily

         Route::get('/nutrition/consultation/report/customer/daily', 'CunsultationController@daily')->name('report.daily');

         Route::get('/nutrition/consultation/customer/{id}/more/daily','CunsultationController@moreInfo')->name('more.info');

         Route::post('/nutrition/consultation/report/customer/summaryBetween', 'CunsultationController@betweenDateSalesReport')->name('report.between');




       


    // Route::post('/nutrition/searchCustomer', 'PaymentController@searchCustomer')->name('search.customer');


    // // Route::get('/nutrition/payment/receipt','PaymentController@show')->name('payment.receipt');

    // Route::get('/nutrition/payment/receipt', 'PaymentController@receipt')->name('payment.receipt');


       //product 



    // NUTRITION


  Route::get('/nutrition/nutrition', 'NutritionController@index')->name('nutrition.index');

  Route::get('/nutrition/nutrition/{id}/edit','NutritionController@edit')->name('nutrition.edit');

    Route::get('/nutrition/nutrition/{id}/delete','NutritionController@destroy')->name('nutrition.destroy');

    Route::get('/nutrition/nutrition/create','NutritionController@create')->name('nutrition.create');

    Route::post('/nutrition/nutrition/create','NutritionController@store')->name('nutrition.store');

    Route::post('/nutrition/nutrition/update','NutritionController@update')->name('nutrition.update');





  Route::get('/nutrition/product/preparation', 'PreparationController@index')->name('preparation.index');

  Route::get('/nutrition/product/preparation/edit/{id}','PreparationController@edit')->name('preparation.edit');

    Route::get('/nutrition/product/preparation/delete/{id}','PreparationController@destroy')->name('preparation.destroy');

    Route::get('/nutrition/product/preparation/create/{id}','PreparationController@create')->name('preparation.create');

    Route::post('/nutrition/product/preparation/create','PreparationController@store')->name('preparation.store');

    Route::post('/nutrition/product/preparation/update','PreparationController@update')->name('preparation.update');


    //document route

    Route::get('/nutrition/document', 'DocumentController@index')->name('document.index');

 	Route::get('/nutrition/document/{id}/edit','DocumentController@edit')->name('document.edit');

    Route::get('/nutrition/document/{id}/delete','DocumentController@destroy')->name('document.destroy');

    Route::get('/nutrition/document/create','DocumentController@create')->name('document.create');

    Route::post('/nutrition/document/create','DocumentController@store')->name('document.store');

    Route::post('/nutrition/document/update','DocumentController@update')->name('document.update');
    Route::get('/nutrition/document/download/{file}','DocumentController@download')->name('document.download');

//  Route::get('/nutrition/document/{id}/show','DocumentController@show')->name('document.show');

// Route::get('/school/report', 'ReportController@index')->name('report.index');
// Route::get('/school/report/{id}/edit','ReportController@edit')->name('report.edit');
// Route::get('/school/report/{id}/show','ReportController@show')->name('report.show');
// Route::get('/school/report/{id}/delete','ReportController@destroy')->name('report.destroy');
// Route::get('/school/report/create','ReportController@create')->name('report.create');
// Route::post('/school/report/create','ReportController@store')->name('report.store');
// Route::post('/school/report/update','ReportController@update')->name('report.update');
// Route::get('/school/report/download/{file}','ReportController@download')->name('report.download');


