<?php

namespace App\Repositories\PrescriptionOfMedicalSession;

use App\Models\PrescriptionOfMedicalSession;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use DB;

class PrescriptionOfMedicalSessionRepository extends BaseRepository implements PrescriptionOfMedicalSessionRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return PrescriptionOfMedicalSession::class;
    }

    public function getRevenueMedicine()
    {
        return $this->model->select(
                DB::raw('Month(payment_at) as month, Sum(payment_price) as price')
            )
            ->where('status', 2)
            ->where('payment_status', 1)
            ->whereYear('payment_at', Carbon::now()->year)
            ->groupBy('month')
            ->get()
            ->toArray();
    }
}