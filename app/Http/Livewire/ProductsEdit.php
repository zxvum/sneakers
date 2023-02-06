<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsEdit extends Component
{
    public $product = null;

    // form
    public $file;
    public $name;
    public $price;

    protected $rules = [
        'file' => ['required', 'file'],
        'name' => ['required', 'string'],
        'price' => ['required', 'integer']
    ];

    public function mount($id){
        $this->product = Product::find($id);
        if (!$this->product) {
            to_route('admin.not-found')->with('redirect', route('admin.products.table'));
        }
    }

    public function submit(){
        $this->validate();

        $product = Product::find($this->product->id);
        $product->edit([
            'name' => $this->name,
            'price' => $this->price
        ]);

        return to_route('admin.products.table')->with('success', 'Товар успешно изменен!');
    }

    public function render()
    {
        return view('livewire.pages.admin.products.edit')->extends('admin.app');
    }
}
