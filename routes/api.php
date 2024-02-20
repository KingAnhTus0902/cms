<?php

use App\Http\Controllers\Api\DesignatedServiceOfMedicalSessionController;
use App\Http\Controllers\Api\ImportMaterialsSlipController;
use App\Http\Controllers\Api\MedicalSessionController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\HospitalController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\CadresController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\DesignatedServiceController;
use App\Http\Controllers\Api\MaterialTypeController;
use App\Http\Controllers\Api\DiseaseController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ExaminationController;
use App\Http\Controllers\Api\ExaminationTypeController;
use App\Http\Controllers\Api\HealthInsuranceCardHeadController;
use App\Http\Controllers\Api\DiseaseOfMedicalSessionController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\MedicineOfMedicalSessionController;
use App\Http\Controllers\Api\HospitalTransferController;
use App\Http\Controllers\Api\DispenseMedicinesController;
use App\Http\Controllers\Api\HomePageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/districts', [AddressController::class, 'listDistrict'])->name('list.district');
    Route::get('/cities', [AddressController::class, 'listCity'])->name('list.city');
    Route::get('/folks', [CadresController::class, 'listFolk'])->name('list.folk');
    Route::post('/load-room-department', [RoomController::class, 'loadRoomByDepartment'])->name('department.room');
    Route::get('/department', [DepartmentController::class, 'listDepartment'])->name('list.department');
    Route::get('/room-by-department', [RoomController::class, 'roomOfExaminationDoctorByDepartment'])
        ->name('list.room.by.department');
    Route::get('/dashboard', [HomePageController::class, 'dashboard'])->name('dashboard');
    Route::get('/suggest-material-name', [MedicineOfMedicalSessionController::class, 'searchMaterial'])
        ->name('suggest.medicine_of_medical_session');
    Route::get('/material-detail/{id}', [MedicineOfMedicalSessionController::class, 'detailMaterial'])
        ->name('suggest.material.detail');
    Route::get('/suggest-hospital-name', [HospitalController::class, 'searchHospitalByCode'])
        ->name('suggest.hospital.name');


    Route::prefix('nguoi-dung')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'list'])
            ->name('list')
            ->middleware('permission:List-users');
        Route::post('/profile', [UserController::class, 'profile'])->name('profile');
        Route::put('/change-password', [UserController::class, 'changePassword'])->name('change-password');
    });

    Route::prefix('can-bo')->group(function () {
        Route::get('/list', [CadresController::class, 'list'])
            ->name('list.cadres')
            ->middleware('permission:List-cadres');
    });

    Route::prefix('don-vi')->group(function () {
        Route::get('/', [UnitController::class, 'list'])
            ->name('list.unit')
            ->middleware('permission:List-unit');
    });

    Route::prefix('phan-loai-vat-tu')->group(function () {
        Route::get('/list', [MaterialTypeController::class, 'listAjax'])
            ->name('material_type.list')
            ->middleware('permission:List-material_type');
    });

    Route::prefix('vat-tu')->group(function () {
        Route::get('/list', [MaterialController::class, 'list'])
            ->name('list.material')
            ->middleware('permission:List-material');
    });

    Route::prefix('dich-vu-chi-dinh')->group(function () {
        Route::get('/list', [DesignatedServiceController::class, 'list'])
            ->name('list.designated_service')
            ->middleware('permission:List-designated_service');
    });

    Route::prefix('chuyen-vien')->group(function () {
        Route::get('/list', [HospitalTransferController::class, 'list'])
            ->name('list.hospital_transfer')
            ->middleware('permission:List-hospital-tranfer');

        Route::post('/add', [HospitalTransferController::class, 'store'])
            ->name('store.hospital_transfer')
            ->middleware('permission:Create-hospital-tranfer');

        Route::post('/update/{id}', [HospitalTransferController::class, 'update'])
            ->name('update.hospital_transfer')
            ->middleware('permission:Edit-hospital-tranfer');
    });

    Route::prefix('benh-vien')->group(function () {
        Route::get('/list', [HospitalController::class, 'list'])
            ->name('list.hospital')
            ->middleware('permission:List-hospital');
    });

    Route::prefix('benh')->group(function () {
        Route::get('/', [DiseaseController::class, 'list'])
            ->name('diseases.list')
            ->middleware('permission:List-diseases');
    });


    Route::prefix('nguoi-dung')->name('users.')->group(function () {
        Route::post('/', [UserController::class, 'store'])
            ->name('store')
            ->middleware('permission:Create-user');

        Route::get('/{id}/edit', [UserController::class, 'edit'])
            ->name('edit')
            ->middleware('permission:View-user');

        Route::put('/{id}', [UserController::class, 'update'])
            ->name('update')
            ->middleware('permission:Edit-user');

        Route::delete('/{id}', [UserController::class, 'destroy'])
            ->name('destroy')
            ->middleware('permission:Delete-user');
    });

    //Cadres Management
    Route::prefix('can-bo')->group(function () {
        Route::post('/add', [CadresController::class, 'create'])
            ->name('create.cadres')
            ->middleware('permission:Create-cadres');

        Route::get('/{id}', [CadresController::class, 'detail'])
            ->name('detail.cadres')
            ->middleware('permission:View-cadres');

        Route::post('/update', [CadresController::class, 'update'])
            ->name('update.cadres')
            ->middleware('permission:Edit-cadres');

        Route::post('/delete', [CadresController::class, 'delete'])
            ->name('delete.cadres')
            ->middleware('permission:Delete-cadres');

        Route::post('/reset-password', [CadresController::class, 'resetPassword'])
            ->name('reset.password.cadres')
            ->middleware('permission:Reset-pass-cadres');

        Route::post('/change-status/{id}', [CadresController::class, 'changeStatus'])
            ->name('change.status.cadres')
            ->middleware('role:Giam-doc');
    });

    Route::prefix('khoa')->group(function () {
        Route::post('/add', [DepartmentController::class, 'create'])
            ->name('create.department')
            ->middleware('permission:Create-department');

        Route::get('/{id}', [DepartmentController::class, 'detail'])
            ->name('detail.department')
            ->middleware('permission:View-department');

        Route::post('/update', [DepartmentController::class, 'update'])
            ->name('update.department')
            ->middleware('permission:Edit-department');

        Route::post('/delete', [DepartmentController::class, 'delete'])
            ->name('delete.department')
            ->middleware('permission:Delete-department');
    });

    Route::prefix('benh-vien')->group(function () {
        Route::post('/add', [HospitalController::class, 'create'])
            ->name('create.hospital')
            ->middleware('permission:Create-hospital');

        Route::get('/{id}', [HospitalController::class, 'detail'])
            ->name('detail.hospital')
            ->middleware('permission:View-hospital');

        Route::post('/update', [HospitalController::class, 'update'])
            ->name('update.hospital')
            ->middleware('permission:Edit-hospital');

        Route::post('/delete', [HospitalController::class, 'delete'])
            ->name('delete.hospital')
            ->middleware('permission:Delete-hospital');
    });

    Route::prefix('benh')->name('diseases.')->group(function () {
        Route::post('/', [DiseaseController::class, 'store'])
            ->name('store')
            ->middleware('permission:Create-disease');

        Route::get('/{id}/edit', [DiseaseController::class, 'edit'])
            ->name('edit')
            ->middleware('permission:View-disease');

        Route::put('/{id}', [DiseaseController::class, 'update'])
            ->name('update')
            ->middleware('permission:Edit-disease');

        Route::delete('/{id}', [DiseaseController::class, 'destroy'])
            ->name('destroy')
            ->middleware('permission:Delete-disease');
    });

    Route::prefix('thanh-toan')->name('payment.')->group(function () {
        Route::get('/', [PaymentController::class, 'list'])
            ->name('list')
            ->middleware('permission:List-payment');

        Route::get('/{id?}/paymentDetail', [PaymentController::class, 'paymentDetail'])
            ->name('paymentDetail')
            ->middleware('permission:View-payment');

        Route::get('/{id?}/print', [PaymentController::class, 'print'])
            ->name('print')
            ->middleware('permission:Print-payment');

        Route::put('/{id}/confirm', [PaymentController::class, 'confirm'])
            ->name('confirm')
            ->middleware('permission:Confirm-payment');

        Route::put('/{id}/cancel', [PaymentController::class, 'cancel'])
            ->name('cancel')
            ->middleware('permission:Cancel-payment');
    });

    Route::prefix('phong-kham')->group(function () {
        Route::post('/add', [RoomController::class, 'create'])
            ->name('create.room')
            ->middleware('permission:Create-room');

        Route::get('/{id}', [RoomController::class, 'detail'])
            ->name('detail.room')
            ->middleware('permission:View-room');

        Route::post('/update', [RoomController::class, 'update'])
            ->name('update.room')
            ->middleware('permission:Edit-room');

        Route::post('/delete', [RoomController::class, 'delete'])
            ->name('delete.room')
            ->middleware('permission:Delete-room');
    });

    Route::prefix('don-vi')->group(function () {
        Route::post('/create', [UnitController::class, 'create'])
            ->name('create.unit')
            ->middleware('permission:Create-unit');

        Route::get('/{id}', [UnitController::class, 'detail'])
            ->name('detail.unit')
            ->middleware('permission:View-unit');

        Route::post('/update', [UnitController::class, 'update'])
            ->name('update.unit')
            ->middleware('permission:Edit-unit');

        Route::post('/delete', [UnitController::class, 'delete'])
            ->name('delete.unit')
            ->middleware('permission:Delete-unit');
    });
    //MaterialType
    Route::prefix('phan-loai-vat-tu')->group(function () {
        Route::post('/add', [MaterialTypeController::class, 'create'])
            ->name('create.material_type')
            ->middleware('permission:Create-material_type');

        Route::get('/{id}', [MaterialTypeController::class, 'detail'])
            ->name('detail.material_type')
            ->middleware('permission:View-material_type');

        Route::post('/update', [MaterialTypeController::class, 'update'])
            ->name('update.material_type')
            ->middleware('permission:Edit-material_type');

        Route::post('/delete', [MaterialTypeController::class, 'delete'])
            ->name('delete.material_type')
            ->middleware('permission:Delete-material_type');
    });
    Route::prefix('vat-tu')->group(function () {
        Route::post('/create', [MaterialController::class, 'create'])
            ->name('create.material')
            ->middleware('permission:Create-material');

        Route::get('/{id}', [MaterialController::class, 'detail'])
            ->name('detail.material')
            ->middleware('permission:View-material');

        Route::get('/{id}/amount', [MaterialController::class, 'detailAmount'])
            ->name('detail_amount.material')
            ->middleware('permission:View-material-ammout');

        Route::post('/update', [MaterialController::class, 'update'])
            ->name('update.material')
            ->middleware('permission:Edit-material');

        Route::post('/delete', [MaterialController::class, 'delete'])
            ->name('delete.material')
            ->middleware('permission:Delete-material');
    });

    Route::prefix('dich-vu-chi-dinh')->group(function () {
        Route::post('/add', [DesignatedServiceController::class, 'create'])
            ->name('create.designated_service')
            ->middleware('permission:Create-designated_service');

        Route::get('/{id}', [DesignatedServiceController::class, 'detail'])
            ->name('detail.designated_service')
            ->middleware('permission:View-designated_service');

        Route::post('/update', [DesignatedServiceController::class, 'update'])
            ->name('update.designated_service')
            ->middleware('permission:Edit-designated_service');

        Route::post('/delete', [DesignatedServiceController::class, 'delete'])
            ->name('delete.designated_service')
            ->middleware('permission:Delete-designated_service');

        Route::post('/upload', [DesignatedServiceController::class, 'upload'])
            ->name('upload.designated_service');
        Route::post('/upload/{id}', [DesignatedServiceController::class, 'upload'])
            ->name('upload_edit.designated_service');
    });


    Route::prefix('loai-kham')->name('examination_type.')->group(function () {
        Route::get('/', [ExaminationTypeController::class, 'list'])
            ->name('list')
            ->middleware('permission:List-examination-type');

        Route::post('/', [ExaminationTypeController::class, 'store'])
            ->name('store')
            ->middleware('permission:Create-examination-type');

        Route::get('/{id}/edit', [ExaminationTypeController::class, 'edit'])
            ->name('edit')
            ->middleware('permission:View-examination-type');

        Route::put('/{id}', [ExaminationTypeController::class, 'update'])
            ->name('update')
            ->middleware('permission:Edit-examination-type');

        Route::delete('/{id}', [ExaminationTypeController::class, 'destroy'])
            ->name('destroy')
            ->middleware('permission:Delete-examination-type');
    });

    Route::prefix('thiet-lap')->name('setting.')->group(function () {
        Route::post('/', [SettingController::class, 'update'])
            ->name('update')
            ->middleware('permission:Update-setting');
    });

    Route::middleware(['role:Giam-doc'])->group(function () {
        Route::prefix('phan-quyen')->name('permission.')->group(function () {
            Route::get('/', [PermissionController::class, 'list'])->name('list');
            Route::post('/', [PermissionController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PermissionController::class, 'update'])->name('update');
            Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('destroy');
            Route::put('/set-permission/{id}', [PermissionController::class, 'setPermission'])
                ->name('setPermission');
        });
    });

    Route::prefix('phien-kham')->name('medical_session.')->group(function () {
        Route::post('/add-cadres', [MedicalSessionController::class, 'createCadres'])
            ->name('create.cadres')
            ->middleware('permission:Create-or-update-cadre-medical-session');

        Route::post('/update-cadres', [MedicalSessionController::class, 'updateCadres'])
            ->name('update.cadres')
            ->middleware('permission:Create-or-update-cadre-medical-session');

        Route::get('/cadres/{id}', [CadresController::class, 'detail'])
            ->name('detail.cadres')
            ->middleware('permission:View-cadre-and-department-room-medical-session');

        Route::get('/suggest-cadres', [MedicalSessionController::class, 'searchCadresByName'])
            ->name('suggest.cadres');

        Route::post('/add-medical-session', [MedicalSessionController::class, 'create'])
            ->name('create')
            ->middleware('permission:Create-medical-session');

        Route::post('/update-medical-session', [MedicalSessionController::class, 'update'])
            ->name('update')
            ->middleware('permission:Edit-medical-session');

        Route::get('/{id}', [MedicalSessionController::class, 'detail'])
            ->name('detail')
            ->middleware('permission:View-medical-session');

        Route::put('/medical_session/{id}/diagnose', [MedicalSessionController::class, 'diagnose'])
            ->name('diagnose')
            ->middleware('permission:Diagnose-medical-session');

        Route::put('/medical_session/{id}/conclude', [MedicalSessionController::class, 'conclude'])
            ->name('conclude')
            ->middleware('permission:Conclude-medical-session');

        Route::post('/change-room', [MedicalSessionController::class, 'changeRoom'])
            ->name('change_room')
            ->middleware('permission:Change-room-medical-session');

        Route::post('/re_examination', [MedicalSessionController::class, 'reExamination'])
            ->name('re_examination')
            ->middleware('permission:Re-examination-medical-session');

        Route::post('/cancel/{id}', [MedicalSessionController::class, 'cancel'])
            ->name('cancel')
            ->middleware('permission:Cancel-medical-session');

        Route::post('/update_status_cancel/{id}', [MedicalSessionController::class, 'updateStatusCancel'])
            ->name('update_status_cancel')
            ->middleware('permission:Finish-medical-session');

        Route::post('/complete/{id}', [MedicalSessionController::class, 'complete'])
            ->name('complete')
            ->middleware('permission:Finish-medical-session');

        Route::post('/update_status_complete/{id}', [MedicalSessionController::class, 'updateStatusComplete'])
            ->name('update_status_complete')
            ->middleware('permission:Finish-medical-session');

        Route::post('/waiting-result/{id}', [MedicalSessionController::class, 'waitingResult'])
            ->name('waiting_result')
            ->middleware('permission:Do-medical-session');

        Route::post('/transfer/{id}', [MedicalSessionController::class, 'transfer'])
            ->name('transfer')
            ->middleware('permission:Change-hospital-medical-session');

        //Examination
        Route::prefix('examination')->name('examination.')->group(function () {
            Route::post('/{id}', [ExaminationController::class, 'createOrUpdate'])
                ->name('create_or_update')
                ->middleware('permission:Save-cadre-info-medical-session');

            Route::post('start/{id}', [ExaminationController::class, 'createOrUpdate'])
                ->name('start_medical_session')
                ->middleware('permission:Start-medical-session');
        });

        //Disease of Medical Session
        Route::prefix('disease')->name('disease.')->group(function () {
            Route::get('/list', [DiseaseOfMedicalSessionController::class, 'list'])
                ->name('list')
                ->middleware('permission:List-disease-medical-session');

            Route::get('/suggest-disease', [DiseaseOfMedicalSessionController::class, 'searchDiseaseByName'])
                ->name('suggest.disease');

            Route::post('/create-or-update', [DiseaseOfMedicalSessionController::class, 'createOrUpdate'])
                ->name('create_or_update')
                ->middleware('permission:Delete-disease-medical-session');
        });
    });

    Route::prefix('chi-dinh-phien-kham')
        ->name('designated_service_of_medical_session.')->group(function () {
            Route::get('/medical_session/{id?}', [DesignatedServiceOfMedicalSessionController::class, 'list'])
                ->name('list')
                ->middleware('permission:List-designated-service-medical-session');

            Route::get('/medical_test/{id?}', [DesignatedServiceOfMedicalSessionController::class, 'list'])
                ->name('list_medical_test')
                ->middleware('permission:List-medical-test');

            Route::post('/medical_session/{id}', [DesignatedServiceOfMedicalSessionController::class, 'store'])
                ->name('store')
                ->middleware('permission:Create-designated-service-medical-session');

            Route::get('/{id}/edit', [DesignatedServiceOfMedicalSessionController::class, 'edit'])
                ->name('edit')
                ->middleware('permission:View-designated-service-medical-session');

            Route::put('/{id}', [DesignatedServiceOfMedicalSessionController::class, 'update'])
                ->name('update')
                ->middleware('permission:Edit-designated-service-medical-session');

            Route::delete('/{id}', [DesignatedServiceOfMedicalSessionController::class, 'destroy'])
                ->name('destroy')
                ->middleware('permission:Delete-designated-service-medical-session');

            Route::get('/print/medical_session/{medical_session_id}/{id?}', [
                DesignatedServiceOfMedicalSessionController::class, 'print'
            ])->name('print')
                ->middleware('permission:Print-designated-service-medical-session');
        });

    Route::prefix('xet-nghiem')->name('medical_tests.')->group(function () {
        Route::get('/print/{id}', [DesignatedServiceOfMedicalSessionController::class, 'printMedicalTest'])
            ->name('print_medical_test')
            ->middleware('permission:Print-medical-test');

        Route::put('/{id}', [DesignatedServiceOfMedicalSessionController::class, 'status'])
            ->name('status')
            ->middleware('permission:Finish-medical-test|Draft-medical-test|Cancel-medical-test');

        Route::post('/upload/{id}', [DesignatedServiceOfMedicalSessionController::class, 'upload'])
            ->name('upload');
    });

    Route::prefix('medical-examination')->group(function () {
        Route::prefix('prescription')->group(function () {
            Route::get('/list', [MedicineOfMedicalSessionController::class, 'list'])
                ->name('list.medicine_of_medical_session')
                ->middleware('permission:List-medicines-medical-session');

            Route::post('/create', [MedicineOfMedicalSessionController::class, 'create'])
                ->name('create.medicine_of_medical_session')
                ->middleware('permission:Create-medicines-medical-session');

            Route::get('/{id}', [MedicineOfMedicalSessionController::class, 'detail'])
                ->name('detail.medicine_of_medical_session')
                ->middleware('permission:View-medicines-medical-session');

            Route::post('/update', [MedicineOfMedicalSessionController::class, 'update'])
                ->name('update.medicine_of_medical_session')
                ->middleware('permission:Edit-medicines-medical-session');

            Route::post('/delete', [MedicineOfMedicalSessionController::class, 'delete'])
                ->name('delete.medicine_of_medical_session')
                ->middleware('permission:Delete-medicines-medical-session');

            Route::get('/print/{medical_session_id}', [MedicineOfMedicalSessionController::class, 'print'])
                ->name('print.prescription')
                ->middleware('permission:Print-medicines-medical-session');
        });
    });

    Route::prefix('bao-cao')->name('report.')->group(function () {
        Route::get('/bao-cao-benh-nhan-bh', [ReportController::class, 'insuranceList'])
            ->name('insuranceList')
            ->middleware('permission:Medical-examination-handbook');
    });
});
