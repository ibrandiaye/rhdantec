{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Modifier ')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#" role="button">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('categorie.index') }}" >RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
        </div>
    </div>
</div>

        {!! Form::model($document, ['method'=>'PATCH','route'=>['document.update', $document->id],"enctype"=>"multipart/form-data"]) !!}
            @csrf
             <div class="card">
                        <div class="card-header text-center">FORMULAIRE DE MODIFICATION CATEGORIE</div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employé</label>
                                                <select class="form-control" name="identification_id" id="identification_id" required="">
                                                    <option value="">Selectionner</option>
                                                    @foreach ($identifications as $identification)
                                                        <option value="{{  $identification->id }}" {{$document->identification_id==$identification->id ? 'selected' : '' }}>{{  $identification->matricule }} {{  $identification->prenom }} {{  $identification->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>libelle</label>
                                                <input type="text" name="libelle"  value="{{ $identification->libelle }}" class="form-control"  required>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Document  </label>
                                            <input type="file" name="doc" class="form-control"  >
                                            </div>
                                        </div>
                                    </div>


                                <div>

                                        <button type="submit" class="btn btn-success btn btn-lg "> MODIFIER</button>

                                </div>


                            </div>
                        </div>
    {!! Form::close() !!}

@endsection
