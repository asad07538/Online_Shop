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

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/myorders/', 'GuestController@myorders')->name('myorders')->middleware('auth'); 

//user routes 
Route::get('/users/', 'usercontroller@index')->name('user')->middleware('auth'); 
Route::get('/users/create', 'usercontroller@create')->name('user.create')->middleware('auth'); 
Route::post('/users/store', 'usercontroller@store')->name('user.store')->middleware('auth'); 
Route::post('/users/update', 'usercontroller@update')->name('user.update')->middleware('auth'); 
Route::get('/users/edit/{id}', 'usercontroller@edit')->name('user.edit')->middleware('auth'); 
Route::get('/users/show/{id}', 'usercontroller@show')->name('user.show')->middleware('auth'); 
Route::get('/user/', 'usercontroller@myprofile')->name('user.my')->middleware('auth');
Route::post('user', 'UserController@update_avatar');

Route::get('/registered_customers/', 'usercontroller@registered_customers')->name('registered_customers');
// Route::get('/user/', 'UserController@profile')->name('user')->middleware('auth'); 


 //Permission routes 
Route::get('/permission/', 'PermissionController@index')->name('permission')->middleware('auth'); 

 //Group routes 
Route::get('/group/', 'GroupController@index')->name('group')->middleware('auth'); 
Route::get('/group/create', 'GroupController@create')->name('group.create')->middleware('auth'); 
Route::post('/group/store', 'GroupController@store')->name('group.store')->middleware('auth'); 
Route::get('/group/edit/{id}', 'GroupController@edit')->name('group.edit')->middleware('auth'); 
Route::post('/group/update', 'GroupController@update')->name('group.update')->middleware('auth'); 
Route::get('/group/show{id}', 'GroupController@show')->name('group.show')->middleware('auth');
Route::get('/group/{id}/delete', 'GroupController@destroy')->name('group.delete')->middleware('auth');


// Route::get('/home', 'HomeController@index')->name('home');

// guest routes
// Route::group(['prefix' => 'admin'], function(){
Route::get('/', 'GuestController@home')->name('home');
Route::get('/home', 'GuestController@home')->name('home');
Route::get('/mobiles/{id}', 'GuestController@mobiles')->name('mobile');
Route::get('/company/{id}', 'GuestController@company')->name('company');
Route::get('/phone_model/{id}', 'GuestController@phone_model')->name('phone_model');
Route::get('/shop/{id}', 'GuestController@shop')->name('shop');
Route::get('/product/{id}', 'GuestController@product')->name('product');

// Route::get('/order/product/{pid}', 'GuestController@product')->name('product');

Route::get('/order/store/{id}', 'GuestController@order')->name('order');
Route::get('/order/payment/{id}', 'GuestController@payment')->name('payment');
Route::post('/order/payment_back/', 'GuestController@payment_back')->name('payment_back');

Route::get('/order/dummypay/{id}', 'GuestController@dummypay')->name('dummypay');

Route::post('/payment_success/', 'GuestController@payment_status')->name('payment_sucess');

// });



// Admin Group
Route::group(['as'=>'admin.', 'prefix' => 'admin', 'middleware' => 'auth' ], function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('employee', 'EmployeeController');
    Route::resource('customer', 'CustomerController');
  
    
    Route::resource('supplier', 'SupplierController');
    Route::resource('advanced_salary', 'AdvancedSalaryController');
    Route::resource('salary', 'SalaryController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::post('product_image', 'ProductController@product_image')->name('product_image');



    Route::resource('expense', 'ExpenseController');
    Route::get('expense-today', 'ExpenseController@today_expense')->name('expense.today');
    Route::get('expense-month/{month?}', 'ExpenseController@month_expense')->name('expense.month');
    Route::get('expense-yearly/{year?}', 'ExpenseController@yearly_expense')->name('expense.yearly');

    Route::get('setting', 'SettingController@index')->name('setting.index');
    Route::put('setting/{id}', 'SettingController@update')->name('setting.update');

    Route::resource('pos', 'PosController');

    Route::get('order/show/{id}', 'OrderController@show')->name('order.show');
    Route::get('order/pending', 'OrderController@pending_order')->name('order.pending');
    Route::get('order/approved', 'OrderController@approved_order')->name('order.approved');
    Route::get('order/delivered', 'OrderController@delivered')->name('order.delivered');


    Route::get('order/deliver/store/{id}', 'OrderController@deliver_store')->name('order.deliver');


    Route::get('order/confirm/{id}', 'OrderController@order_confirm')->name('order.confirm');
    Route::delete('order/delete/{id}', 'OrderController@destroy')->name('order.destroy');
    Route::get('order/download/{id}', 'OrderController@download')->name('order.download');

    Route::get('sales-today', 'OrderController@today_sales')->name('sales.today');
    Route::get('sales-monthly/{month?}', 'OrderController@monthly_sales')->name('sales.monthly');
    Route::get('sales-total','OrderController@total_sales')->name('sales.total');

    Route::resource('cart', 'CartController');

    Route::post('invoice', 'InvoiceController@create')->name('invoice.create');
    Route::get('print/{customer_id}', 'InvoiceController@print')->name('invoice.print');
    Route::get('order-print/{order_id}', 'InvoiceController@order_print')->name('invoice.order_print');
    Route::post('invoice-final', 'InvoiceController@final_invoice')->name('invoice.final_invoice');

    Route::get('/cash/index', 'CashReceiptsController@index')->name('cash.index');
    Route::post('/cashreceipt', 'CashReceiptsController@create')->name('invoice.cashreceipt');


    Route::get('/cash/payables', 'CashPaymentController@index')->name('cash.payables');    
    Route::post('/cashpayment', 'CashPaymentController@create')->name('invoice.cashpayment');


// Purchase Routes
    Route::get('/purchases', 'PurchaseController@index')->name('purchases');
    Route::get('/purchase/show/{id}', 'PurchaseController@show')->name('purchases.show');
    Route::get('/purchase/create', 'PurchaseController@create')->name('purchases.new');
    Route::post('/purchase/store', 'PurchaseController@store')->name('purchases.store');
    Route::post('/purchase/delete/{id}', 'PurchaseController@destroy')->name('purchases.delete');

// Phone Model
    Route::resource('phone_model', 'PhoneModelController');
// company Routes
    Route::resource('company', 'CompanyController');
// shop Routes
    Route::resource('shop', 'ShopController');

    
});
