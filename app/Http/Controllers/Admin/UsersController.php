<?php

namespace App\Http\Controllers\Admin;

use App\Imports\UsersImport;
//use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Exception;
use Maatwebsite\Excel\Validators\ValidationException;

class UsersController extends Controller
{

    public function import()
    {

        (new UsersImport)->import('C:/Users/garzonhs/Documents/Listado Carga estudiantes ecopetrol-1.xls', null, \Maatwebsite\Excel\Excel::XLS);
        //Excel::import(new UsersImport, 'C:/Users/garzonhs/Documents/Listado Carga estudiantes ecopetrol-1.xls');
    }
}
