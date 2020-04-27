<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FolderImageController extends Controller {


    public function getFiles(Request $request) {
		$directory = public_path(). '\\'. $request->dir;
		$scanned_directory = array_diff(scandir($directory), array( '.'));
        return response()->json($scanned_directory, 200);
    }
}
