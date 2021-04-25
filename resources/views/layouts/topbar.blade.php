<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" height="30">
                        <img id="topbar-company-data-img" src="{{ asset('/storage/emblem/emblem.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" height="30">
                        <img id="topbar-company-data-img2" src="{{ asset('/storage/emblem/emblem.png') }}" alt="" height="30">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

            <div class="dropdown dropdown-mega d-none d-lg-block ml-2">
                <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    <span key="t-megamenu">Mega Menú</span>
                    <i class="mdi mdi-chevron-down"></i> 
                </button>
                <div class="dropdown-menu dropdown-megamenu">
                    <div class="row">
                        <div class="col-2">
                            <h5 class="mega-menu-title font-size-14 mt-0" key="t-planes">Planes</h5>
                            <ul class="list-unstyled megamenu-list">
                                <li>
                                    <a href="/planes/cursos" key="t-planes-cursos">Cursos</a>
                                </li>
                                <li>
                                    <a href="/planes/requisitos" key="t-planes-requisitos">Requisitos</a>
                                </li>
                                <li>
                                    <a href="/planes/habilitaciones" key="t-planes-habilitaciones">Habilitaciones</a>
                                </li>
                                <li>
                                    <a href="/planes/horarios" key="t-planes-horarios">Horarios</a>
                                </li>
                                <li>
                                    <a href="/planes/evaluaciones" key="t-planes-evaluaciones">Evaluaciones</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-2">
                            <h5 class="mega-menu-title font-size-14 mt-0" key="t-estudiantes">Estudiantes</h5>
                            <ul class="list-unstyled megamenu-list">
                                <li>
                                    <a href="/estudiantes/matriculas" key="t-estudiantes-matriculas">Matrículas</a>
                                </li>
                                <li>
                                    <a href="/estudiantes/asistencias" key="t-estudiantes-asistencias">Asistencias</a>
                                </li>
                                <li>
                                    <a href="/estudiantes/justificativos" key="t-estudiantes-justificativos">Justificativos</a>
                                </li>
                                <li>
                                    <a href="/estudiantes/sanciones-deserciones" key="t-estudiantes-sanciones-deserciones">Sanciones y Deserciones</a>
                                </li>
                                <li>
                                    <a href="/estudiantes/calificaciones" key="t-estudiantes-calificaciones">Calificaciones</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-2">
                            <h5 class="mega-menu-title font-size-14 mt-0" key="t-estudiantes">Docentes</h5>
                            <ul class="list-unstyled megamenu-list">
                                <li>
                                    <a href="/docentes/lorem" key="t-docentes-lorem">Lorem</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-2">
                            <h5 class="mega-menu-title font-size-14 mt-0" key="t-fundaciones">Fundaciones</h5>
                            <ul class="list-unstyled megamenu-list">
                                <li>
                                    <a href="/foundations/academics/sections" key="t-foundations-academics-sections">sections</a>
                                </li>
                                <li>
                                    <a href="/foundations/academics/areas" key="t-foundations-academics-areas">Áreas</a>
                                </li>
                                <li>
                                    <a href="/foundations/academics/subjects" key="t-foundations-academics-subjects">subjects</a>
                                </li>
                                <li>
                                    <a href="/foundations/academics/baccalaureates" key="t-foundations-academics-baccalaureates">baccalaureates</a>
                                </li>
                                <li>
                                    <a href="/foundations/documentaries/nationalities" key="t-foundations-documentaries-nationalities">nationalities</a>
                                </li>
                                <li>
                                    <a href="/foundations/documentaries/cities" key="t-foundations-documentaries-cities">cities</a>
                                </li>
                                <li>
                                    <a href="/foundations/documentaries/students" key="t-foundations-documentaries-students">students</a>
                                </li>
                                <li>
                                    <a href="/foundations/documentaries/causes" key="t-foundations-documentaries-causes">causes</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-2">
                            <h5 class="mega-menu-title font-size-14 mt-0" key="t-reports">reports</h5>
                            <ul class="list-unstyled megamenu-list">
                                <li>
                                    <a href="/reports/fundaciones" key="t-reports-fundaciones">Fundaciones</a>
                                </li>
                                <li>
                                    <a href="/reports/academics" key="t-reports-academics">Registros Académicos</a>
                                </li>
                                <li>
                                    <a href="/reports/documentaries" key="t-reports-documentaries">Registros Documentales</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-2">
                            <h5 class="mega-menu-title font-size-14 mt-0" key="t-system">Sistema</h5>
                            <ul class="list-unstyled megamenu-list">
                                <li>
                                    <a href="/system/branches" key="t-system-branches">Sedes</a>
                                </li>
                                <li>
                                    <a href="/system/users" key="t-system-users">Usuarios</a>
                                </li>
                                <li>
                                    <a href="/system/cessations" key="t-system-cessations">Finalizaciones</a>
                                </li>
                                <li>
                                    <a href="/system/roles" key="t-system-roles">Roles y Asignaciones</a>
                                </li>
                                <li>
                                    <a href="/system/companies-data" key="t-system-companies-data">Datos de la Organización</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">
        
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-customize"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="px-lg-2">
                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://drive.google.com">
                                    <img src="{{ asset('assets/images/icons/google-drive.svg') }}" alt="Google Drive">
                                    <span>Drive</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://mail.google.com">
                                    <img src="{{ asset('assets/images/icons/gmail.svg') }}" alt="Google Mail - Gmail">
                                    <span>Gmail</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://hangouts.google.com/">
                                    <img src="{{ asset('assets/images/icons/google-hangouts.svg') }}" alt="Google Hangouts">
                                    <span>Hangouts</span>
                                </a>
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://docs.google.com/document">
                                    <img src="{{ asset('assets/images/icons/google-docs.svg') }}" alt="Google Docs">
                                    <span>Docs</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://docs.google.com/spreadsheets">
                                    <img src="{{ asset('assets/images/icons/google-sheets.svg') }}" alt="Google Sheets">
                                    <span>Sheets</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://docs.google.com/presentation">
                                    <img src="{{ asset('assets/images/icons/google-slides.svg') }}" alt="Google Slides">
                                    <span>Slides</span>
                                </a>
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://facebook.com">
                                    <img src="{{ asset('assets/images/icons/facebook.svg') }}" alt="Facebook">
                                    <span>Facebook</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://instagram.com">
                                    <img src="{{ asset('assets/images/icons/instagram.svg') }}" alt="Instagram">
                                    <span>Instagram</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://web.whatsapp.com">
                                    <img src="{{ asset('assets/images/icons/whatsapp.svg') }}" alt="WhatsApp">
                                    <span>WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('storage/users/' . Auth::user()->photo) }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1" key="t-username">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle mr-1"></i> <span key="t-profile">Perfil</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                        <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                        <span key="t-logout">Cerrar Sesión</span>
                    </a>
                    <form id="logout" action="{{ route('logout') }}" method="POST" hidden>@csrf</form>
                </div>
            </div>

        </div>
    </div>
