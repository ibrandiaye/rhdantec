<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;
    protected $fillable = [
        "employeur_id","type_contrat_id","nature_contrat_id","fonction_id","titre_id","responsabilite_id","csp_id","famille_pro_id","service_id","division_id"
        ,"bureau_id","dateps","identification_id"
    ];

    public function employeur()
    {
        return $this->belongsTo(Employeur::class);
    }
    public function typeContrat()
    {
        return $this->belongsTo(TypeContrat::class);
    }
    public function natureContrat()
    {
        return $this->belongsTo(NatureContrat::class);
    }
    public function Fonction()
    {
        return $this->belongsTo(Employeur::class);
    }
    public function titre()
    {
        return $this->belongsTo(Titre::class);
    }
    public function responsabilite()
    {
        return $this->belongsTo(Responsabilite::class);
    }
    public function csp()
    {
        return $this->belongsTo(Csp::class);
    }
    public function famillePro()
    {
        return $this->belongsTo(FamillePro::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }
    public function identification()
    {
        return $this->belongsTo(Identification::class);
    }

}
