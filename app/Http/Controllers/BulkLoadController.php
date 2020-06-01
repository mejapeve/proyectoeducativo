<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BulkLoadController extends Controller
{
    //

    public function list_files()
    {

        $files = array_slice(scandir(public_path() . '/angular'), 2);
        return response()->json(['data' => $files], 200);

    }

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
