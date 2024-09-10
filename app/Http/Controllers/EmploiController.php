<?php

namespace App\Http\Controllers;

use App\Repositories\BureauRepository;
use App\Repositories\CspRepository;
use App\Repositories\DivisionRepository;
use App\Repositories\EmploiRepository;
use App\Repositories\EmployeurRepository;
use App\Repositories\FamilleProRepository;
use App\Repositories\FonctionRepository;
use App\Repositories\IdentificationRepository;
use App\Repositories\NatureContratRepository;
use App\Repositories\ResponsabiliteRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\TitreRepository;
use App\Repositories\TypeContratRepository;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    protected $emploiRepository;
    protected $identificationRepository;
    protected $bureauRepository;
    protected $cspRepository;
    protected $familleProRepository;
    protected $employeurRepository;
    protected $fonctionRepository;
    protected $natureContratProRepository;
    protected $responsabiliteRepository;
    protected $serviceRepository;
    protected $titreRepository;
    protected $typeContratRepository;
    protected $divisionRepository;


    public function __construct(EmploiRepository $emploiRepository,IdentificationRepository $identificationRepository,
    BureauRepository $bureauRepository,CspRepository $cspRepository,FamilleProRepository $familleProRepository,EmployeurRepository $employeurRepository,
    FonctionRepository $fonctionRepository,NatureContratRepository $natureContratRepository,ResponsabiliteRepository $responsabiliteRepository,
    ServiceRepository $serviceRepository,TitreRepository $titreRepository,TypeContratRepository $typeContratRepository,
    DivisionRepository $divisionRepository){
        $this->emploiRepository =$emploiRepository;
        $this->identificationRepository = $identificationRepository;
        $this->bureauRepository =$bureauRepository;
        $this->cspRepository =$cspRepository;
        $this->familleProRepository =$familleProRepository;
        $this->fonctionRepository =$fonctionRepository;
        $this->natureContratProRepository =$natureContratRepository;
        $this->typeContratRepository =$typeContratRepository;
        $this->titreRepository =$titreRepository;
        $this->employeurRepository =$employeurRepository;
        $this->serviceRepository =$serviceRepository;
        $this->responsabiliteRepository =$responsabiliteRepository;
        $this->divisionRepository =$divisionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emplois = $this->emploiRepository->getAll();
        return view('emploi.index',compact('emplois'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identifications        = $this->identificationRepository->getAll();
        $bureaus                = $this->bureauRepository->getAll();
        $csps                   = $this->cspRepository->getAll();
        $famillePros            =   $this->familleProRepository->getAll();
        $fonctions              = $this->fonctionRepository->getAll();
        $natureContrats         = $this->natureContratProRepository->getAll();
        $typeContrats           = $this->typeContratRepository->getAll();
        $titres                 = $this->titreRepository->getAll();
        $employeurs             = $this->employeurRepository->getAll();
        $services               = $this->serviceRepository->getAll();
        $responsabilites        = $this->responsabiliteRepository->getAll();
        $divisions              = $this->divisionRepository->getAll();
        return view('emploi.add',compact("identifications","bureaus","csps","famillePros","fonctions"
        ,"natureContrats","typeContrats","titres","employeurs","services","responsabilites","divisions"));
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
            $destinationPath = 'image-emploi/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }

        $emplois = $this->emploiRepository->store($request->all());
        return redirect('emploi');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emploi = $this->emploiRepository->getById($id);
        return view('emploi.show',compact('emploi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emploi = $this->emploiRepository->getById($id);
        $identifications = $this->identificationRepository->getAll();
        $bureaus                = $this->bureauRepository->getAll();
        $csps                   = $this->cspRepository->getAll();
        $famillePros            =   $this->familleProRepository->getAll();
        $fonctions              = $this->fonctionRepository->getAll();
        $natureContrats         = $this->natureContratProRepository->getAll();
        $typeContrats           = $this->typeContratRepository->getAll();
        $titres                 = $this->titreRepository->getAll();
        $employeurs             = $this->employeurRepository->getAll();
        $services               = $this->serviceRepository->getAll();
        $responsabilites        = $this->responsabiliteRepository->getAll();
        $divisions              = $this->divisionRepository->getAll();
        return view('emploi.edit',compact('emploi','identifications',"bureaus","csps","famillePros","fonctions"
        ,"natureContrats","typeContrats","titres","employeurs","services","responsabilites","divisions"));
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
        $this->emploiRepository->update($id, $request->all());
        return redirect('emploi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->emploiRepository->destroy($id);
        return redirect('emploi');
    }
}
