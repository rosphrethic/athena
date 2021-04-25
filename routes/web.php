<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompanyDataController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\BaccalaureateController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\CauseController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HabilitationController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\ScheduleController;

use App\Http\Controllers\ReportFoundationController;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    // Home
    Route::get('/', [HomeController::class, 'index']); 
    Route::get('/getCompanyData', [HomeController::class, 'getCompanyData']); 

    // Logout
    Route::get('logout', 'LoginController@logout');

    // System
    Route::group(['middleware' => 'check.admin'], function () {

        Route::prefix('/system')->group(function () {

            Route::prefix('/users')->group(function () {
                Route::get('/', [UserController::class, 'index']); 
                Route::get('/getOne', [UserController::class, 'getOne']); 
                Route::get('/getAll', [UserController::class, 'getAll']); 
                Route::get('/store', [UserController::class, 'store']); 
                Route::get('/update', [UserController::class, 'update']); 
                Route::get('/deactivate', [UserController::class, 'deactivate']); 
                Route::get('/reactivate', [UserController::class, 'reactivate']); 
                Route::get('/reset-verified', [UserController::class, 'resetVerified']); 
                Route::get('/reset-attempts', [UserController::class, 'resetAttempts']); 
            });

            Route::prefix('/branches')->group(function () {
                Route::get('/', [BranchController::class, 'index']); 
                Route::get('/getOne', [BranchController::class, 'getOne']); 
                Route::get('/getAll', [BranchController::class, 'getAll']); 
                Route::get('/store', [BranchController::class, 'store']); 
                Route::get('/update', [BranchController::class, 'update']); 
                Route::get('/deactivate', [BranchController::class, 'deactivate']); 
                Route::get('/reactivate', [BranchController::class, 'reactivate']); 
                Route::get('/destroy', [BranchController::class, 'destroy']); 
            });

            Route::prefix('/roles')->group(function () {
                Route::get('/', [RoleController::class, 'index']); 
                Route::get('/getOne', [RoleController::class, 'getOne']); 
                Route::get('/getAll', [RoleController::class, 'getAll']); 
                Route::get('/getAllUsers', [RoleController::class, 'getAllUsers']); 
                Route::get('/store', [RoleController::class, 'store']); 
                Route::get('/update', [RoleController::class, 'update']); 
                Route::get('/assign', [RoleController::class, 'assign']); 
                Route::get('/deactivate', [RoleController::class, 'deactivate']); 
                Route::get('/reactivate', [RoleController::class, 'reactivate']); 
                Route::get('/destroy', [RoleController::class, 'destroy']); 
            });

            Route::prefix('/companies-data')->group(function () {
                Route::get('/', [CompanyDataController::class, 'index']); 
                Route::get('/getOne', [CompanyDataController::class, 'getOne']); 
                Route::post('/update', [CompanyDataController::class, 'update']); 
            });
        });
    });

    // Global
    Route::prefix('/global')->group(function () {

        Route::prefix('/getAll')->group(function () {
            Route::get('/branches', [GlobalController::class, 'getAllBranches']); 
            Route::get('/roles', [GlobalController::class, 'getAllRoles']); 
            Route::get('/company-data', [GlobalController::class, 'getAllCompanyData']); 
            Route::get('/grades', [GlobalController::class, 'getAllGrades']); 
            Route::get('/nationalities', [GlobalController::class, 'getAllNationalities']); 
            Route::get('/guardians', [GlobalController::class, 'getAllGuardians']); 
            Route::get('/cities', [GlobalController::class, 'getAllCities']); 
            Route::get('/baccalaureates', [GlobalController::class, 'getAllBaccalaureates']); 
            Route::get('/requirements', [GlobalController::class, 'getAllRequirements']); 
            Route::get('/sections', [GlobalController::class, 'getAllSections']); 
            Route::get('/subjects', [GlobalController::class, 'getAllSubjects']); 
            Route::get('/courses', [GlobalController::class, 'getAllCourses']); 
            Route::get('/years', [GlobalController::class, 'getAllYears']); 
        });
    });

    // Foundations
    Route::prefix('/foundations')->group(function () {
        
        // Academics
        Route::prefix('/academics')->group(function () {

            Route::prefix('/grades')->group(function () {
                Route::get('/', [GradeController::class, 'index']); 
                Route::get('/getOne', [GradeController::class, 'getOne']); 
                Route::get('/getAll', [GradeController::class, 'getAll']); 
                Route::get('/store', [GradeController::class, 'store']); 
                Route::get('/update', [GradeController::class, 'update']); 
                Route::get('/destroy', [GradeController::class, 'destroy']); 
            });

            Route::prefix('/areas')->group(function () {
                Route::get('/', [AreaController::class, 'index']); 
                Route::get('/getOne', [AreaController::class, 'getOne']); 
                Route::get('/getAll', [AreaController::class, 'getAll']); 
                Route::get('/store', [AreaController::class, 'store']); 
                Route::get('/update', [AreaController::class, 'update']); 
                Route::get('/destroy', [AreaController::class, 'destroy']); 
            });

            Route::prefix('/sections')->group(function () {
                Route::get('/', [SectionController::class, 'index']); 
                Route::get('/getOne', [SectionController::class, 'getOne']); 
                Route::get('/getAll', [SectionController::class, 'getAll']); 
                Route::get('/store', [SectionController::class, 'store']); 
                Route::get('/update', [SectionController::class, 'update']); 
                Route::get('/destroy', [SectionController::class, 'destroy']); 
            });

            Route::prefix('/subjects')->group(function () {
                Route::get('/', [SubjectController::class, 'index']); 
                Route::get('/getOne', [SubjectController::class, 'getOne']); 
                Route::get('/getAll', [SubjectController::class, 'getAll']); 
                Route::get('/getAllAreas', [SubjectController::class, 'getAllAreas']); 
                Route::get('/store', [SubjectController::class, 'store']); 
                Route::get('/update', [SubjectController::class, 'update']); 
                Route::get('/destroy', [SubjectController::class, 'destroy']); 
            });

            Route::prefix('/baccalaureates')->group(function () {
                Route::get('/', [BaccalaureateController::class, 'index']); 
                Route::get('/getOne', [BaccalaureateController::class, 'getOne']); 
                Route::get('/getAll', [BaccalaureateController::class, 'getAll']); 
                Route::get('/store', [BaccalaureateController::class, 'store']); 
                Route::get('/update', [BaccalaureateController::class, 'update']); 
                Route::get('/destroy', [BaccalaureateController::class, 'destroy']); 
            });
            
            Route::prefix('/requirements')->group(function () {
                Route::get('/', [RequirementController::class, 'index']); 
                Route::get('/getOne', [RequirementController::class, 'getOne']); 
                Route::get('/getAll', [RequirementController::class, 'getAll']); 
                Route::get('/store', [RequirementController::class, 'store']); 
                Route::get('/update', [RequirementController::class, 'update']); 
                Route::get('/destroy', [RequirementController::class, 'destroy']); 
            });
        });

        // Documentaries
        Route::prefix('/documentaries')->group(function () {

            Route::prefix('/causes')->group(function () {
                Route::get('/', [CauseController::class, 'index']); 
                Route::get('/getOne', [CauseController::class, 'getOne']); 
                Route::get('/getAll', [CauseController::class, 'getAll']); 
                Route::get('/store', [CauseController::class, 'store']); 
                Route::get('/update', [CauseController::class, 'update']); 
                Route::get('/destroy', [CauseController::class, 'destroy']); 
            });

            Route::prefix('/cities')->group(function () {
                Route::get('/', [CityController::class, 'index']); 
                Route::get('/getOne', [CityController::class, 'getOne']); 
                Route::get('/getAll', [CityController::class, 'getAll']); 
                Route::get('/store', [CityController::class, 'store']); 
                Route::get('/update', [CityController::class, 'update']); 
                Route::get('/destroy', [CityController::class, 'destroy']); 
            });

            Route::prefix('/nationalities')->group(function () {
                Route::get('/', [NationalityController::class, 'index']); 
                Route::get('/getOne', [NationalityController::class, 'getOne']); 
                Route::get('/getAll', [NationalityController::class, 'getAll']); 
                Route::get('/store', [NationalityController::class, 'store']); 
                Route::get('/update', [NationalityController::class, 'update']); 
                Route::get('/destroy', [NationalityController::class, 'destroy']); 
            });

            Route::prefix('/students')->group(function () {
                Route::get('/', [StudentController::class, 'index']); 
                Route::get('/getOne', [StudentController::class, 'getOne']); 
                Route::get('/getAll', [StudentController::class, 'getAll']); 
                Route::get('/getAllGuardians', [StudentController::class, 'getAllGuardians']); 
                Route::get('/getAllNationalities', [StudentController::class, 'getAllNationalities']); 
                Route::get('/store', [StudentController::class, 'store']); 
                Route::get('/update', [StudentController::class, 'update']); 
                Route::get('/destroy', [StudentController::class, 'destroy']); 
            });

            Route::prefix('/guardians')->group(function () {
                Route::get('/', [GuardianController::class, 'index']); 
                Route::get('/getOne', [GuardianController::class, 'getOne']); 
                Route::get('/getAll', [GuardianController::class, 'getAll']); 
                Route::get('/getAllCities', [GuardianController::class, 'getAllCities']); 
                Route::get('/getAllStudents', [GuardianController::class, 'getAllStudents']); 
                Route::get('/store', [GuardianController::class, 'store']); 
                Route::get('/update', [GuardianController::class, 'update']); 
                Route::get('/destroy', [GuardianController::class, 'destroy']); 
            });
        });
    });

    // Plans
    Route::prefix('/plans')->group(function () {
        
        Route::prefix('/courses')->group(function () {
            Route::get('/', [CourseController::class, 'index']); 
            Route::get('/getOne', [CourseController::class, 'getOne']); 
            Route::get('/getAll', [CourseController::class, 'getAll']); 
            Route::get('/store', [CourseController::class, 'store']); 
            Route::get('/update', [CourseController::class, 'update']); 
            Route::get('/anull', [CourseController::class, 'anull']); 
        });

        Route::prefix('/habilitations')->group(function () {
            Route::get('/', [HabilitationController::class, 'index']); 
            Route::get('/getOne', [HabilitationController::class, 'getOne']); 
            Route::get('/getAll', [HabilitationController::class, 'getAll']); 
            Route::get('/getAllSubjects', [HabilitationController::class, 'getAllSubjects']); 
            Route::get('/store', [HabilitationController::class, 'store']); 
            Route::get('/update', [HabilitationController::class, 'update']); 
            Route::get('/anull', [HabilitationController::class, 'anull']); 
        });

        Route::prefix('/curriculums')->group(function () {
            Route::get('/', [CurriculumController::class, 'index']); 
            Route::get('/getOne', [CurriculumController::class, 'getOne']); 
            Route::get('/getAll', [CurriculumController::class, 'getAll']); 
            Route::post('/store', [CurriculumController::class, 'store']); 
            Route::post('/update', [CurriculumController::class, 'update']); 
            Route::get('/anull', [CurriculumController::class, 'anull']); 
        });

        Route::prefix('/schedules')->group(function () {
            Route::get('/', [ScheduleController::class, 'index']); 
            Route::get('/getOne', [ScheduleController::class, 'getOne']); 
            Route::get('/update', [ScheduleController::class, 'update']); 
        });
    });

    // Reports
    Route::prefix('/reports')->group(function () {
        
        Route::prefix('/foundations')->group(function () {
            Route::get('/', [ReportFoundationController::class, 'index']); 
            Route::get('/getAllCities', [ReportFoundationController::class, 'getAllCities']); 
            Route::get('/getAllBranches', [ReportFoundationController::class, 'getAllBranches']); 
            Route::get('/getAllYears', [ReportFoundationController::class, 'getAllYears']); 
            Route::get('/print', [ReportFoundationController::class, 'print']); 
            Route::get('/generatePDF', [ReportFoundationController::class, 'generatePDF']); 
        });
    });
});






















