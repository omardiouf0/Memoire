<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fichier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'niveau', 'chemin', 'matiere_id', 'user_id'];
    
    public function matiere() {
    return $this->belongsTo(Matiere::class);
    }
    
     
    // 1. Propriétaire du fichier
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // 2. Utilisateurs qui ont téléchargé ce fichier
    public function utilisateursTelechargeurs()
    {
        return $this->belongsToMany(User::class, 'downloads');
    }

}
