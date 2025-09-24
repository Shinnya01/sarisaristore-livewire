<?php

use App\Livewire\Home;
use App\Livewire\Sales;
use Livewire\Volt\Volt;
use App\Livewire\Orders;
use App\Livewire\Reports;
use App\Livewire\Products;
use App\Livewire\Settings;
use App\Livewire\Customers;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', Home::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');

 
        
    Route::get('products', Products::class)->name('products');
    Route::get('customers', Customers::class)->name('customers');

    Route::get('orders', Orders::class)->name('orders');
    Route::get('reports', Reports::class)->name('reports');
    Route::get('sales', Sales::class)->name('sales');
    Route::get('settings', Settings::class)->name('settings');


});

require __DIR__.'/auth.php';
