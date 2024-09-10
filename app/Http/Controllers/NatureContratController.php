<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\NatureContratRepository;
use Illuminate\Http\Request;

class NatureContratController extends Controller
{
    protected $naturecontratRepository;

    public function __construct(NatureContratRepository $naturecontratRepository){
        $this->naturecontratRepository =$naturecontratRepository;
       // $this->middleware("auth")->except(["getAllNaturecontrat"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $naturecontrats = $this->naturecontratRepository->getAll();
        return view('naturecontrat.index',compact('naturecontrats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('naturecontrat.add');
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
            $destinationPath = 'image-naturecontrat/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }

        $naturecontrats = $this->naturecontratRepository->store($request->all());
        return redirect('naturecontrat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $naturecontrat = $this->naturecontratRepository->getById($id);
        return view('naturecontrat.show',compact('naturecontrat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $naturecontrat = $this->naturecontratRepository->getById($id);
        return view('naturecontrat.edit',compact('naturecontrat'));
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
        $this->naturecontratRepository->update($id, $request->all());
        return redirect('naturecontrat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->naturecontratRepository->destroy($id);
        return redirect('naturecontrat');
    }
}
