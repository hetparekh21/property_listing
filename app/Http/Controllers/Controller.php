<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\properties;
use App\Models\category;


class Controller extends BaseController
{

    public function index(Request $req)
    {
        // session()->flash('results', true);
        // session()->flush();
        if ($req->isMethod('post')) {

            // if the request is from search form
            if ($req->input('query') != null) {

                $this->clear();

                $query = $req->input('query', '');
                Controller::maintain_session_query($query);
                $category = $req->input('category');
                Controller::maintain_session_category($category);

                $selected_category = 0;
                $selected_categories = session()->get('selected_categories');
                $categories = controller::get_categories();
                $selectable_categories = array();

                if ($category != null && $category != '0') {

                    // if the category is selected_category filter with category
                    $selected_category = $category;
                    // $properties = properties::where('tags', 'LIKE', "%$query%")->where('category_id', '=', $category)->get('*')->toarray();

                    $properties = Controller::get_properties(null, $query, $selected_category)->paginate(12);
                } else {
                    // show all categories if no category selected_category
                    Controller::maintain_session_category(0);
                    if (empty($selected_categories)) {

                        $array = Controller::get_properties(null, $query, null);
                        $properties = $array[0]->paginate(12);
                        $selectable_categories = $array[1];
                    } else {

                        // $properties = properties::where('tags', 'LIKE', "%$query%")->wherein('category_id', $selected_categories)->get('*')->toarray();

                        $array = Controller::get_properties($selected_categories, $query, null);
                        $properties = $array[0]->paginate(12);
                        $selectable_categories = $array[1];
                    }
                }

                if (Auth::check() && Auth::user()->id == 1) {

                    return view('admin.admin_dashboard', compact('selectable_categories', 'categories', 'properties', 'selected_category', 'query', 'selected_categories'));
                } else {
                    return view('index', compact('selectable_categories', 'categories', 'properties', 'selected_category', 'query', 'selected_categories'));
                }

                // return view('index', compact('selectable_categories', 'categories', 'properties', 'selected_category', 'query', 'selected_categories'));
                // Controller::sort_return($selectable_categories, $categories, $properties, $selected_category, $query, $selected_categories);
            } else {

                Controller::maintain_session_query('');
                return redirect()->back();
            }
        } else {

            // if method is get

            $categories = controller::get_categories();

            $query = session()->get('query');
            $selected_category = session()->get('selected_category');
            $selected_categories = session()->get('selected_categories');
            $selectable_categories = array();



            if ($selected_category != null && $selected_category != '0') {

                $properties = Controller::get_properties(null, $query, $selected_category)->paginate(12);
            } else {

                if (empty($selected_categories)) {

                    // $properties = properties::where('tags', 'LIKE', "%$query%")->get('*')->toarray();

                    $array = Controller::get_properties(null, $query, null);
                    $properties = $array[0]->paginate(12);
                    $selectable_categories = $array[1];
                } else {

                    // $properties = properties::where('tags', 'LIKE', "%$query%")->wherein('category_id', $selected_categories)->get('*')->toarray();

                    $array = Controller::get_properties($selected_categories, $query, null);
                    $properties = $array[0]->paginate(12);
                    $selectable_categories = $array[1];
                }
            }


            if (Auth::check() && Auth::user()->id == 1) {

                return view('admin.admin_dashboard', compact('selectable_categories', 'categories', 'properties', 'selected_category', 'query', 'selected_categories'));
            } else {
                // echo Auth::user()->id == 1 ? 'logged in':'no';
                // print_r($selectable_categories);
                return view('index', compact('selectable_categories', 'categories', 'properties', 'selected_category', 'query', 'selected_categories'));
            }

            // return view('index', compact('links', 'selectable_categories', 'categories', 'properties', 'selected_category', 'query', 'selected_categories'));
            // Controller::sort_return($selectable_categories, $categories, $properties, $selected_category, $query, $selected_categories);
        }
    }

    public function add_to_session($category_id)
    {
        $selected_categories = session('selected_categories');

        array_push($selected_categories, $category_id);

        session(['selected_categories' => $selected_categories]);

        return redirect()->route('index');
    }

    public function remove_from_session($category_id)
    {
        $selected_categories = session('selected_categories');

        $key = array_search($category_id, $selected_categories);

        unset($selected_categories[$key]);

        session(['selected_categories' => $selected_categories]);

        return redirect()->route('index');
    }

    private static function get_categories()
    {

        $categories = category::all()->toArray();

        return $categories;
    }

    private static function get_properties($selected_categories = array(), string $query = '', $selected_category = 0)
    {
        if ($selected_category != null || $selected_category != 0) {

            // $properties = properties::where('tags', 'LIKE', "%$query%")->where('category_id', '=', $selected_category)->get('*');
            $properties = properties::join('prop_img', 'prop_img.property_property_id', 'properties.property_id')->where('tags', 'LIKE', "%$query%")->where('category_category_id', '=', $selected_category)->get(['properties.*', 'prop_img.img']);
        } else {

            if (empty($selected_categories)) {

                $properties = properties::join('prop_img', 'prop_img.property_property_id', 'properties.property_id')->where('tags', 'LIKE', "%$query%")->get(['properties.*', 'prop_img.img']);

                $categories = category::wherein('category.category_id', function ($q) use ($query) {
                    $q->select('category.category_id')->from(with(new properties)->getTable())->join('category', 'category.category_id', 'properties.category_category_id')->whereraw("properties.tags LIKE '%" . $query . "%' OR category.tags LIKE '%" . $query . "%'")->groupby('category.category_id');
                })->get(['category.category_id', 'category.category_name', 'category.img']);

                return array($properties, $categories);
            } else {

                $properties = properties::join('prop_img', 'prop_img.property_property_id', 'properties.property_id')->where('tags', 'LIKE', "%$query%")->wherein('category_category_id', $selected_categories)->get(['properties.*', 'prop_img.img']);

                $categories = category::wherein('category.category_id', function ($q) use ($query) {
                    $q->select('category.category_id')->from(with(new properties)->getTable())->join('category', 'category.category_id', 'properties.category_category_id')->whereraw("properties.tags LIKE '%" . $query . "%' OR category.tags LIKE '%" . $query . "%'")->groupby('category.category_id');
                })->get(['category.category_id', 'category.category_name', 'category.img']);

                return array($properties, $categories);
            }
        }

        return $properties;
    }

    private static function maintain_session_query($query)
    {

        session(['query' => $query]);
    }

    private static function maintain_session_selected_category($category_id, bool $remove = false)
    {

        $selected_categories = session('selected_categories');

        if ($remove) {
            $key = array_search($category_id, $selected_categories);
            unset($selected_categories[$key]);
        } else {
            array_push($selected_categories, $category_id);
        }

        session(['selected_categories' => $selected_categories]);
    }

    private static function maintain_session_category($selected_category)
    {

        session(['selected_category' => $selected_category]);
    }

    public static function clear()
    {

        session()->put('selected_categories', []);
        session()->put('query', '');
        session()->put('selected_category', 0);

        return redirect()->route('index');
    }

    private static function sort_return($selectable_categories, $categories, $properties, $selected_category, $query, $selected_categories)
    {

        if (Auth::check() && Auth::user()->id == 1) {

            return view('admin.admin_dashboard', compact('selectable_categories', 'categories', 'properties', 'selected_category', 'query', 'selected_categories'));
        } else {
            // print_r($selectable_categories);
            return view('index', compact('selectable_categories', 'categories', 'properties', 'selected_category', 'query', 'selected_categories'));
        }
    }
}
