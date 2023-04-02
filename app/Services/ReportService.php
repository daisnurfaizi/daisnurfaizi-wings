<?php

namespace App\Services;

use App\Builder\TransactionDetailBuilder;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\User;
use App\Repositories\ProductRepository;
use App\Repositories\TransactionDetailRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;

class ReportService
{
    protected $repository;
    private $dataTransaksiDetail;
    private $dataUser;
    private $dataProduct;
    public function __construct($Repository)
    {
        $this->repository = $Repository;
        $this->dataTransaksiDetail = new TransactionDetailRepository(new TransactionDetail());
        $this->dataUser = new UserRepository(new User());
        $this->dataProduct = new ProductRepository(new Product());
    }

    public function getReport()
    {
        $dataTransaksi = $this->repository->all();

        $datareport = [];
        $dataProducts = [];
        foreach ($dataTransaksi as $transaksi) {
            // dd($transaksi->user_id);
            $dataUser = $this->dataUser->find($transaksi->user_id);
            // dd($dataUser->name);
            $transaksiDetailBuilder = (new TransactionDetailBuilder)
                ->setDocument_code($transaksi->document_code)
                ->build();
            $dataTransaksiDetail = $this->dataTransaksiDetail->getTransactionDetail($transaksiDetailBuilder);

            $datareport[] = [
                'document_code' => $transaksi->document_code,
                'user_name' => $dataUser->name,
                'total_amount' => $transaksi->total_amount,
                // date format 2021-jan-01
                'date' => Carbon::parse($transaksi->created_at)->format('d-M-Y'),
                'transaction_detail' => $dataTransaksiDetail,
            ];
        }
        return $datareport;
    }
}
