<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\Product as ModelsProduct;
use App\Repositories\ProductRepository;
use Livewire\Component;
use Livewire\WithPagination;


class Product extends Component
{

    use WithPagination;
    public $cari;
    protected $queryString = ['cari'];
    public function render()
    {
        // dd($this->cari);
        $productRepository = new ProductRepository(new ModelsProduct());
        $products = $productRepository->getAllProducts();
        return view('livewire.product', ['products' => $this->cari === null ? $products : ModelsProduct::where('product_name', 'like', '%' . $this->cari . '%')->paginate(10)]);
    }

    public function updatingSearchInput(): void
    {
        $this->resetPage();
    }

    public function addToCart($productId)
    {
        // dd(strval($productId));
        // dd(ModelsProduct::where('product_code', $productId));
        $productRepository = new ProductRepository(new ModelsProduct());
        $products = $productRepository->showBy('product_code', $productId);
        // dd($products);
        $message = Cart::add($products);
        // dd($message);
        $this->emit('cartAdded');
        if ($message === 'product exists') {
            $this->emit('showAlert', 'Produk sudah ada di keranjang!', 'warning');
        } else {
            $this->emit('showAlert', 'Produk berhasil di masukkan ke keranjang', 'success');
        }
    }
}
