{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister emploi')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">ACCUEIL</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('emploi.index') }}" >LISTE D'ENREGISTREMENT DES EMPLOIS</a></li>
                </ol>
            </div>
           {{--     --}}
        </div>
    </div>
    <div class="clearfix"></div>
</div>


        <form action="{{ route('emploi.store') }}" method="POST">
            @csrf
            <div class="card">
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
                                                    <option value="{{  $employeur->id }}" {{ old('employeur_id')==$employeur->id ? 'selected' : '' }}>{{  $employeur->matricule }} {{  $employeur->prenom }} {{  $employeur->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>TYPE DE CONTRAT</label>
                                            <select class="form-control" name="type_contrat_id" id="type_contrat_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($typeContrats as $typecontrat)
                                                    <option value="{{  $typecontrat->id }}" {{ old('type_contrat_id')==$typecontrat->id ? 'selected' : '' }}>{{  $typecontrat->nom }}</option>
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
                                                    <option value="{{  $natureContrat->id }}" {{ old('nature_contrat_id')==$natureContrat->id ? 'selected' : '' }}>{{  $employeur->nom }}</option>
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
                                                    <option value="{{  $fonction->id }}" {{ old('fonction_id')==$fonction->id ? 'selected' : '' }}>{{  $fonction->nom }}</option>
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
                                                    <option value="{{  $titre->id }}" {{ old('titre_id')==$titre->id ? 'selected' : '' }}>{{  $titre->nom }}</option>
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
                                                    <option value="{{  $responsabilite->id }}" {{ old('responsabilite_id')==$responsabilite->id ? 'selected' : '' }}>{{  $responsabilite->nom }}</option>
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
                                                    <option value="{{  $csp->id }}" {{ old('csp_id')==$csp->id ? 'selected' : '' }}>{{  $csp->nom }}</option>
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
                                                    <option value="{{  $famillePro->id }}" {{ old('famille_pro_id')==$famillePro->id ? 'selected' : '' }}>{{  $famillePro->nom }}</option>
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
                                                    <option value="{{  $service->id }}" {{ old('service_id')==$service->id ? 'selected' : '' }}>{{  $service->nom }}</option>
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
                                                    <option value="{{  $division->id }}" {{ old('division_id')==$division->id ? 'selected' : '' }}>{{  $division->nom }}</option>
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
                                                    <option value="{{  $bureau->id }}" {{ old('bureau_id')==$bureau->id ? 'selected' : '' }}>{{  $bureau->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>DATE PRISE DE SERVICE</label>
                                            <input type="date" name="dateps"  value="{{ old('dateps') }}" class="form-control"  required>
                                        </div>
                                    </div>


                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Employé</label>
                                            <select class="form-control" name="identification_id" id="identification_id" required="">
                                                <option value="">Selectionner</option>
                                                @foreach ($identifications as $identification)
                                                    <option value="{{  $identification->id }}" {{ old('identification_id')==$identification->id ? 'selected' : '' }}>{{  $identification->matricule }} {{  $identification->prenom }} {{  $identification->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div>

                                        <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>

                                </div>
                            </div>

                            </div>

            </form>
@endsection


