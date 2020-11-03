<?php

namespace App\Exports;

use App\DetailTransaction;
use App\Trash;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionExportMonthYear implements FromView, ShouldAutoSize
{
    private $month;
    private $year;
    private $month_name;
    private $monthYearCategory;

    public function __construct($month, $year, $month_name, $monthYearCategory)
    {
        $this->month = $month;
        $this->year = $year;
        $this->month_name = $month_name;
        $this->monthYearCategory = $monthYearCategory;
    }

    public function view(): View
    {
        if($this->monthYearCategory == 'all') {
            return view('exportsMonthYear', [
                'datas' => DetailTransaction::join('transactions', function ($join) {
                    $join->on('detail_transactions.transaction_id', '=', 'transactions.id')
                    ->whereYear('transactions.date', $this->year)->whereMonth('transactions.date', $this->month)->orderBy('transactions.date','asc');
                })->get(),

                'i' => 1,
                'weightTotal' => DetailTransaction::join('transactions', function ($join) {
                    $join->on('detail_transactions.transaction_id', '=', 'transactions.id')
                    ->whereMonth('transactions.date', $this->month)->whereYear('transactions.date', $this->year);
                })->get()->sum('weight'),

                'priceTotal' => DetailTransaction::join('transactions', function ($join) {
                    $join->on('detail_transactions.transaction_id', '=', 'transactions.id')
                    ->whereMonth('transactions.date', $this->month)->whereYear('transactions.date', $this->year);
                })->get()->sum('price'),

                'month_name' => $this->month_name,
                'year' => $this->year,
                'category' => $this->monthYearCategory

                    ]);
        }
        else {
            return view('exportsMonthYear', [
                'datas' => DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                            ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
                            ->whereMonth('transactions.date', $this->month)
                            ->whereYear('transactions.date', $this->year)
                            ->where('trashes.category_id', $this->monthYearCategory)
                            ->orderBy('transactions.date', 'asc')->get(),

                'i' => 1,
                'weightTotal' => DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                            ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
                            ->whereMonth('transactions.date', $this->month)
                            ->whereYear('transactions.date', $this->year)
                            ->where('trashes.category_id', $this->monthYearCategory)
                            ->get()->sum('weight'),

                'priceTotal' => DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                            ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
                            ->whereMonth('transactions.date', $this->month)
                            ->whereYear('transactions.date', $this->year)
                            ->where('trashes.category_id', $this->monthYearCategory)
                            ->get()->sum('price'),

                'month_name' => $this->month_name,
                'year' => $this->year,
                'category' => Trash::join('categories', function ($join) {
                    $join->on('trashes.category_id', '=', 'categories.id')
                            ->where('categories.id', '=', $this->monthYearCategory);
                })->value('category_name')

            ]);
        }
    }
}
