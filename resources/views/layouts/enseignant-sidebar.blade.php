<div class="container-fluid">
    <div class="row" style="background-color: #0b2e63";>
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" id="scrollbar_list" style="overflow-x: hidden; overflow-y: auto; background-color: #0b2e63;">
                <ul class="nav navbar-nav side-menu" id="sidebarnav" style="background-color: #0b2e63;">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('enseignant.dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Accueil</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
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
                    <!-- Présence-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#presence-menu">
                            <div class="pull-left"><i class="fas fa-calendar"></i><span
                                    class="right-nav-text">Présence</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="presence-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('presence.index') }}">Liste des Présence</a> </li>
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
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
