<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use App\Services\CreateTransactionService;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $cart = [];
    public $Qty = 1;
    public $Total = 0;

    public function mount()
    {
        $this->Qty;
        $this->cart = Cart::get();
        $this->Total = $this->calculateTotal();
    }
    public function render()
    {
        $cart = Cart::get();
        return view('livewire.shopping-cart');
    }

    public function decreaseItem($id)
    {
        $qty = array_search($id, array_column($this->cart['products'], 'product_code'));
        if ($this->cart['products'][$qty]['qty'] > 1) {
            $this->cart['products'][$qty]['qty']--;
            $this->cart['products'][$qty]['total'] = $this->cart['products'][$qty]['qty'] * $this->cart['products'][$qty]['price'];
        }
        Cart::set($this->cart);
        $this->Total = $this->calculateTotal();
    }

    private function calculateTotal()
    {
        $total = 0;
        foreach ($this->cart['products'] as $product) {
            $total += $product['total'];
        }
        return $total;
    }

    public function increaseItem($id)
    {
        // dd($id);
        // search array
        $key = array_search($id, array_column($this->cart['products'], 'product_code'));
        // update qty
        $this->cart['products'][$key]['qty']++;
        // update total
        $this->cart['products'][$key]['total'] = $this->cart['products'][$key]['qty'] * $this->cart['products'][$key]['price'];
        // update session
        Cart::set($this->cart);
        // update total
        $this->Total = $this->calculateTotal();
    }

    public function removeItemCart($id)
    {
        $key = array_search($id, array_column($this->cart['products'], 'product_code'));

        if ($key !== false) {
            unset($this->cart['products'][$key]);

            // Re-index the array
            $this->cart['products'] = array_values($this->cart['products']);
        }
        Cart::set($this->cart);

        $this->Total = $this->calculateTotal();
        $this->emit('refreshCart');
    }

    public function changeQty($id, $qty)
    {
        // dd($id, $qty);
        // if qty not numeric konvert to 1
        if (!is_numeric($qty) || $qty == '') {
            $qty = 1;
        }
        $key = array_search($id, array_column($this->cart['products'], 'product_code'));
        $this->cart['products'][$key]['qty'] = $qty;
        $this->cart['products'][$key]['total'] = $this->cart['products'][$key]['qty'] * $this->cart['products'][$key]['price'];
        Cart::set($this->cart);
        $this->Total = $this->calculateTotal();
    }

    public function checkout()
    {

        $request = new Request();
        $request->replace([
            'user_id' => Auth::user()->id,
            'total_amount' => $this->Total,
            'products' => $this->cart['products']
        ]);

        // dd($request->all());
        $service = new CreateTransactionService(new TransactionRepository(new Transaction()));
        $service->create($request);
        // remove cart
        Cart::set(Cart::empty());

        return redirect()->route('product')->with([
            'alert' => [
                'message' => 'Ini adalah pesan sukses!',
                'type' => 'success',
            ],
        ]);
    }
}
