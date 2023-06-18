<?php

namespace App\Exports;

use App\Models\Designation;
use App\Models\Faculty;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PrincipalInvestigatorsExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithEvents
{
    use Exportable;

    protected $query;
    protected $recordCount;
    protected $counter = 0;

    public function __construct($query)
    {
        $this->query = $query;
        $this->recordCount = $query->count();
    }

    public function query()
    {
        return $this->query;
    }

    public function headings(): array
    {
        return [
            '#',
            'Title',
            'First Name',
            'Last Name',
            'Research Title',
            'Phone',
            'Email',
            'Designation',
            'Faculty',
            'Registered At',
        ];
    }

    public function map($row): array
    {
        $this->counter++;

        return [
            $this->counter,
            $row->title,
            $row->first_name,
            $row->last_name,
            $row->research_title,
            $row->phone,
            $row->email,
            Designation::find($row->designation_id)->designation,
            Faculty::find($row->faculty_id)->name,
            $row->created_at,
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
                $title = 'List of Principal Investigators : '. $this->recordCount;
                $event->sheet->mergeCells('A1:J1');
                $event->sheet->setCellValue('A1', $title);
                $event->sheet->insertNewRowBefore(2);
            },
        ];
    }
}
