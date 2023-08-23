<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('hospitals_mst')->truncate();
        DB::table('hospitals_mst')->insert([
            [
                'id' =>1,
                'name' =>'Trạm y tế phường Nhân Chính (TTYT Thanh Xuân)',
                'address' =>'Phường Nhân Chính, Quận Thanh Xuân',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>2,
                'name' =>'Trạm y tế phường Thượng Đình (TTYT Thanh Xuân)',
                'address' =>'Phường Thượng Đình, Quận Thanh Xuân',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>3,
                'name' =>'Trạm y tế P.Khương Trung (TTYT Thanh Xuân)',
                'address' =>'Phường Khương Trung, Quận Thanh Xuân',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>4,
                'name' =>'Bệnh viện Hữu Nghị',
                'address' =>'1 Trần Khánh Dư, Hai Bà Trưng',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>5,
                'name' =>'Phòng khám A thuộc BVĐK Xanh Pôn',
                'address' =>'59b Trần Phú',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>6,
                'name' =>'Bệnh viện đa khoa Xanh Pôn',
                'address' =>'12 Chu Văn An, Ba Đình',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>7,
                'name' =>'Bệnh viện đa khoa Đống Đa',
                'address' =>'192 Nguyễn Lương Bằng, Đống Đa',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>8,
                'name' =>'Bệnh viện Việt Nam - Cu Ba',
                'address' =>'37 Hai Bà Trưng, Hoàn Kiếm',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>9,
                'name' =>'Bệnh viện Thanh Nhàn',
                'address' =>'42 Thanh Nhàn, Hai Bà Trưng',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>10,
                'name' =>'Bệnh viện E',
                'address' =>'Phố Trần Cung, Nghĩa Tân, Cầu Giấy',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>11,
                'name' =>'Ban Bảo vệ CSSK cán bộ TPHN (Phòng khám1)',
                'address' =>'59b Trần Phú, Ba Đình',
                'organization_id' =>4,
                'city_id' =>24
            ],
            [
                'id' =>12,
                'name' =>'Bệnh viện Bưu điện (Bộ Bưu Chính v.thông)',
                'address' =>'Ngõ 228 Lê Trọng Tấn, Hoàng Mai',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>13,
                'name' =>'Công ty cổ phần Bệnh viện Giao thông vận tải',
                'address' =>'1194 Đường Láng, Đống Đa',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>14,
                'name' =>'Trung tâm Kỹ thuật chỉnh hình và Phục hồi CN',
                'address' =>'Phường Xuân Khanh, Tx Sơn Tây, Hn',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>15,
                'name' =>'Phòng khám đa khoa khu vực Đông Mỹ',
                'address' =>'Thôn 1b, Xã Đông Mỹ, Huyện Thanh Trì, Hn',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>16,
                'name' =>'Bệnh viện Đa khoa Nông nghiệp',
                'address' =>'Ngọc Hồi, Thanh Trì',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>17,
                'name' =>'Bệnh viện trung ương Quân đội 108',
                'address' =>'1 Trần Hưng Đạo, Hai Bà Trưng',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>18,
                'name' =>'Bệnh viện 354/TCHC',
                'address' =>'120 Đốc Ngữ, Ba Đình',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>19,
                'name' =>'Bệnh viện 103',
                'address' =>'Km2 Đường 70, Hà Đông',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>20,
                'name' =>'Phòng khám đa khoa khu vực Tô Hiệu',
                'address' =>'Thôn An Duyên, Xã Tô Hiệu, Huyện Thường Tín, Hn',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>21,
                'name' =>'Viện Y học Phòng không Không quân',
                'address' =>'225 Trường Chinh, Thanh Xuân',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>22,
                'name' =>'Viện YH cổ truyền Quân đội',
                'address' =>'Đại Kim, Hoàng Mai',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>23,
                'name' =>'Phòng khám 107 Tôn Đức Thắng (Phòng khám 1-TTYT Đống Đa)',
                'address' =>'107 Tôn Đức Thắng, Đống Đa',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>24,
                'name' =>'Phòng khám đa khoa Kim Liên (Phòng khám 3-TTYT Đống Đa)',
                'address' =>'B20a, Tập Thể Kim Liên, Đống Đa',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>25,
                'name' =>'Phòng khám đa khoa 26 Lương Ngọc Quyến (TTYT Hoàn Kiếm)',
                'address' =>'26 Lương Ngọc Quyến - Hoàn Kiếm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>26,
                'name' =>'Phòng khám đa khoa 124 Hoàng Hoa Thám, Tây Hồ',
                'address' =>'124 Hoàng Hoa Thám, Ba Đình',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>27,
                'name' =>'Phòng khám đa khoa 103 Bà Triệu (TTYT Hai Bà Trưng)',
                'address' =>'103 Bà Triệu, Hai Bà Trưng',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>28,
                'name' =>'Bệnh viện đa khoa Đức Giang',
                'address' =>'Đức Giang, Long Biên',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>29,
                'name' =>'Phòng khám đa khoa Yên Viên (TTYT Gia Lâm)',
                'address' =>'Hà Huy Tập - Thị Trấn Yên Viên - Gia Lâm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>30,
                'name' =>'Phòng khám đa khoa Trâu Quỳ (TTYT Gia Lâm)',
                'address' =>'1 Ngô Xuân Quảng - trâu Quỳ - Gia Lâm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>31,
                'name' =>'Bệnh viện đa khoa YHCT Hà Nội',
                'address' =>'Đường Trần Bình, Mai Dịch, Cầu Giấy',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>32,
                'name' =>'Bệnh viện đa khoa Thanh Trì',
                'address' =>'Thị Trấn Văn Điển - Thanh Trì',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>33,
                'name' =>'Phòng khám đa khoa Lĩnh Nam, Hoàng Mai',
                'address' =>'Phường Lĩnh Nam - Hoàng Mai',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>34,
                'name' =>'Bệnh viện đa khoa Đông Anh',
                'address' =>'Thị Trấn Đông Anh, Huyện Đông Anh',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>35,
                'name' =>'Bệnh viện đa khoa Sóc Sơn',
                'address' =>'Miếu Thờ, Tiên Dược, Sóc Sơn',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>36,
                'name' =>'Phòng khám đa khoa Trung Giã (TTYT Sóc Sơn)',
                'address' =>'Xã Trung Giã - Sóc Sơn',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>37,
                'name' =>'Phòng khám đa khoa Kim Anh (TTYT Sóc Sơn)',
                'address' =>'Xã Thanh Xuân - Sóc Sơn',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>38,
                'name' =>'Công ty CPKD và ĐTrị YT Đức Kiên (BV ĐKTN Hồng Hà)',
                'address' =>'16 Nguyễn Như Đổ, Văn Miếu, Đống Đa',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>39,
                'name' =>'Trạm y tế Cơ quan Công ty cổ phần LILAMA 3 (YTCQ)',
                'address' =>'Khu CN Quang Minh - huyện Mê Linh - hà Nội',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>40,
                'name' =>'Phòng khám đa khoa Ngọc Tảo (TTYT huyện Phúc Thọ)',
                'address' =>'Xã Ngọc Tảo - huyện Phúc Thọ - TP Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>41,
                'name' =>'Phòng khám đa khoa Quang Minh',
                'address' =>'Tổ Dân Phố 3, Thị Trấn Mê Linh',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>42,
                'name' =>'Phòng khám đa khoa Trần Nguyên Đường',
                'address' =>'Số 59C lạc Long Quân-Xuân La-Tây Hồ-Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>43,
                'name' =>'Bệnh viện đa khoa tư nhân Hà Thành',
                'address' =>'Số 61 Vũ Thạnh, Phường Ô chợ dừa, quận Đống Đa',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>44,
                'name' =>'Bệnh viện đa khoa tư nhân 16A Hà Đông (Công ty TNHH 1 TV 16A)',
                'address' =>'Phố Viện 103, TP Hà Đông',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>45,
                'name' =>'Công ty TNHH khám chữa bệnh và tư vấn sức khỏe Ngọc Khánh',
                'address' =>'211 Phố Chùa Láng, Đống Đa',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>46,
                'name' =>'Bệnh viện 198 (Bộ Công An)',
                'address' =>'Đường Trần Bình, Mai Dịch, Cầu Giấy',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>47,
                'name' =>'Trung tâm y tế MT lao động công thương',
                'address' =>'99 Văn Cao, Quận Ba Đình',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>48,
                'name' =>'Phòng khám đa khoa Linh Đàm, Hoàng Mai',
                'address' =>'Linh Đàm, Hoàng Mai',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>49,
                'name' =>'Bệnh viện chuyên khoa Nội Chữ Thập Xanh',
                'address' =>'Chiềng',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>50,
                'name' =>'Bệnh viện YHCT TW',
                'address' =>'29 Nguyễn Bỉnh Khiêm, Hai Bà Trưng',
                'organization_id' =>7,
                'city_id' =>24
            ],
            [
                'id' =>51,
                'name' =>'Phòng khám đa khoa KV Dân Hòa',
                'address' =>'Thanh Oai, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>52,
                'name' =>'Phòng khám đa khoa cơ sở 2 BV Nam Thăng Long',
                'address' =>'Xã Hải Bối, Huyện Đông Anh',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>53,
                'name' =>'Công ty TNHH1TV Thuốc lá Thăng Long (YTCQ)',
                'address' =>'Nguyễn Trãi, Thanh Xuân',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>54,
                'name' =>'Bệnh viện Mắt Quốc tế Việt-Nga (C.ty CP Viện Mắt Quốc Tế Việt- Nga)',
                'address' =>'C2 Làng Quốc Tế Thăng Long, Dịch Vọng, Cầu Giấy',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>55,
                'name' =>'Bệnh viện TN CK khoa Mắt Việt-Nhật (C.ty CP tư vấn & đầu tư YT Việt-Nhật)',
                'address' =>'122 Triệu Việt Vương, Bùi Thị Xuân, Hai Bà Trưng',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>56,
                'name' =>'Bệnh viện tư nhân chuyên khoa Mắt HITEC',
                'address' =>'55 Phố Hàm Long, Phường Hàng Bài, Quận Hoàn Kiếm, Hà Nội',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>57,
                'name' =>'Phòng khám đa khoa GTVT Gia Lâm',
                'address' =>'481 Ngọc Lâm, Long Biên',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>58,
                'name' =>'Bệnh viện Xây dựng',
                'address' =>'Khu A, Nguyễn Quý Đức, Thanh Xuân',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>59,
                'name' =>'Bệnh viện đa khoa Hoè Nhai',
                'address' =>'17 - 34 Hoè Nhai, Ba Đình',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>60,
                'name' =>'Phòng khám đa khoa 21 Phan Chu Trinh (TTYT Hoàn Kiếm)',
                'address' =>'21 Phan Chu Trinh, Hoàn Kiếm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>61,
                'name' =>'Phòng khám 107 Trần Hưng Đạo',
                'address' =>'107 Trần Hưng Đạo, Hoàn Kiếm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>62,
                'name' =>'Phòng khám đa khoa 50 Hàng Bún (TTYT Ba Đình)',
                'address' =>'50 Hàng Bún, Ba Đình',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>63,
                'name' =>'Bệnh viện Tuệ Tĩnh',
                'address' =>'2 Trần Phú, Hà Đông',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>64,
                'name' =>'Cơ sở 2 Bệnh viện Đa khoa Nông nghiệp',
                'address' =>'16 Ngõ 183 Đặng Tiến Đông, Đống Đa',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>65,
                'name' =>'Bệnh viện YHCT Bộ Công an',
                'address' =>'Lương Thế Vinh, Thanh Xuân',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>66,
                'name' =>'Bệnh viện Mắt Quốc tế-DND (C.ty TNHH Tư vấn và đầu tư y tế QT)',
                'address' =>'128 Bùi Thị Xuân, Q. Hai Bà Trưng, Hà Nội',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>67,
                'name' =>'Phòng khám đa khoa 2 (TTYTq. ĐĐ)',
                'address' =>'Ngõ 122 Đường Láng, Đống Đa',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>68,
                'name' =>'Bệnh viện Dệt May',
                'address' =>'454 Minh Khai, Hai Bà Trưng',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>69,
                'name' =>'Phòng khám 695 Lạc Long Quân, Tây Hồ',
                'address' =>'695 Lạc Long Quân, Tây Hồ',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>70,
                'name' =>'Phòng khám đa khoa Sài Đồng (TTYT Long Biên)',
                'address' =>'Thị Trấn Sài Đồng, Long Biên',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>71,
                'name' =>'Bệnh viện YHCT Nam á',
                'address' =>'42 Hoè Nhai, Ba Đình',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>72,
                'name' =>'Phòng khám đa khoa Bình Minh',
                'address' =>'101-103 Đường Giải phóng, Hai Bà Trưng',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>73,
                'name' =>'Phòng khám đa khoa Mai Hương',
                'address' =>'A1 Ngõ Mai Hương, Hai Bà Trưng',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>74,
                'name' =>'Bệnh viện Nam Thăng Long',
                'address' =>'Tân Xuân, Xuân Đỉnh, Từ Liêm',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>75,
                'name' =>'Bệnh viên đa khoa Hoè Nhai (Cơ sở 2)',
                'address' =>'34/53 Tân ấp, Phúc Xá, Ba Đình',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>76,
                'name' =>'Phòng khám đa khoa khu vực Nghĩa Tân, Cầu Giấy',
                'address' =>'117 A15 Nghĩa Tân, Quận Cầu Giấy',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>77,
                'name' =>'Phòng khám Trung tâm y tế quận Thanh Xuân',
                'address' =>'Ngõ 282 Khương Đình, Thanh Xuân',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>78,
                'name' =>'Bệnh viện Tim Hà Nội (Cơ sở 2)',
                'address' =>'Ngõ 603 Lạc Long Quân, Tây Hồ',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>79,
                'name' =>'Trung tâm Bác sĩ gia đình',
                'address' =>'50c Hàng Bài, Hoàn Kiếm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>80,
                'name' =>'Bệnh viện Bắc Thăng Long',
                'address' =>'Thị Trấn Đông Anh, Huyện Đông Anh',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>81,
                'name' =>'Phòng khám đa khoa khu vực Yên Hoà, Cầu Giấy',
                'address' =>'Tổ 19, Phường Yên Hoà, Quận Cầu Giấy',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>82,
                'name' =>'Phòng khám đa khoa khu vực Phú Lương, Hà Đông',
                'address' =>'Phường Phú Lương, Quận Hà Đông',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>83,
                'name' =>'Bệnh viện Giao thông vận tải Vĩnh Phúc',
                'address' =>'Tiền Châu, Thị Xã Phúc Yên, Vĩnh Phúc',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>84,
                'name' =>'Trung tâm cấp cứu 115 Hà Nội (Phòng khám 11 Phan Chu Trinh)',
                'address' =>'11 Phan Chu Trinh, Hoàn Kiếm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>85,
                'name' =>'Bệnh viện đa khoa tư nhân Tràng An',
                'address' =>'59 Ngõ Thông Phong, Tôn Đức Thắng',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>86,
                'name' =>'Phòng khám đa khoa Chèm',
                'address' =>'Phường Thụy Phương - Quận Bắctừ Liêm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>87,
                'name' =>'Phòng khám đa khoa Miền Đông, Đông Anh',
                'address' =>'Xã Liên Hà, Đông Anh',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>88,
                'name' =>'Phòng khám bệnh đa khoa Khu vực 1, Đông Anh',
                'address' =>'Xã Kim Chung, Đông Anh',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>89,
                'name' =>'Trung tâm y tế Hàng Không',
                'address' =>'Sân Bay Gia Lâm, Long Biên',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>90,
                'name' =>'Bệnh viện Than - Khoáng sản',
                'address' =>'1 Phan Đình Giót,phương Liệt, T.xuân',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>91,
                'name' =>'Phòng khám đa khoa Thạch Đà (TTYT huyện Mê Linh)',
                'address' =>'Xã Đại Thịnh, Huyện Mê Linh',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>92,
                'name' =>'Công ty CPDV CS PT cộng đồng ABC (Phòng khám Y cao TP)',
                'address' =>'Khu Hành chính số 8 Tiền Phong, Mê Linh',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>93,
                'name' =>'Trung tâm y tế Giao thông 8',
                'address' =>'P107 D5 Trung Tự, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>94,
                'name' =>'Phòng khám đa khoa Cầu Diễn',
                'address' =>'Thị Trấn Cầu Diễn - Từ Liêm (7680924)',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>95,
                'name' =>'Phòng khám đa khoa trung tâm (TTYT Long Biên)',
                'address' =>'20 Quân Chính - P. Ngoc Lâm - Long Biên',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>96,
                'name' =>'Phòng khám đa khoa Đa Tốn (TTYT Gia Lâm)',
                'address' =>'Thuận Tốn - Đa Tốn - Gia Lâm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>97,
                'name' =>'Bệnh viện đa khoa tư nhân Thiên Đức (C.ty TNHH MTV BV Thiên Đức)',
                'address' =>'11 N Yên Phúc, P. Phúc La, Q. Hà Đông, Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>98,
                'name' =>'Công ty cổ phần BVĐK Thăng Long',
                'address' =>'127 Quốc Bảo, Xã Tam Hiệp, Thanh Trì',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>99,
                'name' =>'Công ty CP Công nghệ y học Hồng Đức (Phòng khám đa khoa Việt Hàn)',
                'address' =>'9 Ngô Thì Nhậm, Hai Bà Trưng',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>100,
                'name' =>'Bệnh viện Thể Thao Việt Nam',
                'address' =>'Tân Mỹ, Mỹ Đình, Từ Liêm',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>101,
                'name' =>'Trung tâm y tế huyện Mê Linh',
                'address' =>'Xã Đại Thịnh, Huyện Mê Linh',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>102,
                'name' =>'Bệnh viện đa khoa huyện Mê Linh',
                'address' =>'Xã Đại Thịnh, Huyện Mê Linh',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>103,
                'name' =>'Phòng khám đa khoa khu vực Xuân Mai (TTYT Chương Mỹ)',
                'address' =>'Thị Trấn Xuân Mai, Huyện Chương Mỹ',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>104,
                'name' =>'Công ty cổ phần Dệt 10-10 (YTCQ)',
                'address' =>'9/253 Minh Khai, Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>105,
                'name' =>'VP Bộ Giáo dục và đào tạo (YTCQ)',
                'address' =>'49 Đại Cồ Việt, Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>106,
                'name' =>'Cục phục vụ Ngoại giao đoàn (YTCQ)',
                'address' =>'10 Lê Phụng Hiểu, Hoàn Kiếm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>107,
                'name' =>'Công ty cổ phần Dệt Công nghiệp Hà Nội',
                'address' =>'93 Lĩnh Nam, Mai Động,hoàng Mai',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>108,
                'name' =>'Phòng khám đa khoa 98 Hàng Buồm (thuộc C.ty CP Dược phẩm thiết bị y tế Hà Nội)',
                'address' =>'98 Hàng Buồm, Hoàn Kiếm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>109,
                'name' =>'Công ty TNHHNN 1TV Thoát nước Hà Nội (YTCQ)',
                'address' =>'95 Vân Hồ 3, Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>110,
                'name' =>'Phòng khám đa khoa Minh Phú',
                'address' =>'Xã Minh Phú, Sóc Sơn, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>111,
                'name' =>'Đại học Kinh tế quốc dân (YTCQ)',
                'address' =>'207 Đường Giải Phóng - Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>112,
                'name' =>'Công ty TNHH S.A.S-CTAMAD (KS Melia) (YTCQ)',
                'address' =>'44b Lý Thường Kiệt, Quận Hoàn Kiếm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>113,
                'name' =>'Đại học Y Hà Nội (YTCQ)',
                'address' =>'1 Tôn Thất Tùng, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>114,
                'name' =>'Trung tâm Tim mạch - Bệnh viện E',
                'address' =>'89 Trần Cung, Phường Nghĩa Tân, Quận Cầu Giấy, Hà Nội',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>115,
                'name' =>'Công ty cổ phần May Thăng Long (YTCQ)',
                'address' =>'250 Minh Khai, Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>116,
                'name' =>'Tổng Công ty Điện lực thành phố Hà Nội (YTCQ)',
                'address' =>'69 Đinh Tiên Hoàng, Hoàn Kiếm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>117,
                'name' =>'Đại học Xây dựng (YTCQ)',
                'address' =>'55 Giải Phóng, Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>118,
                'name' =>'Công ty cổ phần Cồn Rượu Hà Nội (YTCQ)',
                'address' =>'94 Lò Đúc, Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>119,
                'name' =>'Trung tâm y tế Đại học Bách Khoa Hà Nội',
                'address' =>'1 Đại Cồ Việt, Hai Bà Trưng',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>120,
                'name' =>'Bệnh viện Bạch Mai (YTCQ)',
                'address' =>'78 Đường Giải Phóng, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>121,
                'name' =>'Công ty TNHH 1TV Dệt kim Đông Xuân (YTCQ)',
                'address' =>'524 Minh Khai, Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>122,
                'name' =>'Công ty cổ phần dụng cụ cơ khí xuất khẩu (YTCQ)',
                'address' =>'Khu Công nghiệp Mê Linh',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>123,
                'name' =>'Công ty TNHHNN 1 TV Giầy Thụy Khuê (YTCQ)',
                'address' =>'A2 Phú Diễn, Cổ Nhuế, Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>124,
                'name' =>'Viễn thông Hà Nội (YTCQ)',
                'address' =>'75 Đinh Tiên Hoàng, Hoàn Kiếm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>125,
                'name' =>'Công ty TNHHNN1TV Giầy Thượng Đình (YTCQ)',
                'address' =>'277 Đường Nguyễn Trãi, Thanh Xuân',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>126,
                'name' =>'Công ty TNHH LDKS Thống Nhất Metropole Hà Nội (YTCQ)',
                'address' =>'15 Ngô Quyền, Hoàn Kiếm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>127,
                'name' =>'Công ty kinh doanh nước sạch Hà Nội (YTCQ)',
                'address' =>'44 Yên Phụ, Ba Đình',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>128,
                'name' =>'Bệnh viện Tâm thần ban ngày Mai Hương',
                'address' =>'4 Phố Hồng Mai - P. Bạch Mai - Q. Hai Bà Trưng - Hà Nội',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>129,
                'name' =>'Bệnh viện đa khoa tư nhân Hà Nội',
                'address' =>'29 Hàn Thuyên - P. Phạm Đình Hổ - Q. Hai Bà Trưng - Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>130,
                'name' =>'Công ty TNHHNN 1TV Môi trường đô thị (YTCQ)',
                'address' =>'31 B Sơn Tây, Hà Nội',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>131,
                'name' =>'Trung tâm viễn thông khu vực 1( YTCQ)',
                'address' =>'30 Phạm Hùng, Mỹ Đình, Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>132,
                'name' =>'Công ty cổ phần May Chiến thắng (YTCQ)',
                'address' =>'',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>133,
                'name' =>'Đại học Sư phạm Hà Nội 2 (YTCQ)',
                'address' =>'Xuân Hòa - Phúc Yên - vĩnh Phúc',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>134,
                'name' =>'Văn phòng Đài truyền hình Việt Nam (YTCQ)',
                'address' =>'43 Nguyễn Chí Thanh, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>135,
                'name' =>'Phòng khám đa khoa TN thuộc Công ty TNHH Y tế Tây Hà Thành',
                'address' =>'Ngã Tư Canh - Xã Vân Canh - H. Hoài Đức - Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>136,
                'name' =>'Học viện Chính trị Hành Chính khu vực I (YTCQ)',
                'address' =>'Khuất Duy Tiến, Thanh Xuân',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>137,
                'name' =>'Công ty TNHHNN1TV cơ khí Hà Nội (YTCQ)',
                'address' =>'74 Nguyễn Trãi, Thanh Xuân',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>138,
                'name' =>'Phòng khám đa khoa khu vực Lương Mỹ (TTYT Chương Mỹ)',
                'address' =>'Hoàng Văn Thụ, Huyện Chương Mỹ',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>139,
                'name' =>'Công ty Cổ phần sản xuất hàng thể thao (YTCQ)',
                'address' =>'88 Hạ Đình, Thanh Xuân',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>140,
                'name' =>'PKĐK các cơ quan Đảng ở TW- Văn phòng TW Đảng',
                'address' =>'74 Phan Đình Phùng, Ba Đình',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>141,
                'name' =>'Viện Hàn lâm KH và CN Việt Nam (YTCQ)',
                'address' =>'Đường Hoàng Quốc Việt, Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>142,
                'name' =>'Bệnh viện đa khoa Quốc tế Thu Cúc',
                'address' =>'286 Phố Thụy Khuê, Phường Bưởi, Q. Tây Hồ, TP Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>143,
                'name' =>'Công ty TNHHNN1TV chiếu sáng và TB đô thị (YTCQ)',
                'address' =>'30 Hai Bà Trưng, Hoàn Kiếm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>144,
                'name' =>'Bưu điện Thành phố Hà Nội (YTCQ)',
                'address' =>'75 Đinh Tiên Hoàng, Hoàn Kiếm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>145,
                'name' =>'Phòng khám đa khoa khu vực Tiền Phong (TTYT Mê Linh)',
                'address' =>'Xã Tiền Phong, huyện Mê Linh',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>146,
                'name' =>'Học viện Chính trị QG HCM (YTCQ)',
                'address' =>'135 Nguyễn Phong Sắc - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>147,
                'name' =>'Phòng y tế KS Intercontinental',
                'address' =>'1a - Nghi Tàm - Q. Tây Hồ - TP Hà Nội',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>148,
                'name' =>'Công ty cổ phần cao su Sao Vàng (YTCQ)',
                'address' =>'231 Nguyễn Trãi, Thanh Xuân',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>149,
                'name' =>'Phòng khám đa khoa Nam Hồng',
                'address' =>'4 Cầu Lớn - Xã Nam Hồng - Huyện Đông Anh - TP Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>150,
                'name' =>'Học viện hành Chính- HVCTHCQGHCM (YTCQ)',
                'address' =>'77 Nguyễn Chí Thanh, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>151,
                'name' =>'Đại học sư phạm Hà Nội (YTCQ)',
                'address' =>'Phường Quan Hoa - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>152,
                'name' =>'Công ty cổ phần xây lắp điện 1 (YTCQ)',
                'address' =>'18 Lý Văn Phức, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>153,
                'name' =>'Bệnh viện Đông Đô',
                'address' =>'5, Đào Duy Anh, Đống Đa, Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>154,
                'name' =>'Trạm y tế Công ty TNHH May Đức Giang (YTCQ)',
                'address' =>'59 Đức Giang - Long Biên',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>155,
                'name' =>'Trung tâm y tế Công ty cổ phần May 10',
                'address' =>'Phường Sài Đồng, Long Biên',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>156,
                'name' =>'Công ty TNHHNN 1TV Kim khí Thăng Long (YTCQ)',
                'address' =>'Sài Đồng, Long Biên',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>157,
                'name' =>'Trung tâm y tế Hà Đông',
                'address' =>'57 Tụ Hiệu - Hà Đông',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>158,
                'name' =>'Phòng khám đa khoa khu vực Đồng Tân, huyện ứng Hòa',
                'address' =>'Xã Đồng Tân, Huyện ứng Hoà',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>159,
                'name' =>'Phòng khám đa khoa khu vực Lưu Hoàng (TTYT ứng Hoà)',
                'address' =>'Xã Lưu Hoàng, Huyện ứng Hoà',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>160,
                'name' =>'Trạm y tế Học viện Nông nghiệp Việt Nam',
                'address' =>'Thị Trấn Trâu Quỳ, Gia Lâm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>161,
                'name' =>'Trung tâm y tế huyện Đan Phượng',
                'address' =>'Đan Phượng - Hn',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>162,
                'name' =>'Đại học Mỏ Địa Chất (YTCQ)',
                'address' =>'Đông Ngạc - Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>163,
                'name' =>'Bệnh viện đa khoa huyện Gia Lâm',
                'address' =>'Khu Đô Thị Mới - t.trấn Trâu Quỳ - h.gia Lâm - t.p Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>164,
                'name' =>'Bệnh viện đa khoa quốc tế Vinmec',
                'address' =>'448 Minh Khai, P.vĩnh Tuy - q.hai Bà Trưng - t.p Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>165,
                'name' =>'Công ty SXKD đầu tư và DV Việt Hà (YTCQ)',
                'address' =>'254 Minh Khai, Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>166,
                'name' =>'Công ty cổ phần chế tạo máy điện VN-Hunggari (YTCQ)',
                'address' =>'Km25 Quốc Lộ 3, Thị Trấn Đông Anh',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>167,
                'name' =>'Công ty TNHHNN1TV xây lắp điện 4 (YTCQ)',
                'address' =>'Thị Trấn Đông Anh, Huyện Đông Anh',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>168,
                'name' =>'Công ty Cổ phần Kết cấu thép Xây dựng (YTCQ)',
                'address' =>'Thị Trấn Đông Anh, Đông Anh',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>169,
                'name' =>'Tổng công ty Thiết bị điện Đông Anh - Công ty cổ phần',
                'address' =>'Thị Trấn Đông Anh, Đông Anh',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>170,
                'name' =>'Công ty cổ phần Bánh kẹo Hải Châu (YTCQ)',
                'address' =>'15 Mạc Thị Bưởi, Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>171,
                'name' =>'TTYT Công ty Dệt Công nghiệp Hà Nội',
                'address' =>'Số 1 Mai Động Hoàng Mai Hà Nội',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>172,
                'name' =>'Phòng khám đa khoa khu vực An Mỹ (TTYT Mỹ Đức)',
                'address' =>'Xã An Mỹ, Huyện Mỹ Đức',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>173,
                'name' =>'Công ty điện tử DAEWOO HANEL (YTCQ)',
                'address' =>'Khu Công nghiệp Sài Đồng B, L.Biên',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>174,
                'name' =>'Phòng khám đa khoa khu vực Xuân Giang (TTYT huyện Sóc Sơn)',
                'address' =>'Xã Xuân Giang, Sóc Sơn, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>175,
                'name' =>'Phòng khám đa khoa khu vực Hương Sơn (TTYT Mỹ Đức)',
                'address' =>'Xã Hương Sơn, Huyện Mỹ Đức',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>176,
                'name' =>'Đại học Luật Hà Nội (YTCQ)',
                'address' =>'87 Nguyễn Chí Thanh, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>177,
                'name' =>'Bệnh viện Hữu Nghị (YTCQ)',
                'address' =>'1 Trần Khánh Dư, Hai Bà Trưng',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>178,
                'name' =>'Học viện Tài Chính (YTCQ)',
                'address' =>'Đông Ngạc - Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>179,
                'name' =>'Công ty TNHH hệ thống dây SUMI-HANEL (YTCQ)',
                'address' =>'Khu Công Nghiệp Sài Đồng B, L.biên',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>180,
                'name' =>'Bệnh viện Phụ Sản An Thịnh',
                'address' =>'496 Bạch Mai, Phường Trương Định, Quận Hai Bà Trưng, TP Hà Nội',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>181,
                'name' =>'Công ty bê tông xây dựng Hà Nội (YTCQ)',
                'address' =>'Đông Ngạc - Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>182,
                'name' =>'Trung tâm Thực hành khám chữa bệnh Trường Cao đẳng y tế Hà Đông',
                'address' =>'39 Nguyễn Viết Xuân, Quận Hà Đông, TP Hà Nội',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>183,
                'name' =>'Xí nghiệp vận dụng toa xe khách Hà Nội (YTCQ)',
                'address' =>'1A Trần Quý Cáp, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>184,
                'name' =>'Công ty cổ phần XNK V.tư TB đường sắt (YTCQ)',
                'address' =>'132 Lê Duẩn - Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>185,
                'name' =>'Công ty thông tin tín hiệu Đường sắt Hà Nội(YTCQ)',
                'address' =>'11A Nguyễn Khuyến, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>186,
                'name' =>'Phòng khám đa khoa Nguyễn Trọng Thọ',
                'address' =>'Ngã Tư Sơn Đồng, Xã Sơn Đồng, Huyện Hoài Đức, TP Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>187,
                'name' =>'Phòng khám đa khoa Thiện Nhân thuộc Công ty Cổ phần Du lịch và Dược phẩm Sơn Lâm',
                'address' =>'101 Đường Chiến Thắng, Phường Văn Quán, Quận Hà Đông, TP Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>188,
                'name' =>'Phòng khám đa khoa Quang Vinh',
                'address' =>'185 Phùng Hưng, Phường Phúc La, Quận Hà Đông, TP Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>189,
                'name' =>'Công ty LD Sakura Hà Nội Plaza',
                'address' =>'84 Trần Nhân Tông, Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>190,
                'name' =>'Tổng Công ty cổ phần Thương mại Xây dựng (YTCQ)',
                'address' =>'201 Minh Khai - Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>191,
                'name' =>'Bệnh viện tâm thần Mỹ Đức',
                'address' =>'Xã Phúc Lâm, Huyện Mỹ Đức, TP Hà Nội',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>192,
                'name' =>'Công ty Cầu 14 (YTCQ)',
                'address' =>'44/95 Vũ Xuân Thiều,sài Đồng - l.biên',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>193,
                'name' =>'Cảng Hà Nội (YTCQ)',
                'address' =>'78 Bạch Đằng, Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>194,
                'name' =>'Bệnh viện đa khoa MEDLATEC',
                'address' =>'42 - 44 Phố Nghĩa Dũng, Phường Phúc Xá, Quận Ba Đình, TP Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>195,
                'name' =>'XN Đầu máy Hà Nội (YTCQ)',
                'address' =>'2d Khâm Thiên, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>196,
                'name' =>'Bệnh viện Ung bướu Hưng Việt',
                'address' =>'34 Đại Cồ Việt, Phường Lê Đại Hành, Quận Hai Bà Trưng, TP. Hà Nội',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>197,
                'name' =>'Tổng Công ty Hàng Hải Việt Nam (YTCQ)',
                'address' =>'1 Đào Duy Anh, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>198,
                'name' =>'Phòng khám đa khoa Đại Thịnh',
                'address' =>'Đại Thịnh, Mê Linh, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>199,
                'name' =>'Công ty quản lý Đường sắt Hà Thái (YTCQ)',
                'address' =>'Đường Phạm Văn Đồng,từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>200,
                'name' =>'Công ty cổ phần cơ khí 19 -8 (YTCQ)',
                'address' =>'Minh Trí - Sóc Sơn',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>201,
                'name' =>'Trung tâm phòng chống Lao và bệnh Phổi Hà Đông',
                'address' =>'Mộ Lao',
                'organization_id' =>12,
                'city_id' =>24
            ],
            [
                'id' =>202,
                'name' =>'Phòng khám đa khoa Ngãi Cầu',
                'address' =>'Xã An Khánh, Huyện Hoài Đức',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>203,
                'name' =>'Phòng khám đa khoa khu vực Tri Thủy (TTYT Phú Xuyên)',
                'address' =>'Xã Tri Thuỷ, Huyện Phú Xuyên',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>204,
                'name' =>'Công ty cổ phần Dệt Hà Đông Hanosimex',
                'address' =>'Cầu Am, TP Hà Đông',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>205,
                'name' =>'Công ty CP Đầu tư và Xây dựng Xuân Mai',
                'address' =>'Thuỷ Xuân Tiên, Chương Mỹ',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>206,
                'name' =>'Công ty TNHH Nhà máy bia Heineken Hà Nội',
                'address' =>'Vân Tảo - Thường Tín',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>207,
                'name' =>'Trường Đại học Lâm nghiệp (YTCQ)',
                'address' =>'Thị Trấn Xuân Mai - chương Mỹ',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>208,
                'name' =>'Trường CĐ Kinh tế kỹ thuật thương mại (YTCQ)',
                'address' =>'Phú Lãm, TP Hà Đông',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>209,
                'name' =>'Bệnh viện đa khoa tư nhân Trí Đức',
                'address' =>'',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>210,
                'name' =>'Xí nghiệp Giầy Phú Hà (YTCQ)',
                'address' =>'Phú Lãm, Thành phố Hà Đông',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>211,
                'name' =>'Phòng khám đa khoa thuộc CTCP Trung tâm bác sĩ gia đình Hà Nội',
                'address' =>'',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>212,
                'name' =>'Phòng khám đa khoa khu vực Minh Quang (TTYTBa Vì)',
                'address' =>'Xã Minh Quang, Huyện Ba Vì',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>213,
                'name' =>'Phòng khám đa khoa khu vực Bất Bạt (TTYTBa Vì)',
                'address' =>'Xã Sơn Đà, Huyện Ba Vì',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>214,
                'name' =>'Phòng khám đa khoa khu vực Tản Lĩnh (TTYTBa Vì)',
                'address' =>'Xã Tản Lĩnh, Huyện Ba Vì',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>215,
                'name' =>'Phòng khám đa khoa khu vực Hòa Thạch',
                'address' =>'Xã Hoà Thạch, Huyện Quốc Oai',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>216,
                'name' =>'Phòng khám đa khoa khu vực Yên Bình (TTYTThạch Thất)',
                'address' =>'Xã Yên Bình, Huyện Thạch Thất',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>217,
                'name' =>'Công ty TNHH Medelab Việt Nam',
                'address' =>'01b Yết Kiêu, Hoàn Kiếm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>218,
                'name' =>'Bệnh viện Y học cổ truyền Trường Giang',
                'address' =>'Kim Giang',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>219,
                'name' =>'Bệnh viện CK Mắt Ánh Sáng (C.ty TNHH đầu tư và TM QT Kim Thanh)',
                'address' =>'1 Khu C Dự án Nhà Cổ Nhuế, Từ Liêm',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>220,
                'name' =>'Trung tâm y tế quận Bắc Từ Liêm',
                'address' =>'quận Bắc Từ Liêm, Hà Nội',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>221,
                'name' =>'Phòng khám đa khoa Bồ Đề',
                'address' =>'Số 99 phố Bồ Đề, Long Biên, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>222,
                'name' =>'Bệnh viện đa khoa Hồng Ngọc',
                'address' =>'',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>223,
                'name' =>'Trạm Y tế phường Phương Canh',
                'address' =>'',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>224,
                'name' =>'Trạm Y tế phường Mỹ Đình 2',
                'address' =>'',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>225,
                'name' =>'Trạm Y tế phường Phú Đô',
                'address' =>'',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>226,
                'name' =>'Trung tâm y tế quận Bắc Từ Liêm',
                'address' =>'Quận Bắc Từ Liêm, Hà Nội',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>227,
                'name' =>'Phòng khám đa khoa Dr. Binh Teleclinic',
                'address' =>'Trần Xuân Soạn, Hai Bà Trưng, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>228,
                'name' =>'Phòng khám đa khoa Quảng Tây',
                'address' =>'Khu Trần Hưng Đạo, Tây Đằng, Ba Vì, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>229,
                'name' =>'Phòng khám đa khoa Quốc tế Việt - Nga',
                'address' =>'36 Tuệ Tĩnh, phường Bùi Thị Xuân, Hai Bà Trưng, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>230,
                'name' =>'Phòng khám đa khoa Vietlife - MRI',
                'address' =>'14 Trần Bình Trọng, phường Trần Hưng Đạo, Hoàn Kiếm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>231,
                'name' =>'Cơ sở 2 Bệnh viện Da Liễu Hà Nội',
                'address' =>'Số 02 Nguyễn Viết Xuân, quận Hà Đông, Hà Nội',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>232,
                'name' =>'Trạm y tế phường Cổ Nhuế 2',
                'address' =>'phường Cổ Nhuế, quận Bắc Từ Liêm, Hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>233,
                'name' =>'Trạm y tế phường Phúc Diễn',
                'address' =>'phường Phúc Diễn, quận Bắc Từ Liêm, Hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>234,
                'name' =>'Trạm y tế phường Phương Canh',
                'address' =>'phường Phương Canh, quận Nam Từ Liêm, Hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>235,
                'name' =>'Trạm y tế phường Mỹ Đình 2',
                'address' =>'phương Mỹ Đình, quận Nam Từ Liêm, Hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>236,
                'name' =>'Phòng khám đa khoa trực thuộc công ty TNHH y tế Hoàng Ngân',
                'address' =>'Xóm Chợ, xã Kim Nỗ, huyện Đông Anh, thành phố Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>237,
                'name' =>'Bệnh viện đa khoa tư nhân Hà Thành',
                'address' =>'61 Phố Vũ Thạnh, phường Ô Chợ Dừa, quận Đống Đa, Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>238,
                'name' =>'Bệnh viện đa khoa An Việt',
                'address' =>'Số 1E đường Trường Chinh, phường Phương Liệt, quận Thanh Xuân, Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>239,
                'name' =>'Bệnh viện Mắt quốc tế Nhật Bản',
                'address' =>'Số 32 phố Phó Đức Chính, Số 30C ngõ Trúc Lạc, Trúc Bạch, Ba Đình, Hà Nội',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>240,
                'name' =>'Nhà hộ sinh',
                'address' =>'62 Ngõ Thổ Quan, Khâm Thiên, Đống Đa, Hà Nội',
                'organization_id' =>9,
                'city_id' =>24
            ],
            [
                'id' =>241,
                'name' =>'Nhà Hộ sinh trực thuộc TTYT quận Đống Đa',
                'address' =>'Số 62 ngõ Thổ quan, phố Khâm Thiên, Phường Thổ Quan, quận Đống Đa, Hà Nội',
                'organization_id' =>9,
                'city_id' =>24
            ],
            [
                'id' =>242,
                'name' =>'Nhà Hộ sinh A trực thuộc TTYT quận Hoàn Kiếm',
                'address' =>'36 Ngô Quyền, phường Phan Chu Trinh, quận Hoàn Kiếm, Hà Nội',
                'organization_id' =>9,
                'city_id' =>24
            ],
            [
                'id' =>243,
                'name' =>'Nhà Hộ sinh Ba Đình trực thuộc TTYT quận Ba Đình',
                'address' =>'Số 12 Lê Trực, phường Điện Biên, quận Ba Đình, Hà Nội',
                'organization_id' =>9,
                'city_id' =>24
            ],
            [
                'id' =>244,
                'name' =>'Phòng khám Đa khoa Lê Lợi trực thuộc Trung tâm y tế Thị xã Sơn Tây',
                'address' =>'Số 01 Lê Lợi, P. Lê Lợi, Thị xã Sơn Tây, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>245,
                'name' =>'Bệnh viện 09',
                'address' =>'km số 3, đường 70, Tân Triều, Hà Nội',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>246,
                'name' =>'Bệnh xá Bộ Tư lệnh Cảnh sát cơ động',
                'address' =>'số 28 Mai Anh Tuấn, phường Ô Chợ Dừa, Đống Đa, Hà Nội',
                'organization_id' =>10,
                'city_id' =>24
            ],
            [
                'id' =>247,
                'name' =>'Phòng khám Lao trực thuộc TTYT Hai Bà Trưng',
                'address' =>'Số 42 Hồng Mai, Phường Bạch Mai, quận Hai Bà Trưng',
                'organization_id' =>11,
                'city_id' =>24
            ],
            [
                'id' =>248,
                'name' =>'Phòng khám chuyên khoa tâm thần-TTYT quận Hai Bà Trưng',
                'address' =>'Số 42 Hồng Mai',
                'organization_id' =>11,
                'city_id' =>24
            ],
            [
                'id' =>249,
                'name' =>'Bệnh viện Mắt Hà Nội cơ sở 2',
                'address' =>'72 Nguyễn Chí Thanh, phường Láng Thượng, quận Đống Đa, Hà Nội',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>250,
                'name' =>'Bệnh viện đa khoa Quốc tế Bắc Hà',
                'address' =>'137 Nguyễn Văn Cừ, phường Ngọc Lâm, quận Long Biên, Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>251,
                'name' =>'Bệnh viện đa khoa Tâm Anh',
                'address' =>'108 Hoàng Như Tiếp, Bồ Đề, Long Biên, Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>252,
                'name' =>'PKĐK Trường Đại học Y Tế công cộng',
                'address' =>'Số 1A Đức Thắng',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>253,
                'name' =>'Bệnh viện Công An thành phố Hà Nội',
                'address' =>'số 9, văn phú, phường Phú La,quận Hà Đông',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>254,
                'name' =>'Bệnh viện K - cơ sở 3',
                'address' =>'số 30 đường cầu Bươu',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>255,
                'name' =>'Bệnh viện K - cơ sở 2',
                'address' =>'Thôn Tựu Liệt, Tam Hiệp',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>256,
                'name' =>'Phòng khám đa khoa khu vực Hồng Kỳ',
                'address' =>'Xã Hồng Kỳ, Huyện Sóc Sơn, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>257,
                'name' =>'Bệnh xá - Học viện An ninh nhân dân',
                'address' =>'Số 125 Đường Trần Phú',
                'organization_id' =>10,
                'city_id' =>24
            ],
            [
                'id' =>258,
                'name' =>'Bệnh viện đa khoa Phương Đông',
                'address' =>'Số 9, phố Viên, phường Cổ Nhuế 2, quận Bắc Từ Liêm, Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>259,
                'name' =>'Phòng khám đa khoa Yecxanh',
                'address' =>'phố vọng',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>260,
                'name' =>'Bệnh viện đa khoa Bảo Sơn 2',
                'address' =>'52 Nguyễn Chí Thanh, phường Láng Thượng, Đống Đa, Hà Nội',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>261,
                'name' =>'Đại học Dược Hà Nội (YTCQ)',
                'address' =>'13 - 15 Lê Thánh Tông, Hoàn Kiếm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>262,
                'name' =>'PYT Đại học mỹ thuật Hà Nội',
                'address' =>'42 Yết Kiêu',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>263,
                'name' =>'PYT Trung học kinh tế Hà Nội',
                'address' =>'Tân ấp - Phúc Xá',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>264,
                'name' =>'PYT Đại học kinh tế quốc dân',
                'address' =>'Phường Đồng Tâm - Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>265,
                'name' =>'PYT Đại học Bách Khoa Hà Nội',
                'address' =>'Số 3 đường Giải Phóng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>266,
                'name' =>'PYT Đại học xây dựng Hà Nội',
                'address' =>'55 Giải Phóng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>267,
                'name' =>'PYT Cao đẳng kinh tế kỹ thuật CNN',
                'address' =>'Quận Hai Bà Trưng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>268,
                'name' =>'PYT Trung cấp y Bạch Mai',
                'address' =>'Bệnh viện Bạch Mai',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>269,
                'name' =>'PYT Trung tâm KNTH cơ giới đường bộ',
                'address' =>'Tổ 4 Giáp bát',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>270,
                'name' =>'PYT Cao đẳng kinh tế - kỹ thuật CN1',
                'address' =>'456 Minh Khai',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>271,
                'name' =>'Đại học Công đoàn (YTCQ)',
                'address' =>'169 Tây Sơn, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>272,
                'name' =>'PYT Đại học dân lập Đông Đô',
                'address' =>'20A Tôn Thất Tùng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>273,
                'name' =>'PYT Trường kỹ thuật thiết bị y tế',
                'address' =>'Phương Mai - Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>274,
                'name' =>'PYT Nhạc viện Hà Nội',
                'address' =>'Ô Chợ Dừa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>275,
                'name' =>'PYT Đại học mỹ thuật công nghiệp',
                'address' =>'360 Đê La Thành',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>276,
                'name' =>'PYT Đại học Y Hà Nội',
                'address' =>'Số 1 Tôn Thất Tùng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>277,
                'name' =>'PYT Đại học ngoại thương Hà Nội',
                'address' =>'Láng Thượng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>278,
                'name' =>'Trường Cao đẳng Y tế Hà Nội (YTCQ)',
                'address' =>'35 Đoàn Thị Điểm, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>279,
                'name' =>'PYT Đại học thủy lợi',
                'address' =>'211 Tây Sơn',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>280,
                'name' =>'PYT Đại học KHXH và nhân văn',
                'address' =>'336 Nguyễn Trãi - Thanh Xuân',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>281,
                'name' =>'PYT Đại học khoa học tự nhiên',
                'address' =>'334 Nguyễn Trãi - Thanh Xuân',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>282,
                'name' =>'PYT Đại học Hà Nội',
                'address' =>'Km9 Nguyễn Trãi',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>283,
                'name' =>'PYT ĐH Sư phạm Nghệ thuật TƯ',
                'address' =>'200 Nguyễn Trãi',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>284,
                'name' =>'PYT Cao đẳng giao thông vận tải',
                'address' =>'Km9 Nguyễn Trãi',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>285,
                'name' =>'PYT Trường Trung học kỹ thuật viên',
                'address' =>'Thanh Xuân',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>286,
                'name' =>'PYT Cao đẳng sư phạm Hà Nội',
                'address' =>'Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>287,
                'name' =>'PYT Cao đẳng sư phạm mẫu giáo TW',
                'address' =>'Nghĩa Tân - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>288,
                'name' =>'PYT Phân viện báo chí và tuyên truyền',
                'address' =>'Quan Hoa - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>289,
                'name' =>'PYT Trường Múa Việt Nam',
                'address' =>'Phường Mai Dịch - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>290,
                'name' =>'PYT Đại học sân khấu và điện ảnh Hà Nội',
                'address' =>'Mai Dịch - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>291,
                'name' =>'PYT Đại học sư phạm Hà Nội',
                'address' =>'Quan Hoa - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>292,
                'name' =>'PYT Trường công nhân kỹ thuật xây dựng',
                'address' =>'Trung Hòa - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>293,
                'name' =>'PYT Trường công nhân KT và BD CBNVXD',
                'address' =>'Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>294,
                'name' =>'Đại học Giao thông vận tải (YTCQ)',
                'address' =>'Láng Thượng, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>295,
                'name' =>'Trường Cao đẳng nghề cơ điện Hà Nội (YTCQ)',
                'address' =>'Mai Dịch - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>296,
                'name' =>'Trường Cao đẳng Du lịch Hà Nội (YTCQ)',
                'address' =>'Hoàng Quốc Việt, Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>297,
                'name' =>'PYT Đại học thương mại',
                'address' =>'Mai Dịch - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>298,
                'name' =>'PYT Đại học ngoại ngữ - ĐHQG Hà Nội',
                'address' =>'Ph Quan Hoa - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>299,
                'name' =>'PYT Trường TH KT may và thời trang 1',
                'address' =>'Gia Lâm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>300,
                'name' =>'PYT Trung học XD công trình đô thị',
                'address' =>'Gia Lâm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>301,
                'name' =>'PYT Trường đào tạo nghề điện (GL)',
                'address' =>'Yên Viên - Gia Lâm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>302,
                'name' =>'PYT Đại học nông nghiệp 1',
                'address' =>'Xã Trâu Quỳ - Gia Lâm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>303,
                'name' =>'PYT Trường CĐ khí tượng thủy văn HN',
                'address' =>'Thị trấn Cầu Diễn',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>304,
                'name' =>'PYT Học viện tài chính',
                'address' =>'Đông Ngạc - Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>305,
                'name' =>'PYT Đại học Mỏ Địa Chất',
                'address' =>'Đông Ngạc - Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>306,
                'name' =>'PYT Trường trung học xây dựng số 1',
                'address' =>'Trung Văn - Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>307,
                'name' =>'PYT Trường cán bộ thương mại TW',
                'address' =>'Thanh Trì',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>308,
                'name' =>'PYT Trường công nhân KTCK lâm nghiệp',
                'address' =>'Thanh Trì',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>309,
                'name' =>'PYT TH nghề lương thực TP - VTNN',
                'address' =>'Sóc Sơn',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>310,
                'name' =>'PYT Đại học Luật Hà Nội',
                'address' =>'6 Nguyễn Chí Thanh',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>311,
                'name' =>'PYT Viện đại học Mở Hà Nội',
                'address' =>'B101 ngõ 46 Tạ Quang Bửu',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>312,
                'name' =>'PYT Đại học văn hóa Hà Nội',
                'address' =>'103 Đê La Thành',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>313,
                'name' =>'PYT Cao đẳng xây dựng số 1',
                'address' =>'Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>314,
                'name' =>'PYT ĐTCN và BDCB vật liệu xây dựng',
                'address' =>'671 Hoàng Hoa Thám',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>315,
                'name' =>'Đại học Kinh doanh và Công nghệ HN (YTCQ)',
                'address' =>'29a Ngõ 124 Phố Vĩnh Tuy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>316,
                'name' =>'PYT trung học Xiếc Việt Nam',
                'address' =>'Mai Dịch - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>317,
                'name' =>'PYT Trung học công nghiệp 3',
                'address' =>'Sóc Sơn',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>318,
                'name' =>'PYT Trung học lưu trữ và NV VP1',
                'address' =>'Tây Hồ',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>319,
                'name' =>'PYT Trường kỹ thuật viên-Viện sốt rét',
                'address' =>'Thanh Xuân',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>320,
                'name' =>'PYT Trường đào tạo nghề điện (SS)',
                'address' =>'Xã Tân Dân - Sóc Sơn',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>321,
                'name' =>'Phòng khám đa khoa182 Lương Thế Vinh',
                'address' =>'182 Lương Thế Vinh, Thanh Xuân',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>322,
                'name' =>'PYT THSP mẫu giáo nhà trẻ Hà Nội',
                'address' =>'67 Cửa Bắc',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>323,
                'name' =>'PYT Trung học địa chính TW1',
                'address' =>'Đông Ngạc - Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>324,
                'name' =>'Đại học Công nghiệp Hà Nội (YTCQ)',
                'address' =>'Minh Khai - Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>325,
                'name' =>'PYT Trung học nông nghiệp Hà Nội',
                'address' =>'Phường Thanh Xuân Bắc',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>326,
                'name' =>'Đại học Lao động xã hội (YTCQ)',
                'address' =>'Trung Hòa - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>327,
                'name' =>'Học viện Ngân hàng (YTCQ)',
                'address' =>'12 Chùa Bộc, Đống Đa',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>328,
                'name' =>'PYT Trường trung học điện 1',
                'address' =>'Tân Minh - Sóc Sơn',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>329,
                'name' =>'PYT Đào tạo BDCB công chức ngành GTVT',
                'address' =>'Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>330,
                'name' =>'PYT Trung học xây dựng',
                'address' =>'2 phố Nghĩa Dũng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>331,
                'name' =>'PYT Đại học kiến trúc Hà Nội',
                'address' =>'Km10 Nguyễn Trãi',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>332,
                'name' =>'PYT Trung học TM và du lịch H.Nội',
                'address' =>'Mai Dịch - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>333,
                'name' =>'PYT Trung học công nghiệp Hà Nội',
                'address' =>'131 Thái Thịnh',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>334,
                'name' =>'PYT Trường YHCT dân lập Hà Nội',
                'address' =>'Xã Thanh Trì - Thanh Trì',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>335,
                'name' =>'PYT Học viện hành chính quốc gia',
                'address' =>'58 Nguyễn Chí Thanh',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>336,
                'name' =>'PYT Trung học kỹ thuật xây dựng Hà Nội',
                'address' =>'Trung Hòa - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>337,
                'name' =>'PYT Trường công nhân KT cơ khí XD',
                'address' =>'Xã Cổ Bi - Gia Lâm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>338,
                'name' =>'Trung học tư thục KTKT Quang Trung (YTCQ)',
                'address' =>'Phường Phúc Đồng, Long Biên',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>339,
                'name' =>'PYT Đại học ngoại ngữ quân sự',
                'address' =>'Mỹ Đình - Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>340,
                'name' =>'Trường Đại học Thăng Long (YTCQ)',
                'address' =>'Tổ 40, p Khương Trung - Thanh Xuân',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>341,
                'name' =>'PYT Đại học sư phạm Hà Nội 2',
                'address' =>'Xuân Hòa - Vĩnh Phúc',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>342,
                'name' =>'PYT Trường công nhân KT và BD LĐXK',
                'address' =>'Khối 7C - Thị trấn Đông Anh',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>343,
                'name' =>'PYT Viện quan hệ quốc tế',
                'address' =>'69 đường Chùa Láng',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>344,
                'name' =>'PYT Trường kỹ thuật nghiệp vụ GTVT',
                'address' =>'Minh Khai - Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>345,
                'name' =>'PYT Trường cao đẳng điện lực',
                'address' =>'235 đường Hoàng Quốc Việt - CG',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>346,
                'name' =>'PYT Trung học điện tử điện lạnh Hà Nội',
                'address' =>'Dịch Vọng - Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>347,
                'name' =>'Học viện kỹ thuật Quân sự (YTCQ)',
                'address' =>'100 Hoàng Quốc Việt, Cầu Giấy',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>348,
                'name' =>'PYT TT đào tạo KT và nghiệp vụ cao',
                'address' =>'Km9 Văn Điển - Thanh Trì',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>349,
                'name' =>'PYT Trường cao đẳng VHNT quân đội',
                'address' =>'101 Nguyễn Chí Thanh',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>350,
                'name' =>'PYT Trường THDL KTKT công nghiệp H.Nội',
                'address' =>'Trung Văn - Từ Liêm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>351,
                'name' =>'PYT Trung học văn thư lưu trữ TW I',
                'address' =>'Xuân La - Tây Hồ',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>352,
                'name' =>'PYT Trường Trung học Đường sắt',
                'address' =>'Xã Thượng Thanh - Gia Lâm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>353,
                'name' =>'PYT Trường KTNV Đường Bộ Miền Bắc',
                'address' =>'Xã Kiêu Kỵ - Gia Lâm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>354,
                'name' =>'PYT Trường CĐXD công trình đô thị',
                'address' =>'Yên Thường - Gia Lâm',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>355,
                'name' =>'Trung tâm y tế quận Ba Đình',
                'address' =>'50 Hàng Bún, Ba Đình',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>356,
                'name' =>'Trung tâm y tế quận Hoàn Kiếm',
                'address' =>'26 Lương Ngọc Quyến, Hoàn Kiếm',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>357,
                'name' =>'Trung tâm y tế quận Tây Hồ',
                'address' =>'124 Hoàng Hoa Thám, Tây Hồ',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>358,
                'name' =>'Trung tâm y tế quận Long Biên',
                'address' =>'Thị Trấn Sài Đồng, Long Biên',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>359,
                'name' =>'Trung tâm y tế Cầu Giấy',
                'address' =>'Đường Trần Bình, Mai Dịch, Cầu Giấy',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>360,
                'name' =>'Trung tâm y tế quận Đống Đa',
                'address' =>'107 Tôn Đức Thắng, Đống Đa',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>361,
                'name' =>'Trung tâm y tế quận Hai Bà Trưng',
                'address' =>'103 Bà Triệu, Hai Bà Trưng',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>362,
                'name' =>'Trung tâm y tế quận Hoàng Mai',
                'address' =>'Lĩnh Nam, Hoàng Mai',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>363,
                'name' =>'Trung tâm y tế quận Thanh Xuân',
                'address' =>'Ngõ 282 Khương Đình, Thanh Xuân',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>364,
                'name' =>'Trung tâm y tế huyện Sóc Sơn',
                'address' =>'Xã Trung Giã, Sóc Sơn',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>365,
                'name' =>'Trung tâm y tế huyện Đông Anh',
                'address' =>'Xã Liên Hà, Đông Anh',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>366,
                'name' =>'Trung tâm y tế huyện Gia Lâm',
                'address' =>'Hà Huy Tâp, Tt Yên Viên, Gia Lâm',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>367,
                'name' =>'Trung tâm y tế quận Nam Từ Liêm',
                'address' =>'Xã Thụy Phương, Từ Liêm',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>368,
                'name' =>'Trung tâm y tế huyện Thanh Trì',
                'address' =>'',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>369,
                'name' =>'Bệnh viện đa khoa Bảo Long',
                'address' =>'Trại Hồ, Cổ Đông, Sơn Tây',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>370,
                'name' =>'Bệnh viện đa khoa Hà Đông',
                'address' =>'Bế Văn Đàn, Quang Trung, TP Hà Đông',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>371,
                'name' =>'Bệnh viện đa khoa Vân Đình',
                'address' =>'Thị Trấn Vân Đình, ứng Hoà',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>372,
                'name' =>'Phòng khám A thuộc BVĐK Đống Đa',
                'address' =>'Tầng 2 Khu Khám Bệnh BVĐK Đống Đa',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>373,
                'name' =>'Bệnh viện 105',
                'address' =>'Phường Sơn Lộc, Thị Xã Sơn Tây',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>374,
                'name' =>'Bệnh viện đa khoa huyện Đan Phượng',
                'address' =>'Thị Trấn Phùng, Huyện Đan Phượng',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>375,
                'name' =>'Bệnh viện đa khoa huyện Phú Xuyên',
                'address' =>'Thị Trấn Phú Xuyên, Huyện Phú Xuyên',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>376,
                'name' =>'Bệnh viện đa khoa huyện Ba Vì',
                'address' =>'Đồng Thái, Ba Vì',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>377,
                'name' =>'Bệnh viện đa khoa huyện Chương Mỹ',
                'address' =>'120 Hoà Sơn,thị Trấn Chúc Sơn',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>378,
                'name' =>'Bệnh viện đa khoa huyện Hoài Đức',
                'address' =>'Đức Giang, Hoài Đức',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>379,
                'name' =>'Bệnh viện đa khoa huyện Mỹ Đức',
                'address' =>'Thị Trấn Đại Nghĩa, Mỹ Đức',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>380,
                'name' =>'Bệnh viện đa khoa huyện Phúc Thọ',
                'address' =>'Thị Trấn Phúc Thọ, Phúc Thọ',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>381,
                'name' =>'Bệnh viện đa khoa huyện Quốc Oai',
                'address' =>'Thị Trấn Quốc Oai, Huỵện Quốc Oai',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>382,
                'name' =>'Bệnh viện đa khoa huyện Thạch Thất',
                'address' =>'Kim Quan, Thạch Thất',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>383,
                'name' =>'Bệnh viện đa khoa huyện Thanh Oai',
                'address' =>'Thị Trấn Kim Bài, Thanh Oai',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>384,
                'name' =>'Bệnh viện đa khoa huyện Thường Tín',
                'address' =>'Thị Trấn Thường Tín',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>385,
                'name' =>'Bệnh viện đa khoa Sơn Tây',
                'address' =>'234 Lê Lợi, Thị Xã Sơn Tây',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>386,
                'name' =>'Phòng khám đa khoa KV Trung tâm Hà Đông',
                'address' =>'57 Tô Hiệu, Hà Đông',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>387,
                'name' =>'Trung tâm y tế huyện ứng Hoà',
                'address' =>'Thị Trấn Vân Đình, ứng Hoà',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>388,
                'name' =>'Ban Bảo vệ CSSK cán bộ thành phố HN (Phòng khám2)',
                'address' =>'2b Nguyễn Viết Xuân, TP Hà Đông',
                'organization_id' =>4,
                'city_id' =>24
            ],
            [
                'id' =>389,
                'name' =>'Phòng khám đa khoa Hội Chữ thập đỏ Chương Mỹ',
                'address' =>'Huyện Chương Mỹ',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>390,
                'name' =>'Trung tâm y tế thị xã Sơn Tây',
                'address' =>'1 Lê Lợi, Sơn Tây',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>391,
                'name' =>'Trung tâm y tế huyện Ba Vì',
                'address' =>'Thị Trấn Tây Đằng, Ba Vì',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>392,
                'name' =>'Trung tâm y tế huyện Phúc Thọ',
                'address' =>'',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>393,
                'name' =>'Phòng khám đa khoa khu vực Liên Hồng',
                'address' =>'Xã Liên Hông, Huyện Đan Phượng, TP Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>394,
                'name' =>'Trung tâm y tế huyện Hoài Đức',
                'address' =>'Đức Giang, Hoài Đức',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>395,
                'name' =>'Trung tâm y tế huyện Quốc Oai',
                'address' =>'Thị Trấn Quốc Oai, Huỵện Quốc Oai',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>396,
                'name' =>'Trung tâm y tế huyện Thạch Thất',
                'address' =>'Bình Phú, Thạch Thất',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>397,
                'name' =>'Trung tâm y tế huyện Chương Mỹ',
                'address' =>'120 Hoà Sơn, Chúc Sơn',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>398,
                'name' =>'Trung tâm y tế huyện Thanh Oai',
                'address' =>'Tt Kim Bài, Thanh Oai, Hn',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>399,
                'name' =>'Trung tâm y tế huyện Thường Tín',
                'address' =>'',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>400,
                'name' =>'Trung tâm y tế huyện Phú Xuyên',
                'address' =>'Thị Trấn Phú Xuyên, Huyện Phú Xuyên',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>401,
                'name' =>'Trung tâm y tế huyện Mỹ Đức',
                'address' =>'Thị Trấn Đại Nghĩa, huyện Mỹ Đức',
                'organization_id' =>8,
                'city_id' =>24
            ],
            [
                'id' =>402,
                'name' =>'Phòng khám A thuộc BVĐK Đức Giang',
                'address' =>'Khu Khám Bệnh BVĐK Đức Giang',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>403,
                'name' =>'Phòng khám A thuộc Bệnh viện Thanh Nhàn',
                'address' =>'Khu Khám Bệnh Bv Thanh Nhàn',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>404,
                'name' =>'Phòng khám A thuộc BVĐK Sơn Tây',
                'address' =>'Tại BVĐK Sơn Tây',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>405,
                'name' =>'Phòng khám A thuộc BVĐK Vân Đình',
                'address' =>'Tại BVĐK Vân Đình',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>406,
                'name' =>'Phòng khám A thuộc BVĐK Thanh Trì',
                'address' =>'Khu Khám Bệnh, Bv Đk Thanh Trì',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>407,
                'name' =>'Phòng khám A thuộc BVĐK Sóc Sơn',
                'address' =>'Khoa Nội, BVĐK Sóc Sơn',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>408,
                'name' =>'Phòng khám A thuộc BVĐK Đông Anh',
                'address' =>'Khoa Hồi Sức Cấp Cứu, BVĐK Đông Anh',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>409,
                'name' =>'Phòng khám cán bộ Trung tâm y tế Từ Liêm',
                'address' =>'Phòng Khám Bệnh, Ttyt Từ Liêm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>410,
                'name' =>'Phòng khám cán bộ Trung tâm y tế huyện Gia Lâm',
                'address' =>'Khu Khám Bệnh Ttyt Huyện Gia Lâm',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>411,
                'name' =>'Phòng khám A thuộc BVĐK huyện Mê Linh',
                'address' =>'Tại BVĐK Huyện Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>412,
                'name' =>'Phòng khám A thuộc BVĐK huyện Ba Vì',
                'address' =>'Huyện Ba Vì',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>413,
                'name' =>'Phòng khám A thuộc BVĐK Hà Đông',
                'address' =>'Thị Xã Hà Đông',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>414,
                'name' =>'Phòng khám A thuộc BVĐK huyện Thường Tín',
                'address' =>'Huyện Thường Tín',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>415,
                'name' =>'Phòng khám A thuộc BVĐK huyện Phú Xuyên',
                'address' =>'Huyện Phú Xuyên',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>416,
                'name' =>'Phòng khám A thuộc BVĐK huyện Đan Phượng',
                'address' =>'Huyện Đan Phượng',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>417,
                'name' =>'Bệnh viện Hữu nghị Việt Đức',
                'address' =>'40 Tràng Thi, Hoàn Kiếm',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>418,
                'name' =>'Bệnh viện Da liễu Hà Nội',
                'address' =>'79b Nguyễn Khuyến, Đống Đa',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>419,
                'name' =>'Bệnh viện Phổi Hà Nội',
                'address' =>'44 Thanh Nhàn, Hai Bà Trưng',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>420,
                'name' =>'Bệnh viện Phụ sản Hà Nội',
                'address' =>'Đường La Thành, Ba Đình',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>421,
                'name' =>'Bệnh viện Phụ sản TW',
                'address' =>'43 Tràng Thi, Hoàn Kiếm',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>422,
                'name' =>'Bệnh viện K',
                'address' =>'43 Quán Sứ, Hoàn Kiếm',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>423,
                'name' =>'Bệnh viện Mắt trung ương',
                'address' =>'85 Bà Triệu, Hai Bà Trưng',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>424,
                'name' =>'Bệnh viện Răng Hàm Mặt Trung ương Hà Nội',
                'address' =>'40b Tràng Thi, Hoàn Kiếm',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>425,
                'name' =>'Bệnh viện Tai Mũi Họng TW',
                'address' =>'78 Đường Giải Phóng, Đống Đa',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>426,
                'name' =>'Bệnh viện Phổi Trung ương',
                'address' =>'463 Hoàng Hoa Thám, Ba Đình',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>427,
                'name' =>'Bệnh viện Mắt Hà Nội',
                'address' =>'37 Hai Bà Trưng, Hoàn Kiếm',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>428,
                'name' =>'Bệnh viện Châm cứu Trung ương',
                'address' =>'49 Thái Thịnh, Đống Đa',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>429,
                'name' =>'Viện sốt rét KST, CT TW',
                'address' =>'245 Lương Thế Vinh, Thanh Xuân',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>430,
                'name' =>'Bệnh viện Nội tiết',
                'address' =>'Yên Lãng, Thái Thịnh, Đống Đa',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>431,
                'name' =>'Bệnh viện Nhi Trung ương',
                'address' =>'18/879 La Thành, Đống Đa',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>432,
                'name' =>'Bệnh viện Ung bướu Hà Nội',
                'address' =>'42a Thanh Nhàn, Hai Bà Trưng',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>433,
                'name' =>'Viện Bỏng Lê Hữu Trác',
                'address' =>'Tân Triều, Thanh Trì',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>434,
                'name' =>'Bệnh viện Thận Hà Nội',
                'address' =>'70 Nguyễn Chí Thanh, Đống Đa',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>435,
                'name' =>'Bệnh viện Tim Hà Nội',
                'address' =>'92 Trần Hưng Đạo, Hoàn Kiếm',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>436,
                'name' =>'Viện Huyết học và Truyền máu TW',
                'address' =>'78 Đường Giải Phóng, Đống Đa',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>437,
                'name' =>'Công ty TNHH Bệnh viện Việt Pháp - Hà Nội',
                'address' =>'1 Phương Mai, Đống Đa',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>438,
                'name' =>'Bệnh viện Mắt kỹ thuật cao Hà Nội - Chi nhánh Công ty TNHH Phát triển',
                'address' =>'51-53 Trần Nhân Tông, Hai Bà Trưng',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>439,
                'name' =>'Bệnh viện Da liễu TW',
                'address' =>'15a Phương Mai, Đống Đa',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>440,
                'name' =>'Bệnh viện bệnh Nhiệt đới Trung ương',
                'address' =>'78 Đường Giải Phóng, Đống Đa',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>441,
                'name' =>'Bệnh viện Lão khoa TW',
                'address' =>'1a Phương Mai, Đống Đa',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>442,
                'name' =>'Bệnh viện Mắt Sài Gòn Hà Nội (Chi nhánh Cty TNHH BV Mắt Thái Thành Nam)',
                'address' =>'77 Nguyễn Du, Hai Bà Trưng',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>443,
                'name' =>'Viện Y học phóng xạ và U bướu Quân đội',
                'address' =>'1 Tổ 9, Định Công, Hoàng Mai',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>444,
                'name' =>'Phòng khám đa khoa MEDIHI',
                'address' =>'',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>445,
                'name' =>'Bệnh viện Bạch Mai',
                'address' =>'78 Đường Giải Phóng, Đống Đa',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>446,
                'name' =>'Bệnh viện Điều dưỡng và PHCN',
                'address' =>'Lê Văn Thiêm, Thanh Xuân',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>447,
                'name' =>'Bệnh viện Tâm Thần Hà Nội',
                'address' =>'Nguyễn Văn Linh, Sài Đồng, Long Biên',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>448,
                'name' =>'Cty TNHH công nghệ xét nghiệm y học',
                'address' =>'42 Nghĩa Dũng - Tây hồ - HN',
                'organization_id' =>6,
                'city_id' =>24
            ],
            [
                'id' =>449,
                'name' =>'Công ty TNHH Bệnh viện Hồng Ngọc (BV Hồng Ngọc)',
                'address' =>'55 Yên Ninh, Ba Đình',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>450,
                'name' =>'Bệnh viện Đại học Y Hà Nội',
                'address' =>'2 Tôn Thất Tùng, Quận Đống Đa',
                'organization_id' =>2,
                'city_id' =>24
            ],
            [
                'id' =>451,
                'name' =>'Bệnh viện YHCT Hà Đông',
                'address' =>'99 Nguyễn Viết Xuân, TP Hà Đông',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>452,
                'name' =>'Bệnh viện Mắt Hà Đông',
                'address' =>'2d Nguyễn Viết Xuân, Quang Trung, Hà Đông',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>453,
                'name' =>'Trung tâm Thừa kế ứng dụng đông y',
                'address' =>'18, Ba La, Quang Trung, Hà Đông',
                'organization_id' =>12,
                'city_id' =>24
            ],
            [
                'id' =>454,
                'name' =>'Bệnh viện Tâm thần Trung ương',
                'address' =>'Xã Hoà Bình, Thường Tín',
                'organization_id' =>5,
                'city_id' =>24
            ],
            [
                'id' =>455,
                'name' =>'Khoa khám bệnh cơ sở 2 - Bệnh viện nhiệt đới Trung ương',
                'address' =>'xã Kim Chung, huyện Đông Anh, Hà Nội',
                'organization_id' =>11,
                'city_id' =>24
            ],
            [
                'id' =>456,
                'name' =>'Phòng khám đa khoa trực thuộc công ty cổ phần y tế - Khám chữa bệnh Việt Nam',
                'address' =>'70 Nguyễn Trí Thanh, phường Láng Thượng, quận Đống Đa, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>457,
                'name' =>'Phòng khám đa khoa Minh Ngọc trực thuộc Công ty Cổ phần phát triển kỹ thuật y học Minh Ngọc',
                'address' =>'Số 517 Lạc Long Quân, phường Xuân La, quận Tây Hồ, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>458,
                'name' =>'Phòng khám đa khoa trực thuộc Công ty Cổ phần Trung Anh',
                'address' =>'Tổ 8, khu Tân Bình, thị trấn Xuân Mai, huyện Chương Mỹ, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>459,
                'name' =>'Phòng khám đa khoa công ty cổ phần Y Dược 198',
                'address' =>'Số 147 phố Kim Bài, thị trấn Kim Bài, huyện Thanh Oai, Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>460,
                'name' =>'Khoa khám bệnh cơ sở 2 - Bệnh viện giao thông vận tải Vĩnh Phúc',
                'address' =>'Thị Trấn Quang Minh, huyện Mê Linh, thành phố Hà Nội',
                'organization_id' =>3,
                'city_id' =>24
            ],
            [
                'id' =>461,
                'name' =>'Trạm y tế phường Khương Mai (TTYT Thanh Xuân)',
                'address' =>'Phường Khương Mai, Quận Thanh Xuân',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>462,
                'name' =>'Trạm y tế P.Thanh Xuân Trung (TTYT Thanh Xuân)',
                'address' =>'Phường Thanh Xuân Trung, Quận Thanh Xuân',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>463,
                'name' =>'Trạm y tế phường Phương Liệt (TTYT Thanh Xuân)',
                'address' =>'Phường Phương Liệt, Quận Thanh Xuân',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>464,
                'name' =>'Trạm y tế phường Hạ Đình (TTYT Thanh Xuân)',
                'address' =>'Phường Hạ Đình,, Quận Thanh Xuân',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>465,
                'name' =>'Trạm y tế phường Khương Đình (TTYT Thanh Xuân)',
                'address' =>'Phường Khương Đình, Quận Thanh Xuân',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>466,
                'name' =>'Trạm y tế P.Thanh Xuân Bắc (TTYT Thanh Xuân)',
                'address' =>'Phường Thanh Xuân Bắc, Quận Thanh Xuân',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>467,
                'name' =>'Trạm y tế P.Thanh Xuân Nam (TTYT Thanh Xuân)',
                'address' =>'Phường Thanh Xuân Nam, Quận Thanh Xuân',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>468,
                'name' =>'Trạm y tế phường Kim Giang (TTYT Thanh Xuân)',
                'address' =>'Phường Kim Giang, Quận Thanh Xuân',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>469,
                'name' =>'Trạm y tế thị trấn Sóc Sơn (TTYT H.Sóc Sơn)',
                'address' =>'Thị Trấn Sóc Sơn, Huyện Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>470,
                'name' =>'Trạm y tế xã Bắc Sơn (TTYT h. Sóc Sơn)',
                'address' =>'Xã Bắc Sơn, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>471,
                'name' =>'Trạm y tế xã Minh Trí (TTYT h. Sóc Sơn)',
                'address' =>'Xã Minh Trí, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>472,
                'name' =>'Trạm y tế xã Hồng Kỳ (TTYT h. Sóc Sơn)',
                'address' =>'Xã Hồng Kỳ, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>473,
                'name' =>'Trạm y tế xã Nam Sơn (TTYT h. Sóc Sơn)',
                'address' =>'Xã Nam Sơn, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>474,
                'name' =>'Trạm y tế xã Trung Giã (TTYT h. Sóc Sơn)',
                'address' =>'Xã Trung Giã, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>475,
                'name' =>'Trạm y tế xã Tân Hưng (TTYT h. Sóc Sơn)',
                'address' =>'Xã Tân Hưng, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>476,
                'name' =>'Trạm y tế xã Minh Phú (TTYT h. Sóc Sơn)',
                'address' =>'Xã Minh Phú, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>477,
                'name' =>'Trạm y tế xã Phù Linh (TTYT h. Sóc Sơn)',
                'address' =>'Xã Phù Linh, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>478,
                'name' =>'Trạm y tế xã Bắc Phú (TTYT h. Sóc Sơn)',
                'address' =>'Xã Bắc Phú, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>479,
                'name' =>'Trạm y tế xã Tân Minh (TTYT h. Sóc Sơn)',
                'address' =>'Xã Tân Minh, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>480,
                'name' =>'Trạm y tế xã Quang Tiến (TTYT h. Sóc Sơn)',
                'address' =>'Xã Quang Tiến, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>481,
                'name' =>'Trạm y tế xã Hiền Ninh (TTYT h. Sóc Sơn)',
                'address' =>'Xã Hiền Ninh, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>482,
                'name' =>'Trạm y tế xã Tân Dân (TTYT h. Sóc Sơn)',
                'address' =>'Xã Tân Dân, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>483,
                'name' =>'Trạm y tế xã Tiên Dược (TTYT h. Sóc Sơn)',
                'address' =>'Xã Tiên Dược, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>484,
                'name' =>'Trạm y tế xã Việt Long (TTYT h. Sóc Sơn)',
                'address' =>'Xã Việt Long, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>485,
                'name' =>'Trạm y tế xã Xuân Giang (TTYT h. Sóc Sơn)',
                'address' =>'Xã Xuân Giang, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>486,
                'name' =>'Trạm y tế xã Mai Đình (TTYT h. Sóc Sơn)',
                'address' =>'Xã Mai Đình, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>487,
                'name' =>'Trạm y tế xã Đức Hòa (TTYT h. Sóc Sơn)',
                'address' =>'Xã Đức Hòa, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>488,
                'name' =>'Trạm y tế xã Thanh Xuân (TTYT h. Sóc Sơn)',
                'address' =>'Xã Thanh Xuân, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>489,
                'name' =>'Trạm y tế xã Đông Xuân (TTYT h. Sóc Sơn)',
                'address' =>'Xã Đông Xuân, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>490,
                'name' =>'Trạm y tế xã Kim Lũ (TTYT h. Sóc Sơn)',
                'address' =>'Xã Kim Lũ, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>491,
                'name' =>'Trạm y tế xã Phú Cường (TTYT h. Sóc Sơn)',
                'address' =>'Xã Phú Cường, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>492,
                'name' =>'Trạm y tế xã Phú Minh (TTYT h. Sóc Sơn)',
                'address' =>'Xã Phú Minh, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>493,
                'name' =>'Trạm y tế xã Phù Lỗ (TTYT h. Sóc Sơn)',
                'address' =>'Xã Phù Lỗ, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>494,
                'name' =>'Trạm y tế xã Xuân Thu (TTYT h. Sóc Sơn)',
                'address' =>'Xã Xuân Thu, Sóc Sơn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>495,
                'name' =>'Trạm y tế phường Phúc Xá (TTYT Ba Đình)',
                'address' =>'86 Nghĩa Dũng, Phường Phúc Xá, Quận Ba Đình',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>496,
                'name' =>'Trạm y tế phường Trúc Bạch (TTYT Ba Đình)',
                'address' =>'2 - trúc Bạch - ba Đình - hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>497,
                'name' =>'Trạm y tế phường Cống Vị (TTYT Ba Đình)',
                'address' =>'Ngõ 518 Đội Cấn, Quận Ba Đình',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>498,
                'name' =>'Trạm y tế phường Nguyễn Trung Trực (TTYT B.Đ)',
                'address' =>'6 Ngõ Hàng Bún, Quận Ba Đình',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>499,
                'name' =>'Trạm y tế Phường Quán Thánh (TTYT Ba Đình)',
                'address' =>'Phường Quán Thánh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>500,
                'name' =>'Trạm y tế phường Ngọc Hà (TTYT Ba Đình)',
                'address' =>'42 Ngách 55 Tổ 17 Ngọc Hà, Quận Ba Đình',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>501,
                'name' =>'Trạm y tế phường Điện Biên (TTYT Ba Đình)',
                'address' =>'142 - 144 Nguyễn Thái Học, P Điện Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>502,
                'name' =>'Trạm y tế phường Đội Cấn (TTYT Ba Đình)',
                'address' =>'193 Đội Cấn, Phường Đội Cấn, Quận Ba Đình',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>503,
                'name' =>'Trạm y tế phường Ngọc Khánh (TTYT Ba Đình)',
                'address' =>'27 Nguyễn Chí Thanh, Quận Ba Đình',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>504,
                'name' =>'Trạm y tế phường Kim Mã (TTYT Ba Đình)',
                'address' =>'Ngõ 166 Kim Mã, Quận Ba Đình',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>505,
                'name' =>'Trạm y tế phường Giảng Võ (TTYT Ba Đình)',
                'address' =>'148c Ngọc Khánh, Phường Giảng Võ, Quận Ba Đình',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>506,
                'name' =>'Trạm y tế phường Thành Công (TTYT Ba Đình)',
                'address' =>'Gần Nhà B4 Thành Công, Quận Ba Đình',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>507,
                'name' =>'Trạm y tế phường Vĩnh Phúc (TTYT Ba Đình)',
                'address' =>'K1 Khu 7,2ha Phường Vĩnh Phúc, Quận Ba Đình',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>508,
                'name' =>'Trạm y tế Phường Liễu Giai (TTYT Ba Đình)',
                'address' =>'22 Văn Cao - Ba Đình - hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>509,
                'name' =>'Trạm y tế phường Phúc Tân (TTYT Hoàn Kiếm)',
                'address' =>'Phường Phúc Tân, Quận Hoàn Kiếm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>510,
                'name' =>'Trạm y tế phường Đồng Xuân (TTYT Hoàn Kiếm)',
                'address' =>'Phường Đồng Xuân, Quận Hoàn Kiếm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>511,
                'name' =>'Trạm y tế Phường Hàng Mã (TTYT Hoàn Kiếm)',
                'address' =>'Phường Hàng Mã',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>512,
                'name' =>'Trạm y tế Phường Hàng Buồm (TTYT Hoàn Kiếm)',
                'address' =>'Phường Hàng Buồm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>513,
                'name' =>'Trạm y tế Phường Hàng Đào (TTYT Hoàn Kiếm)',
                'address' =>'Phường Hàng Đào',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>514,
                'name' =>'Trạm y tế Phường Hàng Bồ (TTYT Hoàn Kiếm)',
                'address' =>'Phường Hàng Bồ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>515,
                'name' =>'Trạm y tế Phường Cửa Đông (TTYT Hoàn Kiếm)',
                'address' =>'Phường Cửa Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>516,
                'name' =>'Trạm y tế Phường Lý Thái Tổ (TTYT Hoàn Kiếm)',
                'address' =>'Phường Lý Thái Tổ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>517,
                'name' =>'Trạm y tế Phường Hàng Bạc (TTYT Hoàn Kiếm)',
                'address' =>'Phường Hàng Bạc',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>518,
                'name' =>'Trạm y tế Phường Hàng Gai (TTYT Hoàn Kiếm)',
                'address' =>'Phường Hàng Gai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>519,
                'name' =>'Trạm y tế phường Chương Dương (TTYT Hoàn Kiếm)',
                'address' =>'Phường Chương Dương, Quận Hoàn Kiếm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>520,
                'name' =>'Trạm y tế Phường Hàng Trống (TTYT Hoàn Kiếm)',
                'address' =>'Phường Hàng Trống',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>521,
                'name' =>'Trạm y tế Phường Cửa Nam (TTYT Hoàn Kiếm)',
                'address' =>'Phường Cửa Nam',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>522,
                'name' =>'Trạm y tế Phường Hàng Bông (TTYT Hoàn Kiếm)',
                'address' =>'Phường Hàng Bông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>523,
                'name' =>'Trạm y tế phường Tràng Tiền (TTYT Hoàn Kiếm)',
                'address' =>'Phường Tràng Tiền, Quận Hoàn Kiếm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>524,
                'name' =>'Trạm y tế Phường Trần Hưng Đạo (TTYT HK)',
                'address' =>'Phường Trần Hưng Đạo',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>525,
                'name' =>'Trạm y tế Phường Phan Chu Trinh (TTYT HK)',
                'address' =>'Phường Phan Chu Trinh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>526,
                'name' =>'Trạm y tế phường Hàng Bài (TTYT Hoàn Kiếm)',
                'address' =>'Phường Hàng Bài, Quận Hoàn Kiếm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>527,
                'name' =>'Trạm y tế phường Phú Thượng, Tây Hồ',
                'address' =>'3 Phú Gia, Phường Phú Thượng, Tây Hồ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>528,
                'name' =>'Trạm y tế phường Nhật Tân, Tây Hồ',
                'address' =>'Ngõ 479 Đường Âu Cơ, P Nhật Tân, Tây Hồ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>529,
                'name' =>'Trạm y tế phường Tứ Liên, Tây Hồ',
                'address' =>'68 Âu Cơ, Phường Tứ Liên, Tây Hồ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>530,
                'name' =>'Trạm y tế phường Quảng An, Tây Hồ',
                'address' =>'9 Ngõ 31 Xuân Diệu, P Quảng An, Tây Hồ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>531,
                'name' =>'Trạm y tế phường Xuân La, Tây Hồ',
                'address' =>'Tổ 23 Cụm 3 Đường Xuân La, Tây Hồ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>532,
                'name' =>'Trạm y tế phường Yên Phụ, Tây Hồ',
                'address' =>'48 Yên Phụ, Phường Yên Phụ, Tây Hồ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>533,
                'name' =>'Trạm y tế phường Bưởi, Tây Hồ',
                'address' =>'564 Thuỵ Khuê, Phường Bưởi, Tây Hồ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>534,
                'name' =>'Trạm y tế phường Thụy Khuê ,Tây Hồ',
                'address' =>'271a Thuỵ Khuê, Phường Thuỵ Khuê, Tây Hồ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>535,
                'name' =>'Trạm y tế phường Thượng Thanh (TTYTq.LB)',
                'address' =>'Phường Thượng Thanh, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>536,
                'name' =>'Trạm y tế phường Ngọc Thụy (TTYTq.LB)',
                'address' =>'Phường Ngọc Thuỵ, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>537,
                'name' =>'Trạm y tế phường Giang Biên (TTYTq.LB)',
                'address' =>'Phường Giang Biên, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>538,
                'name' =>'Trạm y tế phường Đức Giang (TTYTq.LB)',
                'address' =>'Phường Đức Giang, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>539,
                'name' =>'Trạm y tế phường Việt Hưng (TTYTq.LB)',
                'address' =>'Phường Việt Hưng, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>540,
                'name' =>'Trạm y tế phường Gia Thụy (TTYTq.LB)',
                'address' =>'Phường Gia Thuỵ, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>541,
                'name' =>'Trạm y tế phường Ngọc Lâm (TTYTq.LB)',
                'address' =>'Phường Ngọc Lâm, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>542,
                'name' =>'Trạm y tế phường Phúc Lợi (TTYTq.LB)',
                'address' =>'Phường Phúc Lợi, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>543,
                'name' =>'Trạm y tế phường Bồ Đề (TTYTq.LB)',
                'address' =>'Phường Bồ Đề, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>544,
                'name' =>'Trạm y tế phường Sài Đồng (TTYTq.LB)',
                'address' =>'Phường Sài Đồng, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>545,
                'name' =>'Trạm y tế phường Long Biên (TTYTq.LB)',
                'address' =>'Phường Long Biên, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>546,
                'name' =>'Trạm y tế phường Thạch Bàn (TTYTq.LB)',
                'address' =>'Phường Thạch Bàn, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>547,
                'name' =>'Trạm y tế phường Phúc Đồng (TTYTq.LB)',
                'address' =>'Phường Phúc Đồng, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>548,
                'name' =>'Trạm y tế phường Cự Khối (TTYTq.LB)',
                'address' =>'Phường Cự Khối, Long Biên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>549,
                'name' =>'Trạm y tế phường Nghĩa Đô, Cầu Giấy',
                'address' =>'Phường Nghĩa Đô, Quận Cầu Giấy',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>550,
                'name' =>'Trạm y tế phường Nghĩa Tân, Cầu Giấy',
                'address' =>'Phường Nghĩa Tân, Quận Cầu Giấy',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>551,
                'name' =>'Trạm y tế phường Mai Dịch, Cầu Giấy',
                'address' =>'Phường Mai Dịch, , Quận Cầu Giấy',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>552,
                'name' =>'Trạm y tế phường Dịch Vọng, Cầu Giấy',
                'address' =>'Phường Dịch Vọng, Quận Cầu Giấy',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>553,
                'name' =>'Trạm y tế phường Quan Hoa, Cầu Giấy',
                'address' =>'Phường Quan Hoa, Quận Cầu Giấy',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>554,
                'name' =>'Trạm y tế phường Yên Hoà, Cầu Giấy',
                'address' =>'Phường Yên Hoà, Quận Cầu Giấy',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>555,
                'name' =>'Trạm y tế phường Trung Hoà, Cầu Giấy',
                'address' =>'Phường Trung Hoà, Quận Cầu Giấy',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>556,
                'name' =>'Trạm y tế phường Dịch Vọng H_u, Cầu Giấy',
                'address' =>'Phường Dịch Vọng Hậu, Quận Cầu Giấy',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>557,
                'name' =>'Trạm y tế Phường Cát Linh (TTYT Đống Đa)',
                'address' =>'Phường Cát Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>558,
                'name' =>'Trạm y tế phường Văn Miếu (TTYT Đống Đa)',
                'address' =>'130 Nguyễn Khuyến, Phường Văn Miếu',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>559,
                'name' =>'Trạm y tế phường Quốc Tử Giám (TTYT Đống Đa)',
                'address' =>'14 Thông Phong, Phường Quốc Tử Giám',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>560,
                'name' =>'Trạm y tế phường Láng Thượng (TTYT Đống Đa)',
                'address' =>'112 Chùa Láng Phường Láng Thượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>561,
                'name' =>'Trạm y tế phường Ô Chợ Dừa (TTYT Đống Đa)',
                'address' =>'197 Đông Các, Phường Ô Chợ Dừa',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>562,
                'name' =>'Trạm y tế phường Văn Chương (TTYT Đống Đa)',
                'address' =>'53 Ngõ Văn Chương, P. Văn Chương',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>563,
                'name' =>'Trạm y tế phường Hàng Bột (TTYT Đống Đa)',
                'address' =>'107 Tôn Đức Thắng, Phường Hàng Bột',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>564,
                'name' =>'Trạm y tế phường Láng Hạ (TTYT Đống Đa)',
                'address' =>'9 Ngõ 107 Nguyễn Chí Thanh, P Láng Hạ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>565,
                'name' =>'Trạm y tế phường Khâm Thiên (TTYT Đống Đa)',
                'address' =>'9 Ngõ Đình Tương Thuận, P Khâm Thiên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>566,
                'name' =>'Trạm y tế Phường Thổ Quan (TTYT Đống Đa)',
                'address' =>'Phường Thổ Quan',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>567,
                'name' =>'Trạm y tế phường Nam Đồng (TTYT Đống Đa)',
                'address' =>'194 Nguyễn Lương Bằng, P Nam Đồng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>568,
                'name' =>'Trạm y tế phường Trung Phụng (TTYT Đống Đa)',
                'address' =>'86 Ngõ Lan Bá, Phường Trung Phụng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>569,
                'name' =>'Trạm y tế phường Quang Trung (TTYT Đống Đa)',
                'address' =>'194 Nguyễn Lương Bằng, P.Quang Trung',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>570,
                'name' =>'Trạm y tế phường Trung Liệt (TTYT Đống Đa)',
                'address' =>'18 Trung Liệt, Phường Trung Liệt',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>571,
                'name' =>'Trạm y tế phường Phương Liên (TTYT Đống Đa)',
                'address' =>'80 Kim Hoa, Phường Phương Liên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>572,
                'name' =>'Trạm y tế phường Thịnh Quang (TTYT Đống Đa)',
                'address' =>'10 Ngõ 122 Đường Láng, Pthịnh Quang',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>573,
                'name' =>'Trạm y tế phường Trung Tự (TTYT Đống Đa)',
                'address' =>'2 Ngõ 4d Đặng Văn Ngữ, Ptrung Tự',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>574,
                'name' =>'Trạm y tế phường Kim Liên (TTYT Đống Đa)',
                'address' =>'20b Phụ, Phường Kim Liên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>575,
                'name' =>'Trạm y tế phường Phương Mai (TTYT Đống Đa)',
                'address' =>'28c Lương Định Của, P Phương Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>576,
                'name' =>'Trạm y tế Phường Ngã Tư Sở (TTYT Đống Đa)',
                'address' =>'Phường Ngã Tư Sở',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>577,
                'name' =>'Trạm y tế phường Khương Thượng (TTYT Đống Đa)',
                'address' =>'107 Khương Thượng, Pkhương Thượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>578,
                'name' =>'Trạm y tế phường Nguyễn Du (TTYT Hai Bà Trưng)',
                'address' =>'Phường Nguyễn Du, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>579,
                'name' =>'Trạm y tế phường Bạch Đằng (TTYT Hai Bà Trưng)',
                'address' =>'Phường Bạch Đằng, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>580,
                'name' =>'Trạm y tế phường Phạm Đình Hổ (TTYT HBT)',
                'address' =>'Phường Phạm Đình Hổ, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>581,
                'name' =>'Trạm y tế phường Bùi Thị Xuân (TTYT HBT)',
                'address' =>'Phường Bùi Thị Xuân, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>582,
                'name' =>'Trạm y tế phường Ngô Thì Nhậm (TTYT HBT)',
                'address' =>'Phường Ngô Thì Nhậm, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>583,
                'name' =>'Trạm y tế phường Lê Đại Hành (TTYT HBT)',
                'address' =>'Phường Lê Đại Hành, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>584,
                'name' =>'Trạm y tế phường Đồng Nhân (TTYT Hai Bà Trưng)',
                'address' =>'Phường Đồng Nhân, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>585,
                'name' =>'Trạm y tế phường Phố Huế (TTYT Hai Bà Trưng)',
                'address' =>'Phố Huế- Hai bà Trưng-Hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>586,
                'name' =>'Trạm y tế phường Đống Mác (TTYT Hai Bà Trưng)',
                'address' =>'Phường Đống Mác, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>587,
                'name' =>'Trạm y tế phường Thanh Lương (TTYT HBT)',
                'address' =>'Phường Thanh Lương, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>588,
                'name' =>'Trạm y tế phường Thanh Nhàn (TTYT HBT)',
                'address' =>'Phường Thanh Nhàn, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>589,
                'name' =>'Trạm y tế phường Cầu Dền (TTYT Hai Bà Trưng)',
                'address' =>'Phường Cầu Dền, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>590,
                'name' =>'Trạm y tế phường Bách Khoa (TTYT Hai Bà Trưng)',
                'address' =>'Phường Bách Khoa, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>591,
                'name' =>'Trạm y tế phường Đồng Tâm (TTYT Hai Bà Trưng)',
                'address' =>'Phường Đồng Tâm, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>592,
                'name' =>'Trạm y tế phường Vĩnh Tuy (TTYT Hai Bà Trưng)',
                'address' =>'Phường Vĩnh Tuy, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>593,
                'name' =>'Trạm y tế phường Bạch Mai (TTYT Hai Bà Trưng)',
                'address' =>'Phường Bạch Mai, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>594,
                'name' =>'Trạm y tế phường Quỳnh Mai (TTYT Hai Bà Trưng)',
                'address' =>'Quỳnh Mai- Hai Bà Trưng-Hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>595,
                'name' =>'Trạm y tế phường Quỳnh Lôi (TTYT Hai Bà Trưng)',
                'address' =>'Phường Quỳnh Lôi, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>596,
                'name' =>'Trạm y tế phường Minh Khai (TTYT Hai Bà Trưng)',
                'address' =>'Phường Minh Khai,, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>597,
                'name' =>'Trạm y tế phường Trương Định (TTYT Hai Bà Trưng)',
                'address' =>'Phường Trương Định, quận Hai Bà Trưng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>598,
                'name' =>'Trạm y tế phường Thanh Trì, Hoàng Mai',
                'address' =>'Phường Thanh Trì, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>599,
                'name' =>'Trạm y tế phường Vĩnh Hưng, Hoàng Mai',
                'address' =>'Phường Vĩnh Hưng, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>600,
                'name' =>'Trạm y tế phường Định Công, Hoàng Mai',
                'address' =>'Phường Định Công, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>601,
                'name' =>'Trạm y tế phường Mai Động, Hoàng Mai',
                'address' =>'Phường Mai Động, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>602,
                'name' =>'Trạm y tế phường Tương Mai, Hoàng Mai',
                'address' =>'Phường Tương Mai, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>603,
                'name' =>'Trạm y tế phường Đại Kim, Hoàng Mai',
                'address' =>'Phường Đại Kim, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>604,
                'name' =>'Trạm y tế phường Tân Mai, Hoàng Mai',
                'address' =>'Phường Tân Mai, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>605,
                'name' =>'Trạm y tế P.Hoàng Văn Thụ, Hoàng Mai',
                'address' =>'Phường Hoàng Văn Thụ, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>606,
                'name' =>'Trạm y tế phường Giáp Bát, Hoàng Mai',
                'address' =>'Phường Giáp Bát, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>607,
                'name' =>'Trạm y tế phường Lĩnh Nam, Hoàng Mai',
                'address' =>'Phường Lĩnh Nam, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>608,
                'name' =>'Trạm y tế phường Thịnh Liệt, Hoàng Mai',
                'address' =>'Phường Thịnh Liệt, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>609,
                'name' =>'Trạm y tế phường Trần Phú, Hoàng Mai',
                'address' =>'Phường Trần Phú, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>610,
                'name' =>'Trạm y tế phường Hoàng Liệt, Hoàng Mai',
                'address' =>'Phường Hoàng Liệt, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>611,
                'name' =>'Trạm y tế phường Yên Sở, Hoàng Mai',
                'address' =>'Phường Yên Sở, Quận Hoàng Mai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>612,
                'name' =>'Trạm y tế thị trấn Đông Anh, Đông Anh',
                'address' =>'Thị Trấn Đông Anh, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>613,
                'name' =>'Trạm y tế xã Xuân Nộn, Đông Anh',
                'address' =>'Xã Xuân Nộn, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>614,
                'name' =>'Trạm y tế xã Thụy Lâm, Đông Anh',
                'address' =>'Xã Thụy Lâm, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>615,
                'name' =>'Trạm y tế xã Bắc Hồng, Đông Anh',
                'address' =>'Xã Bắc Hồng, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>616,
                'name' =>'Trạm y tế xã Nguyên Khê, Đông Anh',
                'address' =>'Xã Nguyên Khê, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>617,
                'name' =>'Trạm y tế xã Nam Hồng, Đông Anh',
                'address' =>'Xã Nam Hồng, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>618,
                'name' =>'Trạm y tế xã Tiên Dương, Đông Anh',
                'address' =>'Xã Tiên Dương, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>619,
                'name' =>'Trạm y tế xã Vân Hà, Đông Anh',
                'address' =>'Xã Vân Hà, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>620,
                'name' =>'Trạm y tế xã Uy Nỗ, Đông Anh',
                'address' =>'Xã Uy Nỗ, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>621,
                'name' =>'Trạm y tế xã Vân Nội, Đông Anh',
                'address' =>'Xã Vân Nội, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>622,
                'name' =>'Trạm y tế xã Liên Hà, Đông Anh',
                'address' =>'Xã Liên Hà, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>623,
                'name' =>'Trạm y tế xã Việt Hùng, Đông Anh',
                'address' =>'Xã Việt Hùng, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>624,
                'name' =>'Trạm y tế xã Kim Nỗ, Đông Anh',
                'address' =>'Xã Kim Nỗ, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>625,
                'name' =>'Trạm y tế xã Kim Chung, Đông Anh',
                'address' =>'Xã Kim Chung, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>626,
                'name' =>'Trạm y tế xã Dục Tú, Đông Anh',
                'address' =>'Xã Dục Tú, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>627,
                'name' =>'Trạm y tế xã Đại Mạch, Đông Anh',
                'address' =>'Xã Đại Mạch, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>628,
                'name' =>'Trạm y tế xã Vĩnh Ngọc, Đông Anh',
                'address' =>'Xã Vĩnh Ngọc, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>629,
                'name' =>'Trạm y tế xã Cổ Loa, Đông Anh',
                'address' =>'Xã Cổ Loa, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>630,
                'name' =>'Trạm y tế xã Hải Bối, Đông Anh',
                'address' =>'Xã Hải Bối, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>631,
                'name' =>'Trạm y tế xã Xuân Canh, Đông Anh',
                'address' =>'Xã Xuân Canh, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>632,
                'name' =>'Trạm y tế xã Võng La, Đông Anh',
                'address' =>'Xã Võng La, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>633,
                'name' =>'Trạm y tế xã Tầm Xá, Đông Anh',
                'address' =>'Xã Tàm Xá, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>634,
                'name' =>'Trạm y tế xã Mai Lâm, Đông Anh',
                'address' =>'Xã Mai Lâm, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>635,
                'name' =>'Trạm y tế xã Đông Hội, Đông Anh',
                'address' =>'Xã Đông Hội, Đông Anh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>636,
                'name' =>'Trạm y tế Thị trấn Yên Viên (TTYT Gia Lâm)',
                'address' =>'Thị trấn Yên Viên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>637,
                'name' =>'Trạm y tế xã Yên Thường (TTYT Huyện Gia Lâm)',
                'address' =>'Xã Yên Thường, Huyện Gia Lâm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>638,
                'name' =>'Trạm y tế Xã Yên Viên (TTYT Gia Lâm)',
                'address' =>'Xã Yên Viên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>639,
                'name' =>'Trạm y tế xã Ninh Hiệp (TTYT Huyện Gia Lâm)',
                'address' =>'Xã Ninh Hiệp, Huyện Gia Lâm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>640,
                'name' =>'Trạm y tế Xã Đình Xuyên (TTYT Gia Lâm)',
                'address' =>'Xã Đình Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>641,
                'name' =>'Trạm y tế Xã Dương Hà (TTYT Gia Lâm)',
                'address' =>'Xã Dương Hà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>642,
                'name' =>'Trạm y tế Xã Phù Đổng (TTYT Gia Lâm)',
                'address' =>'Xã Phù Đổng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>643,
                'name' =>'Trạm y tế xã Trung Mầu (TTYT Huyện Gia Lâm)',
                'address' =>'Xã Trung Mầu, Huyện Gia Lâm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>644,
                'name' =>'Trạm y tế xã Lệ Chi',
                'address' =>'Xã Lệ Chi, huyện Gia Lâm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>645,
                'name' =>'Trạm y tế xã Cổ Bi',
                'address' =>'Xã Cổ Bi, huyện Gia Lâm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>646,
                'name' =>'Trạm y tế Xã Đặng Xá (TTYT Gia Lâm)',
                'address' =>'Xã Đặng Xá',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>647,
                'name' =>'Trạm y tế xã Phú Thị (TTYT Huyện Gia Lâm)',
                'address' =>'Xã Phú Thị, Huyện Gia Lâm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>648,
                'name' =>'Trạm y tế xã Kim Sơn (TTYT Huyện Gia Lâm)',
                'address' =>'Xã Kim Sơn, Huyện Gia Lâm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>649,
                'name' =>'Trạm y tế Trị trấn Trâu Quỳ (TTYT Gia Lâm)',
                'address' =>'Trị trấn Trâu Quỳ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>650,
                'name' =>'Trạm y tế Xã Dương Quang (TTYT Gia Lâm)',
                'address' =>'Xã Dương Quang',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>651,
                'name' =>'Trạm y tế xã Dương Xá (TTYT Huyện Gia Lâm)',
                'address' =>'Xã Dương Xá, Huyện Gia Lâm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>652,
                'name' =>'Trạm y tế xã Đông Dư (TTYT Huyện Gia Lâm)',
                'address' =>'Xã Đông Dư, Huyện Gia Lâm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>653,
                'name' =>'Trạm y tế Xã Đa Tốn (TTYT Gia Lâm)',
                'address' =>'Xã Đa Tốn',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>654,
                'name' =>'Trạm y tế Xã Kiêu Kỵ (TTYT Gia Lâm)',
                'address' =>'Xã Kiêu Kỵ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>655,
                'name' =>'Trạm y tế Xã Bát Tràng (TTYT Gia Lâm)',
                'address' =>'Xã Bát Tràng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>656,
                'name' =>'Trạm y tế Xã Kim Lan (TTYT Gia Lâm)',
                'address' =>'Xã Kim Lan',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>657,
                'name' =>'Trạm y tế xã Văn Đức',
                'address' =>'Xã Văn Đức, huyện Gia Lâm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>658,
                'name' =>'Trạm y tế phường Cầu Diễn',
                'address' =>'Phường Cầu Diễn, Quận Nam Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>659,
                'name' =>'Trạm y tế phường Thượng Cát',
                'address' =>'Phườngthượng Cát, Quận Bắc Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>660,
                'name' =>'Trạm y tế phường Liên Mạc',
                'address' =>'Phường Liên Mạc, Quận Bắc Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>661,
                'name' =>'Trạm y tế phường Đông Ngạc',
                'address' =>'Phường Đông Ngạc, Quận Bắc Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>662,
                'name' =>'Trạm y tế phường Thụy Phương',
                'address' =>'Phường Thuỵ Phương, Quận Bắc Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>663,
                'name' =>'Trạm y tế phường Tây Tựu',
                'address' =>'Phường Tây Tựu, Quận Bắc Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>664,
                'name' =>'Trạm y tế phường Xuân Đỉnh',
                'address' =>'Phường Xuân Đỉnh, Quận Bắc Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>665,
                'name' =>'Trạm y tế phường Minh Khai',
                'address' =>'Phường Minh Khai, Quận Bắc Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>666,
                'name' =>'Trạm y tế phường Cổ Nhuế 1',
                'address' =>'Phường Cổ Nhuế, Quận Bắc Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>667,
                'name' =>'Trạm y tế phường Phú Diễn',
                'address' =>'Phường Phú Diễn, Quận Bắc Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>668,
                'name' =>'Trạm y tế phường Xuân Phương',
                'address' =>'Phường Xuân Phương, Quận Nam Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>669,
                'name' =>'Trạm y tế phường Mỹ Đình 1',
                'address' =>'Phường Mỹ Đình, Quận Nam Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>670,
                'name' =>'Trạm y tế phường Tây Mỗ',
                'address' =>'Phường Tây Mỗ, Quận Nam Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>671,
                'name' =>'Trạm y tế phường Mễ Trì',
                'address' =>'Phường Mễ Trì, Quận Nam Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>672,
                'name' =>'Trạm y tế phường Đại Mỗ',
                'address' =>'Phường Đại Mỗ, Quận Nam Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>673,
                'name' =>'Trạm y tế phường Trung Văn',
                'address' =>'Phường Trung Văn, Quận Nam Từ Liêm',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>674,
                'name' =>'Trạm y tế thị trấn Văn Điển (TTYT H.Thanh Trì)',
                'address' =>'Thị Trấn Văn Điển, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>675,
                'name' =>'Trạm y tế xã Tân Triều (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Tân Triều, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>676,
                'name' =>'Trạm y tế xã Thanh Liệt (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Thanh Liệt, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>677,
                'name' =>'Trạm y tế xã Tả Thanh Oai (TTYT H.Thanh Trì)',
                'address' =>'Xã Tả Thanh Oai, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>678,
                'name' =>'Trạm y tế xã Hữu Hoà (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Hữu Hoà, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>679,
                'name' =>'Trạm y tế xã Tam Hiệp (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Tam Hiệp, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>680,
                'name' =>'Trạm y tế xã Tứ Hiệp (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Tứ Hiệp, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>681,
                'name' =>'Trạm y tế xã Yên Mỹ (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Yên Mỹ, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>682,
                'name' =>'Trạm y tế xã Vĩnh Quỳnh (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Vĩnh Quỳnh, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>683,
                'name' =>'Trạm y tế xã Ngũ Hiệp (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Ngũ Hiệp, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>684,
                'name' =>'Trạm y tế xã Duyên Hà (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Duyên Hà, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>685,
                'name' =>'Trạm y tế xã Ngọc Hồi (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Ngọc Hồi, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>686,
                'name' =>'Trạm y tế xã Vạn Phúc (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Vạn Phúc, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>687,
                'name' =>'Trạm y tế xã Đại áng (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Đại áng, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>688,
                'name' =>'Trạm y tế xã Liên Ninh (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Liên Ninh, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>689,
                'name' =>'Trạm y tế xã Đông Mỹ (TTYT Huyện Thanh Trì)',
                'address' =>'Xã Đông Mỹ, Huyện Thanh Trì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>690,
                'name' =>'Trạm y tế phường Nguyễn Trãi, Hà Đông',
                'address' =>'Phường Nguyễn Trãi, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>691,
                'name' =>'Trạm y tế phường Văn Mỗ, Hà Đông',
                'address' =>'Văn Mỗ- Hà Đông-Hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>692,
                'name' =>'Trạm y tế phường Vạn Phúc, Hà Đông',
                'address' =>'Phường Vạn Phúc, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>693,
                'name' =>'Trạm y tế phường Yết Kiêu, Hà Đông',
                'address' =>'Phường Yết Kiêu, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>694,
                'name' =>'Trạm y tế phường Quang Trung, Hà Đông',
                'address' =>'Phường Quang Trung, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>695,
                'name' =>'Trạm y tế phường Phúc La, Hà Đông',
                'address' =>'Phường Phúc La, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>696,
                'name' =>'Trạm y tế phường Hà Cầu, Quận Hà Đông',
                'address' =>'Phường Hà Cầu, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>697,
                'name' =>'Trạm y tế xã Văn Khê, Hà Đông',
                'address' =>'Văn Khê-Hà Đông-Hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>698,
                'name' =>'Trạm y tế xã Yên Nghĩa, Quận Hà Đông',
                'address' =>'Xã Yên Nghĩa, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>699,
                'name' =>'Trạm y tế xã Kiến Hưng, Quận Hà Đông',
                'address' =>'Xã Kiến Hưng, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>700,
                'name' =>'Trạm y tế xã Phú Lãm, Quận Hà Đông',
                'address' =>'Xã Phú Lãm, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>701,
                'name' =>'Trạm y tế xã Phú Lương, Quận Hà Đông',
                'address' =>'Xã Phú Lương, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>702,
                'name' =>'Trạm y tế xã Dương Nội, Quận Hà Đông',
                'address' =>'Xã Dương Nội, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>703,
                'name' =>'Trạm y tế xã Đồng Mai, Quận Hà Đông',
                'address' =>'Xã Đồng Mai, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>704,
                'name' =>'Trạm y tế xã Biên Giang, Quận Hà Đông',
                'address' =>'Xã Biên Giang, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>705,
                'name' =>'Trạm y tế phường Văn Quán, Quận Hà Đông',
                'address' =>'Phường Văn Quán, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>706,
                'name' =>'Trạm y tế phường Mộ Lao, Quận Hà Đông',
                'address' =>'Phường Mộ Lao, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>707,
                'name' =>'Trạm y tế phường Phú La, Quận Hà Đông',
                'address' =>'Phường Phú La, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>708,
                'name' =>'Trạm y tế phường La Khê, Quận Hà Đông',
                'address' =>'Phường La Khê, Hà Đông',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>709,
                'name' =>'Trạm y tế phường Lê Lợi (TX Sơn Tây)',
                'address' =>'Phường Lê Lợi, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>710,
                'name' =>'Trạm y tế phường Phú Thịnh (TX Sơn Tây)',
                'address' =>'Phường Phú Thịnh, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>711,
                'name' =>'Trạm y tế phường Ngô Quyền (TX Sơn Tây)',
                'address' =>'Phường Ngô Quyền, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>712,
                'name' =>'Trạm y tế phường Quang Trung (TX Sơn Tây)',
                'address' =>'Phường Quang Trung, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>713,
                'name' =>'Trạm y tế phường Sơn Lộc (TX Sơn Tây)',
                'address' =>'Phường Sơn Lộc, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>714,
                'name' =>'Trạm y tế phường Xuân Khanh (TX Sơn Tây)',
                'address' =>'Phường Xuân Khanh, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>715,
                'name' =>'Trạm y tế xã Đường Lâm (TX Sơn Tây)',
                'address' =>'Xã Đường Lâm, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>716,
                'name' =>'Trạm y tế xã Viên Sơn (TX Sơn Tây)',
                'address' =>'Xã Viên Sơn, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>717,
                'name' =>'Trạm y tế xã Xuân Sơn (TX Sơn Tây)',
                'address' =>'Xã Xuân Sơn, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>718,
                'name' =>'Trạm y tế xã Trung Hưng (TX Sơn Tây)',
                'address' =>'Xã Trung Hưng, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>719,
                'name' =>'Trạm y tế xã Thanh Mỹ (TX Sơn Tây)',
                'address' =>'Xã Thanh Mỹ, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>720,
                'name' =>'Trạm y tế xãTrung Sơn Trầm (TX Sơn Tây)',
                'address' =>'Xã Trung Sơn Trầm, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>721,
                'name' =>'Trạm y tế xã Kim Sơn (TX Sơn Tây)',
                'address' =>'Xã Kim Sơn, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>722,
                'name' =>'Trạm y tế xã Sơn Đông (TX Sơn Tây)',
                'address' =>'Xã Sơn Đông, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>723,
                'name' =>'Trạm y tế xã Cổ Đông (TX Sơn Tây)',
                'address' =>'Xã Cổ Đông, Sơn Tây',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>724,
                'name' =>'Trạm y tế thị trấn Tây Đằng (TTYT H. Ba Vì)',
                'address' =>'Thị Trấn Tây Đằng, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>725,
                'name' =>'Trạm y tế xã Tân Đức (TTYT H. Ba Vì)',
                'address' =>'Xã Tân Đức, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>726,
                'name' =>'Trạm y tế xã Phú Cường (TTYT H. Ba Vì)',
                'address' =>'Xã Phú Cường, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>727,
                'name' =>'Trạm y tế xã Cổ Đô (TTYT H. Ba Vì)',
                'address' =>'Xã Cổ Đô, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>728,
                'name' =>'Trạm y tế xã Tản Hồng (TTYT H. Ba Vì)',
                'address' =>'Xã Tản Hồng, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>729,
                'name' =>'Trạm y tế xã Vạn Thắng (TTYT H. Ba Vì)',
                'address' =>'Xã Vạn Thắng, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>730,
                'name' =>'Trạm y tế xã Châu Sơn (TTYT H. Ba Vì)',
                'address' =>'Xã Châu Sơn, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>731,
                'name' =>'Trạm y tế xã Phong Vân (TTYT H. Ba Vì)',
                'address' =>'Xã Phong Vân, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>732,
                'name' =>'Trạm y tế xã Phú Đông (TTYT H. Ba Vì)',
                'address' =>'Xã Phú Đông, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>733,
                'name' =>'Trạm y tế xã Phú Phương (TTYT H. Ba Vì)',
                'address' =>'Xã Phú Phương, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>734,
                'name' =>'Trạm y tế xã Phú Châu (TTYT H. Ba Vì)',
                'address' =>'Xã Phú Châu, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>735,
                'name' =>'Trạm y tế xã Thái Hòa (TTYT H. Ba Vì)',
                'address' =>'Xã Thái Hòa, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>736,
                'name' =>'Trạm y tế xã Đồng Thái (TTYT huyện Ba Vì)',
                'address' =>'Xã Đồng Thái - ba Vì - hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>737,
                'name' =>'Trạm y tế xã Phú Sơn (TTYT H. Ba Vì)',
                'address' =>'Xã Phú Sơn, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>738,
                'name' =>'Trạm y tế xã Minh Châu (TTYT H. Ba Vì)',
                'address' =>'Xã Minh Châu, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>739,
                'name' =>'Trạm y tế xã Vật Lại (TTYT huyện Ba Vì)',
                'address' =>'Xã Vật Lại - ba Vì - hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>740,
                'name' =>'Trạm y tế xã Chu Minh (TTYT H. Ba Vì)',
                'address' =>'Xã Chu Minh, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>741,
                'name' =>'Trạm y tế xã Tòng Bạt (TTYT H. Ba Vì)',
                'address' =>'Xã Tòng Bạt, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>742,
                'name' =>'Trạm y tế xã Cẩm Lĩnh (TTYT H. Ba Vì)',
                'address' =>'Xã Cẩm Lĩnh, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>743,
                'name' =>'Trạm y tế xã Sơn Đà (TTYT huyện Ba Vì)',
                'address' =>'Xã Sơn Đà - huyện Ba Vì - hà Nội',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>744,
                'name' =>'Trạm y tế xã Đông Quang (TTYT H. Ba Vì)',
                'address' =>'Xã Đông Quang, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>745,
                'name' =>'Trạm y tế xã Tiên Phong (TTYT H. Ba Vì)',
                'address' =>'Xã Tiên Phong, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>746,
                'name' =>'Trạm y tế xã Thụy An (TTYT H. Ba Vì)',
                'address' =>'Xã Thụy An, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>747,
                'name' =>'Trạm y tế xã Cam Thượng (TTYT H. Ba Vì)',
                'address' =>'Xã Cam Thượng, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>748,
                'name' =>'Trạm y tế xã Thuần Mỹ (TTYT H. Ba Vì)',
                'address' =>'Xã Thuần Mỹ, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>749,
                'name' =>'Trạm y tế xã Tản Lĩnh (TTYT H. Ba Vì)',
                'address' =>'Xã Tản Lĩnh, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>750,
                'name' =>'Trạm y tế xã Ba Trại (TTYT H. Ba Vì)',
                'address' =>'Xã Ba Trại, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>751,
                'name' =>'Trạm y tế xã Minh Quang (TTYT H. Ba Vì)',
                'address' =>'Xã Minh Quang, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>752,
                'name' =>'Trạm y tế xã Ba Vì (TTYT H. Ba Vì)',
                'address' =>'Xã Ba Vì, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>753,
                'name' =>'Trạm y tế xã Vân Hòa (TTYT H. Ba Vì)',
                'address' =>'Xã Vân Hòa, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>754,
                'name' =>'Trạm y tế xã Yên Bài (TTYT H. Ba Vì)',
                'address' =>'Xã Yên Bài, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>755,
                'name' =>'Trạm y tế xã Khánh Thượng (TTYT H. Ba Vì)',
                'address' =>'Xã Khánh Thượng, Ba Vì',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>756,
                'name' =>'Trạm y tế thị trấn Phúc Thọ (TTYT H. Phúc Thọ)',
                'address' =>'Thị Trấn Phúc Thọ, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>757,
                'name' =>'Trạm y tế xã Vân Hà (TTYT H. Phúc Thọ)',
                'address' =>'Xã Vân Hà, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>758,
                'name' =>'Trạm y tế xã Vân Phúc (TTYT H. Phúc Thọ)',
                'address' =>'Xã Vân Phúc, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>759,
                'name' =>'Trạm y tế xã Vân Nam (TTYT H. Phúc Thọ)',
                'address' =>'Xã Vân Nam, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>760,
                'name' =>'Trạm y tế xã Xuân Phú (TTYT H. Phúc Thọ)',
                'address' =>'Xã Xuân Phú, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>761,
                'name' =>'Trạm y tế xã Phương Độ (TTYT H. Phúc Thọ)',
                'address' =>'Xã Phương Độ, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>762,
                'name' =>'Trạm y tế xã Sen Chiểu (TTYT H. Phúc Thọ)',
                'address' =>'Xã Sen Chiểu, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>763,
                'name' =>'Trạm y tế xã Cẩm Đình (TTYT H. Phúc Thọ)',
                'address' =>'Xã Cẩm Đình, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>764,
                'name' =>'Trạm y tế xã Võng Xuyên (TTYT H. Phúc Thọ)',
                'address' =>'Xã Võng Xuyên, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>765,
                'name' =>'Trạm y tế xã Thọ Lộc',
                'address' =>'Xã Thọ Lộc, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>766,
                'name' =>'Trạm y tế xã Long Xuyên (TTYT H. Phúc Thọ)',
                'address' =>'Xã Long Xuyên, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>767,
                'name' =>'Trạm y tế xã Thượng Cốc (TTYT H. Phúc Thọ)',
                'address' =>'Xã Thượng Cốc, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>768,
                'name' =>'Trạm y tế xã Hát Môn (TTYT H. Phúc Thọ)',
                'address' =>'Xã Hát Môn, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>769,
                'name' =>'Trạm y tế xã Tích Giang (TTYT H. Phúc Thọ)',
                'address' =>'Xã Tích Giang, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>770,
                'name' =>'Trạm y tế xã Thanh Đa (TTYT H. Phúc Thọ)',
                'address' =>'Xã Thanh Đa, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>771,
                'name' =>'Trạm y tế xã Trạch Mỹ Lộc (TTYT H. Phúc Thọ)',
                'address' =>'Xã Trạch Mỹ Lộc, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>772,
                'name' =>'Trạm y tế xã Phúc Hòa (TTYT H. Phúc Thọ)',
                'address' =>'Xã Phúc Hòa, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>773,
                'name' =>'Trạm y tế xã Ngọc Tảo (TTYT H. Phúc Thọ)',
                'address' =>'Xã Ngọc Tảo, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>774,
                'name' =>'Trạm y tế xã Phụng Thượng (TTYT H. Phúc Thọ)',
                'address' =>'Xã Phụng Thượng, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>775,
                'name' =>'Trạm y tế xã Tam Thuấn (TTYT H. Phúc Thọ)',
                'address' =>'Xã Tam Thuấn, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>776,
                'name' =>'Trạm y tế xã Tam Hiệp (TTYT H. Phúc Thọ)',
                'address' =>'Xã Tam Hiệp, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>777,
                'name' =>'Trạm y tế xã Hiệp Thuận (TTYT H. Phúc Thọ)',
                'address' =>'Xã Hiệp Thuận, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>778,
                'name' =>'Trạm y tế xã Liên Hiệp (TTYT H. Phúc Thọ)',
                'address' =>'Xã Liên Hiệp, Phúc Thọ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>779,
                'name' =>'Trạm y tế thị trấn Phùng (TTYT h. Đan Phượng)',
                'address' =>'Thị Trấn Phùng, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>780,
                'name' =>'Trạm y tế xã Trung Châu (TTYT h. Đan Phượng)',
                'address' =>'Xã Trung Châu, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>781,
                'name' =>'Trạm y tế xã Thọ An (TTYT h. Đan Phượng)',
                'address' =>'Xã Thọ An, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>782,
                'name' =>'Trạm y tế xã Thọ Xuân (TTYT h. Đan Phượng)',
                'address' =>'Xã Thọ Xuân, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>783,
                'name' =>'Trạm y tế xã Hồng Hà (TTYT h. Đan Phượng)',
                'address' =>'Xã Hồng Hà, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>784,
                'name' =>'Trạm y tế xã Liên Hồng (TTYT h. Đan Phượng)',
                'address' =>'Xã Liên Hồng, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>785,
                'name' =>'Trạm y tế xã Liên Hà (TTYT h. Đan Phượng)',
                'address' =>'Xã Liên Hà, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>786,
                'name' =>'Trạm y tế xã Hạ Mỗ (TTYT h. Đan Phượng)',
                'address' =>'Xã Hạ Mỗ, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>787,
                'name' =>'Trạm y tế xã Liên Trung (TTYT h. Đan Phượng)',
                'address' =>'Xã Liên Trung, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>788,
                'name' =>'Trạm y tế xã Phương Đình (TTYT h. Đan Phượng)',
                'address' =>'Xã Phương Đình, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>789,
                'name' =>'Trạm y tế xã Thượng Mỗ (TTYT h. Đan Phượng)',
                'address' =>'Xã Thượng Mỗ, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>790,
                'name' =>'Trạm y tế xã Tân Hội (TTYT h. Đan Phượng)',
                'address' =>'Xã Tân Hội, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>791,
                'name' =>'Trạm y tế xã Tân Lập (TTYT h. Đan Phượng)',
                'address' =>'Xã Tân Lập, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>792,
                'name' =>'Trạm y tế xã Đan Phượng (TTYT h. Đan Phượng)',
                'address' =>'Xã Đan Phượng, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>793,
                'name' =>'Trạm y tế xã Đồng Tháp (TTYT h. Đan Phượng)',
                'address' =>'Xã Đồng Tháp, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>794,
                'name' =>'Trạm y tế xã Song Phượng (TTYT h. Đan Phượng)',
                'address' =>'Xã Song Phượng, Đan Phượng',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>795,
                'name' =>'Trạm y tế thị trấn Trạm Trôi (TTYT h. Hoài Đức)',
                'address' =>'Thị Trấn Trạm Trôi, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>796,
                'name' =>'Trạm y tế xã Đức Thượng (TTYT h. Hoài Đức)',
                'address' =>'Xã Đức Thượng, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>797,
                'name' =>'Trạm y tế xã Minh Khai (TTYT h. Hoài Đức)',
                'address' =>'Xã Minh Khai, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>798,
                'name' =>'Trạm y tế xã Dương Liễu (TTYT h. Hoài Đức)',
                'address' =>'Xã Dương Liễu, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>799,
                'name' =>'Trạm y tế xã Di Trạch (TTYT h. Hoài Đức)',
                'address' =>'Xã Di Trạch, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>800,
                'name' =>'Trạm y tế xã Đức Giang (TTYT h. Hoài Đức)',
                'address' =>'Xã Đức Giang, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>801,
                'name' =>'Trạm y tế xã Cát Quế (Hoài Đức)',
                'address' =>'Xã Cát Quế, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>802,
                'name' =>'Trạm y tế xã Kim Chung (TTYT h. Hoài Đức)',
                'address' =>'Xã Kim Chung, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>803,
                'name' =>'Trạm y tế xã Yên Sở (TTYT h. Hoài Đức)',
                'address' =>'Xã Yên Sở, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>804,
                'name' =>'Trạm y tế xã Sơn Đồng (TTYT h. Hoài Đức)',
                'address' =>'Xã Sơn Đồng, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>805,
                'name' =>'Trạm y tế xã Vân Canh (TTYT h. Hoài Đức)',
                'address' =>'Xã Vân Canh, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>806,
                'name' =>'Trạm y tế xã Đắc Sở (TTYT h. Hoài Đức)',
                'address' =>'Xã Đắc Sở, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>807,
                'name' =>'Trạm y tế xã Lại Yên (TTYT h. Hoài Đức)',
                'address' =>'Xã Lại Yên, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>808,
                'name' =>'Trạm y tế xã Tiền Yên (TTYT h. Hoài Đức)',
                'address' =>'Xã Tiền Yên, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>809,
                'name' =>'Trạm y tế xã Song Phương (TTYT h. Hoài Đức)',
                'address' =>'Xã Song Phương, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>810,
                'name' =>'Trạm y tế xã An Khánh (TTYT h. Hoài Đức)',
                'address' =>'Xã An Khánh, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>811,
                'name' =>'Trạm y tế xã An Thượng (TTYT h. Hoài Đức)',
                'address' =>'Xã An Thượng, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>812,
                'name' =>'Trạm y tế xã Vân Côn (TTYT h. Hoài Đức)',
                'address' =>'Xã Vân Côn, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>813,
                'name' =>'Trạm y tế xã La Phù (TTYT h. Hoài Đức)',
                'address' =>'Xã La Phù, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>814,
                'name' =>'Trạm y tế xã Đông La (TTYT h. Hoài Đức)',
                'address' =>'Xã Đông La, Hoài Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>815,
                'name' =>'Trạm y tế thị trấn Quốc Oai (TTYT H. Quốc Oai)',
                'address' =>'Thị Trấn Quốc Oai, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>816,
                'name' =>'Trạm y tế xã Sài Sơn (TTYT H. Quốc Oai)',
                'address' =>'Xã Sài Sơn, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>817,
                'name' =>'Trạm y tế xã Phượng Cách (TTYT H. Quốc Oai)',
                'address' =>'Xã Phượng Cách, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>818,
                'name' =>'Trạm y tế xã Yên Sơn (TTYT H. Quốc Oai)',
                'address' =>'Xã Yên Sơn, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>819,
                'name' =>'Trạm y tế xã Ngọc Liệp (TTYT H. Quốc Oai)',
                'address' =>'Xã Ngọc Liệp, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>820,
                'name' =>'Trạm y tế xã Ngọc Mỹ (TTYT H. Quốc Oai)',
                'address' =>'Xã Ngọc Mỹ, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>821,
                'name' =>'Trạm y tế xã Liệp Tuyết (TTYT H. Quốc Oai)',
                'address' =>'Xã Liệp Tuyết, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>822,
                'name' =>'Trạm y tế xã Thạch Thán (TTYT H. Quốc Oai)',
                'address' =>'Xã Thạch Thán, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>823,
                'name' =>'Trạm y tế xã Đồng Quang (TTYT H. Quốc Oai)',
                'address' =>'Xã Đồng Quang, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>824,
                'name' =>'Trạm y tế xã Phú Cát (TTYT H. Quốc Oai)',
                'address' =>'Xã Phú Cát, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>825,
                'name' =>'Trạm y tế xã Tuyết Nghĩa (TTYT H. Quốc Oai)',
                'address' =>'Xã Tuyết Nghĩa, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>826,
                'name' =>'Trạm y tế xã Nghĩa Hương (TTYT H. Quốc Oai)',
                'address' =>'Xã Nghĩa Hương, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>827,
                'name' =>'Trạm y tế xã Cộng Hòa (TTYT H. Quốc Oai)',
                'address' =>'Xã Cộng Hòa, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>828,
                'name' =>'Trạm y tế xã Tân Phú (TTYT H. Quốc Oai)',
                'address' =>'Xã Tân Phú, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>829,
                'name' =>'Trạm y tế xã Đại Thành (TTYT H. Quốc Oai)',
                'address' =>'Xã Đại Thành, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>830,
                'name' =>'Trạm y tế xã Phú Mãn (TTYT H. Quốc Oai)',
                'address' =>'Xã Phú Mãn, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>831,
                'name' =>'Trạm y tế xã Cấn Hữu (TTYT H. Quốc Oai)',
                'address' =>'Xã Cấn Hữu, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>832,
                'name' =>'Trạm y tế xã Tân Hòa (TTYT H. Quốc Oai)',
                'address' =>'Xã Tân Hòa, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>833,
                'name' =>'Trạm y tế xã Hòa Thạch (TTYT H. Quốc Oai)',
                'address' =>'Xã Hòa Thạch, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>834,
                'name' =>'Trạm y tế xã Đông Yên (TTYT H. Quốc Oai)',
                'address' =>'Xã Đông Yên, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>835,
                'name' =>'Trạm y tế xã Đông Xuân (TTYT H. Quốc Oai)',
                'address' =>'Xã Đông Xuân, Quốc Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>836,
                'name' =>'Trạm y tế thị trấn Liên Quan (TTYT H. Thạch Thất)',
                'address' =>'Thị Trấn Liên Quan, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>837,
                'name' =>'Trạm y tế xã Đại Đồng (TTYT H. Thạch Thất)',
                'address' =>'Xã Đại Đồng, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>838,
                'name' =>'Trạm y tế xã Cẩm Yên (TTYT H. Thạch Thất)',
                'address' =>'Xã Cẩm Yên, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>839,
                'name' =>'Trạm y tế xã Lại Thượng (TTYT H. Thạch Thất)',
                'address' =>'Xã Lại Thượng, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>840,
                'name' =>'Trạm y tế xã Phú Kim (TTYT H. Thạch Thất)',
                'address' =>'Xã Phú Kim, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>841,
                'name' =>'Trạm y tế xã Hương Ngải (TTYT H. .Thạch Thất)',
                'address' =>'Xã Hương Ngải, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>842,
                'name' =>'Trạm y tế xã Canh Nậu (TTYT H. Thạch Thất)',
                'address' =>'Xã Canh Nậu, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>843,
                'name' =>'Trạm y tế xã Kim Quan (TTYT H. Thạch Thất)',
                'address' =>'Xã Kim Quan, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>844,
                'name' =>'Trạm y tế xã Dị Nậu (TTYT H. Thạch Thất)',
                'address' =>'Xã Dị Nậu, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>845,
                'name' =>'Trạm y tế xã Bình Yên (TTYT H. Thạch Thất)',
                'address' =>'Xã Bình Yên, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>846,
                'name' =>'Trạm y tế xã Chàng Sơn (TTYT H. Thạch Thất)',
                'address' =>'Xã Chàng Sơn, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>847,
                'name' =>'Trạm y tế xã Thạch Hoà (TTYT H. Thạch Thất)',
                'address' =>'Xã Thạch Hoà, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>848,
                'name' =>'Trạm y tế xã Cần Kiệm (TTYT H. Thạch Thất)',
                'address' =>'Xã Cần Kiệm, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>849,
                'name' =>'Trạm y tế xã Hữu Bằng (TTYT H. Thạch Thất)',
                'address' =>'Xã Hữu Bằng, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>850,
                'name' =>'Trạm y tế xã Phùng Xá (TTYT H. Thạch Thất)',
                'address' =>'Xã Phùng Xá, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>851,
                'name' =>'Trạm y tế xã Tân Xã (TTYT H. Thạch Thất)',
                'address' =>'Xã Tân Xã, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>852,
                'name' =>'Trạm y tế xã Thạch Xá (TTYT H. Thạch Thất)',
                'address' =>'Xã Thạch Xá, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>853,
                'name' =>'Trạm y tế xã Bình Phú (TTYT H. Thạch Thất)',
                'address' =>'Xã Bình Phú, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>854,
                'name' =>'Trạm y tế xã Hạ Bằng (Thạch Thất)',
                'address' =>'Xã Hạ Bằng, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>855,
                'name' =>'Trạm y tế xã Đồng Trúc (TTYT H. Thạch Thất)',
                'address' =>'Xã Đồng Trúc, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>856,
                'name' =>'Trạm y tế xã Tiến Xuân (TTYT H. Thạch Thất)',
                'address' =>'Xã Tiến Xuân, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>857,
                'name' =>'Trạm y tế xã Yên Bình (TTYT H. Thạch Thất)',
                'address' =>'Xã Yên Bình, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>858,
                'name' =>'Trạm y tế xã Yên Trung (TTYT H. Thạch Thất)',
                'address' =>'Xã Yên Trung, Thạch Thất',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>859,
                'name' =>'Trạm y tế thị trấn Chúc Sơn (TTYT Chương Mỹ)',
                'address' =>'Thị Trấn Chúc Sơn, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>860,
                'name' =>'Trạm y tế thị trấn Xuân Mai (TTYT h. Chương Mỹ)',
                'address' =>'Thị Trấn Xuân Mai, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>861,
                'name' =>'Trạm y tế xã Phụng Châu (TTYT h. Chương Mỹ)',
                'address' =>'Xã Phụng Châu, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>862,
                'name' =>'Trạm y tế xã Tiên Phương (TTYT h. Chương Mỹ)',
                'address' =>'Xã Tiên Phương, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>863,
                'name' =>'Trạm y tế xã Đông Sơn (TTYT h. Chương Mỹ)',
                'address' =>'Xã Đông Sơn, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>864,
                'name' =>'Trạm y tế xã Đông Phương Yên (TTYT Chương Mỹ)',
                'address' =>'Xã Đông Phương Yên, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>865,
                'name' =>'Trạm y tế xã Phú Nghĩa (TTYT h. Chương Mỹ)',
                'address' =>'Xã Phú Nghĩa, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>866,
                'name' =>'Trạm y tế xã Trường Yên (TTYT h. Chương Mỹ)',
                'address' =>'Xã Trường Yên, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>867,
                'name' =>'Trạm y tế xã Ngọc Hòa (TTYT h. Chương Mỹ)',
                'address' =>'Xã Ngọc Hòa, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>868,
                'name' =>'Trạm y tế xã Thủy Xuân Tiên (TTYT h. Chương Mỹ)',
                'address' =>'Xã Thủy Xuân Tiên, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>869,
                'name' =>'Trạm y tế xã Thanh Bình (TTYT h. Chương Mỹ)',
                'address' =>'Xã Thanh Bình, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>870,
                'name' =>'Trạm y tế xã Trung Hòa (TTYT h. Chương Mỹ)',
                'address' =>'Xã Trung Hòa, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>871,
                'name' =>'Trạm y tế xã Đại Yên (TTYT h. Chương Mỹ)',
                'address' =>'Xã Đại Yên, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>872,
                'name' =>'Trạm y tế xã Thụy Hương (TTYT h. Chương Mỹ)',
                'address' =>'Xã Thụy Hương, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>873,
                'name' =>'Trạm y tế xã Tốt Động (TTYT h. Chương Mỹ)',
                'address' =>'Xã Tốt Động, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>874,
                'name' =>'Trạm y tế xã Lam Điền (TTYT h. Chương Mỹ)',
                'address' =>'Xã Lam Điền, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>875,
                'name' =>'Trạm y tế xã Tân Tiến (TTYT h. Chương Mỹ)',
                'address' =>'Xã Tân Tiến, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>876,
                'name' =>'Trạm y tế xã Nam Phương Tiến (TTYT Chương Mỹ)',
                'address' =>'Xã Nam Phương Tiến, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>877,
                'name' =>'Trạm y tế xã Hợp Đồng (Chương Mỹ)',
                'address' =>'Xã Hợp Đồng, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>878,
                'name' =>'Trạm y tế xã Hoàng Văn Thụ (TTYT h. Chương Mỹ)',
                'address' =>'Xã Hoàng Văn Thụ, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>879,
                'name' =>'Trạm y tế xã Hoàng Diệu (TTYT h. Chương Mỹ)',
                'address' =>'Xã Hoàng Diệu, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>880,
                'name' =>'Trạm y tế xã Hữu Văn (TTYT h. Chương Mỹ)',
                'address' =>'Xã Hữu Văn, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>881,
                'name' =>'Trạm y tế xã Quảng Bị (TTYT h. Chương Mỹ)',
                'address' =>'Xã Quảng Bị, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>882,
                'name' =>'Trạm y tế xã Mỹ Lương (TTYT h. Chương Mỹ)',
                'address' =>'Xã Mỹ Lương, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>883,
                'name' =>'Trạm y tế xã Thượng Vực (TTYT h. Chương Mỹ)',
                'address' =>'Xã Thượng Vực, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>884,
                'name' =>'Trạm y tế xã Hồng Phong (TTYT h. Chương Mỹ)',
                'address' =>'Xã Hồng Phong, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>885,
                'name' =>'Trạm y tế xã Đồng Phú (TTYT h. Chương Mỹ)',
                'address' =>'Xã Đồng Phú, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>886,
                'name' =>'Trạm y tế xã Trần Phú (TTYT h. Chương Mỹ)',
                'address' =>'Xã Trần Phú, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>887,
                'name' =>'Trạm y tế xã Văn Võ (TTYT h. Chương Mỹ)',
                'address' =>'Xã Văn Võ, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>888,
                'name' =>'Trạm y tế xã Đồng Lạc (TTYT h. Chương Mỹ)',
                'address' =>'Xã Đồng Lạc, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>889,
                'name' =>'Trạm y tế xã Hòa Chính (TTYT h. Chương Mỹ)',
                'address' =>'Xã Hòa Chính, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>890,
                'name' =>'Trạm y tế xã Phú Nam An (TTYT h. Chương Mỹ)',
                'address' =>'Xã Phú Nam An, Chương Mỹ',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>891,
                'name' =>'Trạm y tế thị trấn Kim Bài (TTYT H. Thanh Oai)',
                'address' =>'Thị Trấn Kim Bài, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>892,
                'name' =>'Trạm y tế xã Cự Khê (TTYT H. Thanh Oai)',
                'address' =>'Xã Cự Khê, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>893,
                'name' =>'Trạm y tế xã Bích Hòa (TTYT H. Thanh Oai)',
                'address' =>'Xã Bích Hòa, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>894,
                'name' =>'Trạm y tế xã Mỹ Hưng (TTYT H. Thanh Oai)',
                'address' =>'Xã Mỹ Hưng, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>895,
                'name' =>'Trạm y tế xã Cao Viên (TTYT H. Thanh Oai)',
                'address' =>'Xã Cao Viên, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>896,
                'name' =>'Trạm y tế xã Bình Minh (TTYT H. Thanh Oai)',
                'address' =>'Xã Bình Minh, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>897,
                'name' =>'Trạm y tế xã Tam Hưng (TTYT H. Thanh Oai)',
                'address' =>'Xã Tam Hưng, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>898,
                'name' =>'Trạm y tế xã Thanh Cao (TTYT H. Thanh Oai)',
                'address' =>'Xã Thanh Cao, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>899,
                'name' =>'Trạm y tế xã Thanh Thùy (TTYT H. Thanh Oai)',
                'address' =>'Xã Thanh Thùy, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>900,
                'name' =>'Trạm y tế xã Thanh Mai (TTYT H. Thanh Oai)',
                'address' =>'Xã Thanh Mai, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>901,
                'name' =>'Trạm y tế xã Thanh Văn (TTYT H. Thanh Oai)',
                'address' =>'Xã Thanh Văn, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>902,
                'name' =>'Trạm y tế xã Đỗ Động (TTYT H. Thanh Oai)',
                'address' =>'Xã Đỗ Động, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>903,
                'name' =>'Trạm y tế xã Kim An (TTYT H. Thanh Oai)',
                'address' =>'Xã Kim An, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>904,
                'name' =>'Trạm y tế xã Kim Thư (TTYT H. Thanh Oai)',
                'address' =>'Xã Kim Thư, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>905,
                'name' =>'Trạm y tế xã Phương Trung (TTYT H. Thanh Oai)',
                'address' =>'Xã Phương Trung, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>906,
                'name' =>'Trạm y tế xã Tân Ước (TTYT H. Thanh Oai)',
                'address' =>'Xã Tân Ước, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>907,
                'name' =>'Trạm y tế xã Dân Hòa (TTYT H. Thanh Oai)',
                'address' =>'Xã Dân Hòa, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>908,
                'name' =>'Trạm y tế xã Liên Châu (TTYT H. Thanh Oai)',
                'address' =>'Xã Liên Châu, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>909,
                'name' =>'Trạm y tế xã Cao Dương (TTYT H. Thanh Oai)',
                'address' =>'Xã Cao Dương, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>910,
                'name' =>'Trạm y tế xã Xuân Dương (TTYT H. Thanh Oai)',
                'address' =>'Xã Xuân Dương, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>911,
                'name' =>'Trạm y tế xã Hồng Dương (TTYT H. Thanh Oai)',
                'address' =>'Xã Hồng Dương, Thanh Oai',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>912,
                'name' =>'Trạm y tế thị trấn Thường Tín (TTYT h. Thường Tín)',
                'address' =>'Thị Trấn Thường Tín, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>913,
                'name' =>'Trạm y tế xã Ninh Sở (TTYT h. Thường Tín)',
                'address' =>'Xã Ninh Sở, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>914,
                'name' =>'Trạm y tế xã Nhị Khê (TTYT h. Thường Tín)',
                'address' =>'Xã Nhị Khê, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>915,
                'name' =>'Trạm y tế xã Duyên Thái (TTYT h. Thường Tín)',
                'address' =>'Xã Duyên Thái, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>916,
                'name' =>'Trạm y tế xã Khánh Hà (TTYT h. Thường Tín)',
                'address' =>'Xã Khánh Hà, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>917,
                'name' =>'Trạm y tế xã Hòa Bình (TTYT h. Thường Tín)',
                'address' =>'Xã Hòa Bình, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>918,
                'name' =>'Trạm y tế xã Văn Bình (TTYT h. Thường Tín)',
                'address' =>'Xã Văn Bình, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>919,
                'name' =>'Trạm y tế xã Hiền Giang (TTYT h. Thường Tín)',
                'address' =>'Xã Hiền Giang, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>920,
                'name' =>'Trạm y tế xã Hồng Vân (TTYT h. Thường Tín)',
                'address' =>'Xã Hồng Vân, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>921,
                'name' =>'Trạm y tế xã Vân Tảo (TTYT h. Thường Tín)',
                'address' =>'Xã Vân Tảo, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>922,
                'name' =>'Trạm y tế xã Liên Phương (TTYT h. Thường Tín)',
                'address' =>'Xã Liên Phương, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>923,
                'name' =>'Trạm y tế xã Văn Phú (TTYT h. Thường Tín)',
                'address' =>'Xã Văn Phú, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>924,
                'name' =>'Trạm y tế xã Tự Nhiên (TTYT h. Thường Tín)',
                'address' =>'Xã Tự Nhiên, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>925,
                'name' =>'Trạm y tế xã Tiền Phong (TTYT h. Thường Tín)',
                'address' =>'Xã Tiền Phong, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>926,
                'name' =>'Trạm y tế xã Hà Hồi (TTYT h. Thường Tín)',
                'address' =>'Xã Hà Hồi, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>927,
                'name' =>'Trạm y tế xã Thư Phú (TTYT h. Thường Tín)',
                'address' =>'Xã Thư Phú, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>928,
                'name' =>'Trạm y tế xã Nguyễn Trãi (TTYT h. Thường Tín)',
                'address' =>'Xã Nguyễn Trãi, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>929,
                'name' =>'Trạm y tế xã Quất Động (TTYT h. Thường Tín)',
                'address' =>'Xã Quất Động, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>930,
                'name' =>'Trạm y tế xã Chương Dương (TTYT h. Thường Tín)',
                'address' =>'Xã Chương Dương, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>931,
                'name' =>'Trạm y tế xã Tân Minh (TTTYT h. hường Tín)',
                'address' =>'Xã Tân Minh, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>932,
                'name' =>'Trạm y tế xã Lê Lợi (TTYT h. Thường Tín)',
                'address' =>'Xã Lê Lợi, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>933,
                'name' =>'Trạm y tế xã Thắng Lợi (TTYT h. Thường Tín)',
                'address' =>'Xã Thắng Lợi, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>934,
                'name' =>'Trạm y tế xã Dũng Tiến (TTYT h. Thường Tín)',
                'address' =>'Xã Dũng Tiến, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>935,
                'name' =>'Trạm y tế xã Thống Nhất (TTYT h. Thường Tín)',
                'address' =>'Xã Thống Nhất, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>936,
                'name' =>'Trạm y tế xã Nghiêm Xuyên (TTYT h. Thường Tín)',
                'address' =>'Xã Nghiêm Xuyên, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>937,
                'name' =>'Trạm y tế xã Tô Hiệu (TTYT h. Thường Tín)',
                'address' =>'Xã Tô Hiệu, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>938,
                'name' =>'Trạm y tế xã Văn Tự (TTYT h. Thường Tín)',
                'address' =>'Xã Văn Tự, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>939,
                'name' =>'Trạm y tế xã Vạn Điểm (TTYT h. Thường Tín)',
                'address' =>'Xã Vạn Điểm, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>940,
                'name' =>'Trạm y tế xã Minh Cường (TTYT h. Thường Tín)',
                'address' =>'Xã Minh Cường, Thường Tín',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>941,
                'name' =>'Trạm y tế thị trấn Phú Minh (TTYT h. Phú Xuyên)',
                'address' =>'Thị Trấn Phú Minh, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>942,
                'name' =>'Trạm y tế thị trấn Phú Xuyên (TTYT h. Phú Xuyên)',
                'address' =>'Thị Trấn Phú Xuyên, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>943,
                'name' =>'Trạm y tế xã Hồng Minh (TTYT h. Phú Xuyên)',
                'address' =>'Xã Hồng Minh, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>944,
                'name' =>'Trạm y tế xã Phượng Dực (TTYT h. Phú Xuyên)',
                'address' =>'Xã Phượng Dực, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>945,
                'name' =>'Trạm y tế xã Văn Nhân (TTYT h. Phú Xuyên)',
                'address' =>'Xã Văn Nhân, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>946,
                'name' =>'Trạm y tế xã Thụy Phú (TTYT h. Phú Xuyên)',
                'address' =>'Xã Thụy Phú, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>947,
                'name' =>'Trạm y tế xã Tri Trung (TTYT h. Phú Xuyên)',
                'address' =>'Xã Tri Trung, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>948,
                'name' =>'Trạm y tế xã Đại Thắng (TTYT h. Phú Xuyên)',
                'address' =>'Xã Đại Thắng, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>949,
                'name' =>'Trạm y tế xã Phú Túc (TTYT h. Phú Xuyên)',
                'address' =>'Xã Phú Túc, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>950,
                'name' =>'Trạm y tế xã Văn Hoàng (TTYT h. Phú Xuyên)',
                'address' =>'Xã Văn Hoàng, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>951,
                'name' =>'Trạm y tế xã Hồng Thái (TTYT h. Phú Xuyên)',
                'address' =>'Xã Hồng Thái, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>952,
                'name' =>'Trạm y tế xã Hoàng Long (TTYT h. Phú Xuyên)',
                'address' =>'Xã Hoàng Long, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>953,
                'name' =>'Trạm y tế xã Quang Trung (TTYT h. Phú Xuyên)',
                'address' =>'Xã Quang Trung, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>954,
                'name' =>'Trạm y tế xã Nam Phong (TTYT h. Phú Xuyên)',
                'address' =>'Xã Nam Phong, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>955,
                'name' =>'Trạm y tế xã Nam Triều (TTYT h. Phú Xuyên)',
                'address' =>'Xã Nam Triều, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>956,
                'name' =>'Trạm y tế xã Tân Dân (TTYT h. Phú Xuyên)',
                'address' =>'Xã Tân Dân, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>957,
                'name' =>'Trạm y tế xã Sơn Hà (TTYT h. Phú Xuyên)',
                'address' =>'Xã Sơn Hà, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>958,
                'name' =>'Trạm y tế xã Chuyên Mỹ (TTYT h. Phú Xuyên)',
                'address' =>'Xã Chuyên Mỹ, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>959,
                'name' =>'Trạm y tế xã Khai Thái (TTYT h. Phú Xuyên)',
                'address' =>'Xã Khai Thái, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>960,
                'name' =>'Trạm y tế xã Phúc Tiến (TTYT h. Phú Xuyên)',
                'address' =>'Xã Phúc Tiến, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>961,
                'name' =>'Trạm y tế xã Vân Từ (TTYT h. Phú Xuyên)',
                'address' =>'Xã Vân Từ, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>962,
                'name' =>'Trạm y tế xã Tri Thủy (TTYT h. Phú Xuyên)',
                'address' =>'Xã Tri Thủy, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>963,
                'name' =>'Trạm y tế xã Đại Xuyên (TTYT h. Phú Xuyên)',
                'address' =>'Xã Đại Xuyên, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>964,
                'name' =>'Trạm y tế xã Phú Yên (TTYT h. Phú Xuyên)',
                'address' =>'Xã Phú Yên, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>965,
                'name' =>'Trạm y tế xã Bạch Hạ (TTYT h. Phú Xuyên)',
                'address' =>'Xã Bạch Hạ, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>966,
                'name' =>'Trạm y tế xã Quang Lãng (TTYT h. Phú Xuyên)',
                'address' =>'Xã Quang Lãng, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>967,
                'name' =>'Trạm y tế xã Châu Can (TTYT h. Phú Xuyên)',
                'address' =>'Xã Châu Can, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>968,
                'name' =>'Trạm y tế xã Minh Tân (TTYT h. Phú Xuyên)',
                'address' =>'Xã Minh Tân, Phú Xuyên',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>969,
                'name' =>'Trạm y tế thị trấn Vân Đình (TTYT h. ứng Hoà)',
                'address' =>'Thị Trấn Vân Đình, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>970,
                'name' =>'Trạm y tế xã Viên An (TTYT h. ứng Hoà)',
                'address' =>'Xã Viên An, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>971,
                'name' =>'Trạm y tế xã Viên Nội (TTYT h. ứng Hoà)',
                'address' =>'Xã Viên Nội, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>972,
                'name' =>'Trạm y tế xã Hoa Sơn (TTYT h. ứng Hoà)',
                'address' =>'Xã Hoa Sơn, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>973,
                'name' =>'Trạm y tế xã Quảng Phú Cầu (TTYT h. ứng Hoà)',
                'address' =>'Xã Quảng Phú Cầu, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>974,
                'name' =>'Trạm y tế xã Trường Thịnh (TTYT h. ứng Hoà)',
                'address' =>'Xã Trường Thịnh, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>975,
                'name' =>'Trạm y tế xã Cao Thành (TTYT h. ứng Hoà)',
                'address' =>'Xã Cao Thành, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>976,
                'name' =>'Trạm y tế xã Liên Bạt (TTYT h. ứng Hoà)',
                'address' =>'Xã Liên Bạt, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>977,
                'name' =>'Trạm y tế xã Sơn Công (TTYT h. ứng Hoà)',
                'address' =>'Xã Sơn Công, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>978,
                'name' =>'Trạm y tế xã Đồng Tiến (TTYT h. ứng Hoà)',
                'address' =>'Xã Đồng Tiến, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>979,
                'name' =>'Trạm y tế xã Phương Tú (TTYT h. ứng Hoà)',
                'address' =>'Xã Phương Tú, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>980,
                'name' =>'Trạm y tế xã Trung Tú (TTYT h. ứng Hoà)',
                'address' =>'Xã Trung Tú, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>981,
                'name' =>'Trạm y tế xã Đồng Tân (TTYT h. ứng Hoà)',
                'address' =>'Xã Đồng Tân, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>982,
                'name' =>'Trạm y tế xã Tảo Dương Văn (TTYT h. ứng Hoà)',
                'address' =>'Xã Tảo Dương Văn, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>983,
                'name' =>'Trạm y tế xã Vạn Thái (TTYT h. ứng Hoà)',
                'address' =>'Xã Vạn Thái, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>984,
                'name' =>'Trạm y tế xã Minh Đức (TTYT h. ứng Hoà)',
                'address' =>'Xã Minh Đức, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>985,
                'name' =>'Trạm y tế xã Hòa Lâm (TTYT h. ứng Hoà)',
                'address' =>'Xã Hòa Lâm, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>986,
                'name' =>'Trạm y tế xã Hòa Xá (TTYT h. ứng Hoà)',
                'address' =>'Xã Hòa Xá, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>987,
                'name' =>'Trạm y tế xã Trầm Lộng (TTYT h. ứng Hoà)',
                'address' =>'Xã Trầm Lộng, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>988,
                'name' =>'Trạm y tế xã Kim Đường (TTYT h. ứng Hoà)',
                'address' =>'Xã Kim Đường, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>989,
                'name' =>'Trạm y tế xã Hòa Nam (TTYT h. ứng Hoà)',
                'address' =>'Xã Hòa Nam, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>990,
                'name' =>'Trạm y tế xã Hòa Phú (TTYT h. ứng Hoà)',
                'address' =>'Xã Hòa Phú, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>991,
                'name' =>'Trạm y tế xã Đội Bình (TTYT h. ứng Hoà)',
                'address' =>'Xã Đội Bình, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>992,
                'name' =>'Trạm y tế xã Đại Hùng (TTYT h. ứng Hoà)',
                'address' =>'Xã Đại Hùng, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>993,
                'name' =>'Trạm y tế xã Đông Lỗ (TTYT h. ứng Hoà)',
                'address' =>'Xã Đông Lỗ, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>994,
                'name' =>'Trạm y tế xã Phù Lưu (TTYT h. ứng Hoà)',
                'address' =>'Xã Phù Lưu, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>995,
                'name' =>'Trạm y tế xã Đại Cường (TTYT h. ứng Hoà)',
                'address' =>'Xã Đại Cường, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>996,
                'name' =>'Trạm y tế xã Lưu Hoàng (TTYT h. ứng Hoà)',
                'address' =>'Xã Lưu Hoàng, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>997,
                'name' =>'Trạm y tế xã Hồng Quang (TTYT h. ứng Hoà)',
                'address' =>'Xã Hồng Quang, ứng Hoà',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>998,
                'name' =>'Trạm y tế thị trấn Đại Nghĩa (TTYT h. Mỹ Đức)',
                'address' =>'Thị Trấn Đại Nghĩa, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>999,
                'name' =>'Trạm y tế xã Đồng Tâm (TTYT h. Mỹ Đức)',
                'address' =>'Xã Đồng Tâm, Mỹ Đức,',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1000,
                'name' =>'Trạm y tế xã Thượng Lâm (TTYT h. Mỹ Đức)',
                'address' =>'Xã Thượng Lâm, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1001,
                'name' =>'Trạm y tế xã Tuy Lai (TTYT h. Mỹ Đức)',
                'address' =>'Xã Tuy Lai, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1002,
                'name' =>'Trạm y tế xã Phúc Lâm (TTYT h. Mỹ Đức)',
                'address' =>'Xã Phúc Lâm, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1003,
                'name' =>'Trạm y tế xã Mỹ Thành (TTYT h. Mỹ Đức)',
                'address' =>'Xã Mỹ Thành, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1004,
                'name' =>'Trạm y tế xã Bột Xuyên (TTYT h. Mỹ Đức)',
                'address' =>'Xã Bột Xuyên, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1005,
                'name' =>'Trạm y tế xã An Mỹ (TTYT h. Mỹ Đức)',
                'address' =>'Xã An Mỹ, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1006,
                'name' =>'Trạm y tế xã Hồng Sơn (TTYT h. Mỹ Đức)',
                'address' =>'Xã Hồng Sơn, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1007,
                'name' =>'Trạm y tế xã Lê Thanh (TTYT h. Mỹ Đức)',
                'address' =>'Xã Lê Thanh, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1008,
                'name' =>'Trạm y tế xã Xuy Xá (TTYT h. Mỹ Đức)',
                'address' =>'Xã Xuy Xá, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1009,
                'name' =>'Trạm y tế xã Phùng Xá (TTYT h. Mỹ Đức)',
                'address' =>'Xã Phùng Xá, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1010,
                'name' =>'Trạm y tế xã Phù Lưu Tế (TTYT h. Mỹ Đức)',
                'address' =>'Xã Phù Lưu Tế, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1011,
                'name' =>'Trạm y tế xã Đại Hưng (TTYT h. Mỹ Đức)',
                'address' =>'Xã Đại Hưng, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1012,
                'name' =>'Trạm y tế xã Vạn Kim (TTYT h. Mỹ Đức)',
                'address' =>'Xã Vạn Kim, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1013,
                'name' =>'Trạm y tế xã Đốc Tín (TTYT h. Mỹ Đức)',
                'address' =>'Xã Đốc Tín, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1014,
                'name' =>'Trạm y tế xã Hương Sơn (TTYT h. Mỹ Đức)',
                'address' =>'Xã Hương Sơn, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1015,
                'name' =>'Trạm y tế xã Hùng Tiến (TTYT h. Mỹ Đức)',
                'address' =>'Xã Hùng Tiến, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1016,
                'name' =>'Trạm y tế xã An Tiến (TTYT h. Mỹ Đức)',
                'address' =>'Xã An Tiến, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1017,
                'name' =>'Trạm y tế xã Hợp Tiến (TTYT h. Mỹ Đức)',
                'address' =>'Xã Hợp Tiến, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1018,
                'name' =>'Trạm y tế xã Hợp Thanh (TTYT h. Mỹ Đức)',
                'address' =>'Xã Hợp Thanh, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1019,
                'name' =>'Trạm y tế xã An Phú (TTYT h. Mỹ Đức)',
                'address' =>'Xã An Phú, Mỹ Đức',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1020,
                'name' =>'Trạm y tế xã Đại Thịnh (TTYT Huyện.Mê Linh)',
                'address' =>'Xã Đại Thịnh, Huyện Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1021,
                'name' =>'Trạm y tế xã Kim Hoa (TTYT h. Mê Linh)',
                'address' =>'Xã Kim Hoa, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1022,
                'name' =>'Trạm y tế xã Thạch Đà(TTYT h. Mê Linh)',
                'address' =>'Xã Thạch Đà, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1023,
                'name' =>'Trạm y tế xã Tiến Thắng (TTYT h. Mê Linh)',
                'address' =>'Xã Tiến Thắng, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1024,
                'name' =>'Trạm y tế xã Tự Lập (TTYT h. Mê Linh)',
                'address' =>'Xã Tự Lập, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1025,
                'name' =>'Trạm y tế thị trấn Quang Minh (TTYT h. Mê Linh)',
                'address' =>'Thị Trấn Quang Minh, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1026,
                'name' =>'Trạm y tế xã Thanh Lâm (TTYT h. Mê Linh)',
                'address' =>'Xã Thanh Lâm, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1027,
                'name' =>'Trạm y tế xã Tam Đồng (TTYT h. Mê Linh)',
                'address' =>'Xã Tam Đồng, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1028,
                'name' =>'Trạm y tế xã Liên Mạc (TTYT h. Mê Linh)',
                'address' =>'Xã Liên Mạc, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1029,
                'name' =>'Trạm y tế xã Vạn Yên (TTYT h. Mê Linh)',
                'address' =>'Xã Vạn Yên, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1030,
                'name' =>'Trạm y tế xã Chu Phan (TTYT h. Mê Linh)',
                'address' =>'Xã Chu Phan, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1031,
                'name' =>'Trạm y tế xã Tiến Thinh (TTYT h. Mê Linh)',
                'address' =>'Xã Tiến Thịnh, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1032,
                'name' =>'Trạm y tế xã Mê Linh (TTYT h. Mê Linh)',
                'address' =>'Xã Mê Linh, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1033,
                'name' =>'Trạm y tế xã Văn Khê (TTYT h. Mê Linh)',
                'address' =>'Xã Văn Khê, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1034,
                'name' =>'Trạm y tế xã Hoàng Kim (TTYT h. Mê Linh)',
                'address' =>'Xã Hoàng Kim, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1035,
                'name' =>'Trạm y tế xã Tiền Phong (TTYT h. Mê Linh)',
                'address' =>'Xã Tiền Phong, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1036,
                'name' =>'Trạm y tế xã Tráng Việt (TTYT h. Mê Linh)',
                'address' =>'Xã Tráng Việt, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
            [
                'id' =>1037,
                'name' =>'Trạm y tế thị trấn Chi Đông (TTYT h. Mê Linh)',
                'address' =>'Thị Trấn Chi Đông, Mê Linh',
                'organization_id' =>1,
                'city_id' =>24
            ],
        ]);
        $dataCode = [
            '01E01',
            '01E02',
            '01E03',
            '01001',
            '01002',
            '01003',
            '01004',
            '01005',
            '01006',
            '01007',
            '01008',
            '01009',
            '01010',
            '01011',
            '01012',
            '01013',
            '01014',
            '01015',
            '01016',
            '01017',
            '01018',
            '01019',
            '01020',
            '01021',
            '01022',
            '01023',
            '01024',
            '01025',
            '01026',
            '01027',
            '01028',
            '01029',
            '01030',
            '01031',
            '01032',
            '01033',
            '01034',
            '01035',
            '01036',
            '01037',
            '01038',
            '01039',
            '01040',
            '01041',
            '01042',
            '01043',
            '01044',
            '01045',
            '01046',
            '01047',
            '01048',
            '01049',
            '01050',
            '01051',
            '01052',
            '01053',
            '01054',
            '01055',
            '01056',
            '01057',
            '01058',
            '01059',
            '01060',
            '01061',
            '01062',
            '01063',
            '01064',
            '01065',
            '01066',
            '01067',
            '01068',
            '01069',
            '01070',
            '01071',
            '01072',
            '01073',
            '01074',
            '01075',
            '01076',
            '01077',
            '01078',
            '01079',
            '01080',
            '01081',
            '01082',
            '01083',
            '01084',
            '01085',
            '01086',
            '01087',
            '01088',
            '01089',
            '01090',
            '01091',
            '01092',
            '01093',
            '01094',
            '01095',
            '01096',
            '01097',
            '01098',
            '01099',
            '01100',
            '01101',
            '01102',
            '01103',
            '01104',
            '01105',
            '01106',
            '01107',
            '01108',
            '01109',
            '01110',
            '01111',
            '01112',
            '01113',
            '01114',
            '01115',
            '01116',
            '01117',
            '01118',
            '01119',
            '01120',
            '01121',
            '01122',
            '01123',
            '01124',
            '01125',
            '01126',
            '01127',
            '01128',
            '01129',
            '01130',
            '01131',
            '01132',
            '01133',
            '01134',
            '01135',
            '01136',
            '01137',
            '01138',
            '01139',
            '01140',
            '01141',
            '01142',
            '01143',
            '01144',
            '01145',
            '01146',
            '01147',
            '01148',
            '01149',
            '01150',
            '01151',
            '01152',
            '01153',
            '01154',
            '01155',
            '01156',
            '01157',
            '01158',
            '01159',
            '01160',
            '01161',
            '01162',
            '01163',
            '01164',
            '01165',
            '01166',
            '01167',
            '01168',
            '01169',
            '01170',
            '01171',
            '01172',
            '01173',
            '01174',
            '01175',
            '01176',
            '01177',
            '01178',
            '01179',
            '01180',
            '01181',
            '01182',
            '01183',
            '01184',
            '01185',
            '01186',
            '01187',
            '01188',
            '01189',
            '01190',
            '01191',
            '01192',
            '01193',
            '01194',
            '01195',
            '01196',
            '01197',
            '01198',
            '01199',
            '01200',
            '01201',
            '01202',
            '01203',
            '01204',
            '01205',
            '01206',
            '01207',
            '01208',
            '01209',
            '01210',
            '01211',
            '01212',
            '01213',
            '01214',
            '01215',
            '01216',
            '01217',
            '01218',
            '01219',
            '01220',
            '01221',
            '01222',
            '01223',
            '01224',
            '01225',
            '01226',
            '01227',
            '01228',
            '01229',
            '01230',
            '01231',
            '01232',
            '01233',
            '01234',
            '01235',
            '01236',
            '01238',
            '01239',
            '01240',
            '01241',
            '01242',
            '01243',
            '01245',
            '01246',
            '01247',
            '01248',
            '01249',
            '01250',
            '01251',
            '01252',
            '01253',
            '01254',
            '01256',
            '01257',
            '01258',
            '01266',
            '01267',
            '01301',
            '01302',
            '01303',
            '01304',
            '01305',
            '01306',
            '01307',
            '01308',
            '01309',
            '01310',
            '01311',
            '01312',
            '01313',
            '01314',
            '01315',
            '01316',
            '01317',
            '01318',
            '01319',
            '01320',
            '01321',
            '01322',
            '01323',
            '01324',
            '01325',
            '01326',
            '01327',
            '01328',
            '01329',
            '01330',
            '01331',
            '01332',
            '01333',
            '01334',
            '01335',
            '01336',
            '01337',
            '01338',
            '01339',
            '01340',
            '01341',
            '01342',
            '01343',
            '01344',
            '01345',
            '01346',
            '01347',
            '01348',
            '01349',
            '01350',
            '01351',
            '01352',
            '01353',
            '01354',
            '01355',
            '01356',
            '01357',
            '01358',
            '01359',
            '01360',
            '01361',
            '01362',
            '01364',
            '01365',
            '01366',
            '01367',
            '01368',
            '01369',
            '01370',
            '01371',
            '01372',
            '01373',
            '01374',
            '01375',
            '01376',
            '01377',
            '01378',
            '01379',
            '01380',
            '01381',
            '01382',
            '01383',
            '01384',
            '01385',
            '01386',
            '01387',
            '01388',
            '01389',
            '01390',
            '01391',
            '01392',
            '01393',
            '01394',
            '01395',
            '01801',
            '01802',
            '01803',
            '01804',
            '01805',
            '01806',
            '01807',
            '01808',
            '01809',
            '01810',
            '01811',
            '01812',
            '01813',
            '01814',
            '01815',
            '01816',
            '01817',
            '01818',
            '01819',
            '01820',
            '01821',
            '01822',
            '01823',
            '01824',
            '01825',
            '01826',
            '01827',
            '01828',
            '01829',
            '01830',
            '01831',
            '01832',
            '01833',
            '01834',
            '01835',
            '01836',
            '01837',
            '01838',
            '01839',
            '01840',
            '01841',
            '01842',
            '01843',
            '01844',
            '01845',
            '01846',
            '01847',
            '01848',
            '01849',
            '01850',
            '01851',
            '01852',
            '01853',
            '01854',
            '01855',
            '01856',
            '01857',
            '01858',
            '01859',
            '01860',
            '01861',
            '01862',
            '01901',
            '01902',
            '01903',
            '01904',
            '01905',
            '01906',
            '01907',
            '01908',
            '01909',
            '01910',
            '01911',
            '01912',
            '01913',
            '01914',
            '01915',
            '01916',
            '01917',
            '01918',
            '01919',
            '01920',
            '01921',
            '01922',
            '01923',
            '01924',
            '01925',
            '01926',
            '01927',
            '01928',
            '01929',
            '01930',
            '01931',
            '01932',
            '01933',
            '01934',
            '01935',
            '01936',
            '01937',
            '01938',
            '01939',
            '01940',
            '01941',
            '01968',
            '01969',
            '01971',
            '01E04',
            '01E05',
            '01E06',
            '01E07',
            '01E08',
            '01E09',
            '01E10',
            '01E11',
            '01E51',
            '01E52',
            '01E53',
            '01E54',
            '01E55',
            '01E56',
            '01E57',
            '01E58',
            '01E59',
            '01E60',
            '01E61',
            '01E62',
            '01E63',
            '01E64',
            '01E65',
            '01E66',
            '01E67',
            '01E68',
            '01E69',
            '01E70',
            '01E71',
            '01E72',
            '01E73',
            '01E74',
            '01E75',
            '01E76',
            '01A01',
            '01A02',
            '01A03',
            '01A04',
            '01A05',
            '01A06',
            '01A07',
            '01A08',
            '01A09',
            '01A10',
            '01A11',
            '01A12',
            '01A13',
            '01A14',
            '01A51',
            '01A52',
            '01A53',
            '01A54',
            '01A55',
            '01A56',
            '01A57',
            '01A58',
            '01A59',
            '01A60',
            '01A61',
            '01A62',
            '01A63',
            '01A64',
            '01A65',
            '01A66',
            '01A67',
            '01A68',
            '01B01',
            '01B02',
            '01B03',
            '01B04',
            '01B05',
            '01B06',
            '01B07',
            '01B08',
            '01B51',
            '01B52',
            '01B53',
            '01B54',
            '01B55',
            '01B56',
            '01B57',
            '01B58',
            '01B59',
            '01B60',
            '01B61',
            '01B62',
            '01B63',
            '01B64',
            '01C01',
            '01C02',
            '01C03',
            '01C04',
            '01C05',
            '01C06',
            '01C07',
            '01C08',
            '01C51',
            '01C52',
            '01C53',
            '01C54',
            '01C55',
            '01C56',
            '01C57',
            '01C58',
            '01C59',
            '01C60',
            '01C61',
            '01C62',
            '01C63',
            '01C64',
            '01C65',
            '01C66',
            '01C67',
            '01C68',
            '01C69',
            '01C70',
            '01C71',
            '01D01',
            '01D02',
            '01D03',
            '01D04',
            '01D05',
            '01D06',
            '01D07',
            '01D08',
            '01D09',
            '01D10',
            '01D11',
            '01D12',
            '01D13',
            '01D14',
            '01D15',
            '01D16',
            '01D17',
            '01D18',
            '01D19',
            '01D20',
            '01D51',
            '01D52',
            '01D53',
            '01D54',
            '01D55',
            '01D56',
            '01D57',
            '01D58',
            '01D59',
            '01D60',
            '01D61',
            '01D62',
            '01D63',
            '01D64',
            '01F01',
            '01F02',
            '01F03',
            '01F04',
            '01F05',
            '01F06',
            '01F07',
            '01F08',
            '01F09',
            '01F10',
            '01F11',
            '01F12',
            '01F13',
            '01F14',
            '01F15',
            '01F16',
            '01F17',
            '01F18',
            '01F19',
            '01F20',
            '01F21',
            '01F22',
            '01F23',
            '01F24',
            '01F51',
            '01F52',
            '01F53',
            '01F54',
            '01F55',
            '01F56',
            '01F57',
            '01F58',
            '01F59',
            '01F60',
            '01F61',
            '01F62',
            '01F63',
            '01F64',
            '01F65',
            '01F66',
            '01F67',
            '01F68',
            '01F69',
            '01F70',
            '01F71',
            '01F72',
            '01G01',
            '01G02',
            '01G03',
            '01G04',
            '01G05',
            '01G06',
            '01G07',
            '01G08',
            '01G09',
            '01G10',
            '01G11',
            '01G12',
            '01G13',
            '01G14',
            '01G15',
            '01G16',
            '01G51',
            '01G52',
            '01G53',
            '01G54',
            '01G55',
            '01G56',
            '01G57',
            '01G58',
            '01G59',
            '01G60',
            '01G61',
            '01G62',
            '01G63',
            '01G64',
            '01G65',
            '01G66',
            '01H01',
            '01H02',
            '01H03',
            '01H04',
            '01H05',
            '01H06',
            '01H07',
            '01H08',
            '01H09',
            '01H10',
            '01H11',
            '01H12',
            '01H13',
            '01H14',
            '01H15',
            '01H16',
            '01H17',
            '01H18',
            '01H19',
            '01H51',
            '01H52',
            '01H53',
            '01H54',
            '01H55',
            '01H56',
            '01H57',
            '01H58',
            '01H59',
            '01H60',
            '01H61',
            '01H62',
            '01H63',
            '01H64',
            '01H65',
            '01I01',
            '01I02',
            '01I03',
            '01I04',
            '01I05',
            '01I06',
            '01I07',
            '01I08',
            '01I09',
            '01I10',
            '01I11',
            '01I12',
            '01I13',
            '01I14',
            '01I15',
            '01I16',
            '01I17',
            '01I18',
            '01I19',
            '01I20',
            '01I21',
            '01I22',
            '01I23',
            '01I24',
            '01I25',
            '01I26',
            '01I27',
            '01I28',
            '01I29',
            '01I30',
            '01I31',
            '01I32',
            '01I51',
            '01I52',
            '01I53',
            '01I54',
            '01I55',
            '01I56',
            '01I57',
            '01I58',
            '01I59',
            '01I60',
            '01I61',
            '01I62',
            '01I63',
            '01I64',
            '01I65',
            '01I66',
            '01I67',
            '01I68',
            '01I69',
            '01I70',
            '01I71',
            '01I72',
            '01I73',
            '01J01',
            '01J02',
            '01J03',
            '01J04',
            '01J05',
            '01J06',
            '01J07',
            '01J08',
            '01J09',
            '01J10',
            '01J11',
            '01J12',
            '01J13',
            '01J14',
            '01J15',
            '01J16',
            '01J51',
            '01J52',
            '01J53',
            '01J54',
            '01J55',
            '01J56',
            '01J57',
            '01J58',
            '01J59',
            '01J60',
            '01J61',
            '01J62',
            '01J63',
            '01J64',
            '01J65',
            '01J66',
            '01J67',
            '01J68',
            '01J69',
            '01J70',
            '01K01',
            '01K02',
            '01K03',
            '01K04',
            '01K05',
            '01K06',
            '01K07',
            '01K08',
            '01K09',
            '01K10',
            '01K11',
            '01K12',
            '01K13',
            '01K14',
            '01K15',
            '01K16',
            '01K17',
            '01K18',
            '01K19',
            '01K20',
            '01K21',
            '01K51',
            '01K52',
            '01K53',
            '01K54',
            '01K55',
            '01K56',
            '01K57',
            '01K58',
            '01K59',
            '01K60',
            '01K61',
            '01K62',
            '01K63',
            '01K64',
            '01K65',
            '01K66',
            '01K67',
            '01K68',
            '01K69',
            '01K70',
            '01K71',
            '01K72',
            '01K73',
            '01L01',
            '01L02',
            '01L03',
            '01L04',
            '01L05',
            '01L06',
            '01L07',
            '01L08',
            '01L09',
            '01L10',
            '01L11',
            '01L12',
            '01L13',
            '01L14',
            '01L15',
            '01L16',
            '01L17',
            '01L18',
            '01L19',
            '01L20',
            '01L21',
            '01L22',
            '01L23',
            '01L24',
            '01L25',
            '01L26',
            '01L27',
            '01L28',
            '01L29',
            '01L30',
            '01L31',
            '01L32',
            '01L51',
            '01L52',
            '01L53',
            '01L54',
            '01L55',
            '01L56',
            '01L57',
            '01L58',
            '01L59',
            '01L60',
            '01L61',
            '01L62',
            '01L63',
            '01L64',
            '01L65',
            '01L66',
            '01L67',
            '01L68',
            '01L69',
            '01L70',
            '01L71',
            '01M01',
            '01M02',
            '01M03',
            '01M04',
            '01M05',
            '01M06',
            '01M07',
            '01M08',
            '01M09',
            '01M10',
            '01M11',
            '01M12',
            '01M13',
            '01M14',
            '01M15',
            '01M16',
            '01M17',
            '01M18',
            '01M19',
            '01M20',
            '01M21',
            '01M22',
            '01M23',
            '01M24',
            '01M25',
            '01M26',
            '01M27',
            '01M28',
            '01M29',
            '01M51',
            '01M52',
            '01M53',
            '01M54',
            '01M55',
            '01M56',
            '01M57',
            '01M58',
            '01M59',
            '01M60',
            '01M61',
            '01M62',
            '01M63',
            '01M64',
            '01M65',
            '01M66',
            '01M67',
            '01M68',
            '01M69',
            '01M70',
            '01M71',
            '01M72',
            '01M73',
            '01M74',
            '01M75',
            '01M76',
            '01M77',
            '01M78',
            '01N01',
            '01N02',
            '01N03',
            '01N04',
            '01N05',
            '01N06',
            '01N07',
            '01N08',
            '01N09',
            '01N10',
            '01N11',
            '01N12',
            '01N13',
            '01N14',
            '01N15',
            '01N16',
            '01N17',
            '01N18',
            '01N19',
            '01N20',
            '01N21',
            '01N22',
            '01N23',
            '01N24',
            '01N25',
            '01N26',
            '01N27',
            '01N28',
            '01N29',
            '01N51',
            '01N52',
            '01N53',
            '01N54',
            '01N55',
            '01N56',
            '01N57',
            '01N58',
            '01N59',
            '01N60',
            '01N61',
            '01N62',
            '01N63',
            '01N64',
            '01N65',
            '01N66',
            '01N67',
            '01N68',
            '01N69',
            '01N70',
            '01N71',
            '01N72',
            '01P01',
            '01P02',
            '01P03',
            '01P04',
            '01P05',
            '01P06',
            '01P07',
            '01P08',
            '01P09',
            '01P10',
            '01P11',
            '01P12',
            '01P13',
            '01P14',
            '01P15',
            '01P16',
            '01P17',
            '01P18',
        ];
        $cases = '';
        foreach ($dataCode as $key => $code) {
            $id = $key + 1;
            $cases .= "WHEN {$id} THEN '{$code}' ";
        }
        DB::statement("
            UPDATE hospitals_mst
            SET code = (CASE id {$cases} END)
        ");
        Schema::enableForeignKeyConstraints();
    }
}
