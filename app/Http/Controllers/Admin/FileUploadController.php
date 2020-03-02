<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Imports\UsersImport;

class FileUploadController extends Controller
{
    //
    public function index(Request $request)
    {
        $request->user('afiliadoempresa')->authorizeRoles(['admin']);
        return view('roles.admin.fileUpload');
    }

    public function store(Request $request)
    {
        $request->user('afiliadoempresa')->authorizeRoles(['admin']);
        
        $fileInput = $_FILES['fileInput'];
        $uploadDirectory = public_path() . "/fileUploadDirectory/pendings/";
        $processedDirectory = public_path() . "/fileUploadDirectory/processed/";
        $resultsDirectory = public_path() . "/fileUploadDirectory/results/";
        
        if($fileInput && $fileInput['error'] == '0') {
            $fileName = $fileInput['name'];
            $fileSize = $fileInput['size'];
            $fileType = $fileInput['type'];
            $companyName = 'Company';
            $sequenceName = 'sequence';
            $gradeName = 'grade';
            $teacherName = 'teacher';
            
            if (move_uploaded_file($fileInput['tmp_name'], $uploadDirectory . $fileName)) {
                
                $resultFile = $resultsDirectory . $fileName . '.info';
                $myfile = fopen($resultFile, "w");
                
                fwrite($myfile, "fileName -> " . $fileName . "\n");
                fwrite($myfile, "fileSize -> " . $fileSize . "\n");
                fwrite($myfile, "fileType -> " . $fileType . "\n");
                fwrite($myfile, "companyName -> " . $companyName . "\n");
                fwrite($myfile, "sequenceName -> " . $sequenceName . "\n");
                fwrite($myfile, "gradeName -> " . $gradeName . "\n");
                fwrite($myfile, "teacherName -> " . $teacherName . "\n");
                fwrite($myfile, "\n");
                fwrite($myfile, "initProcess -> " . date("Y-m-d h:i:s") . "\n");
                fclose($myfile);

                //invoca la carga del archivo a la base de datos
                    
                (new UsersImport($request,$resultFile))->import($uploadDirectory . $fileName, null, Excel::XLS);
                
                return redirect()->action('Admin\FileUploadLogsController@index',[
                    'resultFile' => $fileName . '.info'
                ]);

            } else {
                echo "¡Posible ataque de subida de ficheros!\n";
            }    
        }
        else {
            echo "¡Error cargando el fichero!\n";
        }

        

        
    }

}
