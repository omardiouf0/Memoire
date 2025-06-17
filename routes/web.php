<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\ProfesseurController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
     // Redirection vers le bon dashboard selon le rôle
    Route::get('/dashboard', function () {
        $user = Auth::user();

        return match ($user->role) {
            'etudiant' => redirect()->route('dashboard.etudiant'),
            'professeur' => redirect()->route('dashboard.professeur'),
            default => abort(403, 'Rôle non autorisé'),
        };
    })->name('dashboard');

    // Dashboards spécifiques
    Route::get('/dashboard/etudiant', fn () => view('dashboards.etudiant'))->name('dashboard.etudiant');
    Route::get('/dashboard/professeur', [ProfesseurController::class, 'dashboard'])->name('dashboard.professeur');

    
});
Route::middleware(['auth', 'verified'])->group(function () {
      Route::get('/fichiers/create', [FichierController::class, 'create'])->name('fichiers.create');
      Route::post('/fichiers', [FichierController::class, 'store'])->name('fichiers.store');
      Route::get('/dashboard/etudiant', [FichierController::class, 'etudiantFiles'])->name('dashboard.etudiant');
});
 
Route::middleware(['auth'])->group(function () {
    Route::get('/fichiers', [FichierController::class, 'index'])->name('fichiers.index');
    Route::get('/fichiers/{fichier}/edit', [FichierController::class, 'edit'])->name('fichiers.edit');
    Route::get('/fichiers/{id}/edit', [FichierController::class, 'edit'])->name('fichiers.edit');
    Route::put('/fichiers/{id}', [FichierController::class, 'update'])->name('fichiers.update');
    Route::delete('/fichiers/{id}', [FichierController::class, 'destroy'])->name('fichiers.destroy');
    Route::get('/fichiers/{id}/telecharger', [FichierController::class, 'download'])->name('fichiers.download');

});

// ,'role:professeur'
