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
                            <li> <a href="{{ route('evenements') }}">Liste des Evénements</a> </li>
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
                            <li> <a href="{{ route('exams') }}">Liste des Examens</a> </li>
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
                            <li> <a href="{{ route('controles') }}">Liste des Controles</a> </li>
                        </ul>
                    </li>
                   
                    <!-- Présence-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#presence-menu">
                            <div class="pull-left"><i class="fas fa-list"></i><span
                                    class="right-nav-text">Présence</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="presence-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('presences') }}">Liste des Présence</a> </li>
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
                            <li> <a href="{{ route('emplois')  }}">Liste des Emplois</a> </li>
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
                            <li> <a href="{{ route('resultats')  }}">Liste des Resultats</a> </li>
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
                            <li> <a href="{{ route('paiementetudiants') }}">Liste des Paiements</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
