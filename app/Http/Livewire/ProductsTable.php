<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsTable extends Component
{
    public $products = [];
    public $img = "";

    public function mount(){
        $this->products = Product::all();
    }

    public function setImgPath($url) {
        $this->img = $url;
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.pages.admin.products.table')
            ->extends('admin.app');
    }
}
