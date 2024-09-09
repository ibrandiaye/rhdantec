<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponsabiliteController extends Controller
{
    protected $responsabiliteRepository;

    public function __construct(ResponsabiliteRepository $responsabiliteRepository){
        $this->responsabiliteRepository =$responsabiliteRepository;
       // $this->middleware("auth")->except(["getAllResponsabilite"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsabilites = $this->responsabiliteRepository->getAll();
        return view('responsabilite.index',compact('responsabilites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('responsabilite.add');
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
            $destinationPath = 'image-responsabilite/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }

        $responsabilites = $this->responsabiliteRepository->store($request->all());
        return redirect('responsabilite');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $responsabilite = $this->responsabiliteRepository->getById($id);
        return view('responsabilite.show',compact('responsabilite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsabilite = $this->responsabiliteRepository->getById($id);
        return view('responsabilite.edit',compact('responsabilite'));
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
        $this->responsabiliteRepository->update($id, $request->all());
        return redirect('responsabilite');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->responsabiliteRepository->destroy($id);
        return redirect('responsabilite');
    }
}
