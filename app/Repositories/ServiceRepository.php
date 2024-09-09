<?php
namespace App\Repositories;

use App\Models\Service;
use App\Repositories\RessourceRepository;

class ServiceRepository extends RessourceRepository{
    public function __construct(Service $service){
        $this->model = $service;
    }

}
