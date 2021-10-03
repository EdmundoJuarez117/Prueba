<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function example()
    {
        $data = [];

        $pdf = \PDF::loadView('reports/example', $data);

        // return $pdf->download('archivo.pdf');
        return $pdf->stream('archivo.pdf');
    }
}
