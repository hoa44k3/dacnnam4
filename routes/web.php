<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Models\Contact;
use App\Models\Favorite;

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

Route::group(['prefix'=>''],function(){
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/contact',[HomeController::class,'contact'])->name('contact');
    Route::get('/about',[HomeController::class,'about'])->name('about');
    Route::get('/blog',[HomeController::class,'blog'])->name('blog');
    Route::get('/blogdetail',[HomeController::class,'blogdetail'])->name('blogdetail');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    
    // Orders routes
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
        Route::post('/', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
        Route::put('/{order}', [OrderController::class, 'update'])->name('orders.update');
        Route::delete('/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    });

     // Carts routes
     Route::prefix('carts')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('carts.index');
        Route::get('/create', [CartController::class, 'create'])->name('carts.create');
        Route::post('/', [CartController::class, 'store'])->name('carts.store');
        Route::get('/{cart}/edit', [CartController::class, 'edit'])->name('carts.edit');
        Route::put('/{cart}', [CartController::class, 'update'])->name('carts.update');
        Route::delete('/{cart}', [CartController::class, 'destroy'])->name('carts.destroy');
    });

     // Payments routes
     Route::prefix('payments')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('payments.index');
        Route::get('/create', [PaymentController::class, 'create'])->name('payments.create');
        Route::post('/', [PaymentController::class, 'store'])->name('payments.store');
        Route::get('/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
        Route::put('/{payment}', [PaymentController::class, 'update'])->name('payments.update');
        Route::delete('/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    Route::group(['prefix' => 'dish'], function () {
        Route::get('/', [DishController::class, 'index'])->name('dish.index');
        Route::get('/create', [DishController::class, 'create'])->name('dish.create');
        Route::post('/store', [DishController::class, 'store'])->name('dish.store');
        Route::get('/edit/{id}', [DishController::class, 'edit'])->name('dish.edit');
        Route::put('/update/{id}', [DishController::class, 'update'])->name('dish.update');
        Route::delete('/destroy/{id}', [DishController::class, 'destroy'])->name('dish.destroy');
    });
    Route::prefix('blogs')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/{blog}', [BlogController::class, 'update'])->name('blogs.update');
        Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    });
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
        Route::post('/', [CustomerController::class, 'store'])->name('customers.store');
        Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
        Route::put('/{customer}', [CustomerController::class, 'update'])->name('customers.update');
        Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    });
    Route::prefix('comments')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('comments.index');
        Route::get('/create', [CommentController::class, 'create'])->name('comments.create');
        Route::post('/', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
        Route::put('/{comment}', [CommentController::class, 'update'])->name('comments.update');
        Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    });
    Route::prefix('favorites')->group(function () {
        Route::get('/', [FavoriteController::class, 'index'])->name('favorites.index');         
        Route::get('/create', [FavoriteController::class, 'create'])->name('favorites.create');  
        Route::post('/', [FavoriteController::class, 'store'])->name('favorites.store');        
        Route::get('/{favorite}/edit', [FavoriteController::class, 'edit'])->name('favorites.edit'); 
        Route::put('/{favorite}', [FavoriteController::class, 'update'])->name('favorites.update'); 
        Route::delete('/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');  
    });
    
    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contacts.index');         
    });
});