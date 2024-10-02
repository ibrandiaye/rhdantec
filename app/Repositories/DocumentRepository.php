<?php
namespace App\Repositories;

use App\Models\Document;
use App\Repositories\RessourceRepository;
use Illuminate\Support\Facades\DB;

class DocumentRepository extends RessourceRepository{
    public function __construct(Document $document){
        $this->model = $document;
    }

    public function getByDocument($id)
    {
        return DB::table("documents")
        ->join("categories","documents.categorie_id","=","categories.id")
        ->select("documents.*","categories.nom as categorie")
        ->where("identification_id",$id)->get();
    }

}
