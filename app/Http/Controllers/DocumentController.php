<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CategorieRepository;
use App\Repositories\DocumentRepository;
use App\Repositories\IdentificationRepository;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    protected $documentRepository;
    protected $categorieRepository;
    protected $identificationRepository;

    public function __construct(DocumentRepository $documentRepository,CategorieRepository $categorieRepository,
    IdentificationRepository $identificationRepository){
        $this->documentRepository =$documentRepository;
        $this->categorieRepository = $categorieRepository;
        $this->identificationRepository = $identificationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = $this->documentRepository->getAll();
        return view('document.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categorieRepository->getAll();
        $identifications = $this->identificationRepository->getAll();
        return view('document.add',compact("categories","identifications"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(["libelle"=>$request->nom]);
        if($request['doc'])
        {
            $files = $request['doc'];
            $destinationPath = 'fichier/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['nom'=>$nomImage]);

        }

        $documents = $this->documentRepository->store($request->all());
        if(($request->candidat_id))
            return redirect()->back();
        else
            return redirect('document');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = $this->documentRepository->getById($id);
        return view('document.show',compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = $this->documentRepository->getById($id);
        $categories = $this->categorieRepository->getAll();
        $identifications = $this->identificationRepository->getAll();
        return view('document.edit',compact('document','categories','identifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request['doc'])
        {
            $files = $request['doc'];
            $destinationPath = 'fichier/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['nom'=>$nomImage]);

        }

        $this->documentRepository->update($id, $request->all());
        return redirect('document');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->documentRepository->destroy($id);
        return redirect('document');
    }
}
