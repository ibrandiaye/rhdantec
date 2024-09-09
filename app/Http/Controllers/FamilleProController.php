<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FamilleProController extends Controller
{
    protected $familleproRepository;

    public function __construct(FamilleproRepository $familleproRepository){
        $this->familleproRepository =$familleproRepository;
       // $this->middleware("auth")->except(["getAllFamillepro"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $famillepros = $this->familleproRepository->getAll();
        return view('famillepro.index',compact('famillepros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('famillepro.add');
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
            $destinationPath = 'image-famillepro/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }

        $famillepros = $this->familleproRepository->store($request->all());
        return redirect('famillepro');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $famillepro = $this->familleproRepository->getById($id);
        return view('famillepro.show',compact('famillepro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $famillepro = $this->familleproRepository->getById($id);
        return view('famillepro.edit',compact('famillepro'));
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
        $this->familleproRepository->update($id, $request->all());
        return redirect('famillepro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->familleproRepository->destroy($id);
        return redirect('famillepro');
    }
}
