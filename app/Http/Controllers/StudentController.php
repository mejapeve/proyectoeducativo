<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        if($request->user('afiliadoempresa')->url_image == null) {
            return view('roles.student.avatar');
        }
        else return view('roles.student.index');
    }
    
    public function show_available_sequences(Request $request) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        return view('roles.student.available_sequences');
    }
    
    public function get_available_sequences (Request $request,$company_id){
        
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        
        // retorna la lista de todas secuencias indicando en un flag si el alumno tiene activa alguna o no company_sequences.*, 
        return  DB::select('SELECT company_sequences.*,
                            IF(company_affiliated_assigment_users.id IS NULL, \'false\',\'true\' ) AS isAvailable 
                            FROM company_sequences 
                            LEFT JOIN company_affiliated_assigment_users  
                            ON company_sequences.id = company_affiliated_assigment_users.company_sequence_id
                            AND company_affiliated_assigment_users.student_company_id = ?  
                            AND company_affiliated_assigment_users.teacher_company_id = ?
                            WHERE init_date <= CURRENT_DATE  
                            AND ( expiration_date >= CURRENT_DATE or expiration_date IS NULL )', 
                        [$request->user('afiliadoempresa')->id, $company_id]);
               
    }
}
