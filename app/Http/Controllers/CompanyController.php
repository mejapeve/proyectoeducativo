<?php

namespace App\Http\Controllers;

use App\Models\AfiliadoEmpresa;
use App\Models\Companies;
use App\Models\CompanyGroup;
use App\Models\CompanySequence;
use App\Models\ShoppingCart;

use Illuminate\Http\Request;
use DB;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    //

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_companies()
    {

        return response()->json(
            ['data' => Companies::all()],
            200
        );

    }

    /**
     * @param Request $request
     * @param $company_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_company_sequences(Request $request, $company_id, $sequence_id = 0)
    {
        $activesPlan = [];
        if (auth('afiliadoempresa')->user()) {
            $userId = auth('afiliadoempresa')->user()->id;
            $activesPlan = AfiliadoEmpresa::
            with('affiliated_account_services.affiliated_content_account_service')
                ->whereHas('affiliated_account_services', function ($query) {
                    $dt = new \DateTime();
                    $end_date = date('Y-m-d', strtotime('+ 1 day'));
                    $query->where([
                        ['init_date', '>=', $dt->format('Y-m-d')],
                        ['end_date', '<=', $end_date]
                    ]);
                })->find($userId);
            $shoppingCartPlan = ShoppingCart::with('shopping_cart_product')->where([
                ['company_affiliated_id', $userId],
                ['payment_status_id', 1]
            ])->get();
        } else {
            if (session_id() == "") {
                session_start();
            }
            $shoppingCartPlan = ShoppingCart::with('shopping_cart_product')->where([
                ['session_id', session_id()],
                ['payment_status_id', 1]
            ])->get();
        }
        $dt = new \DateTime();
        $companySequence = CompanySequence::select('id', 'name', 'description', 'url_image', 'keywords', 'areas', 'themes', 'objectives', 'mesh', 'url_vimeo')->with(
            ['moments' => function ($query) {
                $query->select('id', 'sequence_company_id', 'order', 'name', 'description', 'objectives')
                    ->with(['experiences' => function ($query) {
                        $query->select('id', 'sequence_moment_id', 'title', 'decription', 'objectives');
                    }, 'moment_kit.kit.kit_elements.element', 'moment_kit.element']);
            }]
        ) 
            ->where('company_id', $company_id)
            ->where(function ($query) {
                $dt = new \DateTime();
                $query->where('expiration_date', '>=', $dt->format('Y-m-d'))
                    ->orWhereNull('expiration_date'); 
            })
            ->where('init_date', '<=', $dt->format('Y-m-d'));

            if($sequence_id > 0) {
                $companySequence = $companySequence->find($sequence_id);
                $companySequence  = [$companySequence];
            }
            else {
                $companySequence = $companySequence->get();
            } 
        return response()->json([
            'activesPlan' => $activesPlan,
            'shoppingCartPlan' => $shoppingCartPlan,
            'companySequences' => $companySequence
        ], 200);
    }

    /**
     * @param Request $request
     * @param $company_id
     * @return mixed
     */
    public function get_company_groups(Request $request, $company_id)
    {

        return CompanyGroup::where('company_id', $company_id)->get();

    }

    /**
     * @param Request $request
     * @param $company_id
     * @return mixed
     */
    public function get_teachers_company(Request $request, $company_id)
    {

        return DB::table('afiliado_empresas')
            ->join('affiliated_company_roles', 'afiliado_empresas.id', '=', 'affiliated_company_roles.affiliated_company_id')
            ->where('affiliated_company_roles.company_id', $company_id)
            ->where('affiliated_company_roles.rol_id', 2)
            ->select('afiliado_empresas.id', 'afiliado_empresas.name', 'afiliado_empresas.last_name', 'affiliated_company_roles.company_id', 'affiliated_company_roles.rol_id')
            ->get();
    }

}
