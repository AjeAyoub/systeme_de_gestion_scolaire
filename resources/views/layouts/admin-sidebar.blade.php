<div class="container-fluid">
    <div class="row" style="background-color: #0b2e63";>
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" id="scrollbar_list" style="overflow-x: hidden; overflow-y: auto; background-color: #0b2e63;">
                <ul class="nav navbar-nav side-menu" id="sidebarnav" style="background-color: #0b2e63;">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Accueil</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                                        <!-- Users -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-menu">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">Utilisateur</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-menu" class="collapse" data-parent="#sidebarnav">
                            <!-- Enseignant -->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                                    <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span class="right-nav-text">Enseignant</span></div>
                                    <div class="pull-right"><i class="ti-angle-down"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Teachers-menu" class="collapse" data-parent="#Users-menu">
                                    <li><a href="{{ route('enseignant.index') }}">Liste des Enseignant</a></li>
                                </ul>
                            </li>
                            <!-- Comptable -->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Comptables-menu">
                                    <div class="pull-left"><i class="fas fa-money-check-alt"></i><span class="right-nav-text">Comptable</span></div>
                                    <div class="pull-right"><i class="ti-angle-down"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Comptables-menu" class="collapse" data-parent="#Users-menu">
                                    <li><a href="{{ route('comptable.index') }}">Liste des Comptables</a></li>
                                </ul>
                            </li>
                            <!-- Parents -->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                                    <div class="pull-left"><i class="fas fa-user-tie"></i><span class="right-nav-text">Parent</span></div>
                                    <div class="pull-right"><i class="ti-angle-down"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Parents-menu" class="collapse" data-parent="#Users-menu">
                                    <li><a href="{{ route('parentt.index') }}">Liste des Parents</a></li>
                                </ul>
                            </li>
                            <!-- Etudiant -->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students-menu">
                                    <div class="pull-left"><i class="fas fa-user-graduate"></i><span class="right-nav-text">Etudiant</span></div>
                                    <div class="pull-right"><i class="ti-angle-down"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Students-menu" class="collapse" data-parent="#Users-menu">
                                    <li><a href="{{ route('etudiant.index') }}">Liste des Etudiants</a></li>
                                    <li><a href="{{ route('promotion.index') }}">Promouvoir les étudiants</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    
                    <!-- niveaux-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#niveaux-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">Niveau</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="niveaux-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('niveau.index') }}">Liste des niveaux</a></li>
                        </ul>
                    </li>
                    <!-- classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">classe</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('classe.index') }}">Liste des classes</a></li>
                        </ul>
                    </li>


                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span
                                    class="right-nav-text">section</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('section.index') }}">Liste des sections</a></li>
                        </ul>
                    </li>
                    <!-- Exam-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#examens-menu">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">Examen</span></div>
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
                                    class="right-nav-text">Controle</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="controles-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('controle.index') }}">Liste des Controles</a> </li>
                        </ul>
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

                    <!-- Compte-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-user"></i><span
                                    class="right-nav-text">Compte</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('compte.index')  }}">Liste des Comptes</a> </li>
                        </ul>
                    </li>
                    <!-- Notes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Notes-menu">
                            <div class="pull-left"><i class="fas fa-check-circle"></i>                                <span
                                    class="right-nav-text">Note</span></div>
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
                                    class="right-nav-text">Emploi</span></div>
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
                                    class="right-nav-text">Resultat</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Resultats-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('resultat.index')  }}">Liste des Resultats</a> </li>
                        </ul>
                    </li>
                    <!-- departement-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                            <div class="pull-left"><i class="fa fa-building"></i><span class="right-nav-text">Département</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('departement.index') }}">Liste des Départements</a> </li>
                        </ul>
                    </li>

                     <!-- salle-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#salle-icon">
                            <div class="pull-left"><i class="fas fa-door-open"></i><span class="right-nav-text">Salle</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="salle-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('salle.index') }}">Liste des Salles</a> </li>
                        </ul>
                    </li>
                     <!-- Seance-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#seance-icon">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i><span class="right-nav-text">Seance</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="seance-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('seance.index') }}">Liste des Seances</a> </li>
                        </ul>
                    </li>

                    <!-- matiere-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#matiere-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">Matiere</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="matiere-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('matiere.index') }}">Liste des Matieres</a> </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
