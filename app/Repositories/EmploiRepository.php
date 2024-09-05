<?php
namespace App\Repositories;

use App\Models\Emploi;
use App\Repositories\RessourceRepository;

class EmploiRepository extends RessourceRepository{
    public function __construct(Emploi $emploi){
        $this->model = $emploi;
    }
 
}