// // Movimientos

//     // Academicos

//         // Cursos
//         Route::get('/movimientos/planes/cursos', [CursoController::class, 'index']); 
//         Route::get('/movimientos/planes/cursos/create', [CursoController::class, 'create']); 
//         Route::get('/movimientos/planes/cursos/{curso}', [CursoController::class, 'show']); 
//         Route::get('/movimientos/planes/cursos/{curso}/edit', [CursoController::class, 'edit']); 
//         Route::post('/movimientos/planes/cursos/store', [CursoController::class, 'store']); 
//         Route::patch('/movimientos/planes/cursos/{curso}/update', [CursoController::class, 'update']); 
//         Route::patch('/movimientos/planes/cursos/{curso}/anull', [CursoController::class, 'anull']); 
//         Route::delete('/movimientos/planes/cursos/{curso}/delete', [CursoController::class, 'destroy']); 

//         // Requisitos
//         Route::get('/movimientos/planes/requisitos', [RequisitoController::class, 'index']); 
//         Route::get('/movimientos/planes/requisitos/{curso}/print', [RequisitoController::class, 'print']); 
//         Route::post('/movimientos/planes/requisitos/store', [RequisitoController::class, 'store']); 
//         Route::patch('/movimientos/planes/requisitos/update', [RequisitoController::class, 'update']); 
//         Route::delete('/movimientos/planes/requisitos/{requisito}/delete', [RequisitoController::class, 'destroy']); 

