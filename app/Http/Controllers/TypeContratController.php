<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\TypeContratRepository;
use Illuminate\Http\Request;

class TypeContratController extends Controller
{
    protected $typecontratRepository;

    public function __construct(TypeContratRepository $typecontratRepository){
        $this->typecontratRepository =$typecontratRepository;
       // $this->middleware("auth")->except(["getAllTypecontrat"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typecontrats = $this->typecontratRepository->getAll();

        return view('typecontrat.index',compact('typecontrats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typecontrat.add');
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
            $destinationPath = 'image-typecontrat/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }

        $typecontrats = $this->typecontratRepository->store($request->all());
        return redirect('typecontrat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typecontrat = $this->typecontratRepository->getById($id);
        return view('typecontrat.show',compact('typecontrat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typecontrat = $this->typecontratRepository->getById($id);
        return view('typecontrat.edit',compact('typecontrat'));
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
        $this->typecontratRepository->update($id, $request->all());
        return redirect('typecontrat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->typecontratRepository->destroy($id);
        return redirect('typecontrat');
    }}
