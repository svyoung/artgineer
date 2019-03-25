<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Http\Controllers\DateTime;
use DB;

class ResumeController extends Controller
{
    public function index() {
        $entries = DB::table('company')
                ->join('job_descriptions', 'company.company_id', '=', 'job_descriptions.company_id')
//                ->select('users.id', 'contacts.phone', 'orders.price')
                ->get();
        $comp = json_decode(json_encode($entries), true);

        foreach($comp as $com) {
            if(!isset($companies[$com['company_abbrev']])) {
                $companies[$com['company_abbrev']] = array();
                $companies[$com['company_abbrev']]['company_name'] = $com['company_name'];
                $companies[$com['company_abbrev']]['company_title'] = $com['company_title'];
                $companies[$com['company_abbrev']]['company_location'] = $com['company_location'];
                $companies[$com['company_abbrev']]['company_start'] = substr(date("F", mktime(0, 0, 0, $com['company_start_month'], 10)), 0, 3) . ' ' . $com['company_start_year'];
                if($com['company_end_month'] == NULL ) {
                    $companies[$com['company_abbrev']]['company_end'] = 'Present';
                } else {
                    $companies[$com['company_abbrev']]['company_end'] = substr(date("F", mktime(0, 0, 0, $com['company_end_month'], 10)), 0, 3) . ' ' . $com['company_end_year'];
                }
            }

            $companies[$com['company_abbrev']]['description'][] = $com['description'];
            $company_abbrev[$com['company_abbrev']] = $com['company_name'];
        }
//        echo '<pre>' . var_export($company_abbrev, true) . '</pre>';
//        exit();

//        return response()->json($posts);
        return view('resume', ['companies' => $companies, 'company_abbrev' => $company_abbrev]);
        // return response()->json($entry);
    }

}
