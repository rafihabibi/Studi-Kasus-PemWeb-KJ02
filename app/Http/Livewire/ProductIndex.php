<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{

   use WithPagination;

    public $search;

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
       $this->resetPage(); 
    }

    public function render()
    {
        if($this->search){
        $products = Product::where('nama', 'like', '%'.$this->search. '%')->paginate(8);
        }else {
            $products = Product::all();
        }
        return view('livewire.product-index',[
            'products'  => $products,
            'title'     => 'List All Product'
        ]);
    }
}
