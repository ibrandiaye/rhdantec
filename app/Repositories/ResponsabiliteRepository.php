<?php
namespace App\Repositories;

use App\Models\Responsabilite;
use App\Repositories\RessourceRepository;

class ResponsabiliteRepository extends RessourceRepository{
    public function __construct(Responsabilite $responsabilite){
        $this->model = $responsabilite;
    }

}
