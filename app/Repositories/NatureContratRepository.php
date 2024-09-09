<?php
namespace App\Repositories;

use App\Models\NatureContrat;
use App\Repositories\RessourceRepository;

class NatureContratRepository extends RessourceRepository{
    public function __construct(NatureContrat $naturecontrat){
        $this->model = $naturecontrat;
    }

}
