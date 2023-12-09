<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostTestingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CityController;
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
//Маршрут для получения стартовой страницы
Route::view('/', 'welcome')->name('home');

Route::redirect('/home', '/')->name('home.redirect');


//Маршруты для регистрации
Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Маршруты для авторизации
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'store'])->name('login.store')->middleware('guest');


//Маршруты для книг
Route::middleware('auth')->group(function() {
    Route::get('/books', [BookController::class, 'index'])->name('books');

    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

    Route::post('/books', [BookController::class, 'store'])->name('books.store');

    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

    Route::delete('/books/{id}', [BookController::class, 'delete'])->name('books.delete');
});

//По приколу :)
Route::fallback(function () {
    return "Страница не найдена :(";
});

Route::get('/test', function(){
    return "Тестовая страница";
});

Route::get('/posttesting', [PostTestingController::class, 'index']);
Route::get('/posttesting/create', [PostTestingController::class, 'create']);
Route::get('/posttesting/update', [PostTestingController::class, 'update']);
Route::get('/posttesting/delete', [PostTestingController::class, 'delete']);
Route::get('/posttesting/firstOrCreate', [PostTestingController::class, 'firstOrCreate']);



Route::get('/message', [MessageController::class, 'index'])->name('message.index');
Route::get('/message/create', [MessageController::class, 'create'])->name('message.create');
Route::post('/message', [MessageController::class, 'store'])->name('message.store');
Route::get('/message/{message}', [MessageController::class, 'show'])->name('message.show');
Route::get('/message/{message}/edit', [MessageController::class, 'edit'])->name('message.edit');
Route::patch('/message/{message}', [MessageController::class, 'update'])->name('message.update');
Route::delete('/message/{message}', [MessageController::class, 'destroy'])->name('message.delete');



Route::get('/message/contact', [ContactController::class, 'index'])->name('message.contact.index');;
Route::get('/message/city', [CityController::class, 'index'])->name('message.city.index');;




