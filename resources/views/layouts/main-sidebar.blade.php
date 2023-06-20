<div class="container-fluid">
    <div class="row" style="background-color: #0b2e63";>
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" id="scrollbar_list" style="overflow-x: hidden; overflow-y: auto; background-color: #0b2e63;">
                <ul class="nav navbar-nav side-menu" id="sidebarnav" style="background-color: #0b2e63;">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Accueil</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    
                    <!-- niveaux-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#niveaux-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">Niveaux</span></div>
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
                                    class="right-nav-text">classes</span></div>
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
                                    class="right-nav-text">sections</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('section.index') }}">Liste des sections</a></li>
                        </ul>
                    </li>

                    <!-- admins-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#admins-menu">
                            <div class="pull-left"><i class="fas fa-user-graduate"></i></i></i><span
                                    class="right-nav-text">Admins</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="admins-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('admin.index') }}">Liste des admins</a> </li>
                        </ul>
                    </li>

                    <!-- comptable-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#comptables-menu">
                            <div class="pull-left"><i class="fas fa-user-graduate"></i></i></i><span
                                    class="right-nav-text">Comptables</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="comptables-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('comptable.index') }}">Liste des Comptables</a> </li>
                        </ul>
                    </li>


                    <!-- Etudiant-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                            <div class="pull-left"><i class="fas fa-user-graduate"></i></i></i><span
                                    class="right-nav-text">Etudiants</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('etudiant.index') }}">Liste des Etudiants</a> </li>
                        </ul>
                    </li>



                    <!-- Teachers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                                    class="right-nav-text">Enseignants</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="#">Liste des Enseignants</a> </li>
                        </ul>
                    </li>


                    <!-- Parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                    class="right-nav-text">Parents</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('parentt.index') }}">Liste des Parents</a> </li>
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
                    <!-- Evénement-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#evenement-menu">
                            <div class="pull-left"><i class="fas fa-money"></i><span
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
                            <div class="pull-left"><i class="fas fa-money"></i><span
                                    class="right-nav-text">Présence</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="presence-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('presence.index') }}">Liste des Présence</a> </li>
                        </ul>
                    </li>

                    <!-- Accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">Comptes</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">Calendrier des événements</a> </li>
                            <li> <a href="calendar-list.html">Liste des Calendrier</a> </li>
                        </ul>
                    </li>

                    <!-- Attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                            <div class="pull-left"><i class="fas fa-calendar-alt"></i><span class="right-nav-text">Présence</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">police génial</a> </li>
                            <li> <a href="themify-icons.html">Thémifier les icônes</a> </li>
                            <li> <a href="weather-icon.html">Icônes météo</a> </li>
                        </ul>
                    </li>

                    <!-- Exams-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">Exams</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- departement-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">Département</span></div>
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
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">Salles</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="salle-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('salle.index') }}">Liste des Salles</a> </li>
                        </ul>
                    </li>

                    <!-- matiere-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#matiere-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">Matieres</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="matiere-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('matiere.index') }}">Liste des Matieres</a> </li>
                        </ul>
                    </li>


                    <!-- Onlinec lasses-->
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


                    <!-- Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">Utilisateurs</span></div>
                            <div class="pull-right"><i class="ti-angle-down"></i></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
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
