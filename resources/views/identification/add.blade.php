{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister identification')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">ACCUEIL</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('identification.index') }}" >LISTE D'ENREGISTREMENT DES IDENTIFICATIONS</a></li>
                </ol>
            </div>
           {{--     --}}
        </div>
    </div>
    <div class="clearfix"></div>
</div>


        <form action="{{ route('identification.store') }}" method="POST">
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
                                            <label>CNI</label>
                                            <input type="text" name="cni"  value="{{ old('cni') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Matricule</label>
                                            <input type="text" name="matricule"  value="{{ old('matricule') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Matricule Universite</label>
                                            <input type="text" name="matricule_universite"  value="{{ old('matricule_universite') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Prenom</label>
                                            <input type="text" name="prenom"  value="{{ old('prenom') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" name="nom"  value="{{ old('nom') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Naissance</label>
                                            <input type="date" name="datenaiss"  value="{{ old('datenaiss') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Lieu de naissance</label>
                                            <input type="text" name="lieunaiss"  value="{{ old('lieunaiss') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Sexe</label>
                                            <select class="form-control" name="sexe" id="sexe" required="">
                                                <option value="">Selectionner</option>
                                                <option value="M">Homme</option>
                                                <option value="F">Femme</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Situation Matrimoniale</label>
                                           <select class="form-control" name="sm" id="sm" required="">
                                                <option value="">Selectionner</option>
                                                <option value="celibataire">Célibataire</option>
                                                <option value="marie">Marié</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Adresse</label>
                                            <input type="text" name="adresse"  value="{{ old('adresse') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input type="text" name="telephone"  value="{{ old('telephone') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>email</label>
                                            <input type="email" name="email"  value="{{ old('email') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <input type="text" name="religion"  value="{{ old('religion') }}" class="form-control"  required>
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


