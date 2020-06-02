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

Route::GET('/nutrition/customer', 'CustomerController@index')->name('customer.index')->middleware('role:receptionist');


//cusotmer

 	Route::get('/nutrition/customer', 'CustomerController@index')->name('customer.index')->middleware('role:receptionist');;

 	Route::get('/nutrition/customer/{id}/edit','CustomerController@edit')->name('customer.edit')->middleware('role:receptionist');;

    Route::get('/nutrition/customer/{id}/delete','CustomerController@destroy')->name('customer.destroy')->middleware('role:receptionist');;

    Route::get('/nutrition/customer/create','CustomerController@create')->name('customer.create')->middleware('role:receptionist');;

    Route::post('/nutrition/customer/create','CustomerController@store')->name('customer.store')->middleware('role:receptionist');;

    Route::post('/nutrition/customer/update','CustomerController@update')->name('customer.update')->middleware('role:receptionist');;

    Route::get('get-sector-list','CustomerController@getSectorList')->middleware('role:receptionist');
    Route::get('get-cell-list','CustomerController@getCellList');


    //cusotmer

  Route::get('/nutrition/appointment', 'AppointmentController@index')->name('appointment.index')->middleware('role:receptionist');

  Route::get('/nutrition/appointment/{id}/edit','AppointmentController@edit')->name('appointment.edit')->middleware('role:receptionist');

    Route::get('/nutrition/appointment/{id}/delete','AppointmentController@destroy')->name('appointment.destroy')->middleware('role:receptionist');

    Route::get('/nutrition/appointment/create','AppointmentController@create')->name('appointment.create')->middleware('role:receptionist');

    Route::post('/nutrition/appointment/create','AppointmentController@store')->name('appointment.store')->middleware('role:receptionist');

    Route::post('/nutrition/appointment/update','AppointmentController@update')->name('appointment.update')->middleware('role:receptionist');


