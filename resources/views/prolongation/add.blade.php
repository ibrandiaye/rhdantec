@extends('layout_stage')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Formulaire d'enregistrement des prolongations</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('prolongation.create') }}">Enregistrer un prolongation</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Form Validation ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Validation</h5>
                    </div>
                    <div class="card-body">
                        <form id="validation-form123" action="{{ route('prolongation.store') }}" method="POST">
                            @csrf
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Commentaire</label>
                                        <input type="text" class="form-control" value="{{ old('raison') }}" name="raison" placeholder="Commentaire" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Date Début</label>
                                        <input type="date" class="form-control" value="{{ old('datedebut') }}" name="datedebut" id="datedebut" placeholder="Date début" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Durée</label>
                                        <input type="number" id="duree" class="form-control" value="{{ old('duree') }}" name="duree" placeholder="Durée" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Date Fin</label>
                                        <input type="date" class="form-control" id="datefin" value="{{ old('datefin') }}" name="datefin" placeholder="Date Fin" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Autorisation</label>
                                        <select class="form-control" name="autorisation_id" required>
                                           <option value="">Veuillez choisir</option>
                                           @foreach ($autorisations as $autorisation)
                                           <option value="{{ $autorisation->id }}">{{ $autorisation->fonction }}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn  btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- [ Form Validation ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
@endsection
@section('js')
<!-- jquery-validation Js -->
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
<!-- form-picker-custom Js -->
<script src="{{ asset('assets/js/pages/form-validation.js') }}"></script>
<script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
<script>
    $(document).ready(function () {

        $("#duree").keyup(function(){

           var date = $("#datedebut").val();
           var new_date = moment(date).add( $("#duree").val(), 'months');
           $("#datefin").val(new_date.format('YYYY-MM-DD'));
           console.log(new_date);
          });
    });
</script>
@endsection