</header>

<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                  <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="/" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle mr-2"></i><span key="t-dashboards">Página Principal</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-customize mr-2"></i><span key="t-planes">Planes</span> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="/plans/courses" class="dropdown-item" key="t-plans-courses">Planificación de Cursos</a>
                            <a href="/plans/habilitations" class="dropdown-item" key="t-plans-habilitations">Habilitación de Asignaturas</a>
                            <a href="/plans/curriculums" class="dropdown-item" key="t-plans-requirements">Mallas Curriculares</a>
                            <a href="/plans/schedules" class="dropdown-item" key="t-plans-schedules">Horarios de Clases</a>
                            <a href="/plans/evaluations" class="dropdown-item" key="t-plans-evaluations">Asignaciones y Exámenes</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-students" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-customize mr-2"></i><span key="t-estudiantes">Estudiantes</span> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="/students/enrollments" class="dropdown-item" key="t-students-enrollments">Inscripciones</a>
                            <a href="/students/attendances" class="dropdown-item" key="t-students-attendances">Asistencias</a>
                            <a href="/students/justifications" class="dropdown-item" key="t-students-justifications">Justificativos</a>
                            <a href="/students/sanctions-desertions" class="dropdown-item" key="t-sanctions-desertions">Sanciones y Deserciones</a>
                            <a href="/students/scores" class="dropdown-item" key="t-students-scores">Calificaciones</a>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-teachers" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-user mr-2"></i><span key="t-docentes-lorem">Docentes</span> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="/teachers/lorem" class="dropdown-item" key="t-teachers-lorem">Lorem Ipsum</a>
                            <a href="/teachers/lorem" class="dropdown-item" key="t-teachers-lorem">Lorem Ipsum</a>
                            <a href="/teachers/lorem" class="dropdown-item" key="t-teachers-lorem">Lorem Ipsum</a>
                            <a href="/teachers/lorem" class="dropdown-item" key="t-teachers-lorem">Lorem Ipsum</a>
                            <a href="/teachers/lorem" class="dropdown-item" key="t-teachers-lorem">Lorem Ipsum</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-customize mr-2"></i><span key="t-fundaciones">Fundaciones</span> <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-academics"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span key="t-foundations-academics">Académicas</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="/foundations/academics/areas" class="dropdown-item" key="t-foundations-academics-areas">Áreas</a>
                                    <a href="/foundations/academics/subjects" class="dropdown-item" key="t-foundations-academics-subjects">Asignaturas</a>
                                    <a href="/foundations/academics/baccalaureates" class="dropdown-item" key="t-foundations-academics-baccalaureates">Bachilleratos</a>
                                    <a href="/foundations/academics/requirements" class="dropdown-item" key="t-foundations-academics-requirements">Requisitos</a>
                                    <a href="/foundations/academics/grades" class="dropdown-item" key="t-foundations-academics-grades">Grados</a>
                                    <a href="/foundations/academics/sections" class="dropdown-item" key="t-foundations-academics-sections">Secciones</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-documentaries" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span key="t-foundations-documentaries">Documentales</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="/foundations/documentaries/nationalities" class="dropdown-item" key="t-foundations-documentaries-nationalities">Nacionalidades</a>
                                    <a href="/foundations/documentaries/cities" class="dropdown-item" key="t-foundations-documentaries-cities">Ciudades</a>
                                    <a href="/foundations/documentaries/students" class="dropdown-item" key="t-foundations-documentaries-students">Estudiantes</a>
                                    <a href="/foundations/documentaries/guardians" class="dropdown-item" key="t-foundations-documentaries-students">Guardianes</a>
                                    <a href="/foundations/documentaries/causes" class="dropdown-item" key="t-foundations-documentaries-causes">Causas</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-operatives" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span key="t-foundations-operatives">Operativos</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="/foundations/operatives/lorem" class="dropdown-item" key="t-foundations-operatives-lorem">Lorem Ipsum</a>
                                    <a href="/foundations/operatives/lorem" class="dropdown-item" key="t-foundations-operatives-lorem">Lorem Ipsum</a>
                                    <a href="/foundations/operatives/lorem" class="dropdown-item" key="t-foundations-operatives-lorem">Lorem Ipsum</a>
                                    <a href="/foundations/operatives/lorem" class="dropdown-item" key="t-foundations-operatives-lorem">Lorem Ipsum</a>
                                    <a href="/foundations/operatives/lorem" class="dropdown-item" key="t-foundations-operatives-lorem">Lorem Ipsum</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-file mr-2"></i><span key="t-reports">Reportes</span> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="/reports/foundations" class="dropdown-item" key="t-reports-foundations">Fundaciones</a>
                            <a href="/reports/academics" class="dropdown-item" key="t-reports-academics">Académicos</a>
                            <a href="/reports/documentaries" class="dropdown-item" key="t-reports-documentaries">Documentales</a>
                            <a href="/reports/operatives" class="dropdown-item" key="t-reports-operatives">Operativos</a>
                        </div>
                    </li>                    

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-cog mr-2"></i><span key="t-sistems">Sistema</span> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <a href="/system/branches" class="dropdown-item" key="t-system-branches">Sedes</a>
                            <a href="/system/users" class="dropdown-item" key="t-system-users">Usuarios</a>
                            <a href="/system/cessations" class="dropdown-item" key="t-system-cessations">Cesaciones</a>
                            <a href="/system/roles" class="dropdown-item" key="t-system-roles">Roles y Asignaciones</a>
                            <a href="/system/companies-data" class="dropdown-item" key="t-system-companies-data">Datos de la Empresa</a>
                        </div>
                    </li>                    

                </ul>
            </div>
        </nav>
    </div>
</div>