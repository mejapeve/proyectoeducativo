<?php

use Illuminate\Database\Seeder;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $users = [
            ['nombre'=>'Cristian','apellido'=>'Jojoa','correo'=>'cristianjojoa01@gmail.com','password'=>'cristianjojoa01','empresa_id'=>1],
            ['nombre'=>'Henry ','apellido'=>'Garzon','correo'=>'hsgarzon2020@gmail.com','password'=>'hsgarzon2020','empresa_id'=>1],
            ['nombre'=>'David','apellido'=>'Camacho','correo'=>'davithc01@gmail.com','password'=>'davithc01','empresa_id'=>1,]
        ];

        foreach ($users as $user){

            $userN = new \App\Models\AfiliadoEmpresa();
            $userN->name = $user['nombre'];
            $userN->last_name = $user['apellido'];
            $userN->email = $user['correo'];
            $userN->password = \Illuminate\Support\Facades\Hash::make($user['password']);
            //$userN->empresa_id = $user['empresa_id'];
            $userN->save();

            $affiliatedCompany = new \App\Models\AffiliatedCompany();
            $affiliatedCompany->affiliated_id = $userN->id;
            $affiliatedCompany->company_id = $user['empresa_id'];
            $affiliatedCompany->save();

            $affiliatedCompanyRoles = new \App\Models\AffiliatedCompanyRole();
            $affiliatedCompanyRoles->affiliated_company_id = $affiliatedCompany->id;
            $affiliatedCompanyRoles->rol_id = 1;
            $affiliatedCompanyRoles->save();

            $affiliatedCompanyRoles = new \App\Models\AffiliatedCompanyRole();
            $affiliatedCompanyRoles->affiliated_company_id = $affiliatedCompany->id;
            $affiliatedCompanyRoles->rol_id = 4;
            $affiliatedCompanyRoles->save();


        }
    }
}
