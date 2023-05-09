<?php

namespace App\Imports;

use App\Models\Item;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ItemImport implements ToCollection, WithHeadingRow
{
    private $orderId;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    public function collection(Collection $rows)
    {
        $fields = [
            '1' => 'ene',
            '2' => 'feb',
            '3' => 'mar',
            '4' => 'abr',
            '5' => 'may',
            '6' => 'jun',
            '7' => 'jul',
            '8' => 'ago',
            '9' => 'sep',
            '10' => 'oct',
            '11' => 'nov',
            '12' => 'dic',
            'ene' => 'ene',
            'feb' => 'feb',
            'mar' => 'mar',
            'abr' => 'abr',
            'may' => 'may',
            'jun' => 'jun',
            'jul' => 'jul',
            'ago' => 'ago',
            'sep' => 'sep',
            'oct' => 'oct',
            'nov' => 'nov',
            'dic' => 'dic',
        ];

        foreach ($rows as $row) {
            $field = $fields[strtolower($row['Mes'])];

            $item = Item::updateOrCreate(
                [
                    'partNumber' => $row['Producto'],
                    'order_item_id' => $this->orderId
                ],
                [
                    'description' => $row['Descripción'],
                    $field => $row['Venta U']
                ]
            );

            $stock = Item::where('partNumber', $row['Producto'])
                ->pluck('stock')
                ->first();

            $minimumAmount = Item::where('partNumber', $row['Producto'])
                ->pluck('minimumAmount')
                ->first();

            $item->stock = $stock;
            $item->minimumAmount = $minimumAmount;
        }
    }
}
