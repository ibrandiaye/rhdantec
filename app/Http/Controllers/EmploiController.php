<?php

namespace App\Http\Controllers;

use App\Repositories\EmploiRepository;
use App\Repositories\IdentificationRepository;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    protected $emploiRepository;
    protected $identificationRepository;

    public function __construct(EmploiRepository $emploiRepository,IdentificationRepository $identificationRepository){
        $this->emploiRepository =$emploiRepository;
        $this->identificationRepository = $identificationRepository;
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
        $identifications = $this->identificationRepository->getAll();
        return view('emploi.add',compact("identifications"));
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
        return view('emploi.edit',compact('emploi','identifications'));
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