// consultation payment

    Route::get('/nutrition/payment', 'PaymentController@index')->name('payment.index')->middleware('role:receptionist');

 	Route::get('/nutrition/payment/{id}/edit','PaymentController@edit')->name('payment.edit')->middleware('role:receptionist');

    Route::get('/nutrition/payment/{id}/delete','PaymentController@destroy')->name('payment.destroy')->middleware('role:receptionist');

    Route::get('/nutrition/payment/{id}/create','PaymentController@create')->name('payment.create')->middleware('role:receptionist');

    Route::post('/nutrition/payment/create','PaymentController@store')->name('payment.store')->middleware('role:receptionist');

    Route::post('/nutrition/payment/update','PaymentController@update')->name('payment.update')->middleware('role:receptionist');

       Route::get('/nutrition/payment/daily', 'PaymentController@dailySalesReport')->name('payment.daily')->middleware('role:receptionist'); 



       // some receptionist report

       Route::get('/nutrition/payment/report/first', 'PaymentController@first')->name('report.first')->middleware('role:receptionist');

       Route::get('/nutrition/payment/report/second', 'PaymentController@second')->name('report.second')->middleware('role:receptionist');

       Route::get('/nutrition/payment/report/more', 'PaymentController@more')->name('report.more')->middleware('role:receptionist');

        Route::get('/nutrition/payment/report/daily', 'PaymentController@daily')->name('report.daily.payment')->middleware('role:receptionist');

        Route::post('/nutrition/payment/report/summaryBetween', 'PaymentController@betweenDateSalesReport')->name('report.between.receptionist')->middleware('role:receptionist');



       //cunsultation process

       // consultation payment

    Route::get('/nutrition/consultation', 'CunsultationController@index')->name('consultation.index')->middleware('role:doctor');


    Route::get('/nutrition/consultation/{id}/edit','CunsultationController@edit')->name('consultation.edit')->middleware('role:doctor');

    Route::get('/nutrition/consultation/{id}/delete','CunsultationController@destroy')->name('consultation.destroy')->middleware('role:doctor');

    // Route::get('/nutrition/consultation/create','CunsultationController@create')->name('consultation.create')->middleware('role:doctor');

    Route::post('/nutrition/consultation/create','CunsultationController@store')->name('consultation.store')->middleware('role:doctor');

    Route::post('/nutrition/consultation/update','CunsultationController@update')->name('consultation.update')->middleware('role:doctor');

       Route::get('/nutrition/consultation/daily', 'CunsultationController@dailySalesReport')->name('consultation.daily')->middleware('role:doctor');

       Route::get('/nutrition/consultation/customer', 'CunsultationController@customerCunsultation')->name('consultation.customer')->middleware('role:doctor');

       Route::get('/nutrition/consultation/{id}/create','CunsultationController@create')->name('consultation.create')->middleware('role:doctor'); 

       Route::post('/nutrition/consultation/nutrition','CunsultationController@saveNutrition')->name('consultation.nutrition')->middleware('role:doctor');

       Route::get('/nutrition/consultation/{id}/report','CunsultationController@report')->name('consultation.report')->middleware('role:doctor'); 


       //report on doctor 

       //history

        Route::get('/nutrition/consultation/report/customer', 'CunsultationController@customer')->name('report.customer')->middleware('role:doctor');

         Route::get('/nutrition/consultation/customer/{customer_id}/history','CunsultationController@history')->name('history.report')->middleware('role:doctor');

         //daily

         Route::get('/nutrition/consultation/report/customer/daily', 'CunsultationController@daily')->name('report.daily')->middleware('role:doctor');

         Route::get('/nutrition/consultation/customer/{id}/more/daily','CunsultationController@moreInfo')->name('more.info')->middleware('role:doctor');

         Route::post('/nutrition/consultation/report/customer/summaryBetween', 'CunsultationController@betweenDateSalesReport')->name('report.between')->middleware('role:doctor');




       


    // Route::post('/nutrition/searchCustomer', 'PaymentController@searchCustomer')->name('search.customer');


    // // Route::get('/nutrition/payment/receipt','PaymentController@show')->name('payment.receipt')->middleware('role:receptionist');

    // Route::get('/nutrition/payment/receipt', 'PaymentController@receipt')->name('payment.receipt')->middleware('role:receptionist');


       //product 

   Route::get('/nutrition/product', 'ProductController@index')->name('product.index')->middleware('role:production');

  Route::get('/nutrition/product/{id}/edit','ProductController@edit')->name('product.edit')->middleware('role:production');

    Route::get('/nutrition/product/{id}/delete','ProductController@destroy')->name('product.destroy')->middleware('role:production');

    Route::get('/nutrition/product/create','ProductController@create')->name('product.create')->middleware('role:production');

    Route::post('/nutrition/product/create','ProductController@store')->name('product.store')->middleware('role:production');

    Route::post('/nutrition/product/update','ProductController@update')->name('product.update')->middleware('role:production');

     Route::post('/nutrition/product/uploadFile', 'ProductController@uploadFile')->name('product.upload')->middleware('role:production');


        //stock damage 

   Route::get('/nutrition/stock/damage', 'ProductStoreController@index')->name('damage.index')->middleware('role:production');

  Route::get('/nutrition/stock/damage/{id}/edit','ProductStoreController@edit')->name('damage.edit')->middleware('role:production');

    Route::get('/nutrition/stock/damage/{id}/delete','ProductStoreController@destroy')->name('damage.destroy')->middleware('role:production');

    Route::get('/nutrition/stock/damage/create','ProductStoreController@create')->name('damage.create')->middleware('role:production');

    Route::post('/nutrition/stock/damage/create','ProductStoreController@store')->name('damage.store')->middleware('role:production');

    Route::post('/nutrition/stock/damage/update','ProductStoreController@update')->name('damage.update')->middleware('role:production');



    //Storage


       //product 

   Route::get('/nutrition/storage', 'ProductionStoreController@index')->name('storage.index')->middleware('role:production');


   //create buckup and view backup

   Route::get('/nutrition/storage/buckup', 'StockBuckupController@index')->name('buckup.index')->middleware('role:production');





   Route::get('/nutrition/stock', 'ProductionStoreController@stock')->name('storage.stock')->middleware('role:production');



   Route::get('/nutrition/storage/{id}/edit','ProductionStoreController@edit')->name('storage.edit')->middleware('role:production');

   
   Route::post('/nutrition/storage/increase','ProductionStoreController@increaseQuantity')->name('storage.updateQuantity')->middleware('role:production');





   Route::get('/nutrition/storage/{id}/increase','ProductionStoreController@increase')->name('storage.increase')->middleware('role:production');



   Route::get('/nutrition/storage/{id}/delete','ProductionStoreController@destroy')->name('storage.destroy')->middleware('role:production');

    Route::get('/nutrition/storage/create','ProductionStoreController@create')->name('storage.create')->middleware('role:production');

    Route::post('/nutrition/storege/create','ProductionStoreController@store')->name('storage.store')->middleware('role:production');

    Route::post('/nutrition/storage/update','ProductionStoreController@update')->name('storage.update')->middleware('role:production');


           //view shop request
    Route::get('/nutrition/storage/shopRequest', 'ProductRequestController@shopRequest')->name('storage.request')->middleware('role:production');

    //view shop request product

    Route::get('/nutrition/storage/{shop}/shopRequest','ProductRequestController@viewProduct')->name('shopRequest.view')->middleware('role:production');

    //approve request

     Route::get('/nutrition/storage/{id}/approve','ProductRequestController@approveProduct')->name('storage.approved')->middleware('role:production');

     //deliver request

     Route::get('/nutrition/storage/{id}/deliver','ProductRequestController@deliverProduct')->name('storage.deliver')->middleware('role:production');






    // NUTRITION


  Route::get('/nutrition/nutrition', 'NutritionController@index')->name('nutrition.index')->middleware('role:doctor');

  Route::get('/nutrition/nutrition/{id}/edit','NutritionController@edit')->name('nutrition.edit')->middleware('role:doctor');

    Route::get('/nutrition/nutrition/{id}/delete','NutritionController@destroy')->name('nutrition.destroy')->middleware('role:doctor');

    Route::get('/nutrition/nutrition/create','NutritionController@create')->name('nutrition.create')->middleware('role:doctor');

    Route::post('/nutrition/nutrition/create','NutritionController@store')->name('nutrition.store')->middleware('role:doctor');

    Route::post('/nutrition/nutrition/update','NutritionController@update')->name('nutrition.update')->middleware('role:doctor');




       //shop process

       // view customer consultation

    Route::get('/nutrition/shop/customer', 'ShopController@customerShop')->name('shop.customer')->middleware('role:sales');

     Route::get('/nutrition/shop/request','ShopController@requestProduct')->name('shop.request')->middleware('role:sales');

       Route::post('/nutrition/shop/request/create','ShopController@store')->name('productRequest.store')->middleware('role:sales');

       Route::get('/nutrition/shop/request/{id}/delete','ShopController@deleteRequest')->name('productRequest.destroy')->middleware('role:sales');

       //view Approved request

        Route::get('/nutrition/shop/approveRequest','ShopController@approvedRequest')->name('shop.approvedRequest')->middleware('role:sales');


         Route::get('/nutrition/shop/{id}/received','ShopController@approveProduct')->name('shop.received')->middleware('role:sales');




    Route::get('/nutrition/shop', 'ShopController@index')->name('shop.index')->middleware('role:sales');


    Route::get('/nutrition/shop/{id}/edit','ShopController@edit')->name('shop.edit')->middleware('role:sales');

    Route::get('/nutrition/shop/{id}/delete','ShopController@destroy')->name('sshop.destroy')->middleware('role:sales');

        Route::post('/nutrition/shop/create','ShopController@store')->name('shop.store')->middleware('role:sales');

    Route::post('/nutrition/shop/update','ShopController@update')->name('shop.update')->middleware('role:sales');

       Route::get('/nutrition/consultation/daily', 'ShopController@dailySalesReport')->name('shop.daily')->middleware('role:sales');

      
       Route::get('/nutrition/shop/{id}/create','ShopController@create')->name('shop.create')->middleware('role:sales'); 



       //shop payment


        Route::post('/nutrition/shop/payment','ShopController@payment')->name('shop.payment')->middleware('role:sales');


        //create backup and view backup for shop

   Route::get('/nutrition/shop/buckup', 'ShopBuckupController@index')->name('backup.index')->middleware('role:sales');

  // SALE PRODUCT AND OTHER OUTLER


  Route::get('/nutrition/shop/sale', 'SaleController@index')->name('sale.index')->middleware('role:sales');

  Route::get('/nutrition/shop/sale/{id}/edit','SaleController@edit')->name('sale.edit')->middleware('role:sales');

    Route::get('/nutrition/shop/sale/{id}/delete','SaleController@destroy')->name('sale.destroy')->middleware('role:sales');

    Route::get('/nutrition/shop/sale/{id}/creates','SaleController@create')->name('sale.sales')->middleware('role:sales');

    

    Route::post('/nutrition/shop/sale/creates','SaleController@store')->name('sale.store')->middleware('role:sales');

    Route::post('/nutrition/shop/sale/update','SaleController@update')->name('sale.update')->middleware('role:sales');

    Route::get('/nutrition/shop/sale/{id}/receipt','SaleController@receipt')->name('sale.receipt')->middleware('role:sales'); 

    Route::post('/nutrition/shop/sale/payment','SaleController@payment')->name('sale.payment')->middleware('role:sales');


   


    // other outlet


    Route::get('/nutrition/shop/sale/other', 'SaleController@viewOther')->name('other.index')->middleware('role:sales');

  

    Route::get('/nutrition/shop/sale/other/{id}/delete','SaleController@destroyOther')->name('other.destroy')->middleware('role:sales');

   

    Route::post('/nutrition/shop/sale/other','SaleController@other')->name('other.store')->middleware('role:sales');


    //sales report

     // other outlet


    Route::get('/nutrition/shop/sale/customer', 'SaleController@viewSales')->name('sale.index')->middleware('role:sales');


    //stock

    //final product

    

  Route::get('/nutrition/product/final', 'FinalproductController@index')->name('finalProduct.index')->middleware('role:production');

  Route::get('/nutrition/product/final/{id}/edit','FinalproductController@edit')->name('finalProduct.edit')->middleware('role:production');

    Route::get('/nutrition/product/final/{id}/delete','FinalproductController@destroy')->name('finalProduct.destroy')->middleware('role:production');

    Route::get('/nutrition/product/final/create','FinalproductController@create')->name('finalProduct.create')->middleware('role:production');

    Route::post('/nutrition/product/final/create','FinalproductController@store')->name('finalProduct.store')->middleware('role:production');

    Route::post('/nutrition/product/final/update','FinalproductController@update')->name('finalProduct.update')->middleware('role:production');


    //Row Material product

    

  Route::get('/nutrition/product/row/material', 'RowproductController@index')->name('rowProduct.index')->middleware('role:production');



  Route::get('/nutrition/product/row/material/{id}/edit','RowproductController@edit')->name('rowProduct.edit')->middleware('role:production');

    Route::get('/nutrition/product/row/material/{id}/delete','RowproductController@destroy')->name('rowProduct.destroy')->middleware('role:production');

    Route::get('/nutrition/product/row/material/create','RowproductController@create')->name('rowProduct.create')->middleware('role:production');

    Route::post('/nutrition/product/row/material/create','RowproductController@store')->name('rowProduct.store')->middleware('role:production');

    Route::post('/nutrition/product/row/material/update','RowproductController@update')->name('rowProduct.update')->middleware('role:production');

      Route::get('/nutrition/product/row/material/out/preparation', 'RowproductController@out')->name('rowProduct.out')->middleware('role:production');



       // product to be prepared

    

  Route::get('/nutrition/product/preparation', 'PreparationController@index')->name('preparation.index')->middleware('role:production');

  Route::get('/nutrition/product/preparation/edit/{id}','PreparationController@edit')->name('preparation.edit')->middleware('role:production');

    Route::get('/nutrition/product/preparation/delete/{id}','PreparationController@destroy')->name('preparation.destroy')->middleware('role:production');

    Route::get('/nutrition/product/preparation/create/{id}','PreparationController@create')->name('preparation.create')->middleware('role:production');

    Route::post('/nutrition/product/preparation/create','PreparationController@store')->name('preparation.store')->middleware('role:production');

    Route::post('/nutrition/product/preparation/update','PreparationController@update')->name('preparation.update')->middleware('role:production');


       // product after preparation

    

  Route::get('/nutrition/product/after/preparation', 'AfterPreparationController@index')->name('after.preparation.index')->middleware('role:production');

  Route::get('/nutrition/product/after/preparation/edit/{id}','AfterPreparationController@edit')->name('after.preparation.edit')->middleware('role:production');

    Route::get('/nutrition/product/after/preparation/delete/{id}','AfterPreparationController@destroy')->name('after.preparation.destroy')->middleware('role:production');

    Route::get('/nutrition/product/after/preparation/create/{id}','AfterPreparationController@create')->name('after.preparation.create')->middleware('role:production');

    Route::post('/nutrition/product/after/preparation/create','AfterPreparationController@store')->name('after.preparation.store')->middleware('role:production');

    Route::post('/nutrition/product/after/preparation/update','AfterPreparationController@update')->name('after.preparation.update')->middleware('role:production');


       // product in production

    
 Route::get('/nutrition/product/production', 'ProductionController@index')->name('production.index')->middleware('role:production');

  Route::get('/nutrition/product/production/edit/{id}','ProductionController@edit')->name('production.edit')->middleware('role:production');

    Route::get('/nutrition/product/production/delete/{id}','ProductionController@destroy')->name('production.destroy')->middleware('role:production');

    Route::get('/nutrition/product/production/create/{id}','ProductionController@create')->name('production.create')->middleware('role:production');

    Route::post('/nutrition/product/production/create','ProductionController@store')->name('production.store')->middleware('role:production');

    Route::post('/nutrition/product/production/update','ProductionController@update')->name('production.update')->middleware('role:production');


     // product after preparation

    

  Route::get('/nutrition/product/after/production', 'AfterProductionController@index')->name('after.production.index')->middleware('role:production');

  Route::get('/nutrition/product/after/production/edit/{id}','AfterProductionController@edit')->name('after.production.edit')->middleware('role:production');

    Route::get('/nutrition/product/after/production/delete/{id}','AfterProductionController@destroy')->name('after.production.destroy')->middleware('role:production');

    Route::get('/nutrition/product/after/production/create/{id}','AfterProductionController@create')->name('after.production.create')->middleware('role:production');

    Route::post('/nutrition/product/after/production/create','AfterProductionController@store')->name('after.production.store')->middleware('role:production');

    Route::post('/nutrition/product/after/production/update','AfterProductionController@update')->name('after.production.update')->middleware('role:production');


    

    


  




