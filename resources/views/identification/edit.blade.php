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

        {!! Form::model($identification, ['method'=>'PATCH','route'=>['identification.update', $identification->id]]) !!}
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
                                            <label>CNI</label>
                                            <input type="text" name="cni"  value="{{$identification->cni }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Matricule</label>
                                            <input type="text" name="matricule"  value="{{$identification->matricule }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Matricule Universite</label>
                                            <input type="text" name="matricule_universite"  value="{{$identification->matricule_universite }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Prenom</label>
                                            <input type="text" name="prenom"  value="{{$identification->prenom }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" name="nom"  value="{{$identification->nom }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date Naissance</label>
                                            <input type="date" name="datenaiss"  value="{{$identification->datenaiss }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Lieu de naissance</label>
                                            <input type="text" name="lieunaiss"  value="{{$identification->lieunaiss }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Sexe</label>
                                            <select class="form-control" name="sexe" id="sexe" required="">
                                                <option value="">Selectionner</option>
                                                <option value="M" {{ $identification->sexe=="M" ? 'selected' : '' }}>Homme</option>
                                                <option value="F" {{ $identification->sexe=="F" ? 'selected' : '' }}>Femme</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Situation Matrimonial</label>
                                            <select class="form-control" name="sm" id="sm" required="">
                                                <option value="">Selectionner</option>
                                                <option value="celibataire" {{ $identification->sm=="celibataire" ? 'selected' : '' }}>Célibataire</option>
                                                <option value="marie" {{ $identification->sm=="marie" ? 'selected' : '' }}>Marié</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input type="text" name="telephone"  value="{{$identification->telephone }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>email</label>
                                            <input type="email" name="email"  value="{{$identification->email }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <input type="text" name="religion"  value="{{$identification->religion }}" class="form-control"  required>
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
