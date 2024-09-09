<?php
namespace App\Repositories;

use App\Models\Titre;
use App\Repositories\RessourceRepository;

class TitreRepository extends RessourceRepository{
    public function __construct(Titre $titre){
        $this->model = $titre;
    }

}
