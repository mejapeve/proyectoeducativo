<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class BulkLoadController
 * @package App\Http\Controllers
 */
class BulkLoadController extends Controller
{
    //

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function list_files()
    {

        $files = array_slice(scandir(public_path() . '/angular'), 2);
        return response()->json(['data' => $files], 200);

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function read_file()
    {

        $archivo = fopen(public_path() . '/angular/app.js', "r");

        $traer = "";

        while (!feof($archivo)) {
            $traer = fgets($archivo);
        }

        fclose($archivo);

        return response()->json(['data' => $traer], 200);

    }
}
