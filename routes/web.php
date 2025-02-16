<?php

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

use App\Livewire\Landing;
use App\Livewire\Auth;
use App\Livewire\Dashboard;
use App\Livewire\MasterFakultas;
use App\Livewire\EditFakultas;
use App\Livewire\MasterProdi;
use App\Livewire\EditProdi;
use App\Livewire\MasterJurusan;
use App\Livewire\EditJurusan;
use App\Livewire\UserFakultas;
use App\Livewire\UserProdi;
use App\Livewire\EditUserProdi;
use App\Livewire\EditUserFakultas;
use App\Livewire\MasterAkreditasi;
use App\Livewire\MasterAudit;
use App\Livewire\MasterSurvei;
use App\Livewire\UserProfile;



Route::get('/login', Auth::class)->name('login');
Route::get('/', Landing::class)->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/user_profile', UserProfile::class)->name('user_profile');

    Route::get('/master_fakultas', MasterFakultas::class)->name('master_fakultas');
    Route::get('/edit_fakultas/{id}', EditFakultas::class)->name('edit_fakultas');
    Route::get('/master_prodi', MasterProdi::class)->name('master_prodi');
    Route::get('/edit_prodi/{id}', EditProdi::class)->name('edit_prodi');
    Route::get('/edit_prodi/{id}', EditProdi::class)->name('edit_prodi');
    Route::get('/master_survei', MasterSurvei::class)->name('master_survei');
    Route::get('/master_audit', MasterAudit::class)->name('master_audit');
    Route::get('/master_akreditasi', MasterAkreditasi::class)->name('master_akreditasi');
    
    Route::get('/user_prodi', UserProdi::class)->name('user_prodi');
    Route::get('/edit_user_prodi/{id}', EditUserProdi::class)->name('edit_user_prodi');
    Route::get('/user_fakultas', UserFakultas::class)->name('user_fakultas');
    Route::get('/edit_user_fakultas/{id}', EditUserFakultas::class)->name('edit_user_fakultas');

    
});
