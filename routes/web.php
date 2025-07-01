<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagement\PermissionController;
use App\Http\Controllers\UserManagement\RoleController;
use App\Http\Controllers\UserManagement\UserController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Route::redirect('settings', 'settings/profile');

    // Route::get('settings/profile', Profile::class)->name('settings.profile');
    // Route::get('settings/password', Password::class)->name('settings.password');
    // Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::prefix('profile')
        ->name('profile.')
        ->group(function () {
            Route::controller(ProfileController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });
        });

    Route::prefix('user-management')
    ->name('user_management.')
    ->group(function () {
        Route::prefix('permissions')
            ->name('permissions.')
            ->group(function () {
                Route::controller(PermissionController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::get('/get-data', 'getData')->name('get_data');
                    Route::get('/edit/{id}', 'edit')->name('edit');
                    Route::get('/destroy/{id}', 'destroy')->name('destroy');

                    Route::post('/store', 'store')->name('store');
                    Route::post('/update', 'update')->name('update');
                });
            });

        Route::prefix('roles')
            ->name('roles.')
            ->group(function () {
                Route::controller(RoleController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::get('/get-data', 'getData')->name('get_data');
                    Route::get('/edit/{id}', 'edit')->name('edit');
                    Route::get('/destroy/{id}', 'destroy')->name('destroy');

                    Route::post('/store', 'store')->name('store');
                    Route::post('/update', 'update')->name('update');
                });
            });

        Route::prefix('users')
            ->name('users.')
            ->group(function () {
                Route::controller(UserController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::get('/get-data', 'getData')->name('get_data');
                    Route::get('/edit/{id}', 'edit')->name('edit');
                    Route::get('/destroy/{id}', 'destroy')->name('destroy');
                    Route::get('/all-destroy', 'allDestroy')->name('all_destroy');

                    Route::post('/store', 'store')->name('store');
                    Route::post('/update', 'update')->name('update');

                    Route::get('/restore/{id}', 'restore')->name('restore');
                    Route::get('/force-delete/{id}', 'forceDelete')->name('force_delete');
                });
            });
    });
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::get('/page-404', function () {
    return response()->view('errors.404', [], 404);
})->name('page.404');

require __DIR__.'/auth.php';
