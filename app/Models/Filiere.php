<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filiere extends Model
{
     use HasFactory;

    protected $fillable = ['name', 'user_id', 'departement_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departement() {
        return $this->belongsTo(Departement::class);
    }

    public function matieres() {
        return $this->belongsToMany(Matiere::class, 'contenir');
    }
}
