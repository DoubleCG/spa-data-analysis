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


Route::middleware(['auth:api'])->group(function () {
    Route::post('/logout', 'Auth\LoginController@logout');
    
    Route::get('/allDishSales', 'DataController@allDishSales');
    
    
    Route::get('/fincance', 'DataController@finance');
    Route::get('/orderDeital', 'DataController@orderDetial');
    
    Route::post('/orderCheck', 'DataController@orderCheck');
    Route::post('/popular', 'DataController@popular');
    
    Route::prefix('home')->group(function () {
        Route::get('/moneyOverView', 'HomeController@moneyOverView');
        Route::get('/payType', 'HomeController@payType');
        Route::get('/weekFinance', 'HomeController@WeekFinance');
        Route::get('/todayClient', 'HomeController@TodayClient');
        Route::get('/multiplePopular', 'HomeController@multiplePopular');
        Route::get('/singlePopular', 'HomeController@singlePopular');
        
    });
    
    
    Route::get('/dishName', 'DataController@dishName');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');


Route::post('/token/refresh', 'Auth\LoginController@refresh');

Route::post('/exportExcel', 'ExcelController@exportExcel');

Route::get('/dishSales', 'DataController@dishSales');


Route::get('/dishSales', 'DataController@dishSales');

Route::prefix('finance')->group(function () {
    
    Route::get('/orderNum', 'FinanceController@orderNum');
    Route::get('/turnover', 'FinanceController@turnover');
    Route::get('/turnoverDetail', 'FinanceController@turnoverDetail');
    Route::get('/oderMoneyDistribute', 'FinanceController@oderMoneyDistribute');
    Route::get('/payType', 'FinanceController@payType');
});



Route::prefix('sales')->group(function () {
    Route::get('/popularPackage', 'SalesController@popularPackage');
    Route::get('/popularFood', 'SalesController@popularFood');
    Route::get('/foodInfo', 'SalesController@foodInfo');
    Route::get('/foodSales', 'SalesController@foodSales');
    Route::get('/foodSalesDetail', 'SalesController@foodSalesDetail');
    Route::get('/foodSalesPackage', 'SalesController@foodSalesPackage');

});

Route::get('/trafficDetail', 'ClientController@trafficDetail');
Route::get('/avClient', 'ClientController@avClient');
Route::get('/allFood', 'DishController@allFood');
Route::get('/exportSalesData', 'SalesController@exportSalesData');
Route::get('/salesAnalData', 'SalesController@exportSalesAnalData');
Route::get('/salesSearchData', 'SalesController@exportSalesSearchData');
Route::get('/exportDetail', 'SalesController@exportDetail');

Route::get('/meatAndVege', 'SalesController@meatAndVege');


Route::get('/test', 'SalesController@test');








