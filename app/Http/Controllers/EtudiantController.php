<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EtudiantController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Récupérer l'ID de la filière de l'étudiant
        $filiere = $user->filiere; // Assure-toi que la relation est bien définie dans User

        if (!$filiere) {
            $fichiers = new LengthAwarePaginator([], 0, 5); // Aucun fichier si pas de filière
        } else {
            // Récupérer les IDs des matières de cette filière
            $matiere_ids = $filiere->matieres()->pluck('id')->toArray();

            // Récupérer les fichiers correspondants à ces matières et au niveau de l'étudiant
            $fichiers = Fichier::with('matiere')
                ->where('niveau', $user->niveau)
                ->whereIn('matiere_id', $matiere_ids)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }

        return view('dashboards.etudiant', compact('fichiers'));
    }
}
