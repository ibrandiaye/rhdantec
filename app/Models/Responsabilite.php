<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsabilite extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom"
    ];
}
