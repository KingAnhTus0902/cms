<?php

use App\Http\Controllers\Cms\DesignatedServiceOfMedicalSessionController;
use App\Http\Controllers\Cms\ImportMaterialsSlipController;
use App\Http\Controllers\Cms\MedicalSessionController;
use App\Http\Controllers\Cms\ReportController;
use App\Http\Controllers\Cms\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\NewsController;
use App\Http\Controllers\Cms\DepartmentController;
use App\Http\Controllers\Cms\HomePageController;
use App\Http\Controllers\Cms\UserController;
use App\Http\Controllers\Cms\UnitController;
use App\Http\Controllers\Cms\HospitalController;
use App\Http\Controllers\Cms\DesignatedServiceController;
use App\Http\Controllers\Cms\CadresController;
use App\Http\Controllers\Cms\AuthController;
use App\Http\Controllers\Cms\RoomController;
use App\Http\Controllers\Cms\MaterialTypeController;
use App\Http\Controllers\Cms\MaterialController;
use App\Http\Controllers\Cms\DiseaseController;
use App\Http\Controllers\Cms\PaymentController;
use App\Http\Controllers\Cms\ExaminationTypeController;
use App\Http\Controllers\Cms\HealthInsuranceCardHeadController;
use App\Http\Controllers\Cms\SettingController;
use App\Http\Controllers\Cms\HospitalTransferController;
use App\Http\Controllers\Cms\DispenseMedicinesController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dang-nhap', function(){
    if (Auth::check()) {
        return redirect()->route('home');
    } else return view('auth.login');
})->name('login-page');

Route::post('/dang-nhap', [AuthController::class, 'login'])->name('login');
Route::get('quen-mat-khau', [AuthController::class, 'forgotPasswordForm'])->name('password.forgot');
Route::get('doi-mat-khau/{token}', [AuthController::class, 'resetPasswordForm'])->name('password.reset');
Route::post('doi-mat-khau', [AuthController::class, 'resetPassword'])->name('password.store');
Route::post('quen-mat-khau', [AuthController::class, 'forgotPassword'])->name('password.save');


