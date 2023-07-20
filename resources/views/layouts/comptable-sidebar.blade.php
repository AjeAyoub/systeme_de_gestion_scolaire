<div class="container-fluid">
    <div class="row" style="background-color: #0b2e63";>
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" id="scrollbar_list" style="overflow-x: hidden; overflow-y: auto; background-color: #0b2e63;">
                <ul class="nav navbar-nav side-menu" id="sidebarnav" style="background-color: #0b2e63;">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('comptable.dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Accueil</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
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
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
