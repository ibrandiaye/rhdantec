<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    use HasFactory;
    protected $fillable = [
        "cni","matricule","matricule_universite","nom","prenom","datenaiss","lieunaiss","sexe","sm","adresse","telephone","email","religion"
    ];
}
