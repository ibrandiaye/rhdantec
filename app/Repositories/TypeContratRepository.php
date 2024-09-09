<?php
namespace App\Repositories;

use App\Models\TypeContrat;
use App\Repositories\RessourceRepository;

class TypeContratRepository extends RessourceRepository{
    public function __construct(TypeContrat $typecontrat){
        $this->model = $typecontrat;
    }

}
