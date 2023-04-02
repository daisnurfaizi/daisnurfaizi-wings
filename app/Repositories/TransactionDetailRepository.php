<?php

namespace App\Repositories;

use App\Entity\TransactionDetailEntity;
use App\Repositories\BaseRepository;

class TransactionDetailRepository extends BaseRepository
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    public function createTransactionDetail(TransactionDetailEntity $transaction)
    {
        $dataTransaction = [
            'document_code' => $transaction->getDocument_code(),
            'product_code' => $transaction->getProduct_code(),
            'price' => $transaction->getPrice(),
            'discount' => $transaction->getDiscount(),
            'total_amount' => $transaction->getTotal_amount(),
            'quantity' => $transaction->getQuantity(),
        ];

        $this->model->create($dataTransaction);
    }

    public function getTransactionDetail(TransactionDetailEntity $transaction)
    {
        return $this->model::select('products.product_name', 'transaction_details.quantity')
            ->join('products', 'transaction_details.product_code', '=', 'products.product_code')
            ->where('transaction_details.document_code', $transaction->getDocument_code())
            ->get();
    }
}
