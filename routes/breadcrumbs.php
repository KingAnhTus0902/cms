<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('menu.home'), route('home'));
});


// Department
Breadcrumbs::for('admin.department.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.department'), route('admin.department.index'));
});

// User
Breadcrumbs::for('admin.users.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.users'), route('admin.users.index'));
});

Breadcrumbs::for('admin.users.list', function ($trail) {
    $trail->parent('admin.users.index');
    $trail->push(__('menu.list_management.users'), route('admin.users.list'));
});

Breadcrumbs::for('admin.users.view', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.my_profile'), route('admin.users.view'));
});

// Unit
Breadcrumbs::for('admin.unit.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.unit'), route('admin.unit.index'));
});
// Room
Breadcrumbs::for('admin.index.room', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.room'), route('admin.index.room'));
});

Breadcrumbs::for('admin.hospital.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.hospital'), route('admin.hospital.index'));
});

// Cadres
Breadcrumbs::for('admin.cadres.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.cadres'), route('admin.cadres.index'));
});

// Department
Breadcrumbs::for('admin.material_type.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.material_type'), route('admin.material_type.index'));
});

Breadcrumbs::for('admin.index.designated_service', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.designated_service'), route('admin.index.designated_service'));
});
// Material
Breadcrumbs::for('admin.index.material', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.material'), route('admin.index.material'));
});

// Disease
Breadcrumbs::for('admin.diseases.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.diseases'), route('admin.diseases.index'));
});

Breadcrumbs::for('admin.diseases.list', function ($trail) {
    $trail->parent('admin.diseases.index');
    $trail->push(__('menu.list_management.diseases'), route('admin.diseases.list'));
});

// MedicalSession
Breadcrumbs::for('admin.medical_session.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.medical_session'), route('admin.medical_session.index'));
});
// HospitalTransfer
Breadcrumbs::for('admin.index.hospital_transfer', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.hospital_transfer'), route('admin.index.hospital_transfer'));
});
Breadcrumbs::for('admin.create.hospital_transfer', function ($trail) {
    $trail->parent('admin.medical_session.examination');
    $trail->push(__('menu.list_management.hospital_transfer_add'));
});
Breadcrumbs::for('admin.detail.hospital_transfer', function ($trail) {
    $trail->parent('admin.index.hospital_transfer');
    $trail->push(__('menu.list_management.hospital_transfer_edit'));
});
// Payment
Breadcrumbs::for('admin.payment.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.payment'), route('admin.payment.index'));
});
Breadcrumbs::for('admin.payment.detail', function ($trail) {
    $trail->parent('admin.payment.index');
    $trail->push(__('menu.list_management.payment_detail'), route('admin.payment.detail'));
});
Breadcrumbs::for('admin.medical_session.examination', function ($trail) {
    $trail->parent('admin.medical_session.index');
    $trail->push(__('menu.list_management.examination'), route('admin.medical_session.index'));
});

// Examination Type
Breadcrumbs::for('admin.examination_type.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.examination_type'), route('admin.examination_type.index'));
});


// Setting
Breadcrumbs::for('admin.setting.view', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.setting'), route('admin.setting.view'));
});

// Medical test
Breadcrumbs::for('admin.medical_tests.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.medical_test'), route('admin.medical_tests.index'));
});

// Medical test
Breadcrumbs::for('admin.medical_tests.view', function ($trail) {
    $id = request()->route('id');
    $trail->parent('admin.medical_tests.index');
    $trail->push(__('menu.list_management.medical_test_view'), route('admin.medical_tests.view', $id));
});


//Export
Breadcrumbs::for('admin.report.reportInsuranceIndex', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.report_insurance'), route('admin.report.reportInsuranceIndex'));

});

//Permission
Breadcrumbs::for('admin.permission.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('menu.list_management.permission'), route('admin.permission.index'));
});

//Permission
Breadcrumbs::for('admin.permission.getPermission', function ($trail) {
    $trail->parent('admin.permission.index');
    $trail->push(__('menu.list_management.get_permission'), route('admin.permission.getPermission'));
});
