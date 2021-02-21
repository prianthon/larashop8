<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::match(["GET", "POST"], "/register", function (){
    return redirect("/login");
})->name("register");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Resource User
Route::resource("users", UserController::class);

// Resource Category
Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
Route::get('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
Route::delete('/categories/{category}/delete-permanent', [CategoryController::class, 'deletePermanent'])->name('categories.delete-permanent');
Route::get('/ajax/categories/search', [CategoryController::class, 'ajaxSearch']);
Route::resource('categories', CategoryController::class);

// Resource Book
Route::get('/books/trash', [BookController::class, 'trash'])->name('books.trash');
Route::post('/books/{book}/restore', [BookController::class, 'restore'])->name('books.restore');
Route::delete('/books/{id}/delete-permanent', [BookController::class, 'deletePermanent'])->name('books.delete-permanent');
Route::resource('books', BookController::class);

// Resource Order
Route::resource('orders', OrderController::class);
