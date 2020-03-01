<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function import(Request $request)
    {
        $archivo = public_path() . '/Documents/Listado Carga estudiantes ecopetrol-1.xls';
        (new UsersImport($request))->import($archivo, null, \Maatwebsite\Excel\Excel::XLS);
        $fileResult = '';
        return view('roles.admin.fileUploadLogs', ['request' => $request, 'fileResult', $fileResult]);
        //Excel::import(new UsersImport, 'C:/Users/garzonhs/Documents/Listado Carga estudiantes ecopetrol-1.xls');
    }
}
