<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function index(Request $request){

        //$request->user('afiliadoempresa')->authorizeRoles(['admin']);

        return view('roles.admin.fileUpload');
    }

}
