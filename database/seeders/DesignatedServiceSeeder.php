<?php

namespace Database\Seeders;

use App\Constants\DesignatedServiceConstants;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DesignatedServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('designated_services_tbl')->truncate();
        DB::table('designated_services_tbl')->insert([
            [
                'id' => 1,
                'code' => 'DV00001',
                'name' => 'Dengue virus NS1Ag/IgM-IgG test nhanh',
                'specialist' => DesignatedServiceConstants::MICROBIOLOGY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '24.0184.1637',
                'insurance_unit_price' => 126000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'code' => 'DV00002',
                'name' => 'Dengue virus NS1Ag/IgM/IgG test nhanh',
                'specialist' => DesignatedServiceConstants::MICROBIOLOGY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '24.0184.1637',
                'insurance_unit_price' => 126000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'code' => 'DV00003',
                'name' => 'HBsAg test nhanh',
                'specialist' => DesignatedServiceConstants::MICROBIOLOGY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '24.0117.1646',
                'insurance_unit_price' => 51700,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'code' => 'DV00004',
                'name' => 'Tổng phân tích nước tiểu (Bằng máy tự động)',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0206.1596',
                'insurance_unit_price' => 37100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'code' => 'DV00005',
                'name' => 'Tổng phân tích nước tiểu (Bằng máy tự động)',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0206.1596',
                'insurance_unit_price' => 27000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'code' => 'DV00006',
                'name' => 'Tổng phân tích tế bào máu ngoại vi (bằng máy đếm tổng trở)',
                'specialist' => DesignatedServiceConstants::HEMATOLOGY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '22.0120.1370',
                'insurance_unit_price' => 39200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'code' => 'DV00007',
                'name' => 'Đo hoạt độ ALT (GPT) [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0019.1493',
                'insurance_unit_price' => 21200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'code' => 'DV00008',
                'name' => 'Đo hoạt độ AST (GOT) [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0020.1493',
                'insurance_unit_price' => 21200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'code' => 'DV00009',
                'name' => 'Đo hoạt độ GGT (Gama Glutamyl Transferase) [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0077.1518',
                'insurance_unit_price' => 19000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'code' => 'DV00010',
                'name' => 'Định lượng Acid Uric [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0003.1494',
                'insurance_unit_price' => 21200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'code' => 'DV00011',
                'name' => 'Định lượng Cholesterol toàn phần (máu)',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0041.1506',
                'insurance_unit_price' => 26500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'code' => 'DV00012',
                'name' => 'Định lượng Cholesterol toàn phần (máu)',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0041.1506',
                'insurance_unit_price' => 26800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'code' => 'DV00013',
                'name' => 'Định lượng Creatinin (máu)',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0051.1494',
                'insurance_unit_price' => 21200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'code' => 'DV00014',
                'name' => 'Định lượng Glucose [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0075.1494',
                'insurance_unit_price' => 21200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'code' => 'DV00015',
                'name' => 'Định lượng HDL-C (High density lipoprotein Cholesterol) [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0084.1506',
                'insurance_unit_price' => 26500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'code' => 'DV00016',
                'name' => 'Định lượng HbA1c [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0083.1523',
                'insurance_unit_price' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'code' => 'DV00017',
                'name' => 'Định lượng HbA1c [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0083.1523',
                'insurance_unit_price' => 99600,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'code' => 'DV00018',
                'name' => 'Định lượng LDL - C (Low density lipoprotein Cholesterol) [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0112.1506',
                'insurance_unit_price' => 26500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19,
                'code' => 'DV00019',
                'name' => 'Định lượng LDL - C (Low density lipoprotein Cholesterol) [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0112.1506',
                'insurance_unit_price' => 26800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 20,
                'code' => 'DV00020',
                'name' => 'Định lượng Triglycerid (máu) [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0158.1506',
                'insurance_unit_price' => 26500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 21,
                'code' => 'DV00021',
                'name' => 'Định lượng Urê máu [Máu]',
                'specialist' => DesignatedServiceConstants::BIOCHEMISTRY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '23.0166.1494',
                'insurance_unit_price' => 21200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 22,
                'code' => 'DV00022',
                'name' => 'Định nhóm máu hệ ABO (Kỹ thuật phiến đá)',
                'specialist' => DesignatedServiceConstants::HEMATOLOGY,
                'type_surgery' => DesignatedServiceConstants::TYPE_TEST,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '22.0280.1269',
                'insurance_unit_price' => 38000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 23,
                'code' => 'DV00023',
                'name' => 'Siêu âm ổ bụng',
                'specialist' => DesignatedServiceConstants::ULTRASOUND,
                'type_surgery' => DesignatedServiceConstants::TYPE_IMAGE_ANALYSATION,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '02.0314.0001',
                'insurance_unit_price' => 38000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 24,
                'code' => 'DV00024',
                'name' => 'Điện tim thường',
                'specialist' => DesignatedServiceConstants::FUNCTIONAL_EXPLORATION,
                'type_surgery' => DesignatedServiceConstants::TYPE_FUNCTION_EXPLORATION,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '21.0014.1778',
                'insurance_unit_price' => 45900,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 25,
                'code' => 'DV00025',
                'name' => 'Lấy cao răng',
                'specialist' => DesignatedServiceConstants::DENTOMAXILLOFACIAL,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '16.0043.1020',
                'insurance_unit_price' => 124000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 26,
                'code' => 'DV00026',
                'name' => 'Nhổ chân răng vĩnh viễn',
                'specialist' => DesignatedServiceConstants::DENTOMAXILLOFACIAL,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '16.0205.1024',
                'insurance_unit_price' => 180000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 27,
                'code' => 'DV00027',
                'name' => 'Nhổ răng vĩnh viễn',
                'specialist' => DesignatedServiceConstants::DENTOMAXILLOFACIAL,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '16.0203.1026',
                'insurance_unit_price' => 98600,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 28,
                'code' => 'DV00028',
                'name' => 'Nhổ răng vĩnh viễn lung lay',
                'specialist' => DesignatedServiceConstants::DENTOMAXILLOFACIAL,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '16.0204.1025',
                'insurance_unit_price' => 98600,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 29,
                'code' => 'DV00029',
                'name' => 'Nội soi tai mũi họng',
                'specialist' => DesignatedServiceConstants::OTORHINOLARYNGOLOGY,
                'type_surgery' => DesignatedServiceConstants::TYPE_IMAGE_ANALYSATION,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '20.0013.0933',
                'insurance_unit_price' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 30,
                'code' => 'DV00030',
                'name' => 'Tiêm tĩnh mạch',
                'specialist' => DesignatedServiceConstants::ENDOSCOPY_AND_ENDOSCOPIC_SERVICES,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '03.2390.0212',
                'insurance_unit_price' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 31,
                'code' => 'DV00031',
                'name' => 'Tiêm tĩnh mạch',
                'specialist' =>
                DesignatedServiceConstants::ENDOSCOPY_AND_ENDOSCOPIC_SERVICES,
                'type_surgery' =>
                DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '03.2390.0212',
                'insurance_unit_price' => 11000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 32,
                'code' => 'DV00032',
                'name' => 'Tiêm tĩnh mạch, truyền tĩnh mạch',
                'specialist' =>
                DesignatedServiceConstants::ENDOSCOPY_AND_ENDOSCOPIC_SERVICES,
                'type_surgery' =>
                DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '14.0291.0212',
                'insurance_unit_price' => 11000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 33,
                'code' => 'DV00033',
                'name' => 'Truyền tĩnh mạch',
                'specialist' =>
                DesignatedServiceConstants::ENDOSCOPY_AND_ENDOSCOPIC_SERVICES,
                'type_surgery' =>
                DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '03.2391.0215',
                'insurance_unit_price' => 21000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 34,
                'code' => 'DV00034',
                'name' => 'Truyền tĩnh mạch',
                'specialist' =>
                DesignatedServiceConstants::ENDOSCOPY_AND_ENDOSCOPIC_SERVICES,
                'type_surgery' =>
                DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '03.2391.0215',
                'insurance_unit_price' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 35,
                'code' => 'DV00035',
                'name' => 'Trám bít hố rãnh với Composite hoá trùng hợp',
                'specialist' => DesignatedServiceConstants::DENTOMAXILLOFACIAL,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '16.0223.1035',
                'insurance_unit_price' => 199000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 36,
                'code' => 'DV00036',
                'name' => 'Trám bít hố rãnh với Composite quang trùng hợp',
                'specialist' => DesignatedServiceConstants::DENTOMAXILLOFACIAL,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '16.0224.1035',
                'insurance_unit_price' => 199000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 37,
                'code' => 'DV00037',
                'name' => 'Trám bít hố rãnh với GlassIonomer Cement quang trùng hợp',
                'specialist' => DesignatedServiceConstants::DENTOMAXILLOFACIAL,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '16.0222.1035',
                'insurance_unit_price' => 199000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 38,
                'code' => 'DV00038',
                'name' => 'Xoa bóp bấm huyệt điều trị hội chứng thắt lưng- hông',
                'specialist' =>
                DesignatedServiceConstants::ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION,
                'type_surgery' =>
                DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '08.0392.0280',
                'insurance_unit_price' => 61300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 39,
                'code' => 'DV00039',
                'name' => 'Xoa bóp bấm huyệt điều trị hội chứng thắt lưng- hông',
                'specialist' =>
                DesignatedServiceConstants::ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION,
                'type_surgery' =>
                DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '08.0392.0280',
                'insurance_unit_price' => 64200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 40,
                'code' => 'DV00040',
                'name' => 'Xoa bóp bấm huyệt điều trị hội chứng vai gáy',
                'specialist' =>
                DesignatedServiceConstants::ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION,
                'type_surgery' =>
                DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '08.0392.0280',
                'insurance_unit_price' => 61300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 41,
                'code' => 'DV00041',
                'name' => 'Xoa bóp bấm huyệt điều trị hội chứng vai gáy',
                'specialist' =>
                DesignatedServiceConstants::ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION,
                'type_surgery' =>
                DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '08.0392.0280',
                'insurance_unit_price' => 64200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 42,
                'code' => 'DV00042',
                'name' => 'Xoa bóp bấm huyệt điều trị hội chứng vai gáy',
                'specialist' =>
                DesignatedServiceConstants::ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION,
                'type_surgery' =>
                DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '08.0392.0280',
                'insurance_unit_price' => 65500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 43,
                'code' => 'DV00043',
                'name' => 'Xoa bóp bấm huyệt điều trị tổn thương rễ, đám rối và dây thần kinh',
                'specialist' =>
                DesignatedServiceConstants::ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION,
                'type_surgery' =>
                DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '08.0412.0280',
                'insurance_unit_price' => 65500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 44,
                'code' => 'DV00044',
                'name' => 'Xoa bóp bấm huyệt điều trị đau lưng',
                'specialist' => DesignatedServiceConstants::ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '08.0392.0280',
                'insurance_unit_price' => 61300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 45,
                'code' => 'DV00045',
                'name' => 'Xoa bóp bấm huyệt điều trị đau đầu, đau nửa đầu',
                'specialist' => DesignatedServiceConstants::ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '08.0392.0280',
                'insurance_unit_price' => 61300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 46,
                'code' => 'DV00046',
                'name' => 'Điều trị sâu ngà răng phục hồi bằng Composite',
                'specialist' => DesignatedServiceConstants::DENTOMAXILLOFACIAL,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '16.0068.1031',
                'insurance_unit_price' => 234000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 47,
                'code' => 'DV00047',
                'name' => 'Điều trị sâu ngà răng phục hồi bằng Composite',
                'specialist' => DesignatedServiceConstants::DENTOMAXILLOFACIAL,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '16.0068.1031',
                'insurance_unit_price' => 189000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 48,
                'code' => 'DV00048',
                'name' => 'Điện châm',
                'specialist' => DesignatedServiceConstants::ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '08.0005.0230',
                'insurance_unit_price' => 70000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 49,
                'code' => 'DV00049',
                'name' => 'Điện châm',
                'specialist' => DesignatedServiceConstants::ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION,
                'type_surgery' => DesignatedServiceConstants::TYPE_PROCEDURE_SURGERY,
                'decision_number' => '20161003_5542/QĐ-BYT',
                'use_insurance' => 1,
                'insurance_code' => '08.0005.0230',
                'insurance_unit_price' => 63000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