Route::middleware('auth')->group(function () {
    Route::get('/', [HomePageController::class, 'index'])->name('home');
    Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('admin')->name('admin.')->group(function () {

        // Manage user
        Route::prefix('nguoi-dung')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/thong-tin-ca-nhan', [UserController::class, 'view'])->name('view');
        });

        //Cadres Management
        Route::prefix('can-bo')->group(function () {
            Route::get('/', [CadresController::class, 'index'])->name('cadres.index');
        });

        Route::prefix('khoa')->group(function () {
            Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
            Route::get('/list', [DepartmentController::class, 'list'])
                ->name('department.list')
                ->middleware('permission:List-department');
        });

        Route::prefix('phong-kham')->group(function () {
            Route::get('/', [RoomController::class, 'index'])->name('index.room');
            Route::get('/list', [RoomController::class, 'list'])->name('list.room')
                ->middleware('permission:List-room');;
        });

        Route::prefix('phien-kham')->name('medical_session.')->group(function () {
            Route::get('/', [MedicalSessionController::class, 'index'])->name('index');
            Route::get('/list', [MedicalSessionController::class, 'list'])->name('list');
            Route::get('/{id}', [MedicalSessionController::class, 'examination'])->name('examination');
        });

        Route::prefix('thanh-toan')->name('payment.')->group(function () {
            Route::get('/', [PaymentController::class, 'index'])->name('index');
            Route::get('/{id?}', [PaymentController::class, 'detail'])->name('detail');
        });

        Route::prefix('xet-nghiem')->name('medical_tests.')->group(function () {
            Route::get('/', [DesignatedServiceOfMedicalSessionController::class, 'index'])
                ->name('index')
                ->middleware('permission:List-medical-test');
            Route::get(
                '/phien-kham-chi-dinh/{id}',
                [
                    DesignatedServiceOfMedicalSessionController::class, 'view'
                ]
            )->name('view')->middleware('permission:View-medical-test');
        });

        Route::prefix('don-vi')->group(function () {
            Route::get('/', [UnitController::class, 'index'])->name('unit.index');
        });

        //MaterialType
        Route::prefix('phan-loai-vat-tu')->group(function () {
            Route::get('/', [MaterialTypeController::class, 'index'])->name('material_type.index');
        });

        Route::prefix('vat-tu')->group(function () {
            Route::get('/', [MaterialController::class, 'index'])->name('index.material');
        });

        Route::prefix('chuyen-vien')->group(function () {
            Route::get('/them-moi/{id}', [HospitalTransferController::class, 'create'])
                ->name('create.hospital_transfer');

            Route::get('/{id}', [HospitalTransferController::class, 'detail'])
                ->name('detail.hospital_transfer')
                ->middleware('permission:View-hospital-tranfer');

            Route::get('/in/{id}', [HospitalTransferController::class, 'print'])
                ->name('print.hospital_transfer')
                ->middleware('permission:Print-hospital-tranfer');

            Route::get('/', [HospitalTransferController::class, 'index'])
                ->name('index.hospital_transfer');
        });

        Route::prefix('dich-vu-chi-dinh')->group(function () {
            Route::get('/', [DesignatedServiceController::class, 'index'])
                ->name('index.designated_service');
        });

        Route::prefix('benh-vien')->group(function () {
            Route::get('/', [HospitalController::class, 'index'])->name('hospital.index');
        });

        // Manage disease
        Route::prefix('benh')->name('diseases.')->group(function () {
            Route::get('/', [DiseaseController::class, 'index'])->name('index');
        });


        Route::prefix('loai-kham')->name('examination_type.')->group(function () {
            Route::get('/', [ExaminationTypeController::class, 'index'])
                ->name('index')
                ->middleware('permission:List-examination-type');
        });

        Route::prefix('thiet-lap')->name('setting.')->group(function () {
            Route::get('/', [SettingController::class, 'view'])
                ->name('view')
                ->middleware('permission:View-setting');
        });
        Route::middleware('role:Giam-doc|Duoc-sy')->group(function () {
            Route::prefix('phan-quyen')->name('permission.')->group(function () {
                Route::get('/', [PermissionController::class, 'index'])->name('index');
                Route::get('/sua-quyen', [PermissionController::class, 'getPermission'])
                    ->name('getPermission');
            });
        });

        Route::prefix('phien-kham')->name('medical_session.')->group(function () {
            Route::get('/', [MedicalSessionController::class, 'index'])->name('index');
            Route::get('/list', [MedicalSessionController::class, 'list'])
                ->name('list')
                ->middleware('permission:List-medical-session');

            Route::get('/{id}', [MedicalSessionController::class, 'examination'])->name('examination');
        });


        // Report
        Route::middleware('permission:C79a-HD')->group(function () {
            Route::prefix('bao-cao-benh-nhan-bao-hiem-da-thanh-toan')->group(function () {
                Route::get('/', [ReportController::class, 'insurancePaidIndex'])
                    ->name('report.insurancePaidIndex');

                Route::get('/xuat-file-bao-cao-benh-nhan-bao-hiem-da-thanh-toan', [
                    ReportController::class,
                    'exportInsurancePaid'
                ])->name('export-insurance-paid');
            });
        });

        // Báo cáo danh sách thuốc đã phát
        Route::middleware('permission:20/BHYT')->group(function () {
            Route::prefix('danh-sach-thuoc-da-phat')->group(function () {
                Route::get('/', [ReportController::class, 'distributedMaterialsIndex'])
                    ->name('report.distributed_materials');

                Route::get('/xuat-file-danh-sach-thuoc-da-phat', [
                    ReportController::class,
                    'exportDistributedMaterial'
                ])->name('export-distributed-materials');
            });
        });

        // Report insurance
        Route::middleware('permission:Medical-examination-handbook')->group(function () {
            Route::prefix('bao-cao-benh-nhan-bh')->group(function () {
                Route::get('/', [ReportController::class, 'reportInsuranceIndex'])
                    ->name('report.reportInsuranceIndex');

                Route::get('/xuat-file-bao-cao-benh-nhan-bh', [
                    ReportController::class,
                    'exportInsurance'
                ])->name('export-insurance');
            });
        });
    });
});
