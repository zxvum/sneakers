<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsCreate extends Component
{
    public $img;
    public $name;
    public $price;

    protected $rules = [
        'img' => ['required', 'file'],
        'name' => ['required', 'string'],
        'price' => ['required', 'number']
    ];

    public function submit(){
        $this->validate();

        Product::create([
            'img_path' => $this->img,
            'name' => $this->name,
            'price' => $this->price
        ]);

        return to_route('admin.products.table');
    }

    public function render()
    {
        return view('livewire.pages.admin.products.create')->extends('admin.app');
    }
}
