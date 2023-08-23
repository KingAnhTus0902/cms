<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('group_permissions')->truncate();

        // Default value
        $default = [
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ];

        // Role
        $role = [
            [
                'name' => 'Giam-doc',
                'default_name' => 'Giám đốc',
                'order' => 1
            ],
            [
                'name' => 'Bac-sy-kham',
                'default_name' => 'Bác sỹ khám',
                'order' => 2
            ],
            [
                'name' => 'Bac-sy-chi-dinh',
                'default_name' => 'Bác sỹ chỉ định',
                'order' => 3
            ],
            [
                'name' => 'Don-tiep',
                'default_name' => 'Đón tiếp',
                'order' => 5
            ],
            [
                'name' => 'Duoc-sy',
                'default_name' => 'Dược sỹ',
                'order' => 4
            ]
        ];

        // Permission
        $permission = [
            [
                'name' => 'List-news',
                'default_name' => 'Xem danh sách tin tức',
                'group_id' => 3,
                'order' => 1
            ], //1
            [
                'name' => 'List-users',
                'default_name' => 'Xem danh sách người dùng',
                'group_id' => 1,
                'order' => 6
            ], //2
            [
                'name' => 'List-cadres',
                'default_name' => 'Xem danh sách cán bộ',
                'group_id' => 2,
                'order' => 11
            ], //3
            [
                'name' => 'List-unit',
                'default_name' => 'Xem danh sách đơn vị thuốc, vật tư',
                'group_id' => 4,
                'order' => 17
            ], //4
            [
                'name' => 'List-material_type',
                'default_name' => 'Xem danh sách loại thuốc, vật tư',
                'group_id' => 5,
                'order' => 22
            ], //5
            [
                'name' => 'List-material',
                'default_name' => 'Xem danh sách thuốc, vật tư',
                'group_id' => 6,
                'order' => 27
            ], //6
            [
                'name' => 'List-designated_service',
                'default_name' => 'Xem danh sách dịch vụ chỉ định',
                'group_id' => 7,
                'order' => 33
            ], //7
            [
                'name' => 'List-hospital',
                'default_name' => 'Xem danh sách bệnh viện',
                'group_id' => 8,
                'order' => 38
            ], //8
            [
                'name' => 'List-diseases',
                'default_name' => 'Xem danh sách bệnh',
                'group_id' => 9,
                'order' => 43
            ], //9
            [
                'name' => 'Create-new',
                'default_name' => 'Tạo tin tức',
                'group_id' => 3,
                'order' => 2
            ], //10
            [
                'name' => 'View-new',
                'default_name' => 'Xem thông tin tin tức',
                'group_id' => 3,
                'order' => 3
            ], //11
            [
                'name' => 'Edit-new',
                'default_name' => 'Chỉnh sửa tin tức',
                'group_id' => 3,
                'order' => 4
            ], //12
            [
                'name' => 'Delete-new',
                'default_name' => 'Xóa tin tức',
                'group_id' => 3,
                'order' => 5
            ], //13
            [
                'name' => 'Create-user',
                'default_name' => 'Tạo người dùng',
                'group_id' => 1,
                'order' => 7
            ], //14
            [
                'name' => 'View-user',
                'default_name' => 'Xem thông tin người dùng',
                'group_id' => 1,
                'order' => 8
            ], //15
            [
                'name' => 'Edit-user',
                'default_name' => 'Chỉnh sửa người dùng',
                'group_id' => 1,
                'order' => 9
            ], //16
            [
                'name' => 'Delete-user',
                'default_name' => 'Xóa người dùng',
                'group_id' => 1,
                'order' => 10
            ], //17
            [
                'name' => 'Create-cadres',
                'default_name' => 'Tạo cán bộ',
                'group_id' => 2,
                'order' => 12
            ], //18
            [
                'name' => 'View-cadres',
                'default_name' => 'Xem thông tin cán bộ',
                'group_id' => 2,
                'order' => 13,
            ], //19
            [
                'name' => 'Edit-cadres',
                'default_name' => 'Chỉnh sửa cán bộ',
                'group_id' => 2,
                'order' => 14
            ], //20
            [
                'name' => 'Delete-cadres',
                'default_name' => 'Xóa cán bộ',
                'group_id' => 2,
                'order' => 15
            ], //21
            [
                'name' => 'Create-department',
                'default_name' => 'Tạo khoa',
                'group_id' => 10,
                'order' => 49
            ], //22
            [
                'name' => 'View-department',
                'default_name' => 'Xem thông tin khoa',
                'group_id' => 10,
                'order' => 50
            ], //23
            [
                'name' => 'Edit-department',
                'default_name' => 'Chỉnh sửa khoa',
                'group_id' => 10,
                'order' => 51
            ], //24
            [
                'name' => 'Delete-department',
                'default_name' => 'Xóa khoa',
                'group_id' => 10,
                'order' => 52
            ], //25
            [
                'name' => 'Create-hospital',
                'default_name' => 'Tạo bệnh viện',
                'group_id' => 8,
                'order' => 39
            ], //26
            [
                'name' => 'View-hospital',
                'default_name' => 'Xem thông tin bệnh viện',
                'group_id' => 8,
                'order' => 40
            ], //27
            [
                'name' => 'Edit-hospital',
                'default_name' => 'Chỉnh sửa bệnh viện',
                'group_id' => 8,
                'order' => 41
            ], //28
            [
                'name' => 'Delete-hospital',
                'default_name' => 'Xóa bệnh viện',
                'group_id' => 8,
                'order' => 42
            ], //29
            [
                'name' => 'Create-disease',
                'default_name' => 'Tạo bệnh',
                'group_id' => 9,
                'order' => 44
            ], //30
            [
                'name' => 'View-disease',
                'default_name' => 'Xem thông tin bệnh',
                'group_id' => 9,
                'order' => 45
            ], //31
            [
                'name' => 'Edit-disease',
                'default_name' => 'Chỉnh sửa bệnh',
                'group_id' => 9,
                'order' => 46
            ], //32
            [
                'name' => 'Delete-disease',
                'default_name' => 'Xóa bệnh',
                'group_id' => 9,
                'order' => 47
            ], //33
            [
                'name' => 'Create-room',
                'default_name' => 'Tạo phòng khám',
                'group_id' => 11,
                'order' => 55
            ], //34
            [
                'name' => 'View-room',
                'default_name' => 'Xem thông tin phòng khám',
                'group_id' => 11,
                'order' => 56
            ], //35
            [
                'name' => 'Edit-room',
                'default_name' => 'Chỉnh sửa phòng khám',
                'group_id' => 11,
                'order' => 57
            ], //36
            [
                'name' => 'Delete-room',
                'default_name' => 'Xóa phòng khám',
                'group_id' => 11,
                'order' => 58
            ], //37
            [
                'name' => 'Load-room-department',
                'default_name' => 'Liệt kê phòng khám theo khoa',
                'group_id' => 10,
                'order' => 53
            ], //38
            [
                'name' => 'Create-unit',
                'default_name' => 'Tạo đơn vị thuốc, vật tư',
                'group_id' => 4,
                'order' => 18
            ], //39
            [
                'name' => 'View-unit',
                'default_name' => 'Xem thông tin đơn vị thuốc, vật tư',
                'group_id' => 4,
                'order' => 19
            ], //40
            [
                'name' => 'Edit-unit',
                'default_name' => 'Chỉnh sửa đơn vị thuốc, vật tư',
                'group_id' => 4,
                'order' => 20
            ], //41
            [
                'name' => 'Delete-unit',
                'default_name' => 'Xóa đơn vị thuốc, vật tư',
                'group_id' => 4,
                'order' => 21
            ], //42
            [
                'name' => 'Create-material_type',
                'default_name' => 'Tạo loại thuốc, vật tư',
                'group_id' => 5,
                'order' => 23
            ], //43
            [
                'name' => 'View-material_type',
                'default_name' => 'Xem thông tin loại thuốc, vật tư',
                'group_id' => 5,
                'order' => 24
            ], //44
            [
                'name' => 'Edit-material_type',
                'default_name' => 'Chỉnh sửa loại thuốc, vật tư',
                'group_id' => 5,
                'order' => 25
            ], //45
            [
                'name' => 'Delete-material_type',
                'default_name' => 'Xóa loại thuốc, vật tư',
                'group_id' => 5,
                'order' => 26
            ], //46
            [
                'name' => 'Create-material',
                'default_name' => 'Tạo thuốc, vật tư',
                'group_id' => 6,
                'order' => 28
            ], //47
            [
                'name' => 'View-material',
                'default_name' => 'Xem thông tin thuốc, vật tư',
                'group_id' => 6,
                'order' => 29
            ], //48
            [
                'name' => 'Edit-material',
                'default_name' => 'Chỉnh sửa thuốc, vật tư',
                'group_id' => 6,
                'order' => 30
            ], //49
            [
                'name' => 'Delete-material',
                'default_name' => 'Xóa thuốc, vật tư',
                'group_id' => 6,
                'order' => 31
            ], //50
            [
                'name' => 'Create-designated_service',
                'default_name' => 'Tạo dịch vụ chỉ định',
                'group_id' => 7,
                'order' => 34
            ], //51
            [
                'name' => 'View-designated_service',
                'default_name' => 'Xem thông tin dịch vụ chỉ định',
                'group_id' => 7,
                'order' => 35
            ], //52
            [
                'name' => 'Edit-designated_service',
                'default_name' => 'Chỉnh sửa dịch vụ chỉ định',
                'group_id' => 7,
                'order' => 36
            ], //53
            [
                'name' => 'Delete-designated_service',
                'default_name' => 'Xóa dịch vụ chỉ định',
                'group_id' => 7,
                'order' => 37
            ], //54
            [
                'name' => 'Reset-pass-cadres',
                'default_name' => 'Thay đổi mật khẩu cán bộ',
                'group_id' => 2,
                'order' => 16
            ], //55
            [
                'name' => 'List-department',
                'default_name' => 'Xem danh sách khoa',
                'group_id' => 10,
                'order' => 48
            ], //56
            [
                'name' => 'List-room',
                'default_name' => 'Xem danh sách phòng khám',
                'group_id' => 11,
                'order' => 54
            ], //57
            [
                'name' => 'List-health-insurance-card-head',
                'default_name' => 'Xem danh sách đầu thẻ bảo hiểm y tế',
                'group_id' => 12,
                'order' => 59
            ], //58
            [
                'name' => 'Create-health-insurance-card-head',
                'default_name' => 'Tạo đầu thẻ bảo hiểm y tế',
                'group_id' => 12,
                'order' => 60
            ], //59
            [
                'name' => 'Edit-health-insurance-card-head',
                'default_name' => 'Chỉnh sửa đầu thẻ bảo hiểm y tế',
                'group_id' => 12,
                'order' => 62
            ], //60
            [
                'name' => 'Delete-health-insurance-card-head',
                'default_name' => 'Xóa đầu thẻ bảo hiểm y tế',
                'group_id' => 12,
                'order' => 63
            ], //61
            [
                'name' => 'View-setting',
                'default_name' => 'Xem cài đặt thiết lập',
                'group_id' => 13,
                'order' => 64
            ], //62
            [
                'name' => 'Update-setting',
                'default_name' => 'Chỉnh sửa cài đặt thiết lập',
                'group_id' => 13,
                'order' => 65
            ], //63
            [
                'name' => 'List-medical-session',
                'default_name' => 'Xem danh sách phiên khám',
                'group_id' => 14,
                'order' => 66
            ], //64
            [
                'name' => 'Search-medical-session',
                'default_name' => 'Tìm kiếm phiên khám',
                'group_id' => 14,
                'order' => 73
            ], //65
            [
                'name' => 'Create-medical-session',
                'default_name' => 'Tạo phiên khám',
                'group_id' => 14,
                'order' => 67
            ],//66
            [
                'name' => 'View-medical-session',
                'default_name' => 'Xem phiên khám',
                'group_id' => 14,
                'order' => 68
            ], //67
            [
                'name' => 'Start-medical-session',
                'default_name' => 'Bắt đầu khám bệnh',
                'group_id' => 14,
                'order' => 76
            ], //68
            [
                'name' => 'Save-cadre-info-medical-session',
                'default_name' => 'Lưu thông tin cơ bản của bệnh nhân',
                'group_id' => 14,
                'order' => 75
            ], //69
            [
                'name' => 'List-designated-service-medical-session',
                'default_name' => 'Xem danh sách chỉ định',
                'group_id' => 14,
                'order' => 78
            ], //70
            [
                'name' => 'View-designated-service-medical-session',
                'default_name' => 'Xem chỉ định',
                'group_id' => 14,
                'order' => 80
            ], //71
            [
                'name' => 'Create-designated-service-medical-session',
                'default_name' => 'Tạo chỉ định',
                'group_id' => 14,
                'order' => 79
            ], //72
            [
                'name' => 'Edit-designated-service-medical-session',
                'default_name' => 'Chỉnh sửa chỉ định',
                'group_id' => 14,
                'order' => 81
            ], //73
            [
                'name' => 'Delete-designated-service-medical-session',
                'default_name' => 'Xóa chỉ định',
                'group_id' => 14,
                'order' => 82
            ], //74
            [
                'name' => 'Print-designated-service-medical-session',
                'default_name' => 'In chỉ định',
                'group_id' => 14,
                'order' => 83
            ], //75
            [
                'name' => 'List-disease-medical-session',
                'default_name' => 'Chọn bệnh chính bệnh phụ',
                'group_id' => 14,
                'order' => 84
            ], //76
            [
                'name' => 'Delete-disease-medical-session',
                'default_name' => 'Xóa bệnh chính bệnh phụ',
                'group_id' => 14,
                'order' => 85
            ], //77
            [
                'name' => 'List-medicines-medical-session',
                'default_name' => 'Xem danh sách đơn thuốc',
                'group_id' => 14,
                'order' => 87
            ], //78
            [
                'name' => 'View-medicines-medical-session',
                'default_name' => 'Xem đơn thuốc',
                'group_id' => 14,
                'order' => 89
            ], //79
            [
                'name' => 'Edit-medicines-medical-session',
                'default_name' => 'Chỉnh sửa đơn thuốc',
                'group_id' => 14,
                'order' => 90
            ], //80
            [
                'name' => 'Delete-medicines-medical-session',
                'default_name' => 'Xóa đơn thuốc',
                'group_id' => 14,
                'order' => 91
            ], //81
            [
                'name' => 'Print-medicines-medical-session',
                'default_name' => 'In đơn thuốc',
                'group_id' => 14,
                'order' => 92
            ], //82
            [
                'name' => 'Change-room-medical-session',
                'default_name' => 'Chuyển phòng khám',
                'group_id' => 14,
                'order' => 93
            ], //83
            [
                'name' => 'Cancel-medical-session',
                'default_name' => 'Hủy phiên khám',
                'group_id' => 14,
                'order' => 94
            ], //84
            [
                'name' => 'Do-medical-session',
                'default_name' => 'Chờ kết quả',
                'group_id' => 14,
                'order' => 95
            ], //85
            [
                'name' => 'Finish-medical-session',
                'default_name' => 'Hoàn thành phiên khám',
                'group_id' => 14,
                'order' => 96
            ], //86
            [
                'name' => 'Change-hospital-medical-session',
                'default_name' => 'Chuyển viện',
                'group_id' => 14,
                'order' => 97
            ], //87
            [
                'name' => 'List-medical-test',
                'default_name' => 'Xem danh sách xét nghiệm',
                'group_id' => 15,
                'order' => 98
            ], //88
            [
                'name' => 'View-medical-test',
                'default_name' => 'Xem xét nghiệm',
                'group_id' => 15,
                'order' => 99
            ], //89
            [
                'name' => 'Do-medical-test',
                'default_name' => 'Thực hiện xét nghiệm',
                'group_id' => 15,
                'order' => 100
            ], //90
            [
                'name' => 'Finish-medical-test',
                'default_name' => 'Hoàn thành xét nghiệm',
                'group_id' => 15,
                'order' => 101
            ], //91
            [
                'name' => 'Draft-medical-test',
                'default_name' => 'Lưu nháp xét nghiệm',
                'group_id' => 15,
                'order' => 102
            ], //92
            [
                'name' => 'Print-medical-test',
                'default_name' => 'In kết quả xét nghiệm',
                'group_id' => 15,
                'order' => 103
            ], //93
            [
                'name' => 'Cancel-medical-test',
                'default_name' => 'Hủy xét nghiệm',
                'group_id' => 15,
                'order' => 104
            ], //94
            [
                'name' => 'List-hospital-tranfer',
                'default_name' => 'Xem danh sách chuyển viện',
                'group_id' => 16,
                'order' => 105
            ], //95
            [
                'name' => 'View-hospital-tranfer',
                'default_name' => 'Xem chuyển viện',
                'group_id' => 16,
                'order' => 107
            ], //96
            [
                'name' => 'Edit-hospital-tranfer',
                'default_name' => 'Chỉnh sửa chuyển viện',
                'group_id' => 16,
                'order' => 108
            ], //97
            [
                'name' => 'Print-hospital-tranfer',
                'default_name' => 'In chuyển viện',
                'group_id' => 16,
                'order' => 109
            ], //98
            [
                'name' => 'List-dispense-medicine',
                'default_name' => 'Xem danh sách phát thuốc',
                'group_id' => 17,
                'order' => 110
            ], //99
            [
                'name' => 'View-dispense-medicine',
                'default_name' => 'Xem phát thuốc',
                'group_id' => 17,
                'order' => 112
            ], //100
            [
                'name' => 'Do-dispense-medicine',
                'default_name' => 'Phát thuốc',
                'group_id' => 17,
                'order' => 111
            ], //101
            [
                'name' => 'Cancel-dispense-medicine',
                'default_name' => 'Hủy đơn phát thuốc',
                'group_id' => 17,
                'order' => 113
            ], //102
            [
                'name' => 'List-payment',
                'default_name' => 'Xem danh sách thanh toán',
                'group_id' => 18,
                'order' => 114
            ], //103
            [
                'name' => 'View-payment',
                'default_name' => 'Xem thanh toán',
                'group_id' => 18,
                'order' => 116
            ], //104
            [
                'name' => 'Confirm-payment',
                'default_name' => 'Xác nhận thanh toán',
                'group_id' => 18,
                'order' => 117
            ], //105
            [
                'name' => 'Cancel-payment',
                'default_name' => 'Hủy thanh toán',
                'group_id' => 18,
                'order' => 118
            ], //106
            [
                'name' => 'Print-payment',
                'default_name' => 'In thanh toán',
                'group_id' => 18,
                'order' => 119
            ], //107
            [
                'name' => 'List-materials-slip',
                'default_name' => 'Xem danh sách phiếu nhập kho',
                'group_id' => 19,
                'order' => 120
            ], //108
            [
                'name' => 'View-materials-slip',
                'default_name' => 'Xem phiếu nhập kho',
                'group_id' => 19,
                'order' => 122
            ], //109
            [
                'name' => 'Create-materials-slip',
                'default_name' => 'Tạo phiếu nhập kho',
                'group_id' => 19,
                'order' => 121
            ], //110
            [
                'name' => 'Edit-materials-slip',
                'default_name' => 'Sửa phiếu nhập kho',
                'group_id' => 19,
                'order' => 123
            ], //111
            [
                'name' => 'Import-materials-slip',
                'default_name' => 'Nhập CSV phiếu nhập kho',
                'group_id' => 19,
                'order' => 125
            ], //112
            [
                'name' => 'Delete-materials-slip',
                'default_name' => 'Xóa phiếu nhập kho',
                'group_id' => 19,
                'order' => 124
            ], //113
            [
                'name' => 'Create-hospital-tranfer',
                'default_name' => 'Tạo chuyển viện',
                'group_id' => 16,
                'order' => 106
            ], //114
            [
                'name' => 'View-material-ammout',
                'default_name' => 'Chi tiết số lượng thuốc, vật tư',
                'group_id' => 6,
                'order' => 32
            ], //115
            [
                'name' => 'View-health-insurance-card-head',
                'default_name' => 'Xem đầu thẻ bảo hiểm y tế',
                'group_id' => 12,
                'order' => 61
            ], //116
            [
                'name' => 'Edit-medical-session',
                'default_name' => 'Chỉnh sửa phiên khám',
                'group_id' => 14,
                'order' => 69
            ], //117
            [
                'name' => 'Create-or-update-cadre-medical-session',
                'default_name' => 'Thêm hoặc chỉnh sửa bệnh nhân',
                'group_id' => 14,
                'order' => 70
            ], //118
            [
                'name' => 'View-cadre-and-department-room-medical-session',
                'default_name' => 'Xem bệnh nhân, khoa và phòng khám',
                'group_id' => 14,
                'order' => 71
            ], //119
            [
                'name' => 'Diagnose-medical-session',
                'default_name' => 'Chẩn đoán',
                'group_id' => 14,
                'order' => 77
            ], //120
            [
                'name' => 'Conclude-medical-session',
                'default_name' => 'Kết luận',
                'group_id' => 14,
                'order' => 86
            ], //121
            [
                'name' => 'C79a-HD',
                'default_name' => 'Báo cáo C79a-HD',
                'group_id' => 20,
                'order' => 126
            ], //122
            [
                'name' => 'Medical-examination-handbook',
                'default_name' => 'Sổ tay khám bệnh',
                'group_id' => 20,
                'order' => 127
            ], //123
            [
                'name' => '20/BHYT',
                'default_name' => 'Báo cáo 20/BHYT',
                'group_id' => 20,
                'order' => 128
            ], //124
            [
                'name' => 'Create-medicines-medical-session',
                'default_name' => 'Tạo đơn thuốc',
                'group_id' => 14,
                'order' => 88
            ], //125
            [
                'name' => 'List-examination-type',
                'default_name' => 'Xem danh sách loại khám',
                'group_id' => 21,
                'order' => 129
            ], //126
            [
                'name' => 'Create-examination-type',
                'default_name' => 'Tạo loại khám',
                'group_id' => 21,
                'order' => 130
            ], //127
            [
                'name' => 'View-examination-type',
                'default_name' => 'Xem thông tin loại khám',
                'group_id' => 21,
                'order' => 131
            ], //128
            [
                'name' => 'Edit-examination-type',
                'default_name' => 'Chỉnh sửa loại khám',
                'group_id' => 21,
                'order' => 132
            ], //129
            [
                'name' => 'Delete-examination-type',
                'default_name' => 'Xóa loại khám',
                'group_id' => 21,
                'order' => 133
            ], //130
            [
                'name' => 'Re-examination-medical-session',
                'default_name' => 'Hẹn ngày khám lại',
                'group_id' => 14,
                'order' => 98
            ], //131
        ];

        // Role has any permission
        $roleHasPermission = [
            // Giam-doc|Bac-sy-kham|Bac-sy-chi-dinh|Don-tiep|Duoc-sy
            ['role_id' => 1, 'permission_id' => 1],
            ['role_id' => 2, 'permission_id' => 1],
            ['role_id' => 3, 'permission_id' => 1],
            ['role_id' => 4, 'permission_id' => 1],
            ['role_id' => 5, 'permission_id' => 1],

            ['role_id' => 1, 'permission_id' => 2],
            ['role_id' => 2, 'permission_id' => 2],
            ['role_id' => 3, 'permission_id' => 2],
            ['role_id' => 4, 'permission_id' => 2],
            ['role_id' => 5, 'permission_id' => 2],

            ['role_id' => 1, 'permission_id' => 3],
            ['role_id' => 2, 'permission_id' => 3],
            ['role_id' => 3, 'permission_id' => 3],
            ['role_id' => 4, 'permission_id' => 3],
            ['role_id' => 5, 'permission_id' => 3],

            ['role_id' => 1, 'permission_id' => 56],
            ['role_id' => 2, 'permission_id' => 56],
            ['role_id' => 3, 'permission_id' => 56],
            ['role_id' => 4, 'permission_id' => 56],
            ['role_id' => 5, 'permission_id' => 56],

            ['role_id' => 1, 'permission_id' => 57],
            ['role_id' => 2, 'permission_id' => 57],
            ['role_id' => 3, 'permission_id' => 57],
            ['role_id' => 4, 'permission_id' => 57],
            ['role_id' => 5, 'permission_id' => 57],

            // Giam-doc|Bac-sy-kham|Bac-sy-chi-dinh|Duoc-sy
            ['role_id' => 1, 'permission_id' => 4],
            ['role_id' => 2, 'permission_id' => 4],
            ['role_id' => 3, 'permission_id' => 4],
            ['role_id' => 5, 'permission_id' => 4],

            ['role_id' => 1, 'permission_id' => 5],
            ['role_id' => 2, 'permission_id' => 5],
            ['role_id' => 3, 'permission_id' => 5],
            ['role_id' => 5, 'permission_id' => 5],

            ['role_id' => 1, 'permission_id' => 6],
            ['role_id' => 2, 'permission_id' => 6],
            ['role_id' => 3, 'permission_id' => 6],
            ['role_id' => 5, 'permission_id' => 6],

            // Giam-doc|Bac-sy-kham|Bac-sy-chi-dinh|Don-tiep
            ['role_id' => 1, 'permission_id' => 7],
            ['role_id' => 2, 'permission_id' => 7],
            ['role_id' => 3, 'permission_id' => 7],
            ['role_id' => 4, 'permission_id' => 7],

            ['role_id' => 1, 'permission_id' => 90],
            ['role_id' => 2, 'permission_id' => 90],
            ['role_id' => 3, 'permission_id' => 90],

            ['role_id' => 1, 'permission_id' => 70],
            ['role_id' => 2, 'permission_id' => 70],
            ['role_id' => 3, 'permission_id' => 70],
            ['role_id' => 4, 'permission_id' => 70],

            ['role_id' => 1, 'permission_id' => 88],
            ['role_id' => 2, 'permission_id' => 88],
            ['role_id' => 3, 'permission_id' => 88],
            ['role_id' => 4, 'permission_id' => 88],

            ['role_id' => 1, 'permission_id' => 89],
            ['role_id' => 2, 'permission_id' => 89],
            ['role_id' => 3, 'permission_id' => 89],
            ['role_id' => 4, 'permission_id' => 89],

            // Giam-doc|Bac-sy-kham|Bac-sy-chi-dinh
            ['role_id' => 1, 'permission_id' => 8],
            ['role_id' => 2, 'permission_id' => 8],
            ['role_id' => 3, 'permission_id' => 8],

            ['role_id' => 1, 'permission_id' => 9],
            ['role_id' => 2, 'permission_id' => 9],
            ['role_id' => 3, 'permission_id' => 9],

            ['role_id' => 1, 'permission_id' => 10],
            ['role_id' => 2, 'permission_id' => 10],
            ['role_id' => 3, 'permission_id' => 10],

            ['role_id' => 1, 'permission_id' => 11],
            ['role_id' => 2, 'permission_id' => 11],
            ['role_id' => 3, 'permission_id' => 11],

            ['role_id' => 1, 'permission_id' => 12],
            ['role_id' => 2, 'permission_id' => 12],
            ['role_id' => 3, 'permission_id' => 12],

            ['role_id' => 1, 'permission_id' => 13],
            ['role_id' => 2, 'permission_id' => 13],
            ['role_id' => 3, 'permission_id' => 13],

            ['role_id' => 1, 'permission_id' => 14],
            ['role_id' => 2, 'permission_id' => 14],
            ['role_id' => 3, 'permission_id' => 14],

            ['role_id' => 1, 'permission_id' => 15],
            ['role_id' => 2, 'permission_id' => 15],
            ['role_id' => 3, 'permission_id' => 15],

            ['role_id' => 1, 'permission_id' => 16],
            ['role_id' => 2, 'permission_id' => 16],
            ['role_id' => 3, 'permission_id' => 16],

            ['role_id' => 1, 'permission_id' => 17],
            ['role_id' => 2, 'permission_id' => 17],
            ['role_id' => 3, 'permission_id' => 17],

            ['role_id' => 1, 'permission_id' => 91],
            ['role_id' => 2, 'permission_id' => 91],
            ['role_id' => 3, 'permission_id' => 91],

            ['role_id' => 1, 'permission_id' => 92],
            ['role_id' => 2, 'permission_id' => 92],
            ['role_id' => 3, 'permission_id' => 92],

            ['role_id' => 1, 'permission_id' => 93],
            ['role_id' => 2, 'permission_id' => 93],
            ['role_id' => 3, 'permission_id' => 93],

            ['role_id' => 1, 'permission_id' => 94],
            ['role_id' => 2, 'permission_id' => 94],
            ['role_id' => 3, 'permission_id' => 94],

            // Giam-doc|Don-tiep
            ['role_id' => 1, 'permission_id' => 18],
            ['role_id' => 4, 'permission_id' => 18],

            ['role_id' => 1, 'permission_id' => 19],
            ['role_id' => 4, 'permission_id' => 19],

            ['role_id' => 1, 'permission_id' => 20],
            ['role_id' => 4, 'permission_id' => 20],

            ['role_id' => 1, 'permission_id' => 21],
            ['role_id' => 4, 'permission_id' => 21],

            ['role_id' => 1, 'permission_id' => 55],
            ['role_id' => 4, 'permission_id' => 55],

            ['role_id' => 1, 'permission_id' => 105],
            ['role_id' => 4, 'permission_id' => 105],

            ['role_id' => 1, 'permission_id' => 106],
            ['role_id' => 4, 'permission_id' => 106],

            ['role_id' => 1, 'permission_id' => 107],
            ['role_id' => 4, 'permission_id' => 107],

            ['role_id' => 1, 'permission_id' => 122],
            ['role_id' => 4, 'permission_id' => 122],

            ['role_id' => 1, 'permission_id' => 123],
            ['role_id' => 4, 'permission_id' => 123],

            ['role_id' => 1, 'permission_id' => 103],
            ['role_id' => 4, 'permission_id' => 103],

            ['role_id' => 1, 'permission_id' => 104],
            ['role_id' => 4, 'permission_id' => 104],

            // Giam-doc
            ['role_id' => 1, 'permission_id' => 22],
            ['role_id' => 1, 'permission_id' => 23],
            ['role_id' => 1, 'permission_id' => 24],
            ['role_id' => 1, 'permission_id' => 25],
            ['role_id' => 1, 'permission_id' => 26],
            ['role_id' => 1, 'permission_id' => 27],
            ['role_id' => 1, 'permission_id' => 28],
            ['role_id' => 1, 'permission_id' => 29],
            ['role_id' => 1, 'permission_id' => 30],
            ['role_id' => 1, 'permission_id' => 31],
            ['role_id' => 1, 'permission_id' => 32],
            ['role_id' => 1, 'permission_id' => 33],
            ['role_id' => 1, 'permission_id' => 58],
            ['role_id' => 1, 'permission_id' => 59],
            ['role_id' => 1, 'permission_id' => 60],
            ['role_id' => 1, 'permission_id' => 61],
            ['role_id' => 1, 'permission_id' => 62],
            ['role_id' => 1, 'permission_id' => 63],
            ['role_id' => 1, 'permission_id' => 131],

            // Giam-doc|Bac-sy-kham
            ['role_id' => 1, 'permission_id' => 34],
            ['role_id' => 2, 'permission_id' => 34],

            ['role_id' => 1, 'permission_id' => 35],
            ['role_id' => 2, 'permission_id' => 35],

            ['role_id' => 1, 'permission_id' => 36],
            ['role_id' => 2, 'permission_id' => 36],

            ['role_id' => 1, 'permission_id' => 37],
            ['role_id' => 2, 'permission_id' => 37],

            ['role_id' => 1, 'permission_id' => 38],
            ['role_id' => 2, 'permission_id' => 38],

            ['role_id' => 1, 'permission_id' => 126],
            ['role_id' => 2, 'permission_id' => 126],

            ['role_id' => 1, 'permission_id' => 117],
            ['role_id' => 2, 'permission_id' => 117],

            ['role_id' => 1, 'permission_id' => 125],
            ['role_id' => 2, 'permission_id' => 125],

            ['role_id' => 1, 'permission_id' => 76],
            ['role_id' => 2, 'permission_id' => 76],

            ['role_id' => 1, 'permission_id' => 77],
            ['role_id' => 2, 'permission_id' => 77],

            //chỉ giám đốc và bác sĩ chỉ định
            ['role_id' => 1, 'permission_id' => 71],
            ['role_id' => 3, 'permission_id' => 71],

            ['role_id' => 1, 'permission_id' => 72],
            ['role_id' => 3, 'permission_id' => 72],

            ['role_id' => 1, 'permission_id' => 73],
            ['role_id' => 3, 'permission_id' => 73],

            ['role_id' => 1, 'permission_id' => 74],
            ['role_id' => 3, 'permission_id' => 74],

            ['role_id' => 1, 'permission_id' => 75],
            ['role_id' => 3, 'permission_id' => 75],


            //chuyển phòng khám
            ['role_id' => 1, 'permission_id' => 83],
            ['role_id' => 2, 'permission_id' => 83],

            ['role_id' => 1, 'permission_id' => 84],
            ['role_id' => 2, 'permission_id' => 84],

            ['role_id' => 1, 'permission_id' => 85],
            ['role_id' => 2, 'permission_id' => 85],

            ['role_id' => 1, 'permission_id' => 86],
            ['role_id' => 2, 'permission_id' => 86],

            ['role_id' => 1, 'permission_id' => 87],
            ['role_id' => 2, 'permission_id' => 87],

            ['role_id' => 1, 'permission_id' => 116],

            ['role_id' => 1, 'permission_id' => 120],
            ['role_id' => 2, 'permission_id' => 120],

            ['role_id' => 1, 'permission_id' => 121],
            ['role_id' => 2, 'permission_id' => 121],

            ['role_id' => 1, 'permission_id' => 69],
            ['role_id' => 2, 'permission_id' => 69],

            ['role_id' => 1, 'permission_id' => 128],
            ['role_id' => 2, 'permission_id' => 128],

            ['role_id' => 1, 'permission_id' => 129],
            ['role_id' => 2, 'permission_id' => 129],

            ['role_id' => 1, 'permission_id' => 130],
            ['role_id' => 2, 'permission_id' => 130],

            ['role_id' => 1, 'permission_id' => 68],
            ['role_id' => 2, 'permission_id' => 68],

            ['role_id' => 1, 'permission_id' => 97],
            ['role_id' => 2, 'permission_id' => 97],

            ['role_id' => 1, 'permission_id' => 114],
            ['role_id' => 2, 'permission_id' => 114],

            ['role_id' => 1, 'permission_id' => 127],
            ['role_id' => 2, 'permission_id' => 127],

            ['role_id' => 1, 'permission_id' => 124],
            ['role_id' => 4, 'permission_id' => 124],
            ['role_id' => 5, 'permission_id' => 124],

            // Giam-doc|Duoc-sy
            ['role_id' => 1, 'permission_id' => 39],
            ['role_id' => 5, 'permission_id' => 39],

            ['role_id' => 1, 'permission_id' => 99],
            ['role_id' => 5, 'permission_id' => 99],

            ['role_id' => 1, 'permission_id' => 40],
            ['role_id' => 5, 'permission_id' => 40],

            ['role_id' => 1, 'permission_id' => 41],
            ['role_id' => 5, 'permission_id' => 41],

            ['role_id' => 1, 'permission_id' => 42],
            ['role_id' => 5, 'permission_id' => 42],

            ['role_id' => 1, 'permission_id' => 43],
            ['role_id' => 5, 'permission_id' => 43],

            ['role_id' => 1, 'permission_id' => 44],
            ['role_id' => 5, 'permission_id' => 44],

            ['role_id' => 1, 'permission_id' => 45],
            ['role_id' => 5, 'permission_id' => 45],

            ['role_id' => 1, 'permission_id' => 46],
            ['role_id' => 5, 'permission_id' => 46],

            ['role_id' => 1, 'permission_id' => 47],
            ['role_id' => 5, 'permission_id' => 47],

            ['role_id' => 1, 'permission_id' => 48],
            ['role_id' => 5, 'permission_id' => 48],

            ['role_id' => 1, 'permission_id' => 49],
            ['role_id' => 5, 'permission_id' => 49],

            ['role_id' => 1, 'permission_id' => 50],
            ['role_id' => 5, 'permission_id' => 50],

            ['role_id' => 1, 'permission_id' => 101],
            ['role_id' => 5, 'permission_id' => 101],

            ['role_id' => 1, 'permission_id' => 102],
            ['role_id' => 5, 'permission_id' => 102],

            ['role_id' => 1, 'permission_id' => 110],
            ['role_id' => 5, 'permission_id' => 110],

            ['role_id' => 1, 'permission_id' => 111],
            ['role_id' => 5, 'permission_id' => 111],

            ['role_id' => 1, 'permission_id' => 112],
            ['role_id' => 5, 'permission_id' => 112],

            ['role_id' => 1, 'permission_id' => 113],
            ['role_id' => 5, 'permission_id' => 113],

            ['role_id' => 1, 'permission_id' => 100],
            ['role_id' => 5, 'permission_id' => 100],

            ['role_id' => 1, 'permission_id' => 108],
            ['role_id' => 5, 'permission_id' => 108],

            ['role_id' => 1, 'permission_id' => 109],
            ['role_id' => 5, 'permission_id' => 109],

            ['role_id' => 1, 'permission_id' => 78],
            ['role_id' => 5, 'permission_id' => 78],

            ['role_id' => 1, 'permission_id' => 79],
            ['role_id' => 5, 'permission_id' => 79],

            ['role_id' => 1, 'permission_id' => 80],
            ['role_id' => 5, 'permission_id' => 80],

            ['role_id' => 1, 'permission_id' => 81],
            ['role_id' => 5, 'permission_id' => 81],

            ['role_id' => 1, 'permission_id' => 82],
            ['role_id' => 5, 'permission_id' => 82],

            ['role_id' => 1, 'permission_id' => 115],
            ['role_id' => 2, 'permission_id' => 115],
            ['role_id' => 3, 'permission_id' => 115],
            ['role_id' => 5, 'permission_id' => 115],

            // Giam-doc|Bac-sy-chi-dinh
            ['role_id' => 1, 'permission_id' => 51],
            ['role_id' => 3, 'permission_id' => 51],

            ['role_id' => 1, 'permission_id' => 52],
            ['role_id' => 3, 'permission_id' => 52],

            ['role_id' => 1, 'permission_id' => 53],
            ['role_id' => 3, 'permission_id' => 53],

            ['role_id' => 1, 'permission_id' => 54],
            ['role_id' => 3, 'permission_id' => 54],


            // Giam-doc|Bac-sy-kham|Don-tiep
            ['role_id' => 1, 'permission_id' => 64],
            ['role_id' => 2, 'permission_id' => 64],
            ['role_id' => 4, 'permission_id' => 64],

            ['role_id' => 1, 'permission_id' => 119],
            ['role_id' => 2, 'permission_id' => 119],
            ['role_id' => 4, 'permission_id' => 119],

            ['role_id' => 1, 'permission_id' => 65],
            ['role_id' => 2, 'permission_id' => 65],
            ['role_id' => 4, 'permission_id' => 65],

            ['role_id' => 1, 'permission_id' => 67],
            ['role_id' => 2, 'permission_id' => 67],
            ['role_id' => 4, 'permission_id' => 67],

            ['role_id' => 1, 'permission_id' => 96],
            ['role_id' => 2, 'permission_id' => 96],
            ['role_id' => 4, 'permission_id' => 96],

            ['role_id' => 1, 'permission_id' => 95],
            ['role_id' => 2, 'permission_id' => 95],
            ['role_id' => 4, 'permission_id' => 95],

            ['role_id' => 1, 'permission_id' => 66],
            ['role_id' => 2, 'permission_id' => 66],
            ['role_id' => 4, 'permission_id' => 66],

            ['role_id' => 1, 'permission_id' => 98],
            ['role_id' => 2, 'permission_id' => 98],
            ['role_id' => 4, 'permission_id' => 98],

            ['role_id' => 1, 'permission_id' => 118],
            ['role_id' => 2, 'permission_id' => 118],
            ['role_id' => 4, 'permission_id' => 118],
        ];

        // User has been assigned roles
        $modelHasRole = [
            ['role_id' => 1, 'model_type' => 'App\Models\User', 'model_id' => 1],
            ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 2],
            ['role_id' => 3, 'model_type' => 'App\Models\User', 'model_id' => 3],
            ['role_id' => 4, 'model_type' => 'App\Models\User', 'model_id' => 4],
            ['role_id' => 5, 'model_type' => 'App\Models\User', 'model_id' => 5],
            ['role_id' => 1, 'model_type' => 'App\Models\User', 'model_id' => 6],
        ];

        $groupPermission = [
            ['name' => 'Quản lý người dùng', 'order' => 1],
            ['name' => 'Quản lý cán bộ', 'order' => 2],
            ['name' => 'Quản lý tin tức', 'order' => 3],
            ['name' => 'Quản lý đơn vị thuốc, vật tư', 'order' => 4],
            ['name' => 'Quản lý loại thuốc, vật tư', 'order' => 5],
            ['name' => 'Quản lý thuốc, vật tư', 'order' => 6],
            ['name' => 'Quản lý dịch vụ chỉ định', 'order' => 7],
            ['name' => 'Quản lý bệnh viện', 'order' => 8],
            ['name' => 'Quản lý bệnh', 'order' => 9],
            ['name' => 'Quản lý khoa', 'order' => 10],
            ['name' => 'Quản lý phòng khám', 'order' => 11],
            ['name' => 'Quản lý đầu thẻ bảo hiểm y tế', 'order' => 13],
            ['name' => 'Quản lý cài đặt, thiết lập', 'order' => 14],
            ['name' => 'Quản lý phiên khám', 'order' => 15],
            ['name' => 'Thực hiện CLS, TTPT', 'order' => 16],
            ['name' => 'Quản lý chuyển viện', 'order' => 17],
            ['name' => 'Quầy dược', 'order' => 18],
            ['name' => 'Quản lý thanh toán', 'order' => 19],
            ['name' => 'Quản lý phiếu nhập kho', 'order' => 20],
            ['name' => 'Quản lý phiếu báo cáo', 'order' => 21],
            ['name' => 'Quản lý loại khám', 'order' => 12],
        ];

        $roles = $permissions = $groupPermissions = [];
        foreach ($role as $roleItem) {
            $roles[] = array_merge($roleItem, $default);
        }

        foreach ($permission as $permissionItem) {
            $permissions[] = array_merge($permissionItem, $default);
        }

        foreach ($groupPermission as $groupPermissionItem) {
            $groupPermissions[] = array_merge($groupPermissionItem, $default);
        }

        DB::table('roles')->insert($roles);
        DB::table('permissions')->insert($permissions);
        DB::table('role_has_permissions')->insert($roleHasPermission);
        DB::table('model_has_roles')->insert($modelHasRole);
        DB::table('group_permissions')->insert($groupPermissions);

        Schema::enableForeignKeyConstraints();
    }
}
