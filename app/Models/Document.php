<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom","categorie_id","identification_id"
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function identification()
    {
        return $this->belongsTo(Identification::class);
    }
}
