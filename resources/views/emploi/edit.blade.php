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
                                            <select class="form-control" name="employeur_id" id="employeur_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($employeurs as $employeur)
                                                    <option value="{{  $employeur->id }}" {{$emploi->employeur_id==$employeur->id ? 'selected' : '' }}>{{  $employeur->matricule }} {{  $employeur->prenom }} {{  $employeur->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>TYPE DE CONTRAT</label>
                                            <select class="form-control" name="typecontrat_id" id="typecontrat_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($typeContrats as $typecontrat)
                                                    <option value="{{  $typecontrat->id }}" {{$emploi->typecontrat_id==$typecontrat->id ? 'selected' : '' }}>{{  $typecontrat->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>NATURE DU CONTRAT</label>
                                            <select class="form-control" name="nature_contrat_id" id="nature_contrat_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($natureContrats as $natureContrat)
                                                    <option value="{{  $natureContrat->id }}" {{$emploi->nature_contrat_id==$natureContrat->id ? 'selected' : '' }}>{{  $employeur->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>FONCTION</label>
                                             <select class="form-control" name="fonction_id" id="fonction_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($fonctions as $fonction)
                                                    <option value="{{  $fonction->id }}" {{$emploi->fonction_id==$fonction->id ? 'selected' : '' }}>{{  $fonction->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Titre</label>
                                            <select class="form-control" name="titre_id" id="titre_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($titres as $titre)
                                                    <option value="{{  $titre->id }}" {{$emploi->titre_id==$titre->id ? 'selected' : '' }}>{{  $titre->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>RESPONSABILITE</label>
                                             <select class="form-control" name="responsabilite_id" id="responsabilite_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($responsabilites as $responsabilite)
                                                    <option value="{{  $responsabilite->id }}" {{$emploi->responsabilite_id==$responsabilite->id ? 'selected' : '' }}>{{  $responsabilite->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CSP</label>
                                            <select class="form-control" name="csp_id" id="csp_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($csps as $csp)
                                                    <option value="{{  $csp->id }}" {{$emploi->csp_id==$csp->id ? 'selected' : '' }}>{{  $csp->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>FAMILLE PROFESSIONNELLE</label>
                                             <select class="form-control" name="famille_pro_id" id="famille_pro_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($famillePros as $famillePro)
                                                    <option value="{{  $famillePro->id }}" {{$emploi->famille_pro_id==$famillePro->id ? 'selected' : '' }}>{{  $famillePro->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>SERVICE</label>
                                            <select class="form-control" name="service_id" id="service_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($services as $service)
                                                    <option value="{{  $service->id }}" {{$emploi->service_id==$service->id ? 'selected' : '' }}>{{  $service->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                            <label>DIVISION / UNITE</label>
                                             <select class="form-control" name="division_id" id="division_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($divisions as $division)
                                                    <option value="{{  $division->id }}" {{$emploi->division_id==$division->id ? 'selected' : '' }}>{{  $division->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>BUREAU</label>
                                            <select class="form-control" name="bureau_id" id="bureau_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($bureaus as $bureau)
                                                    <option value="{{  $bureau->id }}" {{$emploi->bureau_id==$bureau->id ? 'selected' : '' }}>{{  $bureau->nom }}</option>
                                                @endforeach
                                            </select>
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
