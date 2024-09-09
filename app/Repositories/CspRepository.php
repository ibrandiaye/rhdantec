<?php
namespace App\Repositories;

use App\Models\Csp;
use App\Repositories\RessourceRepository;

class CspRepository extends RessourceRepository{
    public function __construct(Csp $csp){
        $this->model = $csp;
    }

}
