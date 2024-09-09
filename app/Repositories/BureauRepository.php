<?php
namespace App\Repositories;

use App\Models\Bureau;
use App\Repositories\RessourceRepository;

class BureauRepository extends RessourceRepository{
    public function __construct(Bureau $bureau){
        $this->model = $bureau;
    }

}
