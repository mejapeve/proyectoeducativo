<?php

namespace App\Imports;

use App\Models\AffiliatedCompanyRole;
use App\Models\AfiliadoEmpresa;
use App\Models\CompanyAffiliatedAssignmentUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class UsersImport implements ToModel, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $request;
    public function __construct($request)
    {
        $this->request = $request;

    }

    public function model(array $row)
    {
       $user = new  AfiliadoEmpresa();
       $user->user_name =$row[0];
       $user->name =$row[1];
       $user->last_name =$row[2];
       $user->email =$row[3];
       $user->save();
       DB::commit();
        $userRole = new AffiliatedCompanyRole([
            'affiliated_company_id'  => $user->id,
            'rol_id'      => 1,
            'company_id'  => 1,
        ]);
        $userRole->save();
        DB::commit();
        $userAssigment = new CompanyAffiliatedAssignmentUser([
            'student_company_id'  => $userRole->id,
            'teacher_company_id'  => 1,
            'company_sequence_id'  => 1,
            'company_group_id'  => 1,
        ]);

        //dd($this->request, $userRole);
        return $userAssigment;
    }

    public function onFailure(Failure ...$failures)
    {
       $path =  public_path().'/Documents/testfile2.txt';
        // Handle the failures how you'd like.
        foreach ($failures as $failure) {
            $failure->row(); // row that went wrong
            $failure->attribute(); // either heading key (if using heading row concern) or column index
            $failure->errors(); // Actual error messages from Laravel validator
            $failure->values(); // The values of the row that has failed.
            $myfile = fopen($path, "a+");
            fwrite($myfile, "Error -> Linea: " . $failure->row() . " Causa: " . ' ' . $failure->attribute());
            fwrite($myfile, "\n");
            fclose($myfile);
        }
    }

    public function rules(): array
    {
        return [
            '0' => 'required',
            '1' => 'required',
            '2' => 'required',
            '3' => 'required',
        ];
        //$myfile = fopen("C:/Users/garzonhs/Documents/testfile2.txt", "a+");
        //fwrite($myfile, 'entro a rules');
        //fclose($myfile);
    }

    public function customValidationAttributes()
    {
        return [
            '0' => 'Usuario vacio para la columna user_name',
            '1' => 'Usuario vacio para la columna name',
            '2' => 'Usuario vacio para la columna last_name',
            '3' => 'Usuario vacio para la columna email',
        ];
    }
}