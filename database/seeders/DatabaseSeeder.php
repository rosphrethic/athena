<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Sistema
        $this->call(UserSeeder::class);
        $this->call(CompanyDataSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);

        // Referenciales
        $this->call(AreaSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(BaccalaureateSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(RequirementSeeder::class);

        $this->call(CauseSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(NationalitySeeder::class);
        $this->call(GuardianSeeder::class);
        $this->call(StudentSeeder::class);

        // Movimientos
        $this->call(CourseSeeder::class);
        $this->call(HabilitationSeeder::class);
        // $this->call(AsignaturaCursoSeeder::class);
        // $this->call(RequisitoSeeder::class);
        // $this->call(HorarioSeeder::class);
        // $this->call(EvaluacionSeeder::class);

        // $this->call(InscripcionSeeder::class);
        // $this->call(AsistenciaEstudianteSeeder::class);
        // $this->call(JustificativoEstudianteSeeder::class);
        // $this->call(SancionDesercionSeeder::class);
        // $this->call(CalificacionSeeder::class);

    }
}