//         // Habilitaciones
//         Route::get('/movimientos/planes/habilitaciones', [AsignaturaCursoController::class, 'index']); 
//         Route::get('/movimientos/planes/habilitaciones/create', [AsignaturaCursoController::class, 'create']); 
//         Route::get('/movimientos/planes/habilitaciones/{asignatura_curso}', [AsignaturaCursoController::class, 'show']); 
//         Route::get('/movimientos/planes/habilitaciones/{asignatura_curso}/edit', [AsignaturaCursoController::class, 'edit']); 
//         Route::post('/movimientos/planes/habilitaciones/store', [AsignaturaCursoController::class, 'store']); 
//         Route::patch('/movimientos/planes/habilitaciones/{asignatura_curso}/update', [AsignaturaCursoController::class, 'update']); 
//         Route::patch('/movimientos/planes/habilitaciones/{asignatura_curso}/anull', [AsignaturaCursoController::class, 'anull']); 
//         Route::delete('/movimientos/planes/habilitaciones/{asignatura_curso}/delete', [AsignaturaCursoController::class, 'destroy']); 

//         // Horarios
//         Route::get('/movimientos/planes/horarios', [HorarioController::class, 'index']); 
//         Route::get('/movimientos/planes/horarios/{curso}/print', [HorarioController::class, 'print']); 
//         Route::post('/movimientos/planes/horarios/store', [HorarioController::class, 'store']); 
//         Route::patch('/movimientos/planes/horarios/update', [HorarioController::class, 'update']); 

