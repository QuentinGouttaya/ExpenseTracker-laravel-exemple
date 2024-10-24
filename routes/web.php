<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BudgetController;


Route::get('/', function () {
    return view('home');
});

Route::get("/expenses", [ExpenseController::class, 'index'])->middleware("auth");

Route::get("/budget", [BudgetController::class, 'index'])->middleware("auth");
Route::post('/budget', [BudgetController::class, 'store'])->middleware('auth');

Route::get('/expenses/create', [ExpenseController::class, 'create'])->middleware('auth');

Route::post('/expenses', [ExpenseController::class, 'store'])->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'create']);
    Route::post('/register', [UserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');