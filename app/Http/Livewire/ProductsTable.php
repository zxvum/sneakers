<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsTable extends Component
{
    public $products = [];
    public $img = "asdasdasd";

    public function mount(){
        $this->products = Product::all();
    }

    public function setImgPath($url) {
        $this->img = $url;
    }

    public function render()
    {
        return view('livewire.pages.admin.products.table')->extends('admin.app');
    }
}
