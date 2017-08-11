<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Categorie;
use App\Manufacturer;
use App\Mark;
use App\Auto;
use App\Order;
use App\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Card product page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page($id){
        $product = Product::find($id);
        if($product) return view("product.page")->with(["product"=>$product]);
        return redirect()->back();
    }
    /**
     * Shop page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function shop(){

        $products = Product::where(function($q){
            if(Input::get('man')) {
                $q->whereIn("manufacturer_id", Input::get('man'));
            }
            if(Input::get('cat')) {
                $q->
                whereIn("categorie_id", Input::get('cat'));
            }
            if(Input::get('aut')) {
                $q->
                whereIn("auto_id", Input::get('aut'));
            }
        })->paginate(15);

        return view("product.shop")->with(["categories"=>Categorie::all(), "manufacturers"=>Manufacturer::all(), "autos"=>Auto::all(),  "products"=> $products, "mans"=>Input::get('man'), "cats"=>Input::get('cat'), "auts"=>Input::get('aut') ]);
    }


    /**
     * Add to basket
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addcart(Request $request){
        $basket = Basket::firstOrNew([
            "user_id" => $request->user()->id,
            "product_id" => $request->id
        ]);
        $basket['count'] += 1;
        $basket->save();
        Session::flash('addcart', 'OK');
        return redirect()->back();
    }


    /**
     * Basket page
     * @return $this
     */
    public function basket(){
        $baskets = Basket::where('user_id', Auth::id())->get();
        return view('product.basket')->with(["baskets" => $baskets]);
    }


    /**
     * Remove product cart
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removecart(Request $request){
        Basket::where([
            "user_id" => $request->user()->id,
            "product_id" => $request->id
        ])->delete();
        return redirect()->back();
    }

    /**
     * Add to order
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addorder(){
        $baskets = Basket::where('user_id', Auth::id())->get();
        if(!$baskets->isEmpty()){
            foreach($baskets as $basket){
                Order::create([
                    "user_id" => Auth::id(),
                    "product_id" => $basket->product->id,
                    "count" => $basket->count,
                    "price" => $basket->product->price * $basket->count,
                ]);
            }
        }
        Basket::where([
            "user_id" => Auth::id(),
        ])->delete();
        $orders = Order::where('user_id', Auth::id())->get();
        return view('product.order')->with(["orders" => $orders]);
    }

    /**
     * Order page
     * @return $this
     */
    public function order(){
        $orders = Order::where('user_id', Auth::id())->get();
        return view('product.order')->with(["orders" => $orders]);
    }
}
