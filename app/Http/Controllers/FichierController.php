<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Fichier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class FichierController extends Controller
{
    public function create()
    {
        $matieres = Matiere::all();
        $filieres = Filiere::with('matieres')->get();
        return view('fichiers.create', compact('matieres', 'filieres'));
    }

    public function store(Request $request)
    {
        //Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:TD,TP,Concours',
            'niveau' => 'required|in:BTS1,BTS2',
            'matiere_id' => 'required|exists:matieres,id',
            'fichier' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:10240', // max 10 Mo
        ]);

        // Enregistrement du fichier
        $chemin = $request->file('fichier')->store('fichiers', 'public');
        $path = $request->file('fichier')->store('fichiers');//Enregistre dans storage/app/fichiers
        // Création dans la base de données
        Fichier::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'niveau' => $validated['niveau'],
            'chemin' => $chemin,
            'user_id' => auth()->id(),
            'matiere_id' => $validated['matiere_id'],
            ]);
            //Redirection selon le rôle
        $user = Auth::user();

        if ($user->role === 'professeur') {
            return redirect()->route('dashboard.professeur')->with('success', 'Fichier téléversé avec succès !');
        }

        return redirect()->back()->with('success', 'Fichier téléversé avec succès.');
 
    }

        public function index()
    {
        $user = auth()->user();

        if ($user->role === 'professeur') {
            // On utilise la relation, mais avec pagination
            $fichiers = $user->fichiers()->paginate(5);
        } else {
            // Tous les fichiers paginés
            $fichiers = Fichier::paginate(5);
        }

        return view('fichiers.index', compact('fichiers'));
    }

        public function edit($id)
    {
        $fichier = Fichier::findOrFail($id);

        if ($fichier->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        // On charge toutes les filières avec leurs matières
        $filieres = Filiere::with('matieres')->get();

        return view('fichiers.edit', compact('fichier', 'filieres'));
    }


        public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:TD,TP,Concours',
            'niveau' => 'required|in:BTS1,BTS2,BTI,BT,BTS',
            'matiere_id' => 'required|exists:matieres,id',
            'fichier' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
        ]);

        $fichier = Fichier::findOrFail($id);

        // Vérifie si l'utilisateur est bien le propriétaire
        if ($fichier->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        // Si un nouveau fichier est envoyé, remplace l'ancien
        if ($request->hasFile('fichier')) {
            $chemin = $request->file('fichier')->store('fichiers', 'public');
            $fichier->chemin = $chemin;
        }

        // Mise à jour des autres champs
        $fichier->update([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'niveau' => $validated['niveau'],
            'matiere_id' => $validated['matiere_id'],
        ]);

        return redirect()->route('dashboard.professeur')->with('success', 'Fichier modifié avec succès !');
    }

        public function destroy($id)
    {
        $fichier = Fichier::findOrFail($id);

        // Sécurité : s'assurer que l'utilisateur est le propriétaire (optionnel mais recommandé)
        if ($fichier->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        // Supprimer le fichier physique sur le disque public
        if ($fichier->chemin && Storage::disk('public')->exists($fichier->chemin)) {
            Storage::disk('public')->delete($fichier->chemin);
        }

        // Supprimer l'enregistrement en base
        $fichier->delete();

        return redirect()->back()->with('success', 'Fichier supprimé avec succès.');
    }

        public function download($id)
    {
        $fichier = Fichier::findOrFail($id);

        // Vérifie que le fichier appartient bien au professeur
        if (auth()->user()->id !== $fichier->user_id && auth()->user()->role !== 'admin') {
            abort(403, 'Accès interdit');
        }

        // Vérifie si le fichier existe
        if (!Storage::disk('public')->exists($fichier->chemin)) {
            return redirect()->back()->with('error', 'Fichier introuvable.');
        }

        return Storage::disk('public')->download($fichier->chemin, $fichier->name . '.' . pathinfo($fichier->chemin, PATHINFO_EXTENSION));
    }

        public function etudiantFiles()
    {
        $etudiant = auth()->user();

        if ($etudiant->role !== 'etudiant') {
            abort(403, 'Accès interdit');
        }

        // Récupérer la filière et le département de l'étudiant
        $filiere = $etudiant->filiere;
        $departement = $filiere?->departement;

        if (!$filiere || !$departement) {
            return redirect()->back()->with('error', 'Aucune filière ou département associé à cet étudiant.');
        }

        // Récupérer les matières liées à la filière
        $matiereIds = \DB::table('contenir')
            ->where('filiere_id', $filiere->id)
            ->pluck('matiere_id');

        // Récupérer les fichiers qui correspondent au niveau et matières
        $fichiers = Fichier::where('niveau', $etudiant->niveau)
            ->whereIn('matiere_id', $matiereIds)
            ->with('matiere')
            ->latest()
            ->get();

        return view('dashboards.etudiant', compact('fichiers'));
    }
    

    public function ConcoursFiles()
    {
        // Récupérer tous les fichiers de type "concours" avec la relation "matiere"
        $fichiers = Fichier::where('type', 'concours')
            ->with('matiere')
            ->latest()
            ->get();

        return view('concours', compact('fichiers'));
    }
    
}

