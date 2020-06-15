<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Kit;
use App\Models\KitElement;
use Illuminate\Http\Request;

/**
 * Class KitController
 * @package App\Http\Controllers
 */
class KitController extends Controller
{
    //
    /**
     * @param Request $request
     * @return Kit[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get_kits(Request $request)
    {

        return Kit::all();

    }

    /**
     * @param Request $request
     */
    public function create(Request $request)
    {

        $data = $request->all();
        $kit = new Kit();
        $kit->name = $data['name'];
        $kit->description = $data['description'];
        $kit->url_image = $data['url_image'];
        $kit->price = $data['price'];
        $kit->url_slider_images = $data['url_slider_images'];
        $kit->quantity = $data['url_slider_images'];
        $kit->save();
        $elements = explode('|',$data['elements']);
        foreach ($elements as $element_id){
            $kit_element_n = new KitElement();
            $kit_element_n->kit_id = $kit->id;
            $kit_element_n->element_id = $element_id;
            $kit_element_n->save();
        }

        return response()->json('Registro exitoso',200);
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {


    }

}
