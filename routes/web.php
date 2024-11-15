<?php

use App\Livewire\ContactComponent;
use App\Livewire\DatabaseComponent;
use App\Livewire\OrganizationComponent;
use App\Livewire\OrganizationEdit;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/organizations', OrganizationComponent::class)->name('organizations');
    Route::get('/organizations/{id}/edit', OrganizationEdit::class)->name('organizations.edit');
    Route::get('/contacts', ContactComponent::class)->name('contacts');
    Route::get('/contacts/{id}/edit', \App\Livewire\ContactEdit::class)->name('contact-edit');
    Route::get('/databases', DatabaseComponent::class)->name('databases');
    Route::get('/databases/{id}/edit', \App\Livewire\DatabaseEdit::class)->name('databases-edit');
});
