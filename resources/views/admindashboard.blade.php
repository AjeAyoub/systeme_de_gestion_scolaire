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
                                    <h4>{{ $totalCountAdmin }}</h4>
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

            <!-- calendar -->
            <iframe src="/getevent" frameborder="0" width="100%" height="600"></iframe>
                
            <!-- calendar -->

            <!-- Orders Status widgets-->
            <div class="row">
                <div class="col-xl-4 mb-30">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Genre</h5>
                            <div class="row mb-30">
                                <div class="col-md-6">
                                    <div class="clearfix">
                                        <p class="mb-10 float-left">Male: {{ $malePercentage }}%</p>
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
                                        <p class="mb-10 float-left">Femelle: {{ $femalePercentage }}%</p>
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
                <div class="col-xl-8 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 class="card-title">Best Sellers</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="months-tab" data-toggle="tab"
                                                    href="#months" role="tab" aria-controls="months"
                                                    aria-selected="true"> Months</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="year-tab" data-toggle="tab" href="#year"
                                                    role="tab" aria-controls="year" aria-selected="false">Year
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="months" role="tabpanel"
                                        aria-labelledby="months-tab">
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/05.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">Supercharge your motivation</h6>
                                                <p class="sm-mb-5 d-block">I truly believe Augustine’s words are
                                                    true. </p>
                                                <span class="mb-0">by - <b class="text-info">PotenzaUser</b></span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-primary mb-0"><b>45,436</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-secondary mb-0"><b>$05,236</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/02.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">Helen keller a teller seller</h6>
                                                <p class="sm-mb-5 d-block">We also know those epic stories,
                                                    those modern.</p>
                                                <span class="mb-0">by - <b class="text-warning">WebminUser</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-success mb-0"><b>23,462</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-danger mb-0"><b>$166</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/03.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">The other virtues practice</h6>
                                                <p class="sm-mb-5 d-block">One of the most difficult aspects of
                                                    achieving. </p>
                                                <span class="mb-0">by - <b class="text-danger">TheCorps</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-warning mb-0"><b>5,566</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-info mb-0"><b>$4,126</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/04.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">You will begin to realise</h6>
                                                <p class="sm-mb-5 d-block">Remind yourself you have nowhere to
                                                    go except. </p>
                                                <span class="mb-0">by - <b class="text-success">PGSinfotech</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-dark mb-0"><b>5,446</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-success mb-0"><b>$436</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-tab">
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/09.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">Walk out 10 years into</h6>
                                                <p class="sm-mb-5 d-block">Understanding the price and having
                                                    the willingness to pay. </p>
                                                <span class="mb-0">by - <b class="text-danger">TheZayka</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-dark mb-0"><b>12,549</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="theme-color mb-0"><b>$1,656</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/06.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">Step out on to the path</h6>
                                                <p class="sm-mb-5 d-block">Success to you and then pull it out
                                                    when you are.</p>
                                                <span class="mb-0">by - <b class="text-info">CarDealer</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-primary mb-0"><b>1,366</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-secondary mb-0"><b>$4,536</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/07.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">Briefly imagine that you</h6>
                                                <p class="sm-mb-5 d-block">Motivators for your personality and
                                                    your personal goals. </p>
                                                <span class="mb-0">by - <b class="text-success">SamMartin</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-success mb-0"><b>465</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-danger mb-0"><b>$499</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/08.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">You continue doing what</h6>
                                                <p class="sm-mb-5 d-block">The first thing to remember about
                                                    success is that. </p>
                                                <span class="mb-0">by - <b class="text-warning">Cosntro</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-warning mb-0"><b>4,456</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-info mb-0"><b>$6,485</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="card-title">Best Selling Items</h5>
                            <ul class="list-unstyled">
                                <li class="mb-20">
                                    <div class="media">
                                        <div class="position-relative">
                                            <img class="img-fluid mr-15 avatar-small" src="images/item/01.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-0">Car dealer <span class="float-right text-danger">
                                                    8,561</span> </h6>
                                            <p>Automotive WordPress Theme </p>
                                        </div>
                                    </div>
                                    <div class="divider dotted mt-20"></div>
                                </li>
                                <li class="mb-20">
                                    <div class="media">
                                        <div class="position-relative clearfix">
                                            <img class="img-fluid mr-15 avatar-small" src="images/item/02.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-0">Webster <span class="float-right text-warning">
                                                    6,213</span> </h6>
                                            <p>Multi-purpose HTML5 Template </p>
                                        </div>
                                    </div>
                                    <div class="divider dotted mt-20"></div>
                                </li>
                                <li class="mb-20">
                                    <div class="media">
                                        <div class="position-relative">
                                            <img class="img-fluid mr-15 avatar-small" src="images/item/03.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-0">The corps <span class="float-right text-success">
                                                    2,926</span> </h6>
                                            <p> Multi-Purpose WordPress Theme </p>
                                        </div>
                                    </div>
                                    <div class="divider dotted mt-20"></div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="position-relative clearfix">
                                            <img class="img-fluid mr-15 avatar-small" src="images/item/04.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-0">Sam martin <span
                                                    class="float-right text-warning">6,213 </span></h6>
                                            <p>Personal vCard Resume WordPress Theme </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="card h-100">
                        <div class="btn-group info-drop">
                            <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="text-primary ti-reload"></i>Refresh</a>
                                <a class="dropdown-item" href="#"><i class="text-secondary ti-eye"></i>View
                                    all</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Site Visits Growth </h5>
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="text-danger">Income</h6>
                                    <p class="text-danger">+584</p>
                                </div>
                                <div class="col-6">
                                    <h6 class="text-info">Outcome</h6>
                                    <p class="text-info">-255</p>
                                </div>
                            </div>
                            <div id="morris-line" style="height: 320px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="p-4 text-center bg" style="background: url(images/bg/01.jpg);">
                            <h5 class="mb-70 text-white position-relative">Michael Bean </h5>
                            <div class="btn-group info-drop">
                                <button type="button" class="dropdown-toggle-split text-white" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i class="text-primary ti-files"></i> Add
                                        task</a>
                                    <a class="dropdown-item" href="#"><i class="text-dark ti-pencil-alt"></i>
                                        Edit Profile</a>
                                    <a class="dropdown-item" href="#"><i class="text-success ti-user"></i> View
                                        Profile</a>
                                    <a class="dropdown-item" href="#"><i class="text-secondary ti-info"></i>
                                        Contact Info</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center position-relative">
                            <div class="avatar-top">
                                <img class="img-fluid w-25 rounded-circle " src="images/team/13.jpg" alt="">
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mt-30">
                                    <b>Files Saved</b>
                                    <h4 class="text-success mt-10">1582</h4>
                                </div>
                                <div class="col-sm-4 mt-30">
                                    <b>Memory Used </b>
                                    <h4 class="text-danger mt-10">58GB</h4>
                                </div>
                                <div class="col-sm-4 mt-30">
                                    <b>Spent Money</b>
                                    <h4 class="text-warning mt-10">352,6$</h4>
                                </div>
                            </div>
                            <div class="divider mt-20"></div>
                            <p class="mt-30">17504 Carlton Cuevas Rd, Gulfport, MS, 39503</p>
                            <p class="mt-10">michael@webmin.com</p>
                            <div class="social-icons color-icon mt-20">
                                <ul>
                                    <li class="social-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
                                    <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="social-github"><a href="#"><i class="fa fa-github"></i></a></li>
                                    <li class="social-youtube"><a href="#"><i class="fa fa-youtube"></i></a>
                                    </li>
                                    <li class="social-instagram"><a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
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