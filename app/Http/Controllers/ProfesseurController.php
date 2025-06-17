<?php

namespace App\Http\Controllers;
use App\Models\Fichier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
        public function dashboard()
    {
        $user = Auth::user();

      // Récupère les fichiers uploadés par ce professeur
        $fichiers = Fichier::with('matiere')->where('user_id', $user->id)->get();

        return view('dashboards.professeur', compact('fichiers'));
    }
        
}
