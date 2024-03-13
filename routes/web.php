<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\eventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\reservationController;

Route::get('/', [eventController::class, 'home'])->name('/');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [eventController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    Route::resource('/categorie', CategorieController::class);
    Route::post('/categorie/{categorie}/permissions', [CategorieController::class, 'assignPermission'])->name('categorie.permissions');
    Route::delete('/categorie/{categorie}/permissions/{permission}', [CategorieController::class, 'removePermission'])->name('categorie.permissions.remove');
    Route::get('/adminevents', [EventController::class, 'valid'])->name('evenement.index');
});
Route::get('/valid/{id}', [EventController::class, 'valid_event'])->name('valid');


Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('/evenement', [eventController::class, 'index'])->name('organisateur.index');
    Route::get('/organisateur/create', [eventController::class, 'create'])->name('organisateur.create');
    Route::post('/organisate.store', [eventController::class, 'store'])->name('organisateur.store');
});
// Route::get('/reservation', [reservationController::class, 'index'])->name('reservation.index_reserv');
// Route::get('/index_reserv', [reservationController::class, 'liste_reservation'])->name('reservationindex_reserv');

Route::middleware(['auth'])->group(function () {

    Route::post('/events/reserve', [reservationController::class, 'create'])->name('events.reserve');
    Route::get('/daitlsevent/{id}', [reservationController::class, 'index'])->name('reservation.daitalsevent');

    // Example reservation routes


});



require __DIR__ . '/auth.php';
