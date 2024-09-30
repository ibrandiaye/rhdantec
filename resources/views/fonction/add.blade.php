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
                    <li class="breadcrumb-item active"><a href="{{ route('fonction.index') }}" >LISTE D'ENREGISTREMENT DES FONCTIONS</a></li>
                </ol>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>
</div>


        <form action="{{ route('fonction.store') }}" method="POST">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" name="nom"  value="{{ old('nom') }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div>

                                        <button type="submit" class="btn btn-success btn btn-lg "> Enregistrer</button>

                                </div>
                            </div>

                            </div>

            </form>
@endsection


