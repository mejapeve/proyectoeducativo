<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

use App\Models\CompanySequence;

class EditCompanySequenceController extends Controller {

    public function get_sequences_list(Request $request) {
		$sequences =  CompanySequence::with('company','moments','moments.experiences','moments.moment_kit.kit.kit_elements.element','moments.moment_kit.element')
					  ->get();
        return view('roles.admin.listCompanySequences',['sequences'=>$sequences]);
    }
	
	public function get_sequences_get(Request $request, $sequence_id) {
		$sequence =  CompanySequence::with('moments','moments.experiences','moments.moment_kit.kit.kit_elements.element','moments.moment_kit.element')
					  ->find($sequence_id);
		return view('roles.admin.editCompanySequences',['sequence'=>$sequence]);
    }

}
