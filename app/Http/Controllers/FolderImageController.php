<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class FolderImageController
 * @package App\Http\Controllers
 */
class FolderImageController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFiles(Request $request)
    {
        $homeDirectory = 'images/designerAdmin/';
        $directory = env('ADMIN_DESIGN_PATH') . '/' . str_replace($homeDirectory,'',$request->dir);
        if (isset($request->dir) && count($request->dir)>0 && $request->dir != $homeDirectory && file_exists($directory)) {
            $scanned_directory = array_diff(scandir($directory), array('.'));
            return response()->json(['scanned_directory' => $scanned_directory, 'directory' => $request->dir], 200);
        }
        else {
            $directory = env('ADMIN_DESIGN_PATH');
            $scanned_directory = array_diff(scandir($directory), array('..'), array('.'));
            return response()->json(['initial'=>true,'scanned_directory' => $scanned_directory, 'directory' => $homeDirectory], 200);
        }
    }
}
