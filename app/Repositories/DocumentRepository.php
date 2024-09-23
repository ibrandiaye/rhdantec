<?php
namespace App\Repositories;

use App\Models\Document;
use App\Repositories\RessourceRepository;

class DocumentRepository extends RessourceRepository{
    public function __construct(Document $document){
        $this->model = $document;
    }

}
