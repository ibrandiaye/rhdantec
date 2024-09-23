<?php
namespace App\Repositories;

use App\Models\Categorie;
use App\Repositories\RessourceRepository;

class CategorieRepository extends RessourceRepository{
    public function __construct(Categorie $categorie){
        $this->model = $categorie;
    }

}
