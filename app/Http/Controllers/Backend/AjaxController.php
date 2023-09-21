<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getSubcategory($id){
        $subcats = Subcategory::where('status', 1)->where('category_id', $id)->orderBy('name', 'ASC')->get();
        return json_encode($subcats);
    }

    public function getCities($id){
        $cities = City::where('state_id', $id)->orderBy('name', 'ASC')->get();
        return json_encode($cities);
    }
}
