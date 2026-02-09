<?php

namespace App\Exports;

use App\Models\CdcEvent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * CDC Event Registrations Export
 * 
 * Exports event registrations to Excel format
 */
class CdcEventRegistrationsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    protected $event;

    public function __construct(CdcEvent $event)
    {
        $this->event = $event;
    }

    /**
     * Get the registrations collection
     */
    public function collection()
    {
        return $this->event->registrations()
            ->orderBy('registered_at', 'desc')
            ->get();
    }

    /**
     * Define the headings
     */
    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Email',
            'Telepon',
            'NIM',
            'Status',
            'Tanggal Daftar',
            'Pesan',
        ];
    }

    /**
     * Map the data for each row
     */
    public function map($registration): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $registration->name,
            $registration->email,
            $registration->phone,
            $registration->nim,
            ucfirst($registration->status),
            $registration->registered_at->format('d/m/Y H:i'),
            $registration->message ?? '-',
        ];
    }

    /**
     * Apply styles to the worksheet
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '8A4BE2']
                ],
                'font' => ['color' => ['rgb' => 'FFFFFF'], 'bold' => true],
            ],
        ];
    }

    /**
     * Set the worksheet title
     */
    public function title(): string
    {
        return 'Registrations';
    }
}
