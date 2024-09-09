<?php
namespace App\Repositories;

use App\Models\FamillePro;
use App\Repositories\RessourceRepository;

class FamilleProRepository extends RessourceRepository{
    public function __construct(FamillePro $famillepro){
        $this->model = $famillepro;
    }

}
