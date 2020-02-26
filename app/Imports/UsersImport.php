<?php

namespace App\Imports;

use App\Models\AfiliadoEmpresa;
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
    public function model(array $row)
    {
        return new AfiliadoEmpresa([
            'user_name'  => $row[0],
            'name'       => $row[1],
            'last_name'  => $row[2],
            'email'      => $row[3],
            //'Birthday'  => $row[Date_Birth],
        ]);
    }

    public function onFailure(Failure ...$failures)
    {
        // Handle the failures how you'd like.
        foreach ($failures as $failure) {
            $failure->row(); // row that went wrong
            $failure->attribute(); // either heading key (if using heading row concern) or column index
            $failure->errors(); // Actual error messages from Laravel validator
            $failure->values(); // The values of the row that has failed.
            $myfile = fopen("C:/Users/garzonhs/Documents/testfile2.txt", "a+");
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
        $myfile = fopen("C:/Users/garzonhs/Documents/testfile2.txt", "a+");
        fwrite($myfile, 'entro a rules');
        fclose($myfile);
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
