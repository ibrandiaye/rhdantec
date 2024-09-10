<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CspRepository;
use Illuminate\Http\Request;

class CspController extends Controller
{
    protected $cspRepository;

    public function __construct(CspRepository $cspRepository){
        $this->cspRepository =$cspRepository;
       // $this->middleware("auth")->except(["getAllCsp"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $csps = $this->cspRepository->getAll();
        return view('csp.index',compact('csps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('csp.add');
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
            $destinationPath = 'image-csp/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }

        $csps = $this->cspRepository->store($request->all());
        return redirect('csp');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $csp = $this->cspRepository->getById($id);
        return view('csp.show',compact('csp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $csp = $this->cspRepository->getById($id);
        return view('csp.edit',compact('csp'));
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
        $this->cspRepository->update($id, $request->all());
        return redirect('csp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cspRepository->destroy($id);
        return redirect('csp');
    }
}
