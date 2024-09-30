@extends('layout')
@section('title', '| emploi')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">

                                <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="#" role="button">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('emploi.create') }}" class="btn btn-primary"  role="button" style="color: white;">Enregistrer emploi</a></li>
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
        <div class="card-header">LISTE D'ENREGISTREMENT DES Emplois</div>
            <div class="card-body">

                <table id="datatable" class="table table-bordered table-responsive table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>EMPLOYEUR </th>
                            <th>TYPE DE CONTRAT </th>
                            <th>NATURE DU CONTRAT </th>
                            <th>FONCTION </th>
                            <th>TITRE </th>
                            <th>RESPONSABILITE </th>
                            <th>CSP </th>
                            <th>FAMILLE PROFESSIONNELLE </th>
                            <th>SERVICE </th>
                            <th>DIVISION / UNITE </th>
                            <th>BUREAU </th>
                            <th>DATE PRISE DE SERVICE </th>
                            <th>Identifcation </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($emplois as $emploi)
                        <tr>
                            <td>{{ $emploi->id }}</td>
                            <td>{{ $emploi->employeur->nom }}</td>
                            <td>{{ $emploi->typeContrat->nom }}</td>
                            <td>{{ $emploi->natureContrat->nom }}</td>
                            <td>{{ $emploi->fonction->nom }}</td>
                            <td>{{ $emploi->titre->nom }}</td>
                            <td>{{ $emploi->responsabilite->nom }}</td>
                            <td>{{ $emploi->csp->nom }}</td>
                            <td>{{ $emploi->famillePro->nom }}</td>
                            <td>{{ $emploi->service->nom }}</td>
                            <td>{{ $emploi->division->nom }}</td>
                            <td>{{ $emploi->bureau->nom }}</td>
                            <td>{{ $emploi->dateps }}</td>
                            <td>{{ $emploi->identification->nom }}</td>
                            <td>
                                <a href="{{ route('emploi.edit', $emploi->id) }}" role="button" style="color: white;"class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['emploi.destroy', $emploi->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
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
