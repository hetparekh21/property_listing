<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\prop_img;
use App\Models\properties;

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
            $category->img = $req->file('img');
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

            if ($req->file('img') !== null) {
                echo 'file';
                $category->img = $req->file('img');
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

    public function get_property(Request $req)
    {

        if ($req->has('property_id')) {

            // get property id from request
            $property_id = $req->input('property_id');

            // get property from database
            $property = properties::where('property_id', $property_id)->get(['category_category_id', 'property_id', 'property_name', 'tags', 'description', 'location', 'price'])->toarray();

            // check if property exists
            if ($property) {

                // return property
                return response()->json($property);
            } else {

                // return error
                return response()->json([
                    'status' => false,
                    'message' => 'Property id not found'
                ]);
            }
        } else {

            // return error
            return response()->json([
                'status' => false,
                'message' => 'Property id required'
            ]);
        }
    }

    public function manage_property(Request $req)
    {

        if ($req->input('sub') == 'add_property') {

            $req->validate([
                'mp_property_name' => 'required',
                'mp_category' => 'required',
                'mp_description' => 'required',
                'mp_location' => 'required',
                'mp_price' => 'required',
                'mp_property_image' => 'required | mimes:jpeg,bmp,png'
            ]);

            $tags = $_POST['tags'];

            $tags_to_insert = '';

            foreach ($tags as $key => $value) {
                $tags_to_insert .= $value . ',';
            }

            $tags_to_insert = rtrim($tags_to_insert, ',');

            // echo $req->file('image')->store('uploads'); ;

            $property = new properties();
            $property->property_name = $req->input('mp_property_name');
            $property->category_category_id = $req->input('mp_category');
            $property->tags = $tags_to_insert;
            $property->description = $req->input('mp_description');
            $property->location = $req->input('mp_location');
            $property->price = $req->input('mp_price');
            $property->save();

            // $req->file('image')->store('uploads');

            $prom_img = new prop_img();
            $prom_img->img = $req->file('image');
            $prom_img->property()->associate($property);
            $prom_img->save();

            return redirect()->route('admin.dashboard');
        } elseif ($req->input('sub') == 'edit_property') {

            $req->validate([
                'mp_property_name' => 'required',
                'mp_category' => 'required',
                'mp_description' => 'required',
                'mp_location' => 'required',
                'mp_price' => 'required',
            ]);

            $tags = $_POST['tags'];

            $tags_to_insert = '';

            foreach ($tags as $key => $value) {
                $tags_to_insert .= $value . ',';
            }

            $tags_to_insert = rtrim($tags_to_insert, ',');

            $property = properties::where('property_id', $req->input('mp_property'))->first();
            $property->property_name = $req->input('mp_property_name');
            $property->category_category_id = $req->input('mp_category');
            $property->tags = $tags_to_insert;
            $property->description = $req->input('mp_description');
            $property->location = $req->input('mp_location');
            $property->price = $req->input('mp_price');

            if ($req->file('mp_property_image') !== null) {

                $file = $req->file('mp_property_image')->store('uploads');

                $prop_img = prop_img::where('property_property_id', $req->input('mp_property'))->first();
                // $prop_img->img = file_get_contents();
                // $file->hashName();
            }
            // echo 'lol';
            // $property->save();

            // return redirect()->route('admin.dashboard');
        } elseif ($req->input('sub') == 'delete_property') {


            $property_id = $req->input('mp_property');

            prop_img::where('property_property_id', $property_id)->delete();

            $property = properties::where('property_id', $property_id)->first();
            $property->delete();

            return redirect()->route('admin.dashboard');
        }
    }
}
