<?php

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Roles();
        $role->name = 'student';
        $role->description = 'Estudiante';
        $role->save();

        $role = new Roles();
        $role->name = 'teacher';
        $role->description = 'Profesor';
        $role->save();

        $role = new Roles();
        $role->name = 'tutor';
        $role->description = 'Tutor';
        $role->save();

        $role = new Roles();
        $role->name = 'admin';
        $role->description = 'Admin';
        $role->save();

    }
}
