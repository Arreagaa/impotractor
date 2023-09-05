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
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class ItemExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $year;
    protected $settlements;

    public function __construct($year, $settlements)
    {
        $this->year = $year;
        $this->settlements = $settlements;
    }

    public function collection()
    {
        $items = Item::all();

        $sortedItems = $items->sortByDesc(function ($item) {
            $monthlyForecast = ($item->ene + $item->feb + $item->mar + $item->abr + $item->may + $item->jun + $item->jul + $item->ago + $item->sep + $item->oct + $item->nov + $item->dic) / 12;
            $quarterlyForecast = $monthlyForecast * 3;

            $quarterlyShortfall = $item->stock - $quarterlyForecast;

            return $quarterlyShortfall;
        });

        return $sortedItems;
    }

    public function applyCellStyles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();
            
        for ($row = 2; $row <= $lastRow; $row++) {
            $stockCell = 'O' . $row;
            $minimumAmountCell = 'P' . $row;
            
            $stockValue = $sheet->getCell($stockCell)->getValue();
            $minimumAmountValue = $sheet->getCell($minimumAmountCell)->getValue();
            
            if ($stockValue < $minimumAmountValue) {
                $stockCellStyle = $sheet->getStyle($stockCell);
                $stockCellStyle->getFont()->getColor()->setARGB('9C0006');
                $stockCellStyle->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFC7CE');
            }
        }
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

        $this->applyCellStyles($sheet);
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

    protected function getRotations($item)
    {
        $rotations = '';

        if ($item->ene + $item->feb + $item->mar >= 1) {
            $rotations .= 'T';
        }

        if ($item->abr + $item->may + $item->jun >= 1) {
            $rotations .= 'T';
        }

        if ($item->jul + $item->ago + $item->sep >= 1) {
            $rotations .= 'T';
        }

        if ($item->oct + $item->nov + $item->dic >= 1) {
            $rotations .= 'T';
        }

        return $rotations;
    }

    protected function settlementItems()
    {
        $partNumbers = [];

        foreach ($this->settlements as $settlement) {
            $partNumbers[] = $settlement->partNumber;
        }

        return $partNumbers;
    }

    protected function isListed($item)
    {
        return in_array($item->partNumber, $this->settlementItems());
    }

    public function map($item): array
    {
        $monthlyForecast = 
            round(($item->ene + $item->feb + $item->mar + $item->abr + $item->may + $item->jun + $item->jul + $item->ago + $item->sep + $item->oct + $item->nov + $item->dic) / 12, 2);
        $quarterlyForecast = round($monthlyForecast * 3, 2);
        
        $missingMonthly = round($item->stock - $monthlyForecast, 2);
        $quarterlyShortfall = round($item->stock - $quarterlyForecast, 2);

        $settlement = $this->isListed($item) ? "Listado" : "No Listado";

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
            $rotation = $this->getRotations($item),
            $settlement,
            $monthlyForecast == 0 ? '0' : $monthlyForecast,
            $quarterlyForecast == 0 ? '0' : $quarterlyForecast,
            $missingMonthly == 0 ? '0' : $missingMonthly,
            $quarterlyShortfall == 0 ? '0' : $quarterlyShortfall,
            $item->suggestion == 0 ? '0' : $item->suggestion,
            $item->suggestionSeller == 0 ? '0' : $item->suggestionSeller,
            $item->suggestionSeller3 == 0 ? '0' : $item->suggestionSeller3,
        ];
    }
}