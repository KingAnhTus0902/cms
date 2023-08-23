<?php

use App\Constants\PrescriptionConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicine_of_medical_sessions_tbl', function (Blueprint $table) {
            if (!Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_type_id')) {
                $table->integer('materials_type_id')->after('payment_status')->nullable()->comment('Phân loại thuốc');
            }
            if (!Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_insurance_code')) {
                $table->string('materials_insurance_code', 25)->after('materials_type_id')->nullable()->comment('Mã bảo hiểm');
            }
            if (!Schema::hasColumn('medicine_of_medical_sessions_tbl',  'status')) {
                $table->tinyInteger('status')->after('materials_insurance_code')->comment('1: Chờ phát thuốc, 2: Đã phát thuốc, 3: Hủy phát thuốc')
                    ->default(PrescriptionConstants::STATUS_WAITING_DISPENSED);
            }
            if (!Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_dosage_form')) {
                $table->string('materials_dosage_form', 255)->after('status')->nullable()->comment('Dạng bào chế');
            }
            if (!Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_method')) {
                $table->tinyInteger('materials_method')->after('materials_dosage_form')->comment('Đường dùng')->nullable();
            }
            if (!Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_content')) {
                $table->string('materials_content', 255)->after('materials_dosage_form')->nullable()->comment('Hàm lượng');
            }
            if (!Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_type_name')) {
                $table->string('materials_type_name', 255)->after('materials_content')->nullable()->comment('Tên phân loại thuốc');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicine_of_medical_sessions_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_type_id')) {
                $table->dropColumn('materials_type_id');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_insurance_code')) {
                $table->dropColumn('materials_insurance_code');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl',  'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_dosage_form')) {
                $table->dropColumn('materials_dosage_form');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_method')) {
                $table->dropColumn('materials_method');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_content')) {
                $table->dropColumn('materials_content');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_type_name')) {
                $table->dropColumn('materials_type_name');
            }
        });
    }
};
