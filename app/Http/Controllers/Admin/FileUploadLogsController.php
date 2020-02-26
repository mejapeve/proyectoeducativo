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
        $lines = file("C:/Users/garzonhs/Documents/testfile2.txt", FILE_SKIP_EMPTY_LINES) or die("Unable to open file!");
        echo $lines[0];
        
        return view('roles.admin.fileUploadLogs')->with('lines', $lines);
        //return view('roles.admin.fileUploadLogs');
    }
}
