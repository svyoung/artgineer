<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function about() {
        return view('modals.about');
    }

    public function resume() {
        return view('modals.resume');
    }

    public function newPost() {
        return view('modals.new');
    }

    public function getPosts() {

        $entries = DB::table('posts')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();
        $entries = json_decode(json_encode($entries), true);
        $posts = [];
        foreach($entries as $key => $entry) {
            $posts[$key] = $entry;
            $posts[$key]['created_at'] = date('F, d Y', strtotime($entry['created_at']));
        }
        
        return response()->json($posts);
    }
}
