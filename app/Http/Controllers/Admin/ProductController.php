<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewTable(){
        $products = Product::all();
        return view('admin.products.table', ['products' => $products]);
    }

    public function viewEdit($id){
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('product_not_found', 'Товар не был найден.');
        }

        return view('admin.products.edit', ['product' => $product]);
    }

    public function editPost($id, Request $request) {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('product_not_found', 'Товар не был найден.');
        }

        $request->validate([
        ]);
    }
}
