<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FolderImageController extends Controller {


    public function getFiles(Request $request) {
		$directory = $request->dir;
		if(!file_exists($directory)) {
			$directory = 'images';
			
		}
		$scanned_directory = array_diff(scandir(public_path().'/'.$directory), array( '.'));
        return response()->json(['scanned_directory'=>$scanned_directory,'directory'=>$directory], 200);
    }
}
