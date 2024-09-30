{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister fonction')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">ACCUEIL</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('identification.index') }}" >LISTE D'ENREGISTREMENT DES FAMILLEPROS</a></li>
                </ol>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-6 col-xl-3">

        <div class="card">
         {{--    <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap"> --}}
            <div class="card-body">
                <h4 class="card-title font-20 mt-0">Identification</h4>
              {{--   <p class="card-text">Some quick example text to build on the card title and make
                    up the bulk of the card's content.</p>
            </div> --}}
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nom : <strong>{{ $identification->prenom }} {{ $identification->nom }}</strong></li>
                <li class="list-group-item">Matricule : <strong>{{ $identification->matricule }}</strong></li>
                <li class="list-group-item">CNI : <strong>{{ $identification->cni }}</strong></li>
                <li class="list-group-item">Matricule Universite : <strong>{{ $identification->matricule_universite }}</strong></li>
                <li class="list-group-item">Date Naissance : <strong>{{ $identification->datenaiss }} à {{ $identification->lieunaiss }}</strong></li>
                <li class="list-group-item">Genre : <strong>{{ $identification->sexe }}</strong></li>
                <li class="list-group-item">SM : <strong>{{ $identification->sm }}</strong></li>
                <li class="list-group-item">Adresse : <strong>{{ $identification->adresse }}</strong></li>
                <li class="list-group-item">telephone : <strong>{{ $identification->telephone }}</strong></li>
                <li class="list-group-item">Email : <strong>{{ $identification->email }}</strong></li>
                <li class="list-group-item">Religion : <strong>{{ $identification->religion }}</strong></li>

            </ul>
           {{--  <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div> --}}
        </div>

    </div><!-- end col -->
</div>

@endsection
