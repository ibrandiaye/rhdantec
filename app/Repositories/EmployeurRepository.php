<?php
namespace App\Repositories;

use App\Models\Employeur;
use App\Repositories\RessourceRepository;

class EmployeurRepository extends RessourceRepository{
    public function __construct(Employeur $employeur){
        $this->model = $employeur;
    }

}
