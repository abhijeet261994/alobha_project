<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductController extends Controller
{
    public function index() {
        $products = Product::get();
        return view('index',compact('products'));
    }
    public function addProduct(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'product_name' => 'required',
                'brand' => 'required',
                'category' => 'required',
                'sub_category' => 'required',
                'variant' => 'required|array',
                'color' => 'required|array',
                'size' => 'required|array',
                'quantity' => 'required|array',
                'price' => 'required|array',
                'discount' => 'required|array',
                'selling_price' => 'required|array',
            ]);
            
            if ($validator->fails()) {
                // Handle validation errors
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $input = $request->all();
    
            $product = Product::create([
                "product_name" => $input["product_name"],
                "brand" => $input["brand"],
                "category" => $input["category"],
                "sub_category" => $input["sub_category"],
            ]);
            if ($product) {
                ProductVariant::addVariant($input,$product->id);
            }
            return redirect("/");
        }
        return view('addProduct');
    }

    public function editProduct(Request $request,$id)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'product_name' => 'required',
                'brand' => 'required',
                'category' => 'required',
                'sub_category' => 'required',
                'variant' => 'required|array',
                'color' => 'required|array',
                'size' => 'required|array',
                'quantity' => 'required|array',
                'price' => 'required|array',
                'discount' => 'required|array',
                'selling_price' => 'required|array',
            ]);
            
            if ($validator->fails()) {
                // Handle validation errors
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $input = $request->all();
            Product::updateProduct($input,$id);
            return redirect('/');
        }
        $product = Product::find($id);
        $variants = $product->variants;
        return view('editProduct',compact('product'));
        // dd($product);
    }
    
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->variants()->delete();
            $product->delete();
        }
        return redirect('/');
    }   

}
