<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\TitreRepository;
use Illuminate\Http\Request;

class TitreController extends Controller
{
    protected $titreRepository;

    public function __construct(TitreRepository $titreRepository){
        $this->titreRepository =$titreRepository;
       // $this->middleware("auth")->except(["getAllTitre"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titres = $this->titreRepository->getAll();
        return view('titre.index',compact('titres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('titre.add');
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
            $destinationPath = 'image-titre/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }

        $titres = $this->titreRepository->store($request->all());
        return redirect('titre');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $titre = $this->titreRepository->getById($id);
        return view('titre.show',compact('titre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titre = $this->titreRepository->getById($id);
        return view('titre.edit',compact('titre'));
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
        $this->titreRepository->update($id, $request->all());
        return redirect('titre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->titreRepository->destroy($id);
        return redirect('titre');
    }
}
