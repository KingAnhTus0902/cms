<?php
namespace App\Exports;
use App\Constants\CommonConstants;
use App\Helpers\CommonHelper;
use App\Models\Setting;
use App\Repositories\MedicalSession\MedicalSessionRepository;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;

class InsurancePaidExport implements FromView,ShouldAutoSize,WithStyles,WithEvents,WithColumnFormatting
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
        $medicalSessions = $this->mainRepository->getInsurancePaidList($data, null, null);
        $db = $medicalSessions->get();
        if (!empty($db)) {
            foreach ($db as $key => $medicalSession) {
                $db[$key]->disease_code = $medicalSession->diseases[FIRST_KEY]->disease_code ?? null;
                $firstExaminationPrice = $medicalSession->medicalSessionRoom[FIRST_KEY]->insurance_unit_price ?? null;
                $secondExaminationPrice = $medicalSession->medicalSessionRoom[SECOND_KEY]->insurance_unit_price ?? null;
                $db[$key]->examination_insurance_price = $firstExaminationPrice + $secondExaminationPrice;
            }
        }
        $countHospitalLine = $db->unique('hospital_line')->count();
        $hospitalLinesText = '';
        if ($countHospitalLine) {
            $listHospitalLines = $db->unique('hospital_line')->pluck('hospital_line')->toArray();
            sort($listHospitalLines);
            $hospitalLinesText = CommonHelper::convertHospitalLine($listHospitalLines);
        }
        $totalMoney = $db->sum('payment_price');
        $this->count = $db->count() + 11 + $countHospitalLine;
        return view('elements.report.insurance-paid-export', [
            'medicalSessions' => $db,
            'time' => [$this->start, $this->end],
            'hospital' => Setting::all()->first()->hospital,
            'hospitalLine' => $hospitalLinesText,
            'totalMoney' => $totalMoney
        ]);
    }

    //Style excel
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

        $sheet->getStyle('A:D')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        return [
            'B2' => $fontBold,
            'B5' => $fontBold,
            'B3' => $fontBold,
            'W2' => $fontItalic,
            'W3' => $fontItalic,
            4    => $fontTitle,
            5    => $fontCenter + $fontItalic,
            7    => $fontCenter,
            8    => $fontCenter,
            9    => $fontCenter,
            10   => $fontCenter,
            11   => $fontCenter,
            'B' . $this->count + 2 =>$fontBold,
            'I' . $this->count + 2 =>$fontBold,
            'P' . $this->count + 2 =>$fontBold,
            'X' . $this->count + 2 => $fontItalic,
            'X' . $this->count + 5 => $fontCenter + $fontItalic,
            ($this->count + 3) => $fontCenter + $fontItalic,
            ($this->count + 4) => $fontCenter + $fontBold,
            ($this->count + 5) => $fontCenter + $fontItalic,
        ];

    }
    //Add border execl
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('B8:' . $event->sheet->getHighestColumn() . ($this->count + 2))->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->getStyle('W7:X7')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->getStyle('J12:X' . ($this->count + 2))->applyFromArray([
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_RIGHT,
                    ],
                ]);
                $event->sheet->getStyle('C' . ($this->count + 1). ':I' . ($this->count + 1))->applyFromArray([
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => '0',
        ];
    }

}
