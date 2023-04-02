<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use App\Services\ReportService;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function report()
    {
        $datareport = new ReportService(new TransactionRepository(new Transaction()));
        $reports =  $datareport->getReport();


        return view('Report.index', compact('reports'));
    }
}
