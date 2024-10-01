<?php
namespace App\Repositories;

use App\Models\Emploi;
use App\Repositories\RessourceRepository;
use Illuminate\Support\Facades\DB;

class EmploiRepository extends RessourceRepository{
    public function __construct(Emploi $emploi){
        $this->model = $emploi;
    }

    public function getEmploiByIdentification($id){
        return DB::table("emplois")
        ->join("bureaus","emplois.bureau_id","=","bureaus.id")
        ->join("csps","emplois.csp_id","=","csps.id")
        ->join("divisions","emplois.division_id","=","divisions.id")
        ->join("employeurs","emplois.employeur_id","=","employeurs.id")
        ->join("famille_pros","emplois.famille_pro_id","=","famille_pros.id")
        ->join("fonctions","emplois.fonction_id","=","fonctions.id")
        ->join("identifications","emplois.identification_id","=","identifications.id")
        ->join("nature_contrats","emplois.nature_contrat_id","=","nature_contrats.id")
        ->join("responsabilites","emplois.responsabilite_id","=","responsabilites.id")
        ->join("services","emplois.service_id","=","services.id")
        ->join("titres","emplois.titre_id","=","titres.id")
        ->join("type_contrats","emplois.type_contrat_id","=","type_contrats.id")
        ->select("emplois.*","csps.nom as csp","bureaus.nom as bureau","divisions.nom as division","employeurs.nom as employeur","famille_pros.nom as famille_pro","fonctions.nom as fonction","identifications.nom as identification"
        ,"nature_contrats.nom as natureContrat","responsabilites.nom as responsabilite","services.nom as nom","titres.nom as titre","type_contrats.nom as typeContrat")
        ->where("emplois.id","=", $id)
        ->get();
    }
}
