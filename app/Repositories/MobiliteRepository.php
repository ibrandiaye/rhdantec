<?php
namespace App\Repositories;

use App\Models\Mobilite;
use App\Repositories\RessourceRepository;

class MobiliteRepository extends RessourceRepository{
    public function __construct(Mobilite $mobilite){
        $this->model = $mobilite;
    }
 
}
