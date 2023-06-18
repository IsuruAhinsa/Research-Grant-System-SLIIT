<?php

namespace App\Exports;

use App\Models\Payment;
use App\Models\PrincipalInvestigator;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FinancialExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithEvents, WithColumnFormatting
{
    use Exportable;

    protected $query;
    protected $counter = 0;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function query()
    {
        return $this->query;
    }

    public function headings(): array
    {
        return [
            '#',
            'Principal Investigator',
            'Category',
            'Activity',
            'Amount (LKR)',
            'Issued Amount (LKR)'
        ];
    }

    public function map($row): array
    {
        $this->counter++;

        return [
            $this->counter,
            PrincipalInvestigator::find($row->principal_investigator_id)->full_name,
            $row->category,
            $row->activity,
            $row->amount,
            Payment::where('disbursement_plan_id', $row->id)->sum('amount'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            3 => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $title = 'Disbursement plan claims';
                $event->sheet->mergeCells('A1:F1');
                $event->sheet->setCellValue('A1', $title);
                $event->sheet->insertNewRowBefore(2);
            },

            AfterSheet::class => function (AfterSheet $event) {
                $lastRow = $event->sheet->getHighestRow();

                // Calculate the total amount(s)
                $totalActualAmount = 0;
                $totalIssuedAmount = 0;

                for ($row = 4; $row <= $lastRow; $row++) {
                    $cellValue = $event->sheet->getCell('E' . $row)->getCalculatedValue();
                    $totalActualAmount += $cellValue;
                }

                for ($row = 4; $row <= $lastRow; $row++) {
                    $cellValue = $event->sheet->getCell('F' . $row)->getCalculatedValue();
                    $totalIssuedAmount += $cellValue;
                }
                $event->sheet
                    ->setCellValue('D' . ($lastRow + 1), 'Total')
                    ->getStyle('D' . ($lastRow + 1))
                    ->getFont()
                    ->setBold(true);

                // Add the total amount(s) row
                $event->sheet
                    ->setCellValue('E' . ($lastRow + 1), number_format($totalActualAmount, 2))
                    ->getStyle('E' . ($lastRow + 1))
                    ->getAlignment()
                    ->setHorizontal('right');

                $event->sheet
                    ->setCellValue('F' . ($lastRow + 1), number_format($totalIssuedAmount, 2))
                    ->getStyle('F' . ($lastRow + 1))
                    ->getAlignment()
                    ->setHorizontal('right');
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_NUMBER_00,
            'F' => NumberFormat::FORMAT_NUMBER_00,
        ];
    }
}
