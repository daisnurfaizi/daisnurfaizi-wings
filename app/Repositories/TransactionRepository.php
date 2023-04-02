<?php

namespace App\Repositories;

use App\Entity\TransactionEntity;
use App\Repositories\BaseRepository;

class TransactionRepository extends BaseRepository
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    public function generateTransactionCode()
    {

        $product_code = "TRX-" . date('dmhis');
        return $product_code;
    }

    public function createTransaction(TransactionEntity $transaction)
    {
        $dataTransaction = [
            'document_code' => $transaction->getDocument_code(),
            'user_id' => $transaction->getUser_id(),
            'total_amount' => $transaction->getTotal_amount(),
        ];

        $this->model->create($dataTransaction);
    }
}
