<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matiere extends Model
{

    use HasFactory;

    protected $fillable = ['name'];

    public function fichiers() {
    return $this->hasMany(Fichier::class);
    }

    public function filieres() {
        return $this->belongsToMany(Filiere::class, 'contenir');
    }

}
