<?php
namespace App\Repositories;

use App\Models\Division;
use App\Repositories\RessourceRepository;

class DivisionRepository extends RessourceRepository{
    public function __construct(Division $division){
        $this->model = $division;
    }

}
