{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister mobilite')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">ACCUEIL</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('mobilite.index') }}" >LISTE D'ENREGISTREMENT DES MOBILITES</a></li>
                </ol>
            </div>
           {{--     --}}
        </div>
    </div>
    <div class="clearfix"></div>
</div>


        <form action="{{ route('mobilite.store') }}" method="POST">
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
                                            <label>MOTIF</label>
                                            <input type="text" name="motif"  value="{{ old('motif') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>DATE</label>
                                            <input type="date" name="date"  value="{{ old('date') }}" class="form-control"  required>
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

                                        <button type="submit" class="btn btn-success btn btn-lg "> Enregistrer</button>

                                </div>
                            </div>

                            </div>

            </form>
@endsection


