<?php

namespace App\Exports;

use App\DetailTransaction;
use App\Trash;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionExportAll implements FromView, ShouldAutoSize
{
    private $allCategory;

    public function __construct($allCategory)
    {
        $this->allCategory = $allCategory;
    }

    public function view(): View
    {
        if($this->allCategory == 'all') {
            return view('exportsAll', [
                'datas' => DetailTransaction::join('transactions', function ($join) {
                    $join->on('detail_transactions.transaction_id', '=', 'transactions.id')
                    ->orderBy('transactions.date','asc');
                })->get(),
                'i' => 1,
                'weightTotal' => DetailTransaction::all()->sum('weight'),
                'priceTotal' => DetailTransaction::all()->sum('price'),
                'tamp' => 0,
                'category' => $this->allCategory
            ]);
        }
        else {
            return view('exportsAll', [
                'datas' => DetailTransaction::join('trashes', function ($join) {
                                $join->on('detail_transactions.trash_id', '=', 'trashes.id')
                                    ->where('trashes.category_id', '=', $this->allCategory);
                            })->get(),
                'i' => 1,
                'weightTotal' => DetailTransaction::join('trashes', function ($join) {
                                    $join->on('detail_transactions.trash_id', '=', 'trashes.id')
                                        ->where('trashes.category_id', '=', $this->allCategory);
                                })->get()->sum('weight'),

                'priceTotal' => DetailTransaction::join('trashes', function ($join) {
                                    $join->on('detail_transactions.trash_id', '=', 'trashes.id')
                                        ->where('trashes.category_id', '=', $this->allCategory);
                                })->get()->sum('price'),
                'tamp' => 0,
                'category' => Trash::join('categories', function ($join) {
                            $join->on('trashes.category_id', '=', 'categories.id')
                            ->where('categories.id', '=', $this->allCategory);
                })->value('category_name')
            ]);
        }
    }
}
