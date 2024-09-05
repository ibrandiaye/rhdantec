@extends('layout')
@section('title', '| identification')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">

                                <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="#" role="button">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('identification.create') }}" role="button" >ENREGISTRER identification</a></li>
                                </ol>
                            </div><!-- /.col -->
                        </div>
                    </div>
                </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="col-12">
    <div class="card ">
        <div class="card-header">LISTE D'ENREGISTREMENT DES Identifications</div>
            <div class="card-body">

                <table id="datatable" class="table table-bordered table-responsive table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CNI </th>
                            <th>MATRICULE </th>
                            <th>MATRICULE UNIVERSITE </th>
                            <th>Nom </th>
                            <th>PRENOM (S) </th>
                            <th>DATE DE NAISSANCE </th>
                            <th>LIEU DE NAISSANCE </th>
                            <th>SEXE </th>
                            <th>SITUATION MATRIMONIALE </th>
                            <th>ADRESSE </th>
                            <th>TELEPHONE </th>
                            <th>EMAIL </th>
                            <th>RELIGION </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($identifications as $identification)
                        <tr>
                            <td>{{ $identification->id }}</td>
                            <td>{{ $identification->cni }}</td>
                            <td>{{ $identification->matricule }}</td>
                            <td>{{ $identification->matricule_universite }}</td>
                            <td>{{ $identification->nom }}</td>
                            <td>{{ $identification->prenom }}</td>
                            <td>{{ $identification->datenaiss }}</td>
                            <td>{{ $identification->lieunaiss }}</td>
                            <td>{{ $identification->sexe }}</td>
                            <td>{{ $identification->sm }}</td>
                            <td>{{ $identification->adresse }}</td>
                            <td>{{ $identification->telephone }}</td>
                            <td>{{ $identification->email }}</td>
                            <td>{{ $identification->religion }}</td>
                            <td>
                                <a href="{{ route('identification.edit', $identification->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['identification.destroy', $identification->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!}



                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>



            </div>

        </div>
    </div>
</div>


@endsection
