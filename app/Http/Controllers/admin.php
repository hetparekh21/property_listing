<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class admin extends Controller
{
    public function get_category(Request $req)
    {

        // if request has category id then proceed else throw error
        if ($req->has('category_id')) {

            // get category id from request
            $category_id = $req->input('category_id');

            // get category from database
            $category = category::where('category_id', $category_id)->get(['category_id','category_name','tags'])->toarray();

            // check if category exists
            if ($category) {

                // return category
                return response()->json($category);
            } else {

                // return error
                return response()->json([
                    'status' => false,
                    'message' => 'Category id not found'
                ]);
            }
        } else {

            // return error
            return response()->json([
                'status' => false,
                'message' => 'Category id required'
            ]);
        }
    }

    public function get_category_img(Request $req){

        // get category id from request
        $category_id = $req->input('category_id');

        // get category img from database
        $category_img = category::where('category_id', $category_id)->get('img')->toarray();
        return json_encode(base64_encode($category_img[0]['img']));
        // dd($category_img);

    }

}
