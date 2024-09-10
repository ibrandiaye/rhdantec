<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\FonctionRepository;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    protected $fonctionRepository;

    public function __construct(FonctionRepository $fonctionRepository){
        $this->fonctionRepository =$fonctionRepository;
       // $this->middleware("auth")->except(["getAllFonction"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonctions = $this->fonctionRepository->getAll();
        return view('fonction.index',compact('fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fonction.add');
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
            $destinationPath = 'image-fonction/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }

        $fonctions = $this->fonctionRepository->store($request->all());
        return redirect('fonction');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fonction = $this->fonctionRepository->getById($id);
        return view('fonction.show',compact('fonction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fonction = $this->fonctionRepository->getById($id);
        return view('fonction.edit',compact('fonction'));
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
        $this->fonctionRepository->update($id, $request->all());
        return redirect('fonction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->fonctionRepository->destroy($id);
        return redirect('fonction');
    }
}
