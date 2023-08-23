<?php

namespace App\Helpers;

use App\Constants\CadresConstants;
use App\Constants\MedicalSessionConstants;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class CommonHelper
{
    /**
     * @return bool
     */
    public static function openListManagementSidebar()
    {
        $open = false;
        if (request()->routeIs('admin.news.*')
            || request()->routeIs('admin.users.*')
            || request()->routeIs('admin.cadres.*')
            || request()->routeIs('admin.department.*')
            || request()->routeIs('admin.*.room')
            || request()->routeIs('admin.unit.*')
            || request()->routeIs('admin.material_type.*')
            || request()->routeIs('admin.*.material')
            || request()->routeIs('admin.*.designated_service')
            || request()->routeIs('admin.hospital.*')
            || request()->routeIs('admin.diseases.*')
            || request()->routeIs('admin.*.health_insurance_card')
            || request()->routeIs('admin.examination_type.*')
            || request()->routeIs('admin.import_materials_slip.*')) {
            $open = true;
        }
        return $open;
    }
    /**
     * @return bool
     */
    public static function openReportSidebar()
    {
        $open = false;
        if (request()->routeIs('admin.report.insurancePaidIndex')
            || request()->routeIs('admin.report.reportInsuranceIndex')
            || request()->routeIs('admin.report.distributed_materials')) {
            $open = true;
        }
        return $open;
    }

    /**
     * @return bool
     */
    public static function openMaterialManagementSidebar()
    {
        $open = false;
        if (request()->routeIs('admin.unit.*')
            || request()->routeIs('admin.material_type.*')
            || request()->routeIs('admin.*.material')
            || request()->routeIs('admin.import_materials_slip.*')) {
            $open = true;
        }
        return $open;
    }

    public static function formatDate($value, $currentFormat, $afterFormat): string
    {
        try {
            $result = Carbon::createFromFormat($currentFormat, trim($value))->format($afterFormat);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $result = "";
        }
        return $result;
    }

    //Check key isset and not empty in array
    public static function checkKeyArray($array, $key): bool
    {
        if (isset($array[$key]) && $array[$key] !== "") {
            return true;
        }
        return false;
    }

    /**
     * Get the gender.
     *
     * @param $gender
     * @return string
     */
    public static function getGender($gender): string
    {
        return $gender == 0 ? 'Nam' : 'Nữ';
    }


    public static function formatDateInvoice($time = null, $currentFormat)
    {
        $minute = DOTS;
        $hour = DOTS;
        $day = DAY_MONTH_YEAR_DOTS;
        if (!empty($time)) {
            $data = Carbon::createFromFormat($currentFormat, trim($time));
            $minute = $data->format('i');
            $hour = $data->format('H');
            $day = $data->format('d/m/Y');
        }
        return [
            'minute' => $minute,
            'hour' => $hour,
            'day' => $day,
        ];
    }

    /**
     * Get the gender.
     *
     * @param array $data
     * @return array
     */
    public static function sortValueByMonth($data)
    {
        $result = [];
        $data = array_column($data, null, 'month');
        for ($month = 1; $month <= 12; $month++) {
            $result[] = (object)[
                'month' =>  Carbon::now()->year . "-" . $month,
                'price' => !empty($data[$month]['price']) ? (int)$data[$month]['price'] : 0
            ];
        }
        return $result;
    }

    /**
     * Get the date between.
     *
     * @param $date
     * @return array
     */
    public static function dateBetween($date): array
    {
        $pattern = REGEX_DATE_BETWEEN;
        if (preg_match($pattern, $date)) {
            $data = explode(' - ', $date);
            $start = Carbon::createFromFormat('d/m/Y', trim($data[0]))->format('Y-m-d') . " 00:00:00";
            $end = Carbon::createFromFormat('d/m/Y', trim($data[1]))->format('Y-m-d') . " 23:59:59";
            return [$start,$end];
        }
        return [];
    }

    public static function calculateTimeByYears(
        $start = null,
        $end = null,
        $currentFormat = YEAR_MONTH_DAY_HIS
    )
    {
        $start = $start ? Carbon::createFromFormat($currentFormat, trim($start)) : Carbon::now();
        $end = $end ? Carbon::createFromFormat($currentFormat, trim($end)) : Carbon::now();
        return $end->diff($start)->y;
    }

    /**
     * Transform a date value into a Carbon object (Laravel Excel).
     *
     * @return Carbon|null
     */
    public static function transformDate($value, $format = 'd/m/Y')
    {
        try {
            if (empty($value)) {
                return null;
            }

            if (is_numeric($value)) {
                return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))
                    ->format($format);
            }

            return Carbon::createFromFormat($format, $value)->format($format);
        } catch (\Throwable $th) {
            return $value;
        }
    }

    /**
     * Transform a date value into a Carbon object (Laravel Excel).
     *
     * @return array
     */
    public static function setDataMedicalInsuranceAndDate($data): array
    {
        if (!empty($data['birthday'])) {
            $data['birthday'] = self::formatDate(
                $data['birthday'], DAY_MONTH_YEAR, YEAR_MONTH_DAY);
        }
        if (!empty($data['medical_insurance_start_date'])) {
            $data['medical_insurance_start_date'] = self::formatDate(
                $data['medical_insurance_start_date'], DAY_MONTH_YEAR, YEAR_MONTH_DAY);
        }
        if (!empty($data['medical_insurance_end_date'])) {
            $data['medical_insurance_end_date']   = self::formatDate(
                $data['medical_insurance_end_date'], DAY_MONTH_YEAR, YEAR_MONTH_DAY);
        }
        if (!empty($data['insurance_five_consecutive_years'])) {
            $data['insurance_five_consecutive_years']   = self::formatDate(
                $data['insurance_five_consecutive_years'], DAY_MONTH_YEAR, YEAR_MONTH_DAY);
        }
        if (empty($data['medical_insurance_number'])) {
            $data['medical_insurance_start_date'] = null;
            $data['medical_insurance_end_date'] = null;
            $data['medical_insurance_symbol_code'] = null;
            $data['medical_insurance_live_code'] = null;
            $data['hospital_code'] = null;
            $data['is_long_date'] = CadresConstants::IS_LONG_DATE_ZERO;
            $data['medical_insurance_address'] = null;
        }
        if (empty($data['is_long_date'])) {
            $data['is_long_date'] = '0';
            $data['insurance_five_consecutive_years'] = null;
        }
        return $data;
    }

    public static function convertHospitalLine($listHospitalLines): string
    {
        $hospitalLineText = [];
        foreach ($listHospitalLines as $listHospitalLine) {
            $hospitalLineText[] = MedicalSessionConstants::HOSPITAL_LINE_TEXT[$listHospitalLine] ?? '';
        }
        return implode(' + ', $hospitalLineText);
    }

    /**
     * Check current user can delete room
     * @param int $idRoom
     * @param array $roomCanDelete
     * @return bool
     */
    public static function checkCanDeleteRoom(int $idRoom, array $roomCanDelete): bool
    {
        $canDelete = true;
        if (!RoleHelper::getByRole([ADMIN])) {
            $canDelete = in_array($idRoom, $roomCanDelete);
        }
        return $canDelete;
    }

    /**
     * Get session for the condition
     *
     * @param $key
     * @param null $value
     * @return ?string
     */
    public static function getSession($key, $value = null): ?string
    {
        if (empty(session($key))) {
            return '';
        }

        return $value ? session($key)[$value] : session($key);
    }
}
