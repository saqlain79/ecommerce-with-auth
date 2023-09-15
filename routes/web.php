<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    route::get('/admin', [AdminController::class, 'admin'])->name('admin');
});

//redirect when auth
route::get('/redirect',[HomeController::class,'redirect'])->name('redirect')->middleware('auth','verified');

route::get('/', [HomeController::class, 'index'])->name('index');

route::get('/view_catagory', [AdminController::class, 'view_catagory'])->name('view_catagory');

route::post('/add_catagory', [AdminController::class, 'add_catagory'])->name('add_catagory');

route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory'])->name('delete_catagory');

route::get('/view_product', [AdminController::class, 'view_product'])->name('view_product');

route::post('/add_product', [AdminController::class, 'add_product'])->name('add_product');

route::get('/show_product', [AdminController::class, 'show_product'])->name('show_product');

route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');

route::get('/update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');

route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm'])->name('update_product_confirm');

route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');

route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');

route::get('/view_cart', [HomeController::class, 'view_cart'])->name('view_cart');

route::get('/delete_car_item/{id}', [HomeController::class, 'delete_cart_item'])->name('delete_cart_item');

route::get('/cash_order', [HomeController::class, 'cash_order'])->name('cash_order');

route::get('/stripe/{total}', [HomeController::class, 'stripe'])->name('stripe');

Route::post('stripe/{total}', [HomeController::class, 'stripePost'])->name('stripe.post');

//admin orders
route::get('/view_order', [AdminController::class, 'view_order'])->name('view_order');

//order delivery action
route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');

//print pdf
route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf'])->name('print_pdf');

//send email
route::get('/send_email/{id}', [AdminController::class, 'send_email'])->name('send_email');

route::post('/send_user_mail/{id}', [AdminController::class, 'send_user_mail'])->name('send_user_mail');

//searchbox
route::get('/search', [AdminController::class, 'search'])->name('search');

//show order for user
route::get('/show_order', [HomeController::class, 'show_order'])->name('show_order');

//cancel order for user
route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order'])->name('cancel_order');

//add comment
route::post('/add_comment', [HomeController::class, 'add_comment'])->name('add_comment');

//add reply
route::post('/add_reply', [HomeController::class, 'add_reply'])->name('add_reply');

//product search
route::get('/product_search', [HomeController::class, 'product_search'])->name('product_search');

//product page
route::get('/product_page', [HomeController::class, 'product_page'])->name('product_page');

//search product
route::get('/search_pr', [HomeController::class, 'search_pr'])->name('search_pr');

//error page
route::get('/access_deny', [HomeController::class, 'access_deny'])->name('access_deny');