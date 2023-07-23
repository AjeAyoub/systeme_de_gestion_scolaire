<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body>

        <!-- pecentage of male or femelle and other count -->
        @php
        $totalCountEnseignant = App\Models\Enseignant::count();
        $totalCountEtudiant = App\Models\Etudiant::count();
         @endphp
        <!-- end pecentage of male or femelle -->

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/Book.gif" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.etudiant-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">

                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">Etudiants</p>
                                    <h4>{{ $totalCountEtudiant }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> Nombre total d'étudiants
                            </p>
                        </div>
                    </div>
                </div>
            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-success">
                                    <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">Enseignant</p>
                                <h4>{{ $totalCountEnseignant }}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> Nombre total d'enseignant
                        </p>
                    </div>
                </div>
            </div>

            <!-- calendar -->
            <iframe class="mb-4" src="/getevent" frameborder="0" width="100%" height="600"></iframe>
    
            <!-- calendar -->

       
            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>