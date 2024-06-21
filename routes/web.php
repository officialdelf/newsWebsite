<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|u9i
*/

//Route::get('/', function () {
    //return view('welcome');
//});
// routes/web.php


//Route::post('/comments/{newsId}', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/{newsId}', [CommentController::class, 'store'])->name('comments');

//Route::post('/comments/{newsId}', [CommentController::class, 'store']);


Route::get('/',[NewsController::class,'home']);
Route::get('/adminhome',[adminController::class,'home']);

 //Category
Route::get('/postCategory',[categoryController::class,'postCategory']);
Route::post('/addCategory',[categoryController::class,'addCategory']);
Route::get('/editCategory/{id}',[categoryController::class,'editCategory']);
Route::get('/categories',[categoryController::class,'getCategories']);




//article
Route::post('/addArticle',[categoryController::class,'addArticle']);

//news
Route::get('/postNews',[NewsController::class,'postNews']);
Route::post('/addNews',[NewsController::class,'addNews']);

//authors
Route::get('/postAuthor',[adminController::class,'postAuthor']);
Route::post('/addAuthor',[adminController::class,'addAuthor']);
Route::get('/editAuthor/{id}',[adminController::class,'editAuthor']);
Route::get('/authors',[adminController::class,'getAuthors']);

//editors
Route::get('/postEditor',[adminController::class,'postEditor']);
Route::post('/addEditor',[adminController::class,'addEditor']);
Route::get('/editEditor/{id}',[adminController::class,'editEditor']);
Route::get('/Editors',[adminController::class,'getEditors']); //addImages

Route::get('/addImages',[NewsController::class,'/addImages']);

//front page
Route::get('/postFront',[NewsController::class,'postFront']);
Route::post('/addFront',[NewsController::class,'addFront']);
Route::get('/sky',[NewsController::class,'sky']);


//show by category
//Route::get('/showByCategory/{category}', 'NewsController@showByCategory');
Route::get('/showByCategory/{category}',[NewsController::class,'showByCategory']);

// Route to display detailed news with title, image1, image2, image3, and content
Route::get('/newsDetails/{id}', 'NewsController@newsDetails');

Route::get('/relatedContent/{id}/{slug}', [categoryController::class, 'related'])->name('related');
//frontSide
Route::get('/frontSide/{id}/{slug}', [NewsController::class, 'frontSide'])->name('frontSide');

//Route::get('/newsDetails/{id}',[NewsController::class,'newsDetails']);
//Route::get('/newsDetails/{id}',[newsController::class,'newsDetails']);
//Route::get('/details/{id}',[categoryController::class,'details']);
Route::get('/details/{id}/{slug}', [categoryController::class, 'details'])->name('details');
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::get('/navbar',[NewsController::class,'navbar']);

//footer
Route::get('/footer',[NewsController::class,'footer']);

/// routes/web.php

Route::post('/search', [NewsController::class, 'search'])->name('search');


//Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{newsId}', [CommentController::class, 'index'])->name('comments.index');
//register
// Open routes accessible to all users
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Example routes/web.php

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin routes...
});

Route::middleware(['auth', 'role:publisher'])->group(function () {

    // Publisher routes...
});

Route::middleware(['auth', 'role:normal'])->group(function () {
    // Normal user routes...
});

//login
Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('login');
Route::post('/login', [RegisterController::class, 'login']);
//frontDetails relatedFront
Route::get('/frontDetails/{id}', [NewsController::class, 'frontDetails'])->name('frontDetails');
Route::get('/relatedFront/{id}/{slug}', [NewsController::class, 'relatedFront'])->name('relatedFront');

//admin users
Route::get('/users',[adminController::class,'user']);
Route::get('/deleteuser/{id}',[adminController::class,'deleteuser']);
Route::get('/edituser/{id}',[adminController::class,'edituser']);
Route::post('/updateuser/{id}',[adminController::class,'updateuser']);

//admin articles
Route::get('/articles',[adminController::class,'articles']);
Route::get('/edit_article/{id}',[adminController::class,'edit_article']);
Route::post('/update_article/{id}',[adminController::class,'update_article']);
Route::get('/delete_article/{id}',[adminController::class,'delete_article']);




















