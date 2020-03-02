<?php

namespace App\Http\Controllers\Admin;

use App\fileUpload;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FileUploadLogsController extends Controller
{
    //
    public function index(Request $request)
    {
        
        if($request->resultFile){
            return $this->showResult($request->resultFile);
        }
        else {
            return $this->showAllResults();
        }    
    }

    private function showAllResults()
    {
        $resultsDirectory = public_path() . "/fileUploadDirectory/results/";
        $fileListResult = [];
        return view('roles.admin.fileUploadLogs',['fileListResult' => $fileListResult]);    
    }

    private function showResult($resultFileName) {
        $resultsDirectory = public_path() . "/fileUploadDirectory/results/";

        $resultData = [];
        $resultData["errors"] = [];
        
        $myfile = fopen($resultsDirectory . $resultFileName, "r"); //-->read only

        //Output lines until EOF is reached
        while(! feof($myfile)) {
            $line = fgets($myfile);
            
            if(strpos($line, "initProcess ->")) {
                $resultData["initProcess"] = explode("initProcess ->", $line)[1];
            }
            if(strpos($line, "fileName ->")) {
                dd($resultData);
                $resultData["fileName"] = explode("fileName ->", $line)[1];
            }
            if(strpos($line, "fileSize ->")) {
                $resultData["fileSize"] = explode("fileSize ->", $line)[1];
            }
            if(strpos($line, "error ->")) {
                $resultData["errors"].add(explode("error ->", $line)[1]);
            }
        }
        fclose($myfile);
        
        return view('roles.admin.fileUploadLogs',$resultData);    
    }
}