//         // Evaluaciones
//         Route::get('/movimientos/planes/evaluaciones', [EvaluacionController::class, 'index']); 
//         Route::get('/movimientos/planes/evaluaciones/create', [EvaluacionController::class, 'create']); 
//         Route::get('/movimientos/planes/evaluaciones/{evaluacion}', [EvaluacionController::class, 'show']); 
//         Route::get('/movimientos/planes/evaluaciones/{evaluacion}/edit', [EvaluacionController::class, 'edit']); 
//         Route::post('/movimientos/planes/evaluaciones/store', [EvaluacionController::class, 'store']); 
//         Route::patch('/movimientos/planes/evaluaciones/{evaluacion}/update', [EvaluacionController::class, 'update']); 
//         Route::patch('/movimientos/planes/evaluaciones/{evaluacion}/anull', [EvaluacionController::class, 'anull']); 
//         Route::delete('/movimientos/planes/evaluaciones/{evaluacion}/delete', [EvaluacionController::class, 'destroy']); 

//     // Documentales

//         // Inscripciones
//         Route::get('/movimientos/estudiantes/inscripciones', [InscripcionController::class, 'index']); 
//         Route::get('/movimientos/estudiantes/inscripciones/create', [InscripcionController::class, 'create']); 
//         Route::get('/movimientos/estudiantes/inscripciones/{inscripcion}', [InscripcionController::class, 'show']); 
//         Route::get('/movimientos/estudiantes/inscripciones/{inscripcion}/edit', [InscripcionController::class, 'edit']); 
//         Route::get('/movimientos/estudiantes/inscripciones/{inscripcion}/print', [InscripcionController::class, 'print']); 
//         Route::post('/movimientos/estudiantes/inscripciones/store', [InscripcionController::class, 'store']); 
//         Route::patch('/movimientos/estudiantes/inscripciones/{inscripcion}/update', [InscripcionController::class, 'update']); 
//         Route::patch('/movimientos/estudiantes/inscripciones/{inscripcion}/anull', [InscripcionController::class, 'anull']); 
//         Route::patch('/movimientos/estudiantes/inscripciones/{inscripcion}/reactivate', [InscripcionController::class, 'reactivate']); 

