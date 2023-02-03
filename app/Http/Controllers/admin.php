<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Contracts\Session\Session;

class admin extends Controller
{
    public function get_category(Request $req)
    {

        // if request has category id then proceed else throw error
        if ($req->has('category_id')) {

            // get category id from request
            $category_id = $req->input('category_id');

            // get category from database
            $category = category::where('category_id', $category_id)->get(['category_id', 'category_name', 'tags'])->toarray();

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

    public function get_category_img(Request $req)
    {

        // get category id from request
        $category_id = $req->input('category_id');

        // get category img from database
        $category_img = category::where('category_id', $category_id)->get('img')->toarray();
        return json_encode(base64_encode($category_img[0]['img']));
        // dd($category_img);

    }

    public function manage_category(Request $req)
    {

        if ($req->input('sub') == 'add_category') {

            $req->validate([
                'mc_category_name' => 'required',
                'img' => 'required'
            ]);

            $tags = $_POST['tags'];

            $tags_to_insert = '';

            foreach ($tags as $key => $value) {
                $tags_to_insert .= $value . ',';
            }

            $tags_to_insert = rtrim($tags_to_insert, ',');

            $category = new category();
            $category->category_name = $req->input('mc_category_name');
            $category->tags = $tags_to_insert;
            $category->img = $req->input('img');
            $category->save();

            return redirect()->route('admin.dashboard');
        } elseif ($req->input('sub') == 'edit_category') {

            $req->validate([
                'mc_category_name' => 'required',
            ]);

            $tags = $_POST['tags'];

            $tags_to_insert = '';

            foreach ($tags as $key => $value) {
                $tags_to_insert .= $value . ',';
            }

            $tags_to_insert = rtrim($tags_to_insert, ',');

            $category = category::where('category_id', $req->input('mc_category'))->first();
            $category->category_name = $req->input('mc_category_name');
            $category->tags = $tags_to_insert;

            if ($req->input('img') !== null) {

                $category->img = $req->input('img');
            }


            $category->save();

            return redirect()->route('admin.dashboard');
        } elseif ($req->input('sub') == 'delete_category') {

            try {
                $category = category::where('category_id', $req->input('mc_category'))->first();
                $category->delete();
            } catch (\Throwable $th) {
                $value = 'Category cannot be deleted as it is being used by some products';
                Session()->flash('delete', $value);
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('admin.dashboard');

        }
    }
}
