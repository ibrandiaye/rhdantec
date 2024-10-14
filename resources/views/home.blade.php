
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>LE DANTEC</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body>


    <!-- Begin page -->
    <div class="accountbgs"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <div class="text-center">
                    {{--  <a href="index.html" class="logo logo-admin"><img src="assets/images/e-logo.png" height="20" alt="logo"></a>  --}}
                </div>

                <div class="px-1 pb-1">

                        <div class="row mb-3 ">
                            <div for="email" class="col-md-6 "><div class="d-grid gap-2"><a href="{{ route('home') }}" class="btn btn-outline-info  btn-block">
                                Gestion Fchier
                            </a></div></div></label>

                            <div class="col-md-6 d-grid gap-2">
                             <button type="submit" class="btn btn-outline-warning btn-block">
                                    Gestion Mobilité
                                 </button>
                            </div>
                        </div>
                        <div class="row mb-6 d-grid gap-2">
                            <div for="email" class="col-md-4 "><a href="{{ route('gestion.stage') }}" type="submit" class="btn btn-outline-primary btn-block">
                                Gestion Stage
                             </a></div>

                            <div class="col-md-4">
                             <button type="submit" class="btn btn-outline-danger btn-block">
                                    Gestion Solde
                                 </button>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-outline-success btn-block">
                                       Gestion Carière
                                    </button>
                               </div>
                        </div>





                </div>

            </div>
        </div>
    </div>



        <!-- jQuery  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/modernizr.min.js') }}"></script>
        <script src="{{ asset('js/detect.js') }}"></script>
        <script src="{{ asset('js/fastclick.js') }}"></script>
        <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('js/waves.js') }}"></script>
        <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('js/app.js') }}"></script>


    </body>
</html>