//         // Asistencias estudiantiles
//         Route::get('/movimientos/estudiantes/asistencias', [AsistenciaEstudianteController::class, 'index']); 
//         Route::post('/movimientos/estudiantes/asistencias/store', [AsistenciaEstudianteController::class, 'store']); 
//         Route::patch('/movimientos/estudiantes/asistencias/update', [AsistenciaEstudianteController::class, 'update']); 

//         // Justificativos
//         Route::get('/movimientos/estudiantes/justificativos', [JustificativoEstudianteController::class, 'index']); 
//         Route::get('/movimientos/estudiantes/justificativos/create', [JustificativoEstudianteController::class, 'create']); 
//         Route::get('/movimientos/estudiantes/justificativos/{justificativo_estudiante}', [JustificativoEstudianteController::class, 'show']); 
//         Route::get('/movimientos/estudiantes/justificativos/{justificativo_estudiante}/edit', [JustificativoEstudianteController::class, 'edit']); 
//         Route::get('/movimientos/estudiantes/justificativos/{justificativo_estudiante}/print', [JustificativoEstudianteController::class, 'print']); 
//         Route::post('/movimientos/estudiantes/justificativos/store', [JustificativoEstudianteController::class, 'store']); 
//         Route::patch('/movimientos/estudiantes/justificativos/{justificativo_estudiante}/update', [JustificativoEstudianteController::class, 'update']); 
//         Route::patch('/movimientos/estudiantes/justificativos/{justificativo_estudiante}/anull', [JustificativoEstudianteController::class, 'anull']); 

//         // Sanciones y Deserciones
//         Route::get('/movimientos/estudiantes/sanciones-deserciones', [SancionDesercionController::class, 'index']); 
//         Route::get('/movimientos/estudiantes/sanciones-deserciones/create', [SancionDesercionController::class, 'create']); 
//         Route::get('/movimientos/estudiantes/sanciones-deserciones/{sancion_desercion}', [SancionDesercionController::class, 'show']); 
//         Route::get('/movimientos/estudiantes/sanciones-deserciones/{sancion_desercion}/edit', [SancionDesercionController::class, 'edit']); 
//         Route::get('/movimientos/estudiantes/sanciones-deserciones/{sancion_desercion}/print', [SancionDesercionController::class, 'print']); 
//         Route::post('/movimientos/estudiantes/sanciones-deserciones/store', [SancionDesercionController::class, 'store']); 
//         Route::patch('/movimientos/estudiantes/sanciones-deserciones/{sancion_desercion}/update', [SancionDesercionController::class, 'update']); 
//         Route::patch('/movimientos/estudiantes/sanciones-deserciones/{sancion_desercion}/anull', [SancionDesercionController::class, 'anull']); 
        
