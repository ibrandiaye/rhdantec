<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;
    protected $fillable = [
        "employeur","type_contrat","nature_contrat","fonction","responsabilite","csp","famille_pro","unite"
        ,"bureau","dateps","identification_id"
    ];
}
