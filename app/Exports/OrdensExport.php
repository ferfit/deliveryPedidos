<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class OrdensExport implements FromView, WithColumnWidths
{
    protected $ordene,$productos;

    function __construct($ordene,$productos)
    {
        $this->ordene = $ordene;
        $this->productos = $productos;
    }

    public function view(): View
    {
        return view('admin.ordenes.excel', [
            'ordene' => $this->ordene,
            'productos' => $this->productos
        ]);
    }
    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 50,            
        ];
    }
}
