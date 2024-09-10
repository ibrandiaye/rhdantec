<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\BureauRepository;
use Illuminate\Http\Request;

class BureauController extends Controller
{
    protected $bureauRepository;

    public function __construct(BureauRepository $bureauRepository){
        $this->bureauRepository =$bureauRepository;
       // $this->middleware("auth")->except(["getAllBureau"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bureaus = $this->bureauRepository->getAll();
        return view('bureau.index',compact('bureaus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bureau.add');
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
            $destinationPath = 'image-bureau/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }

        $bureaus = $this->bureauRepository->store($request->all());
        return redirect('bureau');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bureau = $this->bureauRepository->getById($id);
        return view('bureau.show',compact('bureau'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bureau = $this->bureauRepository->getById($id);
        return view('bureau.edit',compact('bureau'));
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
        $this->bureauRepository->update($id, $request->all());
        return redirect('bureau');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bureauRepository->destroy($id);
        return redirect('bureau');
    }
}
