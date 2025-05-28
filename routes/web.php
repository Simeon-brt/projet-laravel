<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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

Route::get('/dashboard', [TaskController::class, 'nbTasks'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/admin/delete/{user}', [ProfileController::class, 'deleteUser'])->name('admin.deleteUser');
    
    // Route pour exporter les tâches en PDF
    Route::get('/tasks/export-pdf', [TaskController::class, 'exportToPDF'])->name('tasks.export-pdf');

    Route::get('/tasks/export-excel', [TaskController::class, 'exportToExcel'])->name('tasks.export-excel');

    Route::get('/tasks/stats', [TaskController::class, 'nbTasks'])->name('tasks.stats');

    // Gestion des tâches avec resource
    Route::resource('tasks', TaskController::class);

    Route::get('/admin/{user}', [ProfileController::class, 'show'])->name('admin.module.show');

        // Route pour afficher les tâches avec images
    Route::get('/image', [TaskController::class, 'image'])->name('image');

    Route::get('/admin', [ProfileController::class, 'admin'])->name('admin');

    // Gestion des cinémas avec resource
    Route::resource('cinema', CinemaController::class);

    Route::resource('planning', PlanningController::class);



});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});




require __DIR__.'/auth.php';

