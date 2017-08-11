<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Manufacturer;

use App\Page;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    /**
     * Index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        return view("index")->with(["marks"=>Mark::all(), "products"=>Product::limit(8)->get()]);
    }

    /**
     * Page page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page($slug){
        $page = Page::where('slug', $slug)->first();
        return view("page")->with(["page"=>$page]);
    }
}
