<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\FormUserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/form_contact', [ContactoController::class, 'mostrarFormulario'])
        ->name('form_contact');
    Route::post('/form_contact', [ContactoController::class, 'enviar'])
        ->name('contacto.enviar');
    Route::get('/form_contact/registros', [ContactoController::class, 'mostrardatosContact'])
        ->name('contacto.registros');
});

Route::get('/form_user', [userController::class, 'showForm'])
    ->name('form_user');

Route::post('/login', [userController::class, 'login'])
    ->name('login');

Route::post('/register', [userController::class, 'register'])
    ->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/form_pet', [PetController::class, 'mostrarFormulario'])
        ->name('form_pet');
    Route::post('/form_pet', [PetController::class, 'enviar'])
        ->name('pet.enviar');
    Route::get('/form_pet/registros', [PetController::class, 'mostrardatosPet'])
        ->name('pet.registros');
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
//adminlte
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/adminpet', [AdminPetController::class, 'index'])->name('adminpet.index');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'create'])->name('users.create');
});
