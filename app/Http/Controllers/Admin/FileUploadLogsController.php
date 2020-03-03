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
       //dd($request); 
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
        return view('roles.admin.fileUploadLogs',['showResult'=>false,'fileListResult' => $fileListResult]);    
    }

    private function showResult($resultFileName) {
        $resultsDirectory = public_path() . "/fileUploadDirectory/results/";

        $resultData = [];
        $resultData["errors"] = [];
        
        $myfile = fopen($resultsDirectory . $resultFileName, "r"); //-->read only
        
        //Output lines until EOF is reached
        while(! feof($myfile)) {
            $line = fgets($myfile);
             if(strpos($line, "initProcess ->") === 0) {
                 $resultData["initProcess"] = explode("initProcess ->", $line)[1];
            }
            else if(strpos($line, "fileName ->") === 0) {
                 $resultData["fileName"] = explode("fileName ->", $line)[1];
                 
            }
            else if(strpos($line, "fileSize ->")=== 0) {
                $resultData["fileSize"] = explode("fileSize ->", $line)[1];
            }
            else if(strpos($line, "Error ->")=== 0) {
                array_push( $resultData["errors"], explode("Error ->", $line)[1]); 
            }
            else if(strpos($line, "successfullRecords ->")===0) {
                $resultData["successfullRecords"] = explode("successfullRecords ->", $line)[1];
            }
            else if(strpos($line, "companyName ->")===0) {
                $resultData["companyName"] = explode("companyName ->", $line)[1];
            }
            else if(strpos($line, "sequenceName ->")===0) {
                $resultData["sequenceName"] = explode("sequenceName ->", $line)[1];
            }
            else if(strpos($line, "gradeName ->")===0) {
                $resultData["gradeName"] = explode("gradeName ->", $line)[1];
            }
            else if(strpos($line, "teacherName ->")===0) {
                $resultData["teacherName"] = explode("teacherName ->", $line)[1];
            }
            else if(strpos($line, "errorRecords ->")===0) {
                $resultData["errorRecords"] = explode("errorRecords ->", $line)[1];
            }
            else if(strpos($line, "total ->")===0) {
                $resultData["total"] = explode("total ->", $line)[1];
            }
        }
        fclose($myfile);
     
        return view('roles.admin.fileUploadLogs',[
            'showResult'=>true,
            'successfullRecords'=> $resultData["successfullRecords"] ,
            'initProcess'=>$resultData["initProcess"],
            'fileName'=>$resultData["fileName"],
            'fileSize'=>$resultData["fileSize"],
            'errors'=>$resultData["errors"],
            'companyName'=>$resultData["companyName"],
            'sequenceName'=>$resultData["sequenceName"],
            'gradeName'=>$resultData["gradeName"],
            'teacherName'=>$resultData["teacherName"],
            'errorRecords'=>$resultData["errorRecords"],
            'total'=>$resultData["total"],
            'resultData' => "resultData",

            ]
        );    
    }
}
