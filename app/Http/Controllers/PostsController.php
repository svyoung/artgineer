<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use DB;

class PostsController extends Controller
{
    public function fullpost($id) {
        $entry = DB::table('posts')
            ->where([
                ['id', '=', $id], 
                ['status', '=', 'active']
            ])
            ->get();
        $entry = $entry->toArray();
        $entry[0]->created_at = date('F d, Y', strtotime($entry[0]->created_at));
        return view('modals.post', ['post' => $entry]);
            // return response()->json($entry);
    }

    // add new post data to db
    public function add(Request $request) {
    	$data = $request->all();

    	try {
            $id = DB::table('posts')->insertGetId(
                    array(
                        'title' => $data['title'],
                        'content' => $data['content'],
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'status' => 'active'
                        )
            );
    	} catch(\Exception $e) {
    		return response()->json(false);
    	}

    	$return = [
            'id' => $id,
    		'title' => $data['title'],
			'content' => $data['content'],
			'created_at' => date('F, d Y')
    	];

    	return response()->json($return);
    }

    public function update(Request $request) {
    	$data = $request->all();

    	try {
    		DB::table('posts')
	    	->where('id', $data['id'])
	    	->update([
	    			'title' => $data['title'],
	    			'content' => $data['content'],
	    			'updated_at' => date('Y-m-d H:i:s')
	    		]);
    	} catch(\Exception $e) {
    		return response()->json(false);
    	}

    	$return = DB::table('posts')
    				->where('id', $data['id'])->get();
    	
    	return response()->json(json_decode(json_encode($return)));

    }

    public function delete(Request $request) {
    	$id = $request->id;

    	try {
    		DB::table('posts')
    			->where('id', $id)
    			->update(['status' => 'inactive']);
    	} catch(\Exception $e) {
    		return response()->json(false);
    	}

    	return response()->json(true);
    }

    public function search(Request $request) {
    	$data = $request->all();

    	$entries = DB::table('posts')
    		->where([
    			['title', 'like', '%'.$data['value'].'%'], 
    			['status', '=', 'active']
    		])
    		->orWhere([
    			['content', 'like', '%'.$data['value'].'%'],
    			['status', '=', 'active']
    			])
    		->orderBy('created_at', 'desc')
    		->get();
    	$entries = json_decode(json_encode($entries), true);
    	$posts = [];
    	foreach($entries as $key => $entry) {
    		$posts[$key] = $entry;
    		$posts[$key]['created_at'] = date('F d, Y', strtotime($entry['created_at']));
    	}

    	return response()->json($posts);
    }

}
