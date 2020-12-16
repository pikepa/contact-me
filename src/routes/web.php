<?php

use Illuminate\Support\Facades\Route;
use Pikepa\ContactMe\Http\Controllers\MessageController;

Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/{message}', [MessageController::class, 'show'])->name('message.show');
Route::post('/messages', [MessageController::class, 'store'])->name('message.store');
