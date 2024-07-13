<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Projects\CreateProject;
use App\Livewire\Tasks\CreateTask;
use App\Livewire\Tasks\ShowTasks;
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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create-project', CreateProject::class)->name('create-project');
    Route::get('/create-task', CreateTask::class)->name('create-task');
    Route::get('/update-task/{task}', CreateTask::class)->name('update-task');
    Route::get('/show-tasks', ShowTasks::class)->name('show-tasks');
});

require __DIR__.'/auth.php';
