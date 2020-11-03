<?php

namespace App\Exports;

use App\DetailTransaction;
use App\Trash;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionExportRange implements FromView, ShouldAutoSize
{
    private $dateFrom;
    private $dateTo;
    private $rangeCategory;

    public function __construct($dateFrom, $dateTo, $rangeCategory)
    {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        $this->rangeCategory = $rangeCategory;
    }

    public function view(): View
    {
        if($this->rangeCategory == 'all') {
            return view('exportsRange', [
                'datas' => DetailTransaction::join('transactions', function ($join) {
                            $join->on('detail_transactions.transaction_id', '=', 'transactions.id')
                            ->whereBetween('transactions.date', [$this->dateFrom, $this->dateTo])->orderBy('transactions.date','asc');
                        })->get(),

                'i' => 1,
                'weightTotal' =>  DetailTransaction::join('transactions', function ($join) {
                    $join->on('detail_transactions.transaction_id', '=', 'transactions.id')
                    ->whereBetween('transactions.date', [$this->dateFrom, $this->dateTo]);
                })->get()->sum('weight'),

                'priceTotal' => DetailTransaction::join('transactions', function ($join) {
                    $join->on('detail_transactions.transaction_id', '=', 'transactions.id')
                    ->whereBetween('transactions.date', [$this->dateFrom, $this->dateTo]);
                })->get()->sum('price'),

                'dateFrom' => $this->dateFrom,
                'dateTo' => $this->dateTo,
                'category' => $this->rangeCategory
            ]);
        }
        else {
            return view('exportsRange', [
                'datas' => DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
                ->whereBetween('date', [$this->dateFrom, $this->dateTo])
                ->where('trashes.category_id', $this->rangeCategory)
                ->orderBy('transactions.date', 'asc')->get(),

                'i' => 1,
                'weightTotal' => DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
                ->whereBetween('date', [$this->dateFrom, $this->dateTo])
                ->where('trashes.category_id', $this->rangeCategory)
                ->get()->sum('weight'),

                'priceTotal' => DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
                ->whereBetween('date', [$this->dateFrom, $this->dateTo])
                ->where('trashes.category_id', $this->rangeCategory)
                ->get()->sum('price'),

                'dateFrom' => $this->dateFrom,
                'dateTo' => $this->dateTo,
                'category' => Trash::join('categories', function ($join) {
                    $join->on('trashes.category_id', '=', 'categories.id')
                            ->where('categories.id', '=', $this->rangeCategory);
                })->value('category_name')
            ]);
        }
    }
}
