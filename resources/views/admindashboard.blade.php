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

    <!-- calendar -->

</head>

<body>

    <!-- pecentage of male or femelle and other count -->
    @php
        $totalCountAdmin = App\Models\Admin::count();
        $totalCountEnseignant = App\Models\Enseignant::count();
        $totalCountComptable = App\Models\Comptable::count();
        $totalCountEtudiant = App\Models\Etudiant::count();
        $totalCountParent = App\Models\Parentt::count();
        $maleCount = App\Models\Etudiant::where('genre', 'M')->count();
        $femaleCount = App\Models\Etudiant::where('genre', 'F')->count();
        $malePercentage = number_format(($maleCount / $totalCountEtudiant) * 100, 2);
        $femalePercentage = number_format(($femaleCount / $totalCountEtudiant) * 100, 2); 
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

        @include('layouts.admin-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0"> Tableau de bord</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
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
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-user-shield highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">Admins</p>
                                    <h4>1</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> Nombre total d'admins
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
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
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-info">
                                        <i class="fas fa-user highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">Parents</p>
                                    <h4>{{ $totalCountParent }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>Nombre total des parents
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-money-check-alt highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">Comptables</p>
                                    <h4>{{ App\Models\Comptable::count() }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> Nombre Total des Comptables
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Genre -->
             <!-- Orders Status widgets-->
             <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Genre des Étudiants</h5>
                            <div class="row mb-30">
                                <div class="col-md-6">
                                    <div class="clearfix">
                                        <p class="mb-10 float-left">Masculin: {{ $malePercentage }}%</p>
                                        <i class="mb-10 text-info float-right fa fa-arrow-up"> </i>
                                    </div>
                                    <div class="progress progress-small">
                                        <div class="skill2-bar bg-info" role="progressbar" style="width: {{ $malePercentage }}%"
                                        aria-valuenow="{{ $malePercentage }}" aria-valuemin="0" aria-valuemax="100"> 
                                    </div>
                                    </div>
                                    <h4 class="mt-10 text-info">{{ $maleCount }}</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="clearfix">
                                        <p class="mb-10 float-left">Féminin: {{ $femalePercentage }}%</p>
                                        <i class="mb-10 text-warning float-right fa fa-arrow-down"> </i>
                                    </div>
                                    <div class="progress progress-small">
                                        <div class="skill2-bar bg-warning" role="progressbar" style="width: {{ $femalePercentage }}%"
                                        aria-valuenow="{{ $femalePercentage }}" aria-valuemin="0" aria-valuemax="100"> 
                                    </div>
                                    </div>
                                    <h4 class="mt-10 text-warning">{{ $femaleCount }}</h4>
                                </div>
                            </div>
                        </div>
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
cc
    <!--=================================
 footer -->

    @include('layouts.footer-scripts')


</body>

</html>