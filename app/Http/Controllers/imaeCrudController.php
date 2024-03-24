<?php

namespace App\Http\Controllers;

use App\Models\imagecrud;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class imaeCrudController extends Controller
{
    public function allProducts(){
        $products = imagecrud::all();
        return view("products",compact("products"));
    }
    public function add_new_product(){
        return view("add-product");
    }
    public function storeProduct(Request $rq){
        $this->validate($rq,[
            "product_name"=>"required",
            "product_image"=>"required|image|mimes:jpeg,png,jpg"
        ]);
        $imageName = "";

        if($image = $rq->file("product_image")){
            $imageName = time()."-".uniqid().".".$image->getClientOriginalExtension();
            $image->move("product/image", $imageName);
        };
        imagecrud::create([
            "name"=>$rq->product_name,
            "image"=>$imageName,
        ]);
        session()->flash('msg', 'Product added successfully');

        return redirect()->route("products");
    }
}