//         // Calificaciones
//         Route::get('/movimientos/estudiantes/calificaciones', [CalificacionController::class, 'index']); 
//         Route::post('/movimientos/estudiantes/calificaciones/store', [CalificacionController::class, 'store']); 
//         Route::patch('/movimientos/estudiantes/calificaciones/update', [CalificacionController::class, 'update']);

// // Referenciales

//     // Academicos

//         // Secciones
//         Route::get('/referenciales/academicos/secciones', [SeccionController::class, 'index']); 
//         Route::get('/referenciales/academicos/secciones/create', [SeccionController::class, 'create']); 
//         Route::get('/referenciales/academicos/secciones/{seccion}', [SeccionController::class, 'show']); 
//         Route::get('/referenciales/academicos/secciones/{seccion}/edit', [SeccionController::class, 'edit']); 
//         Route::post('/referenciales/academicos/secciones/store', [SeccionController::class, 'store']); 
//         Route::patch('/referenciales/academicos/secciones/{seccion}/update', [SeccionController::class, 'update']); 
//         Route::delete('/referenciales/academicos/secciones/{seccion}/delete', [SeccionController::class, 'destroy']); 

//         // Areas
//         Route::get('/referenciales/academicos/areas', [AreaController::class, 'index']); 
//         Route::get('/referenciales/academicos/areas/create', [AreaController::class, 'create']); 
//         Route::get('/referenciales/academicos/areas/{area}', [AreaController::class, 'show']); 
//         Route::get('/referenciales/academicos/areas/{area}/edit', [AreaController::class, 'edit']); 
//         Route::post('/referenciales/academicos/areas/store', [AreaController::class, 'store']); 
//         Route::patch('/referenciales/academicos/areas/{area}/update', [AreaController::class, 'update']); 
//         Route::delete('/referenciales/academicos/areas/{area}/delete', [AreaController::class, 'destroy']); 

//         // Asignaturas
//         Route::get('/referenciales/academicos/asignaturas', [AsignaturaController::class, 'index']); 
//         Route::get('/referenciales/academicos/asignaturas/create', [AsignaturaController::class, 'create']); 
//         Route::get('/referenciales/academicos/asignaturas/{asignatura}', [AsignaturaController::class, 'show']); 
//         Route::get('/referenciales/academicos/asignaturas/{asignatura}/edit', [AsignaturaController::class, 'edit']); 
//         Route::post('/referenciales/academicos/asignaturas/store', [AsignaturaController::class, 'store']); 
//         Route::patch('/referenciales/academicos/asignaturas/{asignatura}/update', [AsignaturaController::class, 'update']); 
//         Route::delete('/referenciales/academicos/asignaturas/{asignatura}/delete', [AsignaturaController::class, 'destroy']); 

//         // Bachilleratos
//         Route::get('/referenciales/academicos/bachilleratos', [BachilleratoController::class, 'index']); 
//         Route::get('/referenciales/academicos/bachilleratos/create', [BachilleratoController::class, 'create']); 
//         Route::get('/referenciales/academicos/bachilleratos/{bachillerato}', [BachilleratoController::class, 'show']); 
//         Route::get('/referenciales/academicos/bachilleratos/{bachillerato}/edit', [BachilleratoController::class, 'edit']); 
//         Route::post('/referenciales/academicos/bachilleratos/store', [BachilleratoController::class, 'store']); 
//         Route::patch('/referenciales/academicos/bachilleratos/{bachillerato}/update', [BachilleratoController::class, 'update']); 
//         Route::delete('/referenciales/academicos/bachilleratos/{bachillerato}/delete', [BachilleratoController::class, 'destroy']); 
        
//     // Documentales

