<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    public function getProducts(Request $request){
        $products = json_decode($request->input('products'));
        $array = new Collection();
        foreach ($products as $product) {
            $item = Product::find($product);
            $array->push($item);
        }
        return response()->json($array);
    }
}
