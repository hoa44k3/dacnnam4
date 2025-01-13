<?php

use App\Http\Controllers\AboutUsController;
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
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PostTypeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TagController;


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

Route::group(['prefix' => ''], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
    Route::post('/comment/{blog_id}', [HomeController::class, 'storeComment'])->name('blogcomment');
    Route::get('/blogdetail{id}', [HomeController::class, 'blogdetail'])->name('blogdetail');
    Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
    //Route::post('/contact', [ContactController::class, 'storeContact']);
    Route::post('/contact', [HomeController::class, 'storeContact']);
    Route::get('/tags/{tag}', [HomeController::class, 'showByTag'])->name('tags.show');
    Route::get('/dish/{id}', [HomeController::class, 'dishDetail'])->name('dish_detail');
    Route::post('faq', [HomeController::class, 'store'])->name('faq.store');

});

Route::get('auth/register',[AuthController::class,'register'])->name('auth.register');
Route::post('auth/register', [AuthController::class, 'post_register'])->name('auth.register.post');
Route::get('auth/login',[AuthController::class,'login'])->name('auth.login');
Route::post('auth/login', [AuthController::class, 'post_login'])->name('auth.login.post');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    //Route::get('/search-results', [AdminController::class, 'searchResults'])->name('admin.searchResults');
    Route::get('/search', [AdminController::class, 'search'])->name('admin.search');


    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

  
    Route::prefix('blogs')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/{blog}', [BlogController::class, 'update'])->name('blogs.update');
        Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
        Route::get('/{blog}', [BlogController::class, 'show'])->name('blogs.show');

    });
    Route::prefix('comments')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('comments.index');
        Route::get('/create', [CommentController::class, 'create'])->name('comments.create');
        Route::post('/', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
        Route::put('/{comment}', [CommentController::class, 'update'])->name('comments.update');
        Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    });
    
    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contacts.index'); 
        Route::post('/reply', [ContactController::class, 'reply'])->name('contacts.reply');
        Route::post('/edit-response', [ContactController::class, 'editResponse'])->name('contacts.editResponse');        
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');         
        Route::get('/create', [UserController::class, 'create'])->name('users.create');  
        Route::post('/', [UserController::class, 'store'])->name('users.store');        
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); 
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update'); 
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');  
    });
    Route::prefix('tags')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('tags.index');         
        Route::get('/create', [TagController::class, 'create'])->name('tags.create');  
        Route::post('/', [TagController::class, 'store'])->name('tags.store');        
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit'); 
        Route::put('/{tag}', [TagController::class, 'update'])->name('tags.update'); 
        Route::delete('/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');  

    });

    Route::prefix('about_us')->group(function () {
        Route::get('/', [AboutUsController::class, 'index'])->name('about_us.index');         
        Route::get('/{about_us}/edit', [AboutUsController::class, 'edit'])->name('about_us.edit'); 
        Route::put('/{about_us}', [AboutUsController::class, 'update'])->name('about_us.update');  
    });    
    
    Route::prefix('regions')->group(function () {
        Route::get('/', [RegionController::class, 'index'])->name('regions.index');         
        Route::get('/create', [RegionController::class, 'create'])->name('regions.create');  
        Route::post('/', [RegionController::class, 'store'])->name('regions.store');        
        Route::get('/{region}/edit', [RegionController::class, 'edit'])->name('regions.edit'); 
        Route::put('/{region}', [RegionController::class, 'update'])->name('regions.update'); 
        Route::delete('/{region}', [RegionController::class, 'destroy'])->name('regions.destroy');  
    });
    // Route::group(['prefix' => 'dish'], function () {
    //     Route::get('/', [DishController::class, 'index'])->name('dish.index');
    //     Route::get('/create', [DishController::class, 'create'])->name('dish.create');
    //     Route::post('/store', [DishController::class, 'store'])->name('dish.store');
    //     Route::get('/edit/{id}', [DishController::class, 'edit'])->name('dish.edit');
    //     Route::put('/update/{id}', [DishController::class, 'update'])->name('dish.update');
    //     Route::delete('/destroy/{id}', [DishController::class, 'destroy'])->name('dish.destroy');
    //     Route::get('/{dish}', [DishController::class, 'show'])->name('dish.show');
    // });
    Route::prefix('dish')->group(function () {
        Route::get('/', [DishController::class, 'index'])->name('dish.index');         
        Route::get('/create', [DishController::class, 'create'])->name('dish.create');  
        Route::post('/', [DishController::class, 'store'])->name('dish.store');        
        Route::get('/{dish}/edit', [DishController::class, 'edit'])->name('dish.edit'); 
        Route::put('/{dish}', [DishController::class, 'update'])->name('dish.update'); 
        Route::delete('/{dish}', [DishController::class, 'destroy'])->name('dish.destroy');  
        Route::get('/{dish}', [DishController::class, 'show'])->name('dish.show');
    });
    Route::prefix('faqs')->group(function () {
        Route::get('/', [FaqController::class, 'index'])->name('faqs.index');
        Route::post('/store', [FaqController::class, 'store'])->name('faqs.store'); 
        Route::post('/answer/{id}', [FaqController::class, 'answer'])->name('faqs.answer'); 
        Route::delete('/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');
    });
});


   



    
   
    

