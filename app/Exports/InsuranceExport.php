<?php
namespace App\Exports;
use App\Constants\CommonConstants;
use App\Models\Setting;
use App\Repositories\MedicalSession\MedicalSessionRepository;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;

class InsuranceExport implements FromView,ShouldAutoSize,WithStyles,WithEvents,WithColumnFormatting,WithColumnWidths
{
    protected $count=0;
    protected $mainRepository;
    protected $start;
    protected $end;

    public function __construct(
        MedicalSessionRepository $medicalSessionRepositoryInterface,
        $start, $end

    ) {
        $this->mainRepository = $medicalSessionRepositoryInterface;
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $data[CommonConstants::KEYWORD] = [];
        $time = [
            0 => Carbon::today()->toDateString() . ' 00:00:00',
            1 => Carbon::today()->toDateString() . ' 23:59:59'
        ];
        if (!empty($this->start) && !empty($this->end)) {
            $time[0] = Carbon::createFromFormat('d/m/Y', trim($this->start))->format('Y-m-d') . ' 00:00:00';
            $time[1] = Carbon::createFromFormat('d/m/Y', trim($this->end))->format('Y-m-d') . ' 23:59:59';
        }
        $data[CommonConstants::KEYWORD]['time'] = $time;
        $medicalSessions = $this->mainRepository->insuranceList($data, null, null);
        $db = $medicalSessions->get();
        $this->count = $db->count()+8+ $this->mainRepository->countMedicalExaminationDay($data);
        return view('elements.report.insurance-export', [
            'medicalSessions' => $db,
            'time' => [$this->start, $this->end],
            'hospital' => Setting::all()->first()->hospital,
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'G' => 20,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $fontTitle=[
            'font' => [
                'bold' => true,
                'name' => 'Time New Roman',
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER, // Center align the headings
            ],
        ];
        $fontBold=['font' => ['bold' => true,],];
        $fontItalic=['font' => ['italic' => true,],];
        $fontCenter=['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER,],];
        $sheet->getStyle('A:C')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('F:L')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('D:E')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        return [
            'B2' => $fontBold,
            'B3' => $fontBold,
            'L2' => $fontItalic + $fontCenter,
            4    => $fontTitle,
            5    => $fontCenter + $fontItalic,
            7    => $fontCenter,
            8    => $fontCenter,
            'L' . $this->count + 2 => $fontCenter + $fontItalic,
            'B' . $this->count + 3 => $fontCenter + $fontBold,
            'F' . $this->count + 3 => $fontCenter + $fontBold,
            'L' . $this->count + 3 => $fontCenter + $fontBold,
            'B' . $this->count + 4 => $fontCenter + $fontItalic,
            'F' . $this->count + 4 => $fontCenter + $fontItalic,
            'L' . $this->count + 4 => $fontCenter + $fontItalic,
        ];

    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('B7:' . $event->sheet->getHighestColumn() . $this->count)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            // F is the column
            'C' => '0',
            'G' => '0',
        ];
    }

}
