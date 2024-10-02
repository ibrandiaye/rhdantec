<?php

namespace App\Http\Controllers;

use App\Repositories\DocumentRepository;
use App\Repositories\EmploiRepository;
use App\Repositories\IdentificationRepository;
use Illuminate\Http\Request;

class IdentificationController extends Controller
{
    protected $identificationRepository;
    protected $emploiRepository;
    protected $documentRepository;

    public function __construct(IdentificationRepository $identificationRepository,EmploiRepository $emploiRepository,
    DocumentRepository $documentRepository){
        $this->identificationRepository =$identificationRepository;
       // $this->middleware("auth")->except(["getAllIdentification"]);
       $this->emploiRepository = $emploiRepository;
       $this->documentRepository = $documentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identifications = $this->identificationRepository->getAll();
        return view('identification.index',compact('identifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('identification.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['photo'])
        {
            $files = $request['photo'];
            $destinationPath = 'image-identification/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }

        $identifications = $this->identificationRepository->store($request->all());
        return redirect('identification');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $identification = $this->identificationRepository->getById($id);
        $emplois        = $this->emploiRepository->getEmploiByIdentification($id);
        $documents       = $this->documentRepository->getByDocument($id);
        return view('identification.show',compact('identification','emplois','documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $identification = $this->identificationRepository->getById($id);
        return view('identification.edit',compact('identification'));
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
        $this->identificationRepository->update($id, $request->all());
        return redirect('identification');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->identificationRepository->destroy($id);
        return redirect('identification');
    }
}
