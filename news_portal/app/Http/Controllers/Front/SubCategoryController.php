<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\SubCategory;
use App\Models\Post;

class SubCategoryController extends Controller
{
    
    public function index($id) {

        $sub_category_data = SubCategory::where('id', $id)->first();

        $post_data = Post::where('sub_category_id', $id)->orderBy('id', 'desc')->paginate(6);

        return view('front.sub_category', compact('sub_category_data', 'post_data'));

    }

}
