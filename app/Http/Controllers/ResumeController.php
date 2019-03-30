<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Http\Controllers\DateTime;
use DB;

class ResumeController extends Controller
{
    public function index() {
        $com = DB::table('company')
                ->join('job_descriptions', 'company.company_id', '=', 'job_descriptions.company_id')
                ->get();
        $comp = json_decode(json_encode($com), true);

        foreach($comp as $com) {
            if(!isset($companies[$com['company_abbrev']])) {
                $companies[$com['company_abbrev']] = array();
                $companies[$com['company_abbrev']]['company_name'] = $com['company_name'];
                $companies[$com['company_abbrev']]['company_url'] = $com['company_url'];
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

        $ts = DB::table('company_stack')
                ->join('technology', 'technology.tech_id', '=', 'company_stack.tech_id')
                ->join('company', 'company.company_id', '=', 'company_stack.company_id')
                ->select('technology.tech_name', 'company.company_abbrev')
                ->orderBy('technology.tech_id', 'ASC')
                ->get();

        $ts = json_decode(json_encode($ts), true);

        for($i = 0; $i < count($ts); $i++) {
            $stack = array();
            $companies[$ts[$i]['company_abbrev']]['tech_stack'][] = $ts[$i]['tech_name'];
        }

//        echo '<pre>' . var_export($companies, true) . '</pre>';
//        exit();

        return view('resume', ['companies' => $companies, 'company_abbrev' => $company_abbrev]);
    }

}
