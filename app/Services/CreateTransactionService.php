<?php

namespace App\Services;

use App\Builder\TransactionBuilder;
use App\Builder\TransactionDetailBuilder;
use App\Facades\Cart;
use App\Models\TransactionDetail;
use App\Repositories\TransactionDetailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateTransactionService
{
    protected $repository;
    private $transactionDetail;
    public function __construct($Repository)
    {
        $this->repository = $Repository;
        $this->transactionDetail = new TransactionDetailRepository(new TransactionDetail());
    }

    public function create(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $transaction_code = $this->repository->generateTransactionCode();
            // dd($transaction_code);
            $transactionHeader = (new TransactionBuilder)
                ->setDocument_code($transaction_code)
                ->setUser_id($request->user_id)
                ->setTotal_amount($request->total_amount)
                ->build();
            $transaction = $this->repository->createTransaction($transactionHeader);
            foreach ($request->products as $product) {
                $transactionDetaiBuilder = (new TransactionDetailBuilder)
                    ->setDocument_code($transaction_code)
                    ->setProduct_code($product['product_code'])
                    ->setPrice($product['price'])
                    ->setDiscount($product['discount'])
                    ->setTotal_amount($product['total'])
                    ->setQuantity($product['qty'])
                    ->build();
                $this->transactionDetail->createTransactionDetail($transactionDetaiBuilder);
            }
            DB::commit();
            Cart::empty();
            return 'success';
        } catch (\Exception $e) {
            DB::rollBack();

            throw new \Exception($e->getMessage());
        }
    }
}
