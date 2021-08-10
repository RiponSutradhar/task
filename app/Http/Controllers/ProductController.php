<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct ( Request $request) {
        $product_name = $request->product_name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $product = new  Product();

        $product->product_name = $product_name;
        $product->product_image =$imageName;
        $product->save();

        return back()->with('Product_Added', "Product record has been inserted");

    }

    public function delete ( $id) {
        $product= Product::find($id);
        $product->delete();

        return back()->with('Product_deleted', "Product record has been deleted");

    }
}
