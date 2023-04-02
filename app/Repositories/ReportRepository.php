<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class ReportRepository extends BaseRepository
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    public function Report()
    {
        $this->model::select('transactions.document_code', 'users.name', 'transactions.total_amount', 'discount', 'total_amount', 'quantity')
            ->join('transaction_details', 'transactions.document_code', '=', 'transaction_details.document_code')
            ->join('products', 'transaction_details.product_code', '=', 'products.product_code')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->get();
    }
}