//         // Bachilleratos
//         Route::get('/referenciales/documentales/nacionalidades', [NacionalidadController::class, 'index']); 
//         Route::get('/referenciales/documentales/nacionalidades/create', [NacionalidadController::class, 'create']); 
//         Route::get('/referenciales/documentales/nacionalidades/{nacionalidad}', [NacionalidadController::class, 'show']); 
//         Route::get('/referenciales/documentales/nacionalidades/{nacionalidad}/edit', [NacionalidadController::class, 'edit']); 
//         Route::post('/referenciales/documentales/nacionalidades/store', [NacionalidadController::class, 'store']); 
//         Route::patch('/referenciales/documentales/nacionalidades/{nacionalidad}/update', [NacionalidadController::class, 'update']); 
//         Route::delete('/referenciales/documentales/nacionalidades/{nacionalidad}/delete', [NacionalidadController::class, 'destroy']); 

//         // Ciudades
//         Route::get('/referenciales/documentales/ciudades', [CiudadController::class, 'index']); 
//         Route::get('/referenciales/documentales/ciudades/create', [CiudadController::class, 'create']); 
//         Route::get('/referenciales/documentales/ciudades/{ciudad}', [CiudadController::class, 'show']); 
//         Route::get('/referenciales/documentales/ciudades/{ciudad}/edit', [CiudadController::class, 'edit']); 
//         Route::post('/referenciales/documentales/ciudades/store', [CiudadController::class, 'store']); 
//         Route::patch('/referenciales/documentales/ciudades/{ciudad}/update', [CiudadController::class, 'update']); 
//         Route::delete('/referenciales/documentales/ciudades/{ciudad}/delete', [CiudadController::class, 'destroy']); 

//         // Causas
//         Route::get('/referenciales/documentales/causas', [CausaController::class, 'index']); 
//         Route::get('/referenciales/documentales/causas/create', [CausaController::class, 'create']); 
//         Route::get('/referenciales/documentales/causas/{causa}', [CausaController::class, 'show']); 
//         Route::get('/referenciales/documentales/causas/{causa}/edit', [CausaController::class, 'edit']); 
//         Route::post('/referenciales/documentales/causas/store', [CausaController::class, 'store']); 
//         Route::patch('/referenciales/documentales/causas/{causa}/update', [CausaController::class, 'update']); 
//         Route::delete('/referenciales/documentales/causas/{causa}/delete', [CausaController::class, 'destroy']); 

//         // Personas
//         Route::get('/referenciales/documentales/personas', [PersonaController::class, 'index']); 
//         Route::get('/referenciales/documentales/personas/create', [PersonaController::class, 'create']); 
//         Route::get('/referenciales/documentales/personas/{persona}', [PersonaController::class, 'show']); 
//         Route::get('/referenciales/documentales/personas/{persona}/edit', [PersonaController::class, 'edit']); 
//         Route::post('/referenciales/documentales/personas/store', [PersonaController::class, 'store']); 
//         Route::patch('/referenciales/documentales/personas/{persona}/update', [PersonaController::class, 'update']); 
//         Route::patch('/referenciales/documentales/personas/{persona}/deactivate', [PersonaController::class, 'deactivate']); 
//         Route::patch('/referenciales/documentales/personas/{persona}/reactivate', [PersonaController::class, 'reactivate']); 
//         Route::delete('/referenciales/documentales/personas/{persona}/delete', [PersonaController::class, 'destroy']); 

// // Informes

//     // Referenciales
//     Route::get('/informes/referenciales', [InformeReferencialController::class, 'index']); 
//     Route::get('/informes/referenciales/print', [InformeReferencialController::class, 'print']); 

//     // Referenciales
//     Route::get('/informes/academicos', [InformeAcademicoController::class, 'index']); 
//     Route::get('/informes/academicos/print', [InformeAcademicoController::class, 'print']); 

//     // Referenciales
//     Route::get('/informes/documentales', [InformeDocumentalController::class, 'index']); 
//     Route::get('/informes/documentales/print', [InformeDocumentalController::class, 'print']); 
