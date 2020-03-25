<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function index(Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        return view('roles.student.avatar');
    }

    public function update_avatar(Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        $user = $request->user('afiliadoempresa');
        if(isset($request->url_image)){
            $user->url_image = $request->url_image;
            $user->save();
        }
        elseif(isset($request->custom_image)){
            $img_file = public_path() . "/images/avatars/users_images/" . "newfile.png";
            $b64 = str_replace ("data:image/png;base64","",$request->custom_image);// Define the Base64 
            $bin = base64_decode($b64);// Obtain the original content (usually binary data)
            $im = imageCreateFromString($bin);// Load GD resource from binary data
            if (!$im) { // Validate that the GD library was able to load the image
              die('Base64 value is not a valid image'); // This is important, because you should not miss corrupted or unsupported images
            }
            imagepng($im, $img_file, 0); // Save the GD resource as PNG in the best possible quality (no compression)
            $user->url_image = $img_file;
            $user->save();
            
        }
        return redirect()->route('student',['empresa'=> $request->empresa, 'success' => 'Avatar modificado exitosamente']);
    }
}
