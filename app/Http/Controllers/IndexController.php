<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Transaction;
use App\Trash;
use App\DetailTransaction;
use App\Category;
use Carbon\Carbon;
use Charts;

session_start();

class IndexController extends Controller
{
    public function index()
    {
        $year1 = Carbon::now();
        $year2 = Carbon::now()->subYear();

        $kertas1tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year1)
        ->where('trashes.category_id', 1)
        ->get()->sum('weight');

        $plastik1tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year1)
        ->where('trashes.category_id', 2)
        ->get()->sum('weight');

        $kaca1tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year1)
        ->where('trashes.category_id', 3)
        ->get()->sum('weight');

        $besi1tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year1)
        ->where('trashes.category_id', 4)
        ->get()->sum('weight');

        $logam1tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year1)
        ->where('trashes.category_id', 5)
        ->get()->sum('weight');

        $elektronik1tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year1)
        ->where('trashes.category_id', 6)
        ->get()->sum('weight');

        $lainlain1tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year1)
        ->where('trashes.category_id', 7)
        ->get()->sum('weight');



        $kertas2tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year2)
        ->where('trashes.category_id', 1)
        ->get()->sum('weight');

        $plastik2tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year2)
        ->where('trashes.category_id', 2)
        ->get()->sum('weight');

        $kaca2tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year2)
        ->where('trashes.category_id', 3)
        ->get()->sum('weight');

        $besi2tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year2)
        ->where('trashes.category_id', 4)
        ->get()->sum('weight');

        $logam2tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year2)
        ->where('trashes.category_id', 5)
        ->get()->sum('weight');

        $elektronik2tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year2)
        ->where('trashes.category_id', 6)
        ->get()->sum('weight');

        $lainlain2tamp = DetailTransaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
        ->join('trashes', 'detail_transactions.trash_id', '=', 'trashes.id')
        ->whereYear('transactions.date', $year2)
        ->where('trashes.category_id', 7)
        ->get()->sum('weight');



        $kertas1 = (int)$kertas1tamp;
        $plastik1 = (int)$plastik1tamp;
        $kaca1 = (int)$kaca1tamp;
        $besi1 = (int)$besi1tamp;
        $logam1 = (int)$logam1tamp;
        $elektronik1 = (int)$elektronik1tamp;
        $lainlain1 = (int)$lainlain1tamp;

        $kertas2 = (int)$kertas2tamp;
        $plastik2 = (int)$plastik2tamp;
        $kaca2 = (int)$kaca2tamp;
        $besi2 = (int)$besi2tamp;
        $logam2 = (int)$logam2tamp;
        $elektronik2 = (int)$elektronik2tamp;
        $lainlain2 = (int)$lainlain2tamp;


        $price1 = array(
                0 => Transaction::whereYear('date', $year1)->whereMonth('date', '01')->get()->sum('priceTotal'),
                1 => Transaction::whereYear('date', $year1)->whereMonth('date', '02')->get()->sum('priceTotal'),
                2 => Transaction::whereYear('date', $year1)->whereMonth('date', '03')->get()->sum('priceTotal'),
                3 => Transaction::whereYear('date', $year1)->whereMonth('date', '04')->get()->sum('priceTotal'),
                4 => Transaction::whereYear('date', $year1)->whereMonth('date', '05')->get()->sum('priceTotal'),
                5 => Transaction::whereYear('date', $year1)->whereMonth('date', '06')->get()->sum('priceTotal'),
                6 => Transaction::whereYear('date', $year1)->whereMonth('date', '07')->get()->sum('priceTotal'),
                7 => Transaction::whereYear('date', $year1)->whereMonth('date', '08')->get()->sum('priceTotal'),
                8 => Transaction::whereYear('date', $year1)->whereMonth('date', '09')->get()->sum('priceTotal'),
                9 => Transaction::whereYear('date', $year1)->whereMonth('date', '10')->get()->sum('priceTotal'),
                10 => Transaction::whereYear('date', $year1)->whereMonth('date', '11')->get()->sum('priceTotal'),
                11 => Transaction::whereYear('date', $year1)->whereMonth('date', '12')->get()->sum('priceTotal'),
        );

        $price2 = array(
            0 => Transaction::whereYear('date', $year2)->whereMonth('date', '01')->get()->sum('priceTotal'),
            1 => Transaction::whereYear('date', $year2)->whereMonth('date', '02')->get()->sum('priceTotal'),
            2 => Transaction::whereYear('date', $year2)->whereMonth('date', '03')->get()->sum('priceTotal'),
            3 => Transaction::whereYear('date', $year2)->whereMonth('date', '04')->get()->sum('priceTotal'),
            4 => Transaction::whereYear('date', $year2)->whereMonth('date', '05')->get()->sum('priceTotal'),
            5 => Transaction::whereYear('date', $year2)->whereMonth('date', '06')->get()->sum('priceTotal'),
            6 => Transaction::whereYear('date', $year2)->whereMonth('date', '07')->get()->sum('priceTotal'),
            7 => Transaction::whereYear('date', $year2)->whereMonth('date', '08')->get()->sum('priceTotal'),
            8 => Transaction::whereYear('date', $year2)->whereMonth('date', '09')->get()->sum('priceTotal'),
            9 => Transaction::whereYear('date', $year2)->whereMonth('date', '10')->get()->sum('priceTotal'),
            10 => Transaction::whereYear('date', $year2)->whereMonth('date', '11')->get()->sum('priceTotal'),
            11 => Transaction::whereYear('date', $year2)->whereMonth('date', '12')->get()->sum('priceTotal'),
        );

        $weight1 = array(
            0 => Transaction::whereYear('date', $year1)->whereMonth('date', '01')->get()->sum('weightTotal'),
            1 => Transaction::whereYear('date', $year1)->whereMonth('date', '02')->get()->sum('weightTotal'),
            2 => Transaction::whereYear('date', $year1)->whereMonth('date', '03')->get()->sum('weightTotal'),
            3 => Transaction::whereYear('date', $year1)->whereMonth('date', '04')->get()->sum('weightTotal'),
            4 => Transaction::whereYear('date', $year1)->whereMonth('date', '05')->get()->sum('weightTotal'),
            5 => Transaction::whereYear('date', $year1)->whereMonth('date', '06')->get()->sum('weightTotal'),
            6 => Transaction::whereYear('date', $year1)->whereMonth('date', '07')->get()->sum('weightTotal'),
            7 => Transaction::whereYear('date', $year1)->whereMonth('date', '08')->get()->sum('weightTotal'),
            8 => Transaction::whereYear('date', $year1)->whereMonth('date', '09')->get()->sum('weightTotal'),
            9 => Transaction::whereYear('date', $year1)->whereMonth('date', '10')->get()->sum('weightTotal'),
            10 => Transaction::whereYear('date', $year1)->whereMonth('date', '11')->get()->sum('weightTotal'),
            11 => Transaction::whereYear('date', $year1)->whereMonth('date', '12')->get()->sum('weightTotal'),
        );

        $weight2 = array(
            0 => Transaction::whereYear('date', $year2)->whereMonth('date', '01')->get()->sum('weightTotal'),
            1 => Transaction::whereYear('date', $year2)->whereMonth('date', '02')->get()->sum('weightTotal'),
            2 => Transaction::whereYear('date', $year2)->whereMonth('date', '03')->get()->sum('weightTotal'),
            3 => Transaction::whereYear('date', $year2)->whereMonth('date', '04')->get()->sum('weightTotal'),
            4 => Transaction::whereYear('date', $year2)->whereMonth('date', '05')->get()->sum('weightTotal'),
            5 => Transaction::whereYear('date', $year2)->whereMonth('date', '06')->get()->sum('weightTotal'),
            6 => Transaction::whereYear('date', $year2)->whereMonth('date', '07')->get()->sum('weightTotal'),
            7 => Transaction::whereYear('date', $year2)->whereMonth('date', '08')->get()->sum('weightTotal'),
            8 => Transaction::whereYear('date', $year2)->whereMonth('date', '09')->get()->sum('weightTotal'),
            9 => Transaction::whereYear('date', $year2)->whereMonth('date', '10')->get()->sum('weightTotal'),
            10 => Transaction::whereYear('date', $year2)->whereMonth('date', '11')->get()->sum('weightTotal'),
            11 => Transaction::whereYear('date', $year2)->whereMonth('date', '12')->get()->sum('weightTotal'),
        );

        $category = Category::all();

        return view('index', compact('category', 'kertas1',
                        'plastik1', 'kaca1', 'besi1', 'logam1',
                        'elektronik1', 'lainlain1', 'kertas2',
                        'plastik2', 'kaca2', 'besi2', 'logam2',
                        'elektronik2', 'lainlain2', 'price1',
                        'price2', 'weight1', 'weight2'));
        //return response()->json($kertas2);
    }
}
