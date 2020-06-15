<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;

/**
 * Class ElementController
 * @package App\Http\Controllers
 */
class ElementController extends Controller
{
    //
    /**
     * @param Request $request
     * @return Element[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get_elements(Request $request)
    {

        return Element::all();

    }

    /**
     * @param Request $request
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $element = new Element();
        $element->name = $data['name'];
        $element->description = $data['description'];
        $element->url_image = $data['url_image'];
        $element->url_slider_images = $data['url_slider_images'];
        $element->price = $data['price'];
        $element->quantity = $data['quantity'];
        $element->save();

        return response()->json('Registro existoso',200);

    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {


    }
}
