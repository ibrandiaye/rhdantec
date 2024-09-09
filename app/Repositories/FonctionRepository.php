<?php
namespace App\Repositories;

use App\Models\Fonction;
use App\Repositories\RessourceRepository;

class FonctionRepository extends RessourceRepository{
    public function __construct(Fonction $fonction){
        $this->model = $fonction;
    }

}
