<?php

use Illuminate\Support\Facades\Route;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\RegisterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Web\ProductDetailsController;
use App\Http\Controllers\web\CartController;
use App\Http\Controllers\web\CheckoutController;
use App\Http\Controllers\web\OrderDetailsController;
use App\Http\Controllers\Admin\FranchiseController;
use App\Http\Controllers\Admin\BlogController;

// use App\Http\Controllers\Admin\Website;
// use App\Http\Controllers\web\Website;



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

Route::group(['middleware' => 'admin','web'], function () {
    //  Route::get('admin/brand/mail1', function () {Mail::to('alexalphons82@gmail.com')->send(new SendMail($data));});

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/admin/list', [AdminController::class, 'admin_list']);
    Route::get('admin/admin/add', [AdminController::class, 'admin_add']);
    Route::post('admin/admin/add', [AdminController::class, 'add_admin_insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'add_admin_edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'admin_add_update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'admin_add_delete']);

    Route::get('admin/category/list', [CategoryController::class, 'category_list']);
    Route::get('admin/category/add', [CategoryController::class, 'category_add']);
    Route::post('admin/category/add', [CategoryController::class, 'category_insert']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'category_edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'category_update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'category_delete']);


    Route::get('admin/brand/add', [MailController::class, 'brand_add'])->name('add-new');
    Route::post('admin/brand/add', [MailController::class, 'store']);
    Route::get('admin/brand/list', [MailController::class, 'list'])->name('brand-list');
    Route::get('admin/brand/edit/{id}', [MailController::class, 'brand_edit'])->name('edit-brand');
    Route::post('admin/brand/edit/{id}', [MailController::class, 'brand_update']);
    Route::get('admin/brand/delete/{id}', [MailController::class, 'brand_delete'])->name('delete-brand');
    Route::get('admin/maillist', [MailController::class, 'maillist']);
    Route::get('admin/brand/deletemail/{id}', [MailController::class, 'deletemail']);
    Route::get('admin/franchiselist', [FranchiseController::class, 'list'])->name('franchiselist');
    Route::get('admin/franchise/delete/{id}', [FranchiseController::class, 'delete']);



    // Route::get('admin/brand/mail/{arg1}/{arg2}', [BrandController::class, 'mail']);




    Route::resource('admin/products', ProductController::class);

    Route::get('admin/allOrders', [OrdersController::class, 'listOrders'])->name('list-orders');
    Route::patch('/orders/{orderId}/update-status', [OrdersController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::delete('/orders/{orderId}', [OrdersController::class, 'destroy'])->name('orders.destroy');
    Route::get('admin/orders/{orderId}/invoice', [OrdersController::class, 'generateInvoice'])->name('orders.generateInvoice');
    Route::resource('admin/gallery', GalleryController::class);
    // Route::get('mail1', [Website::class, 'mail']);
    Route::get('admin/blog/list', [BlogController::class, 'list'])->name('blog-list');
    Route::get('admin/addblog/add', [BlogController::class, 'blog_add'])->name('add-blog');
    Route::post('admin/addblog/add', [BlogController::class, 'create_blog'])->name('create-blog');
    Route::get('admin/brand/delete/{id}', [BlogController::class, 'delete'])->name('delete-brand');
    Route::get('admin/blog/edit/{id}', [BlogController::class, 'blog_edit']);
    Route::post('admin/blog/edit/{id}', [BlogController::class, 'blog_update'])->name('update-brand');
    Route::get('add-blogcontent/{id}', [BlogController::class, 'content_add'])->name('add-blogcontent');
    Route::post('admin/addcontentblog/add', [BlogController::class, 'create_content_blog'])->name('create-content-blog');
    Route::get('view-blogcontent/{id}', [BlogController::class, 'content_view'])->name('view-blogcontent');
    Route::get('admin/blog/delete/{id}', [BlogController::class, 'delete_blog'])->name('delete-blog');
    // routes/web.php or routes/api.php
    Route::post('/upload-image', [BlogController::class, 'uploadImage'])->name('upload.image.route');
    Route::get('/content_add1', function () {
        return view('editor');
    });
    Route::get('/editor', [BlogController::class, 'content_add1']);
    // routes/web.php
    Route::post('ckeditor/upload', [BlogController::class, 'upload'])->name('ckeditor.upload');
    Route::get('admin/contentblog/edit/{id}', [BlogController::class, 'content_edit']);
    Route::post('admin/updateblog/edit/{id}', [BlogController::class, 'create_content_update_blog'])->name('update-content');
});


Route::get('admin', [AuthController::class, 'login']);
Route::post('admin', [AuthController::class, 'auth_login_admin']);
Route::get('admin/logout', [AuthController::class, 'logout_admin']);


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('services', [PageController::class, 'services'])->name('services');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('cart-items', [PageController::class, 'cart'])->name('cart-items');
Route::get('/product/{productId}', [PageController::class, 'productDetails'])->name('product-details');

//terms and conditions
Route::get('refund-policy', [PageController::class, 'refundPolicy'])->name('refund-policy');
Route::get('terms', [PageController::class, 'terms'])->name('terms');
Route::get('privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('shipping', [PageController::class, 'shipping'])->name('shipping');
Route::get('gallery', [PageController::class, 'gallery'])->name('gallery');

//Promotional Page
Route::get('naattulife', [PageController::class, 'promotion'])->name('promotion');

Route::middleware(['guest'])->group(function () {
    Route::get('login', [PageController::class, 'login'])->name('login');
    Route::post('login_submit', [LoginController::class, 'submit'])->name('login_post');

    Route::get('register', [PageController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
});


Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/model/{productId}', [ProductDetailsController::class, 'getProductDetails']);

Route::middleware(['web'])->group(function () {
    Route::get('/cart/{productId}', [CartController::class, 'addToCart']);
    Route::get('/cart', [CartController::class, 'cartList'])->name('cart.index');
    Route::get('/deleteCartItem/{id}', [CartController::class, 'deleteCartItem'])->name('delete-cart');
    Route::post('/updateCartItem/{itemId}', [CartController::class, 'updateCartItem']);
});


//checkout_process
Route::get('/checkout/{id}', [PageController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place-order');
Route::post('razorpay-payment', [CheckoutController::class, 'store'])->name('razorpay.payment.store');

//orders

Route::get('my-orders', [OrderDetailsController::class, 'myOrders'])->name('my-orders');
