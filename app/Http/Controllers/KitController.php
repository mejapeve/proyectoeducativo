<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Kit;
use App\Models\KitElement;
use App\Models\MomentKits;
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
    public function create_or_update_kit(Request $request)
    {

        $data = $request->all();
        $kit = new Kit();
        $kit->name = $data['name'];
        $kit->description = $data['description'];
        $kit->url_image = $data['url_image'];
        $kit->price = $data['price'];
        $kit->url_slider_images = $data['url_slider_images'];
        $kit->quantity = $data['quantity'];
        $kit->init_date = $data['init_date'];
        $kit->save();
        $elements = @json_decode($data['elements']);
        foreach ($elements as $element_id){
            $kit_element_n = new KitElement();
            $kit_element_n->kit_id = $kit->id;
            $kit_element_n->element_id = $element_id;
            $kit_element_n->save();
        }
        $element_json = @json_decode($data['arraySequenceMoment']);
        foreach ($element_json as $sequenceMoment){
            foreach ($sequenceMoment->moments as $moment){
                $momentKits = new MomentKits();
                $momentKits->kit_id = $kit->id;
                $momentKits->sequence_moment_id = $moment->id;
                $momentKits->save();
            }

        }
        return response()->json([
            'status' => 'successfull',
            'message' => 'El kit ha sido creado'
        ]);

    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {


    }

}
