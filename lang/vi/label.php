<?php

return [

    'common' => [
        'button' => [
            'search' => 'Tìm kiếm',
            'open_add_modal' => 'Thêm mới',
            'reset' => 'Nhập lại',
            'close' => 'Thoát',
            'save' => SAVE_REAL,
            'save_draft' => SAVE_DRAFT,
            'edit_title' => 'Cập nhật bản ghi',
            'delete_title' => 'Xóa bản ghi',
            'reset_password' => 'Đổi mật khẩu',
            'examination' => 'Khám bệnh',
            'print_title' => 'In',
            'confirm' => 'Xác nhận',
            'cancel' => 'Hủy',
            'check' => 'Kiểm tra',
            'active' => 'Kích hoạt tài khoản này',
            'deactive' => 'Hủy kích hoạt này tài khoản này'
        ],
        'field' => [
            'action' => 'Thao tác',
            'ordinal_number' => '#',
            'phone' => 'SĐT',
            'order' => 'STT',
            'month' => 'Tháng'
        ],
        'pagination' => [
            'showing' => 'Hiển thị',
            'entries' => 'bản ghi',
            'previous' => 'Trước',
            'next' => 'Sau'
        ]
    ],
    'department' => [
        'title' => 'Quản lý khoa',
        'search_keyword' => 'Nhập mã khoa, tên khoa',
        'field' => [
            'code' => 'Mã khoa',
            'name' => 'Tên khoa',
            'location' => 'Địa chỉ',
            'note' => 'Ghi chú',
            'user_head_id' => 'Trưởng khoa'
        ],
        'messages' => [
          'can_not_delete' => 'Khoa có phòng khám đang hoạt động, không thể xóa'
        ],
        'modal_title_add' => 'Thêm mới khoa',
        'modal_title_edit' => 'Cập nhật khoa',
        'choose_user_head' => 'Chọn trưởng khoa'
    ],
    'user' => [
        'code' => 'Mã',
        'name' => 'Tên',
        'phone' => 'SĐT',
        'email' => 'Email',
        'address' => 'Địa chỉ',
        'department_id' => 'Khoa',
        'certificate' => 'Chứng chỉ hành nghề',
        'position' => 'Vị trí',
        'role_id' => 'Chức vụ',
        'password' => 'Mật khẩu',
        'password_confirm' => 'Xác nhận mật khẩu',
        'room_id' => 'Phòng khám',
        'status' => 'Trạng thái',
        'old_password' => 'Mật khẩu cũ',
        'new_password' => 'Mật khẩu mới',
        'otp' => 'Mã OTP',
        'avatar' => 'Ảnh đại diện'
    ],
    'hospital' => [
        'title' => 'Quản lý bệnh viện',
        'search_keyword' => 'Nhập tên bệnh viện',
        'field' => [
            'id' => 'ID',
            'name' => 'Tên BV',
            'code' => 'Mã BV',
            'city_id' => 'Tỉnh thành',
            'address' => 'Địa chỉ',
            'phone' => 'SĐT',
            'organization_id' => 'Hình thức tổ chức',
            'fax' => 'Fax',
            'email' => 'Email',
            'note' => 'Ghi chú',
        ],
        'modal_title_add' => 'Thêm mới bệnh viện',
        'modal_title_edit' => 'Cập nhật bệnh viện',
    ],
    'unit' => [
        'title' => 'Quản lý đơn vị thuốc, vật tư',
        'search_keyword' => 'Nhập mã đơn vị hoặc tên đơn vị',
        'field' => [
            'code' => 'Mã đơn vị',
            'name' => 'Tên đơn vị',
            'note' => 'Ghi chú',
        ],
        'modal_title_add' => 'Thêm mới đơn vị thuốc/vật tư',
        'modal_title_edit' => 'Cập nhật đơn vị thuốc/vật tư',
    ],
    'room' => [
        'title' => 'Quản lý phòng khám',
        'search_keyword' => 'Nhập mã phòng khám, tên phòng khám, tên khoa',
        'field' => [
            'code' => 'Mã PK',
            'name' => 'Tên phòng khám',
            'department' => 'Khoa',
            'location' => 'Địa chỉ',
            'note' => 'Ghi chú',
            'examination_type' => 'Loại khám',
        ],
        'message' => [
            'can_not_edit' => 'Bạn không có quyền chỉnh sửa phòng này!',
            'can_not_delete' => 'Bạn không có quyền xóa phòng này!'
        ],
        'choose_department' => 'Chọn khoa',
        'choose_examination_type' => 'Chọn loại khám',
        'modal_title_add' => 'Thêm mới phòng khám',
        'modal_title_edit' => 'Cập nhật phòng khám',
    ],
    'cadres' => [
        'title'             => 'Quản lý bệnh nhân',
        'search_keyword'    => 'Nhập mã bệnh nhân, tên bệnh nhân',
        'search_code'       => 'Mã BN',
        'search_code_ph'    => 'Nhập mã bệnh nhân',
        'search_phone'       => 'SĐT',
        'search_phone_ph'       => 'Nhập SĐT',
        'search_name'       => 'Tên BN',
        'search_name_ph'    => 'Nhập tên bệnh nhân',
        'keyword'           => 'Từ khóa',
        'search_identity_card_number'       => 'CCCD/ CMND',
        'search_medical_insurance_number'   => 'Mã thẻ BHYT',
        'search_medical_insurance_number_ph'   => 'Nhập mã số BHYT',
        'search_medical_insurance_number_start_date'    => 'Ngày hiệu lực',
        'search_medical_insurance_number_end_date'      => 'Ngày hết hạn',
        'field' => [
            'code'          => 'Mã BN',
            'name'          => 'Tên BN',
            'birthday'      => 'Ngày sinh',
            'gender'        => 'Giới tính',
            'folk_id'       => 'Dân tộc',
            'phone'         => 'SĐT',
            'email'         => 'Email',
            'city_id'       => 'Tỉnh thành',
            'district_id'   => 'Quận/ Huyện',
            'address'       => 'Địa chỉ',
            'job'           => 'Nghề nghiệp',
            'password'      => 'Mật khẩu',
            'old_password'  => 'Mật khẩu cũ',
            'new_password'  => 'Mật khẩu mới',
            'is_long_date'  => 'Hạn 5 năm',
            'insurance_five_consecutive_years' => 'Thời điểm đủ bảo hiểm 5 năm liên tục',
            'hospital_code' => 'Mã bệnh viện',
            'confirm_password'          => 'Xác nhận mật khẩu',
            'medical_insurance_number'  => 'Mã thẻ BHYT',
            'identity_card_number'      => 'CCCD/ CMND',
            'medical_insurance_symbol_code'   => 'MKH',
            'medical_insurance_live_code'     => 'MSS',
            'medical_insurance_start_date'    => 'Ngày hiệu lực',
            'medical_insurance_end_date'      => 'Ngày hết hạn',
            'medical_insurance_address'       => 'Nơi đăng ký khám chữa bệnh',
            'examination_day' => 'Ngày bắt đầu khám',
            'examination_day_end' => 'Ngày kết thúc khám',
            'emergency' => 'Cấp cứu',
            'status' => 'Trạng thái'
        ],
        'gender_value' => [
            'male'      => 'Nam',
            'female'    => 'Nữ'
        ],
        'modal_title_add'   => 'Thêm mới bệnh nhân',
        'modal_title_edit'  => 'Cập nhật bệnh nhân',
        'modal_title_reset' => 'Đổi mật khẩu'
    ],
    'material_type' => [
        'title'             => 'Quản lý phân loại thuốc, vật tư',
        'search_keyword'    => 'Nhập mã loại vật tư, tên loại vật tư',
        'search_code'       => 'Mã loại',
        'search_code_ph'    => 'Nhập mã loại',
        'search_name'       => 'Tên loại',
        'search_name_ph'    => 'Nhập tên loại',
        'keyword'           => 'Từ khoá',
        'field' => [
            'code'      => 'Mã loại',
            'name'      => 'Tên loại',
            'location'  => 'Địa chỉ',
            'type'      => 'Thuốc/VT',
            'note'      => 'Ghi chú',
        ],
        'modal_title_add'   => 'Thêm mới loại thuốc/vật tư',
        'modal_title_edit'  => 'Cập nhật loại thuốc/vật tư',
        'type' => [
            'material' => 'Vật tư',
            'medicine' => 'Thuốc'
        ]
    ],

    'designated_service' => [
        'title' => 'Quản lý dịch vụ chỉ định',
        'search_keyword' => 'Nhập tên dịch vụ,mã dịch vụ',
        'field' => [
            'code' => 'Mã DV',
            'name' => 'Tên DV',
            'specialist' => 'Chuyên khoa',
            'decision_number' => 'Số quyết định',
            'description' => 'Mô tả',
            'insurance_surcharge' => 'Phụ thu BH (VND)',
            'room_id' => 'Phòng khám',
            'insurance_code' => 'Mã BHYT',
            'use_insurance' => 'Thanh toán bảo hiểm y tế',
            'service_unit_price' => 'Giá DV (VND)',
            'insurance_unit_price' => 'Giá BH (VND)',
            'type_surgery' => 'Phân loại PTTT'
        ],
        'modal_title_add' => 'Thêm mới dịch vụ chỉ định',
        'modal_title_edit' => 'Cập nhật dịch vụ chỉ định',
        'detail_title_button' => 'Xem chi tiết kết quả',
    ],
    'material' => [
        'title' => 'Quản lý thuốc, vật tư',
        'keyword' => 'Từ khóa',
        'search_keyword' => 'Tìm theo mã thuốc, tên thuốc',
        'material_type' => 'Phân loại',
        'choose_material_type' => 'Chọn phân loại',
        'choose_unit_id' => 'Chọn đơn vị',
        'choose_method' => 'Chọn đường dùng',
        'field' => [
            'no' => 'STT',
            'code' => 'Mã thuốc/ vật tư',
            'name' => 'Tên thuốc/ vật tư',
            'mapping_name' => 'Tên ánh xạ',
            'type'      => 'Thuốc/ vật tư',
            'active_ingredient_name' => 'Tên hoạt chất',
            'content' => 'Hàm lượng',
            'dosage_form' => 'Dạng bào chế',
            'material_type_id' => 'Phân loại',
            'ingredients' => 'Thành phần',
            'unit_id' => 'Đơn vị',
            'service_unit_price' => 'Giá DV (VND)',
            'use_insurance' => 'Thanh toán bảo hiểm y tế',
            'insurance_code' => 'Mã bảo hiểm',
            'insurance_unit_price' => 'Giá BH (VND)',
            'disease_type' => 'Loại bệnh',
            'method' => 'Đường dùng',
            'usage' => 'Cách dùng',
            'amount' => 'Số lượng',
        ],
        'choose_type' => [
            'material' => 'Vật tư',
            'medicine' => 'Thuốc',
        ],
        'modal_title_add' => 'Thêm mới thuốc/ vật tư',
        'modal_title_edit' => 'Cập nhật thuốc/ vật tư',
        'modal_title_detail' => 'Chi tiết thuốc/ vật tư',
        'modal_title_import' => 'Import phiếu nhập kho',
        'detail_field' => [
            'name' => 'Tên thuốc/ vật tư',
            'insurance_code' => 'Mã bảo hiểm',
            'batch_name' => 'Tên lô',
            'amount' => 'Số lượng',
            'unit_price' => 'Đơn giá nhập',
            'mfg_date' => 'Ngày sản xuất',
            'exp_date' => 'Ngày hết hạn',
            'supplier' => 'Nhà cung cấp'
        ],
        'download_file_template' => 'Tải file mẫu'
    ],
    'disease' => [
        'name' => 'Tên bệnh',
        'code' => 'Mã bệnh',
        'type' => 'Loại bệnh'
    ],
    'medical_session' => [
        'patient' => 'Bệnh nhân',
        'medical_visits' => 'Lượt khám',
        'patient_waiting' => 'Bệnh nhân hẹn khám',
        'total_curent_patient' => 'Tổng số bệnh nhân trong tháng',
        'total_patient_last_month' => 'Tổng số bệnh nhân tháng trước',
        'total_patient_waiting' => 'Tổng số bệnh nhân hẹn khám',
        'total_curent_examination' => 'Tổng số lượt khám trong tháng',
        'total_examination_last_month' => 'Tổng số lượt khám tháng trước',
        'title' => 'Quản lý phiên khám',
        'search' => [
            'title' => [
                'time'       => 'Thời gian',
                'status'     => 'Trạng thái',
                'payment_status'     => 'Thanh toán',
                'room'       => 'Phòng khám',
                'department' => 'Khoa',
                'key_word'   => 'Từ khóa'
            ],
            'placeholder' => [
                'status'     =>  'Chọn trạng thái',
                'room'       =>  'Chọn phòng khám',
                'department' =>  'Chọn khoa',
                'code_name_phone' => 'Nhập mã phiên khám, tên bệnh nhân, số điện thoại',
                'code_name' => 'Nhập mã phiên khám, tên bệnh nhân'
            ]
        ],
        'field' => [
            'code'                   => 'Phiên khám',
            'cadres_name'            => 'Tên BN',
            'cadres_phone'           => 'SĐT',
            'cadres_birthday'        => 'Năm sinh',
            'cadres_gender'          => 'Giới tính',
            'cadres_address'         => 'Tỉnh thành',
            'status'                 => 'Trạng thái',
            'room'                   => 'Phòng khám',
            'department'             => 'Khoa',
            'reason_for_examination' => 'Lý do đến khám',
            'create_medical_card'    => 'Lập phiếu khám',
            'examination_status'     => 'Trạng thái khám',
            'payment_status'         => 'Thanh toán',
            'medical_examination_day'           => 'Ngày khám',
            'diagnose'                          => 'Chẩn đoán',
            'conclude'                          => 'Kết luận',
            'total_medical_expenses'            => 'TỔNG CHI PHÍ KHÁM CHỮA BỆNH',
            'medical_supplies'                  => 'VTYT',
            'the_patient_pays'                  => 'Người bệnh chi trả',
            'place_code'                        => 'Mã ĐKBĐ',
            'request_social_insurance_to_pay'   => 'Đề nghị BHXH thanh toán',
            'male'                              => 'Nam',
            'female'                            => 'Nữ',
            'total'                             => 'Tổng cộng',
            'payout_rates_not_apply'            => 'Không áp dụng tỷ lệ thanh toán',
            'prorated_payment'                  => 'Thanh toán theo tỷ lệ',
            'examination_price'                 => 'Tiền khám',
            'bed_price'                         => 'Tiền giường',
            'transport'                         => 'Vận chuyển',
            'cdhatdcn'                          => 'CĐHATDCN',
            'blood'                             => 'Máu',
            'ttpt'                              => 'TTPT',
            'outside_price'                     => 'Trong đó chi phí ngoài quỹ định suất',
            're_examination_date'               => 'Ngày hẹn khám lại'


        ],
        'status' => [
            'waiting' => 'Đang chờ khám',
            'doing'   => 'Đang khám',
            'done'    => 'Hoàn tất',
            'cancel'  => 'Hủy khám'
        ],
        'payment_status' => [
            'unpaid' => 'Chưa thanh toán',
            'paid'   => 'Đã thanh toán',
            'cancel_paid'    => 'Hủy thanh toán',
            'all_payment_status' => 'Tất cả các trạng thái thanh toán',
        ],
        'modal_title_add'            => 'Thêm mới phiên khám',
        'modal_title_edit'           => 'Chỉnh sửa phiên khám',
        'card_title_info'            => 'Thông tin hành chính',
        'card_title_medical_session' => 'Phiếu khám bệnh',
        'choose_folk' => 'Chọn dân tộc',
        'choose_city' => 'Chọn tỉnh/thành',
        'choose_district' => 'Chọn quận/huyện',
        'message' => [
            'not_create' => 'Không thể tạo phiên khám! Bệnh nhân đang trong 1 phiên khám khác',
            'can_not_examination_in_room' => 'Bạn không có quyền tại phòng khám này!',
            're_examination' => 'Hẹn ngày khám lại thành công!',
            'delete_re_examination' => 'Xóa ngày hẹn khám lại thành công!',
        ]
    ],
    'examination' => [
        'title' => 'Quản lý khám bệnh',
        'field' => [
            'bmi'       => 'Chỉ số BMI',
            'date'      => 'Ngày khám bệnh',
            'doctor'    => 'Bác sĩ khám',
            'status'    => 'Trạng thái',
            'height'    => 'Chiều cao',
            'weight'    => 'Cân nặng',
            'circuit'   => 'Mạch',
            'breathing' => 'Nhịp thở',
            'temperature'   => 'Nhiệt độ',
            'blood_pressure' => 'Huyết áp',
            'treatment_days' => 'Số ngày điều trị',
            'pathological_process' => 'Quá trình bệnh lý',
            'personal_history' => 'Tiền sử bản thân',
            'family_history' => 'Tiền sử gia đình',
            'cadres_name' => 'Tên BN',
        ],
        'button' => [
            'begin_examination' => 'Bắt đầu khám bệnh'
        ],
        'unit' => [
            'bmi'       => 'kg/m2',
            'height'    => 'Cm',
            'weight'    => 'Kg',
            'circuit'   => 'l/ph',
            'breathing' => 'l/ph',
            'temperature'   => '&deg;C',
            'blood_pressure' => ' /mmHg',
            'treatment_days' => 'Ngày',
        ],
        'move_room'    => 'Chuyển phòng khám',
        're_examination' => 'Hẹn ngày khám lại',
        'room'         => 'Phòng khám',
        'current_room' => 'Phòng khám hiện tại',
    ],
    'examination_type' => [
        'keyword' => 'Từ khóa',
        'name' => 'Tên loại khám',
        'insurance_unit_price' => 'Giá BH (VND)',
        'service_unit_price' => 'Giá DV (VND)'
    ],
    'payment' => [
        'medicines_sales_report' => 'Báo cáo doanh thu bán thuốc',
        'sales_report' => 'Báo cáo doanh thu',
        'keyword' => 'Từ khóa',
        'from_date' => 'Từ ngày',
        'to_date' => 'Đến ngày',
        'service_name' => 'Tên',
        'search' => [
            'placeholder' => [
                'key_word' => 'Nhập mã phiên khám, tên bệnh nhân, số điện thoại'
            ],
        ],
        'cadre' => [
            'information' => 'Thông tin bệnh nhân',
            'code' => 'Mã BN',
            'name' => 'Họ và tên',
            'phone' => 'SĐT',
            'identity_card_number' => 'Số CCCD/CMND'
        ],
        'medical_insurance' => [
            'medical_insurance_info' => 'Thông tin thẻ BHYT',
        ],
    ],
    'health_insurance_card_head' => [
        'title' => 'Quản lý đầu thẻ BHYT',
        'keyword' => 'Từ khóa',
        'search_keyword' => 'Tìm theo đầu thẻ',
        'choose_code' => 'Chọn mã ký hiệu',
        'field' => [
            'card_head' => 'Đầu thẻ',
            'code' => 'Mã ký hiệu',
            'discount_right_line' => '% miễn giảm đúng tuyến',
            'discount_opposite_line'      => '% miễn giảm trái tuyến',
        ],
        'modal_title_add' => 'Thêm mới đầu thẻ BHYT',
        'modal_title_edit' => 'Cập nhật đầu thẻ BHYT',
    ],
    'disease_of_medical_session' => [
        'title' => 'Bệnh',
        'field' => [
            'main_disease_name' => 'Bệnh chính',
            'side_disease_name' => 'Bệnh đính kèm',
        ],
    ],
    'hospital_transfer' => [
        'title' => 'Danh sách chuyển viện',
        'title_add' => 'Tạo mới hồ sơ chuyển viện',
        'title_edit' => 'Chỉnh sửa hồ sơ chuyển viện',
        'search' => [
            'title' => [
                'id'       => 'Mã hồ sơ',
                'cadre_id'     => 'Tên BN',
                'national_card'       => 'CCCD/ CMND',
                'phone' => 'SĐT',
            ],
        ],
        'field' => [
            'id' => 'Mã hồ sơ',
            'medical_sessions_id' => 'Phiên khám',
            'cadre_name' => 'Tên BN',
            'cadre_phone' => 'SĐT',
            'gender' => 'Giới tính',
            'age' => 'Tuổi',
            'address' => 'Địa chỉ',
            'folk' => 'Dân tộc',
            'job' => 'Nghề nghiệp',
            'work_place' => 'Nơi làm việc',
            'medical_insurance_number' => 'Mã thẻ BHYT',
            'medical_insurance_start_date' => 'Ngày hiệu lực',
            'identity_card_number' => 'CCCD/ CMND',
            'medical_insurance_end_date' => 'Ngày hết hạn',
            'hospital_id' => 'Tên BV',
            'treatment_start_date' => 'Ngày bắt đầu điều trị',
            'treatment_end_date' => 'Ngày kết thúc điều trị',
            'clinical_signs' => 'Dấu hiệu lâm sàng',
            'subclinical_results' => 'Kết quả xét nghiệm, cận lâm sàng',
            'diagnose' => 'Chẩn đoán',
            'treatment_methods' => 'Phương pháp, thủ thuật, kỹ thuật, thuốc đã sử dụng trong điều trị',
            'patient_status' => 'Tình trạng người bệnh lúc chuyển tuyến',
            'reasons' => 'Lý do chuyển tuyến',
            'treatment_directions' => 'Hướng điều trị',
            'transit_times' => 'Thời gian chuyển tuyến',
            'transportations' => 'Phương tiện vận chuyển',
            'escort_information' => 'Họ tên, chức danh, trình độ chuyên môn của người hộ tống',
        ],
        'button' => [
            'title' => [
                'cancel'   => 'Hủy khám',
                'complete' => 'Hoàn tất',
                'hospital_transfer' => 'Chuyển viện',
                'waiting_result' => 'Chờ kết quả'
            ],
        ]
    ],
    'setting' => [
        'keyword' => 'Từ khóa',
        'code' => 'Mã ký hiệu',
        'value' => 'Giá trị tương ứng',
        'title' => 'Thiết Lập',
        'logo' => 'Logo',
        'default_name' => 'Tên hệ thống',
        'clinic_name' => 'Tên phòng khám',
        'clinic_name_acronym' => 'Tên viết tắt',
        'common' => 'Thông tin chung',
        'ministry_of_health' => 'Bộ y tế',
        'hospital_id' => 'Mã bệnh viện',
        'base_salary' => 'Mức lương cơ sở'
    ],
    'designated_service_medical_session' => [
        'title' => 'Chỉ định',
        'modal_title_add' => 'Thêm mới chỉ định',
        'designated_service_id' => 'Tên dịch vụ',
        'designated_service_amount' => 'Số lượng',
        'description' => 'Ghi chú',
        'medical_test_result' => 'Kết quả',
        'medical_test_conclude' => 'Kết luận',
        'status' => 'Trạng thái'
    ],
    'medicine_of_medical_session' => [
        'field' => [
            'materials_name' => 'Tên thuốc',
            'medicine_of_medical_session' => 'Mã thuốc',
            'materials_amount' => 'Số lượng',
            'materials_unit'      => 'Đơn vị',
            'materials_usage' => 'Cách sử dụng',
            'materials_status' => 'Trạng Thái',
            'advice' => 'Lời dặn',
        ],
        'modal_title_add' => 'Thêm mới thuốc',
        'modal_title_edit' => 'Cập nhật thuốc',
    ],
    'prescription_of_medical_session' => [
        'title' => 'Đơn thuốc',
    ],

    'invoice' => [
        'administrative_section' => 'Phần Hành chính',
        'medical_examination/treatment_expenses' => 'Phần Chi phí khám bệnh, chữa bệnh',
        'note' => 'Mỗi mã thẻ BHYT thống kê phần chi khi khám bệnh, chữa bệnh phát sinh tương ứng theo mã thẻ đó',
        'benefit_rate' => 'Mức hưởng',
        'medical_costs_from_date' => 'Chi phí KBCB tính từ ngày',
        'medical_costs_to_date' => 'đến ngày',
        'sum' => 'Cộng',
        'examination' => 'Loại khám',
        'hour' => 'giờ',
        'minute' => 'phút',
        'cadre' => [
            'name' => 'Họ tên người bệnh',
            'birthday' => 'Ngày, tháng, năm sinh',
            'gender' => 'Giới tính',
            'address' => 'Địa chỉ hiện tại',
            'medical_insurance_live_code' => 'Mã khu vực (K1/K2/K3)',
            'medical_insurance_number' => 'Mã thẻ BHYT',
            'from' => 'Giá trị từ',
            'to' => 'đến',
            'medical_insurance_address' => 'Nơi ĐK KCB ban đầu',
            'hospital_id' => 'Mã',
            'medical_examination_day' => 'Đến khám',
            'examination_day' => 'Điều trị ngoại trú/nội trú từ',
            'medical_examination_day_end' => 'Kết thúc khám',
            'total_treatment_days' => 'Tổng số ngày điều trị',
            'discharge_status' => 'Tình trạng ra viện',
            'emergency' => 'Cấp cứu',
            'right_treatment_line' => 'Đúng tuyến',
            'on_treatment_line' => 'Thông tuyến',
            'opposite_treatment_line' => 'Trái tuyến',
            'move_from' => 'Nơi chuyển đến từ',
            'move_to' => 'Nơi chuyển đi',
            'checked' => 'x',
            'diagnose' => 'Chẩn đoán xác định',
            'diseases_code' => 'Mã bệnh',
            'sub_disease_name' => 'Bệnh kèm theo',
            'sub_disease_code' => 'Mã bệnh kèm theo',
            '05_years_from_the_date' => 'Thời điểm đủ 05 năm liên tục từ ngày',
            'exemption_from_the_date' => 'Miễn cùng chi trả trong năm từ ngày'
        ],
        'invoice' => [
            'content' => 'Nội Dung',
            'unit' => 'ĐVT',
            'amount' => 'Số lượng',
            'service_unit_price' => 'Đơn giá BV',
            'service_payment_rate' => 'Tỷ lệ thanh toán theo dịch vụ',
            'service_money' => 'Thành tiền BV',
            'insurance_unit_price' => 'Đơn giá BH',
            'insurance_payment_rate' => 'Tỷ lệ thanh toán BHYT',
            'insurance_money' => 'Thành tiền BH',
            'payment_source' => 'Nguồn thanh toán',
            'health_insurance_fund' => 'Quỹ BHYT',
            'patient_pays_the_same' => 'Người bệnh cùng chi trả',
            'other' => 'Khác',
            'patient_self_pay' => 'Người bệnh tự trả',
            'patient_pay' => 'Người bệnh chi trả',
            'examination' => 'Khám bệnh',
            'time' => 'Lần'
        ],
    ],
    'medical_test' => [
        'doctor' => 'Bác sỹ',
        'requirement' => 'Yêu cầu',
        'cadre' => 'Tên BN',
        'medical_examination_day' => 'Ngày khám',
        'birthday' => 'Năm sinh',
        'gender' => 'Giới tính',
        'address' => 'Địa chỉ',
        'name' => 'Xét nghiệm',
        'status' => 'Trạng thái',
        'room' => 'Phòng khám',
        'button' => [
            'create' => 'Hoàn thành',
            'print' => 'In kết quả',
            'draft' => 'Lưu nháp',
            'cancel' => 'Hủy',
            'processing' => 'Bắt đầu thực hiện'
        ]
    ],

    'import_materials_slip' => [
        'title' => 'Quản lý phiếu nhập kho',
        'title_add' =>  'Tạo phiếu nhập kho',
        'title_edit' => 'Chỉnh sửa phiếu nhập kho',
        'title_detail' => 'Chi tiết phiếu nhập kho',
        'status' => [
            'save'  => 'Đã nhập kho',
            'draft' => SAVE_DRAFT
        ],
        'field' => [
            'code'        => 'Mã phiếu nhập',
            'import_day'  => 'Ngày nhập',
            'user_import' => 'Người nhập',
            'status'      => 'Trạng thái',
            'select_file' => 'Chọn file'
        ],
        'search' => [
            'title' => [
                'import_day'  => 'Ngày nhập',
                'status'      => 'Trạng thái',
                'user_import' => 'Người nhập',
            ],
            'placeholder' => [
                'status'      =>  'Chọn trạng thái',
                'user_import' =>  'Nhập tên'
            ]
        ],
        'button' => [
            'title' => [
                'open_modal_add'   => 'Thêm mới phiếu nhập',
                'open_upload_file' => 'Tải file nhập',
            ],
            'import_file' => 'Nhập file',
        ],
        'add' => [
            'button' => [
                'add_material' => 'Thêm mới thuốc/ vật tư'
            ],
            'field' => [
                'material_name'           => 'Tên thuốc/ vật tư',
                'material_amount'         => 'Số lượng',
                'material_unit_price'     => 'Đơn giá nhập',
                'material_mfg_date'       => 'Ngày sản xuất',
                'material_exp_date'       => 'Ngày hết hạn',
                'material_supplier'       => 'Nhà cung cấp',
                'material_insurance_code' => 'Mã',
                'material_batch_name'     => 'Tên lô',
            ],
            'validate' => [
                'exists' => 'Thuốc/vật tư chưa có trong kho. Vui lòng thêm mới!',
                'material_id_required' => 'Bạn phải chọn thuốc/vật tư trong danh sách gợi ý'
            ]
        ],
        'response' => [
            'message' => [
                'save_draft' => 'Lưu nháp thành công',
                'save_real'  => 'Nhập kho thành công'
            ]
        ],
    ],

    'dispense_medicine' => [
        'modal_title_edit' => 'Chi tiết đơn thuốc',
        'field' => [
            'medical_session_status' => 'Trạng thái PK'
        ],
        'button' => [
            'cancel' => 'Huỷ đơn',
            'dispense' => 'Phát thuốc',
            'undo_dispense' => 'Hoàn đơn',
        ]
    ],
    'email' => [
        'subject' => '[Hệ thống clinic] Chúng tôi đã đăng ký một tài khoản cho bạn',
        'forgot' => '[Hệ thống clinic] Thông báo thay đổi mật khẩu'
    ],
    'permission' => [
        'name' => 'Tên quyền/ Chức vụ',
        'role_name' => 'Tên chức vụ',
        'role' => 'Chức vụ',
        'created_at' => 'Ngày tạo',
        'updated_at' => 'Ngày cập nhật',
        'type' => 'Phân loại'
    ],

    'report' => [
        'distributed_material_field' => [
            'code' => 'STT theo DMT của BYT',
            'active_ingredient_name' => 'Tên hoạt chất',
            'name' => 'Tên thuốc',
            'dosage_form' => 'Dạng bào chế',
            'content' => 'Hàm lượng nồng độ ',
            'unit_id' => 'Đơn vị tính',
            'amount' => 'Số lượng',
            'service_unit_price' => 'Đơn giá (đồng)',
            'total_price' => 'Thành tiền (đồng)',
            'created_at' => 'Ngày tạo',
            'method' => 'Đường dùng',
        ],

        'insunrance_field' => [
            'code' => 'Mã BN',
            'cadre_name' => 'Họ và tên',
            'year_old' => 'Tuổi',
            'medical_insurance_number' => 'Mã thẻ BHYT',
            'address' => 'Địa chỉ',
            'folks_name' => 'Dân tộc',
            'department_name' => 'Khám C/Khoa',
            'reason_for_examination' => 'Triệu chứng',
            'diagnose' => 'Chẩn đoán',
            'combined_data' => 'Phương pháp điều trị',
            'user_name' => 'Y, Bác sĩ khám bệnh',
            'male' => 'Nam',
            'female' => 'Nữ',
        ]
    ]
];
