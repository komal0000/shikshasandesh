<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('admin.Product.index', compact('products'));
    }
    public function add(Request $request)
    {
        if ($request->getMethod() == "POST") {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->rate = $request->rate;
            $product->image = $request->image->store('upload/product');
            $product->save();
            return redirect()->back()->with('message', 'Successfully Added');
        } else {
            return view('admin.Product.add');
        }
    }
    public function edit(Request $request, product $product)
    {
        if ($request->getMethod() == "POST") {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->rate = $request->rate;
            if ($request->hasfile('image')) {
                $product->image = $request->image->store('upload/product');
            }
            $product->save();
            return redirect()->back()->with('message', 'Successfully Added');
        } else {
            return view('admin.Product.edit',compact('product'));
        }
    }
    public function del(Request $request, product $product)
    {
        $product->delete();
        return redirect()->back()->with('message', 'Sucessfully Deleted');
    }
}
