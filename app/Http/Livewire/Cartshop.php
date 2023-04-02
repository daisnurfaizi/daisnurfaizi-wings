<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class Cartshop extends Component
{
    public $cartTotal;
    protected $listeners = ['cartAdded' => 'mount', 'refreshCart' => '$refresh'];

    public function mount()
    {
        $this->cartTotal = count(Cart::get()['products']);
    }

    public function refreshCart()
    {
        $this->emit('refreshCart');
    }

    public function render()
    {
        return view('livewire.cartshop');
    }
}
