<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockHandling;
use DateTime;

class ReportController extends Controller
{
    private const ORIGIN_PT_BR = [
        StockHandling::ORIGIN_API => 'API',
        StockHandling::ORIGIN_SYSTEM => 'Sistema'
    ];

    private const NUMBER_OF_DAYS_IN_REPORT = 3;

    public function report()
    {
        $reportDays = [];
        $date = new DateTime();

        while ($date->diff(new DateTime())->days < self::NUMBER_OF_DAYS_IN_REPORT) {
            $reportDay = new class{};
            $reportDay->date = clone $date;
            $reportDay->stockHandlings = StockHandling::findByDate($date);

            $reportDays[] = $reportDay;

            $date->modify('-1 day');
        }

        $productsInLowStock = Product::findInLowStock();

        return view('report.report', [
            'reportDays' => $reportDays,
            'productsInLowStock' => $productsInLowStock,
            'originPtBr' => self::ORIGIN_PT_BR
        ]);
    }
}
