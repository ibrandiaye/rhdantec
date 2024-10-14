<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom","identification_id","libelle","candidat_id"
    ];

   /*  public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    } */
    public function identification()
    {
        return $this->belongsTo(Identification::class);
    }
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

}
