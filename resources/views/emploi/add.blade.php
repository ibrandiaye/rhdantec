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
           {{--    @if(Auth::user()->role=="admin") DGE
                        @else
                        {{Auth::user()->liste->nom}}
                         @endif  --}}
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
                                            <input type="text" name="employeur"  value="{{ old('employeur') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>TYPE DE CONTRAT</label>
                                            <input type="text" name="type_contrat"  value="{{ old('type_contrat') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>NATURE DU CONTRAT</label>
                                            <input type="text" name="nature_contrat"  value="{{ old('nature_contrat') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>FONCTION</label>
                                            <input type="text" name="fonction"  value="{{ old('fonction') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Titre</label>
                                            <input type="text" name="titre"  value="{{ old('titre') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>RESPONSABILITE</label>
                                            <input type="text" name="responsabilite"  value="{{ old('responsabilite') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CSP</label>
                                            <input type="text" name="csp"  value="{{ old('csp') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>FAMILLE PROFESSIONNELLE</label>
                                            <input type="text" name="famille_pro"  value="{{ old('famille_pro') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>SERVICE</label>
                                            <input type="text" name="service"  value="{{ old('service') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                            <label>DIVISION / UNITE</label>
                                            <input type="text" name="unite"  value="{{ old('unite') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>BUREAU</label>
                                            <input type="text" name="bureau"  value="{{ old('bureau') }}" class="form-control"  required>
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


