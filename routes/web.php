<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/expired', [HomeController::class, 'expire'])->name('expire');

Auth::routes();


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
// Route::middleware(['auth', 'user-access:user'])->group(function () {
  
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth:web,admin']], function() {
  
    Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('/product', ProductController::class);
    Route::resource('/user', UserController::class);
    Route::get('/admin', [UserController::class, 'adminshow'])->name('adminuser');
    Route::get('/SubscribedUser', [SubscriptionController::class, 'Subshow'])->name('Subshow');
    Route::patch('/SubscribedUserEdit', [SubscriptionController::class, 'update'])->name('Subupdate');
    Route::delete('/SubscribedUserdel', [SubscriptionController::class, 'destroy'])->name('Subdelete');
    Route::resource('/plans',PlanController::class);
    
    
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/subscribe/{type}', [SubscriptionController::class, 'subscribe'])->name('sub');
    Route::get('/panel', [SubscriptionController::class, 'panel'])->name('panel')->middleware('subscription.expired');
    Route::resource('/product', ProductController::class)->middleware('subscription.expired');
    Route::get('/order', [OrderController::class, 'index'])->name('order')->middleware('subscription.expired');
    Route::get('/order/{id}', [OrderController::class, 'addtoCart'])->name('addcart')->middleware('subscription.expired');
    Route::patch('/update-shopping-cart', [OrderController::class, 'update'])->name('update_cart')->middleware('subscription.expired');
    Route::delete('/delete-cart-product', [OrderController::class, 'deleteProduct'])->name('delete.cart.product')->middleware('subscription.expired');
});

// SSLCOMMERZ Start
Route::post('/payment', [SubscriptionController::class, 'order'])->name("payment")->middleware(['auth', 'user-access:manager']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

//SSLCOMMERZ END
