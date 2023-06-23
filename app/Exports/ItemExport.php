<?php

namespace App\Exports;

use App\Models\Item;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ItemExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function collection()
    {
        return Item::orderBy('quarterlyShortfall', 'desc')->get();
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:Y1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 13,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '000000'],
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
        ]);

        $sheet->getStyle('A2:Z999')->getFont()->setSize(12);
        $sheet->getStyle('A2:Z999')->getAlignment()->setHorizontal('right');
    }

    public function headings(): array
    {
        $columns = Schema::getColumnListing('items');

        $columns = array_diff($columns, ['created_at', 'updated_at']);

        $headings = [
            'Parte',
            'Descripción',
            'enero-' . $this->year,
            'febrero-' . $this->year,
            'marzo-' . $this->year,
            'abril-' . $this->year,
            'mayo-' . $this->year,
            'junio-' . $this->year,
            'julio-' . $this->year,
            'agosto-' . $this->year,
            'septiembre-' . $this->year,
            'octubre-' . $this->year,
            'noviembre-' . $this->year,
            'diciembre-' . $this->year,
            'Stock',
            'Cantidad Mínima',
            'Rotación',
            'Liquidación',
            'Pronóstico Mensual',
            'Pronóstico Trimestral',
            'Faltante Mensual',
            'Faltante Trimestral',
            'Sugerencia Vendedor 1',
            'Sugerencia Vendedor 2',
            'Sugerencia Vendedor 3',
        ];

        return $headings;
    }

    public function map($item): array
    {
        return [
            $item->partNumber,
            $item->description,
            $item->ene == 0 ? '0' : $item->ene,
            $item->feb == 0 ? '0' : $item->feb,
            $item->mar == 0 ? '0' : $item->mar,
            $item->abr == 0 ? '0' : $item->abr,
            $item->may == 0 ? '0' : $item->may,
            $item->jun == 0 ? '0' : $item->jun,
            $item->jul == 0 ? '0' : $item->jul,
            $item->ago == 0 ? '0' : $item->ago,
            $item->sep == 0 ? '0' : $item->sep,
            $item->oct == 0 ? '0' : $item->oct,
            $item->nov == 0 ? '0' : $item->nov,
            $item->dic == 0 ? '0' : $item->dic,
            $item->stock == 0 ? '0' : $item->stock,
            $item->minimumAmount == 0 ? '0' : $item->minimumAmount,
            $item->rotation,
            $item->settlement,
            $item->monthlyForecast == 0 ? '0' : $item->monthlyForecast,
            $item->quarterlyForecast == 0 ? '0' : $item->quarterlyForecast,
            $item->missingMonthly == 0 ? '0' : $item->missingMonthly,
            $item->quarterlyShortfall == 0 ? '0' : $item->quarterlyShortfall,
            $item->suggestion == 0 ? '0' : $item->suggestion,
            $item->suggestionSeller == 0 ? '0' : $item->suggestionSeller,
            $item->suggestionSeller3 == 0 ? '0' : $item->suggestionSeller3,
        ];
    }
}
