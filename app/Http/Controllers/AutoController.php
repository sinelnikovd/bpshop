<?php

namespace App\Http\Controllers;

use App\Auto;
use App\Mark;
use Illuminate\Http\Request;
use Mockery\Exception;

class AutoController extends Controller
{

    /**
     * Index auto page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($mark_id){
        $autos = Auto::where("mark_id",$mark_id)->get();

        $marks = Mark::all();

        return view("auto.index")->with(["autos"=>$autos,"marks"=>$marks]);
    }

    /**
     * Card auto page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page($id){
        $auto = Auto::find($id);
        if($auto) return view("auto.page")->with(["auto"=>$auto]);
        return redirect()->back();
    }
}
