<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function index(Request $request)
    {
        //$request->user('afiliadoempresa')->authorizeRoles(['admin']);
        return view('roles.admin.fileUpload');
    }

    public function store(Request $request)
    {
        //dd($request, $request->companySelect);
        $uploadDirectory = public_path() . "fileUploadDirectory/pendings/";
        $uploadDirectory = $uploadDirectory . basename($_FILES['fileInput']['name']);
        //dd($_FILES['fileInput']);
        if (move_uploaded_file($_FILES['fileInput']['tmp_name'], $uploadDirectory)) {
            echo "El fichero es válido y se subió con éxito.\n";
        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
        }
    }

}
