<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use App\Models\Element;
use Illuminate\Http\Request;

/**
 * Class KitElementController
 * @package App\Http\Controllers
 */
class KitElementController extends Controller
{
    //
    /**
     * @param Request $request
     * @return Kit[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get_kit_elements(Request $request)
    {
        return Kit::with('kit_elements', 'kit_elements.element')->get();

    }

    /**
     * @param Request $request
     * @param $kid_id
     * @return mixed
     */
    public function get_kit(Request $request, $kid_id)
    {
        return Kit::
        with(['moment_kits' => function($query) {
            $query->with(['moment' => function($detail) {
                $detail->with(['sequence' => function($seq) {
                    $seq->select(['company_sequences.id','company_sequences.name','company_sequences.description','company_sequences.url_image','company_sequences.url_slider_images']);
                }]);
                $detail->select(['id','sequence_moments.*']);
            }]);
            $query->select(['moment_kits.id','moment_kits.*']);
        }])
        ->with('kit_elements', 'kit_elements.element')
        
        ->find($kid_id);
    }

    /**
     * @param Request $request
     * @param $element_id
     * @return mixed
     */
    public function get_element(Request $request, $element_id)
    {

        return Element::where('id', $element_id)->get();

    }

    public function get_kit_element_dt (){

        $kitsElements['kits'] = Kit::all();
        $kitsElements['elements'] = Element::all();

        return response()->json($kitsElements,200);

    }

}
