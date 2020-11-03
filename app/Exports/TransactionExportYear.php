<?php

namespace App\Exports;

use App\DetailTransaction;
use App\Trash;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionExportYear implements FromView, ShouldAutoSize
{
    private $yearLaporan;
    private $yearCategory;

    public function __construct($yearLaporan, $yearCategory)
    {
        $this->yearLaporan = $yearLaporan;
        $this->yearCategory = $yearCategory;
    }

    public function view(): View
    {
        if($this->yearCategory == 'all') {
            return view('exportsYear', [
                'datas' => DetailTransaction::join('transactions', function ($join) {
                    $join->on('detail_transactions.transaction_id', '=', 'transactions.id')
                    ->whereYear('transactions.date', $this->yearLaporan)->orderBy('transactions.date','asc');
                })->get(),

                'i' => 1,
                'weightTotal' => DetailTransaction::join('transactions', function ($join) {
                    $join->on('detail_transactions.transaction_id', '=', 'transactions.id')
                    ->whereYear('transactions.date', $this->yearLaporan);
                })->get()->sum('weight'),


                'priceTotal' => DetailTransaction::join('transactions', function ($join) {
                    $join->on('detail_transactions.transaction_id', '=', 'transactions.id')
                    ->whereYear('transactions.date', $this->yearLaporan);
                })->get()->sum('price'),


                'year' => $this->yearLaporan,
                'category' => $this->yearCategory
            ]);
        }
        else {
            return view('exportsYear', [
                'datas' => DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
                ->whereYear('transactions.date', $this->yearLaporan)
                ->where('trashes.category_id', $this->yearCategory)
                ->orderBy('transactions.date', 'asc')->get(),

                'i' => 1,
                'weightTotal' => DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
                ->whereYear('transactions.date', $this->yearLaporan)
                ->where('trashes.category_id', $this->yearCategory)
                ->get()->sum('weight'),

                'priceTotal' => DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
                ->whereYear('transactions.date', $this->yearLaporan)
                ->where('trashes.category_id', $this->yearCategory)
                ->get()->sum('price'),

                'year' => $this->yearLaporan,
                'category' => Trash::join('categories', function ($join) {
                    $join->on('trashes.category_id', '=', 'categories.id')
                            ->where('categories.id', '=', $this->yearCategory);
                })->value('category_name')

                ]);
        }
    }
}
