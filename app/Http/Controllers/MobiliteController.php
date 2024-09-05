<?php

namespace App\Http\Controllers;

use App\Repositories\IdentificationRepository;
use App\Repositories\MobiliteRepository;
use Illuminate\Http\Request;

class MobiliteController extends Controller
{
    protected $mobiliteRepository;
    protected $identificationRepository;

    public function __construct(MobiliteRepository $mobiliteRepository,IdentificationRepository $identificationRepository){
        $this->mobiliteRepository =$mobiliteRepository;
        $this->identificationRepository = $identificationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobilites = $this->mobiliteRepository->getAll();
        return view('mobilite.index',compact('mobilites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identifications = $this->identificationRepository->getAll();
        return view('mobilite.add',compact("identifications"));
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
            $destinationPath = 'image-mobilite/'; // upload path
            $nomImage = time().".". $files->getClientOriginalExtension();
            $files->move($destinationPath, $nomImage);
            $request->merge(['image'=>$nomImage]);

        }
            
        $mobilites = $this->mobiliteRepository->store($request->all());
        return redirect('mobilite');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobilite = $this->mobiliteRepository->getById($id);
        return view('mobilite.show',compact('mobilite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobilite = $this->mobiliteRepository->getById($id);
        $identifications = $this->identificationRepository->getAll();
        return view('mobilite.edit',compact('mobilite','identifications'));
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
        $this->mobiliteRepository->update($id, $request->all());
        return redirect('mobilite');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->mobiliteRepository->destroy($id);
        return redirect('mobilite');
    }
}
