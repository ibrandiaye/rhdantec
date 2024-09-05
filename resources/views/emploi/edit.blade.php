{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Modifier Région')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#" role="button">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('identification.index') }}" >RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
        </div>
    </div>
</div>

        {!! Form::model($emploi, ['method'=>'PATCH','route'=>['emploi.update', $emploi->id]]) !!}
            @csrf
             <div class="card">
                        <div class="card-header text-center">FORMULAIRE DE MODIFICATION IDENTIFICATION</div>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>EMPLOYEUR</label>
                                            <input type="text" name="employeur"  value="{{$emploi->employeur }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>TYPE DE CONTRAT</label>
                                            <input type="text" name="type_contrat"  value="{{$emploi->type_contrat }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>NATURE DU CONTRAT</label>
                                            <input type="text" name="nature_contrat"  value="{{$emploi->nature_contrat }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>FONCTION</label>
                                            <input type="text" name="fonction"  value="{{$emploi->fonction }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Titre</label>
                                            <input type="text" name="titre"  value="{{$emploi->titre }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>RESPONSABILITE</label>
                                            <input type="text" name="responsabilite"  value="{{$emploi->responsabilite }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CSP</label>
                                            <input type="text" name="csp"  value="{{$emploi->csp }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>FAMILLE PROFESSIONNELLE</label>
                                            <input type="text" name="famille_pro"  value="{{$emploi->famille_pro }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>SERVICE</label>
                                            <input type="text" name="service"  value="{{$emploi->service }}" class="form-control"  required>
                                        </div>
                                    </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                            <label>DIVISION / UNITE</label>
                                            <input type="text" name="unite"  value="{{$emploi->unite }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>BUREAU</label>
                                            <input type="text" name="bureau"  value="{{$emploi->bureau }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>DATE PRISE DE SERVICE</label>
                                            <input type="date" name="dateps"  value="{{$emploi->dateps }}" class="form-control"  required>
                                        </div>
                                    </div>


                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Employé</label>
                                            <select class="form-control" name="identification_id" id="identification_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($identifications as $identification)
                                                    <option value="{{  $identification->id }}" {{$emploi->identification_id==$identification->id ? 'selected' : '' }}>{{  $identification->matricule }} {{  $identification->prenom }} {{  $identification->nom }}</option>
                                                @endforeach
                                            </select>
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
