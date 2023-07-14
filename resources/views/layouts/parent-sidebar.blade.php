<div class="container-fluid">
    <div class="row" style="background-color: #0b2e63";>
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" id="scrollbar_list" style="overflow-x: hidden; overflow-y: auto; background-color: #0b2e63;">
                <ul class="nav navbar-nav side-menu" id="sidebarnav" style="background-color: #0b2e63;">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('parent.dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Accueil</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    
                  
                     <!-- Evénement-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#evenement-menu">
                            <div class="pull-left"><i class="far fa-calendar-alt"></i><span
                                    class="right-nav-text">Evénement</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="evenement-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('evenement.index') }}">Liste des Evénements</a> </li>
                        </ul>
                    </li>
                    <!-- Exam-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#examens-menu">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">Examens</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="examens-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('exam.index') }}">Liste des Examens</a> </li>
                        </ul>
                    </li>
                    <!-- Controle-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#controles-menu">
                            <div class="pull-left"><i class="fas fa-clipboard-check"></i><span
                                    class="right-nav-text">Controles</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="controles-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('controle.index') }}">Liste des Controles</a> </li>
                        </ul>
                    </li>

                    <!-- Couts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Cout-menu">
                            <div class="pull-left"><i class="fas fa-money"></i><span
                                    class="right-nav-text">Couts</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Cout-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('cout.index') }}">Liste des Couts</a> </li>
                        </ul>
                    </li>
                   
                    <!-- Présence-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#presence-menu">
                            <div class="pull-left"><i class="fas fa-money"></i><span
                                    class="right-nav-text">Présence</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="presence-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('presence.index') }}">Liste des Présence</a> </li>
                        </ul>
                    </li>
                    <!-- Notes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Notes-menu">
                            <div class="pull-left"><i class="fas fa-check-circle"></i>                                <span
                                    class="right-nav-text">Notes</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Notes-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('note.index')  }}">Liste des Notes</a> </li>
                        </ul>
                    </li>

                     <!-- Emplois-->

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Emplois-menu">
                            <div class="pull-left"><i class="fas fa-calendar-alt"></i>                                <span
                                    class="right-nav-text">Emplois</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Emplois-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('emploi.index')  }}">Liste des Emplois</a> </li>
                        </ul>
                    </li>
                    <!-- Resultats-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Resultats-menu">
                            <div class="pull-left"><i class="fas fa-star"></i>                                <span
                                    class="right-nav-text">Resultats</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Resultats-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('resultat.index')  }}">Liste des Resultats</a> </li>
                        </ul>
                    </li>
                    <!-- Paiement_etudiant-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#paiement_etudiant-icon">
                            <div class="pull-left"><i class="fas fa-dollar-sign"></i><span class="right-nav-text">Paiement Etudiants</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="paiement_etudiant-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('paiement_etudiant.index') }}">Liste des Paiements</a> </li>
                        </ul>
                    </li>


                    <!-- Onlineclasses-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                            <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">Classes en ligne</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- Settings-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                            <div class="pull-left"><i class="fas fa-cogs"></i><span class="right-nav-text">Paramètres</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
