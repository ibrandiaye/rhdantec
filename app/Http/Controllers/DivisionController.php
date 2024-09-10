<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\DivisionRepository;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    protected $divisionRepository;

    public function __construct(DivisionRepository $divisionRepository){
        $this->divisionRepository =$divisionRepository;
       // $this->middleware("auth")->except(["getAllDivision"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = $this->divisionRepository->getAll();
        return view('division.index',compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('division.add');
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
            $destinationPath = 'image-division/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }

        $divisions = $this->divisionRepository->store($request->all());
        return redirect('division');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $division = $this->divisionRepository->getById($id);
        return view('division.show',compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = $this->divisionRepository->getById($id);
        return view('division.edit',compact('division'));
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
        $this->divisionRepository->update($id, $request->all());
        return redirect('division');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->divisionRepository->destroy($id);
        return redirect('division');
    }
}
