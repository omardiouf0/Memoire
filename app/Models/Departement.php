<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{   
    use HasFactory;

    protected $fillable = [
    'name', 
    'code', ];
    // public function filiere() {
    // return $this->belongsTo(Filiere::class);
    // }

    public function users() {
        return $this->belongsToMany(User::class, 'appartenirs');
    }
    public function filieres() {
        return $this->hasMany(Filiere::class);
    }

}
