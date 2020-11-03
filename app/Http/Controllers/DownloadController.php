<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\TransactionExportAll;
use App\Exports\TransactionExportYear;
use App\Exports\TransactionExportMonthYear;
use App\Exports\TransactionExportRange;

class DownloadController extends Controller
{
    public function exportExcelAll(Request $request)
    {
        $rules = [
            'allCategory' => 'required'
        ];

        $customMessages = [
            'allCategory.required' => 'Kategori Sampah Harus Diisi !'
        ];

        $this->validate($request, $rules, $customMessages);

        $allCategory = $request->allCategory;

        $nama_file = 'jurnal_umum_semua_data_sampah_untuk_sekolah'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new TransactionExportAll($allCategory), $nama_file);
    }

    public function exportExcelYear(Request $request)
    {
        $rules = [
            'yearLaporan' => 'required',
            'yearCategory' => 'required'
        ];

        $customMessages = [
            'yearLaporan.required' => 'Tahun Harus Diisi !',
            'yearCategory.required' => 'Kategori Sampah Harus Diisi !'
        ];

        $this->validate($request, $rules, $customMessages);

        $yearLaporan = $request->yearLaporan;
        $yearCategory = $request->yearCategory;
        $nama_file = 'jurnal_umum_tahun_'.$yearLaporan.'_sampah_untuk_sekolah_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new TransactionExportYear($yearLaporan, $yearCategory), $nama_file);
    }

    public function exportExcelMonthYear(Request $request)
    {
        $rules = [
            'month' => 'required',
            'year' => 'required',
            'monthYearCategory' => 'required'
        ];

        $customMessages = [
            'month.required' => 'Bulan Harus Diisi !',
            'year.required' => 'Tahun Harus Diisi !',
            'monthYearCategory.required' => 'Kategori Sampah Harus Diisi !'
        ];

        $this->validate($request, $rules, $customMessages);

        if($request->month == 'Januari'){$month = '01';}
        else if($request->month == 'Februari'){$month = '02';}
        else if($request->month == 'Maret'){$month = '03';}
        else if($request->month == 'April'){$month = '04';}
        else if($request->month == 'Mei'){$month = '05';}
        else if($request->month == 'Juni'){$month = '06';}
        else if($request->month == 'Juli'){$month = '07';}
        else if($request->month == 'Agustus'){$month = '08';}
        else if($request->month == 'September'){$month = '09';}
        else if($request->month == 'Oktober'){$month = '10';}
        else if($request->month == 'November'){$month = '11';}
        else if($request->month == 'Desember'){$month = '12';}

        $month_name = strtoupper($request->month);
        $year = $request->year;
        $monthYearCategory = $request->monthYearCategory;
        $nama_file = 'jurnal_umum_'.strtolower($month_name).'_'.$year.'_sampah_untuk_sekolah_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new TransactionExportMonthYear($month, $year, $month_name, $monthYearCategory), $nama_file);
    }

    public function exportExcelRange(Request $request)
    {
        $rules = [
            'dateFrom' => 'required',
            'dateTo' => 'required',
            'rangeCategory' => 'required'
        ];

        $customMessages = [
            'dateFrom.required' => 'Dari Tanggal Harus Diisi !',
            'dateTo.required' => 'Sampai Tanggal Harus Diisi !',
            'rangeCategory.required' => 'Kategori Sampah Harus Diisi !'
        ];

        $this->validate($request, $rules, $customMessages);

        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;
        $rangeCategory = $request->rangeCategory;

        $nama_file = 'jurnal_umum_dari_'.$dateFrom.'sampai_'.$dateTo.'_sampah_untuk_sekolah_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new TransactionExportRange($dateFrom, $dateTo, $rangeCategory), $nama_file);
    }

}
