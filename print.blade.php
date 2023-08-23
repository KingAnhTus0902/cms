<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
    <meta name=ProgId content=Word.Document>
    <meta name=Generator content="Microsoft Word 15">
    <meta name=Originator content="Microsoft Word 15">
    <style>
        @media print {
            @page{
                margin-top: 10px;
                margin-bottom: 0;
            }
        }

        .container {
            margin-left: 70px;
            font-family: "Times New Roman", sans-serif;
            font-size: 13pt;
            line-height: 12pt;
            word-wrap: break-word;
        }

        .font-default {
            font-size: 13pt;
        }

        .line-height-default {
            line-height: 12pt;
        }

        .head {
            margin-left: -84px;
        }

        .text-center {
            text-align: center;
        }

        .text-upper {
            text-transform: uppercase;
        }
    </style>
</head>
@php
    use App\Constants\HospitalTransferConstant;
@endphp

<body>
    <div class=container>
        <div class="head">
            <table>
                <tr>
                    <td style="vertical-align: text-top;">
                        <p class="font-default text-center" style='width:325px;'>
                            <span lang=VI class=" text-upper">
                                {{ $setting->ministry_of_health ?? __('print.common.header.health_department') }}
                                <br>
                                <b>
                                    @if (mb_strtolower($hospital->name) === mb_strtolower(HospitalTransferConstant::HOSPITAL_NAME))
                                        {!! nl2br(HospitalTransferConstant::HOSPITAL_NAME_DISPLAY) !!}
                                    @else
                                        {{ $hospital->name }}
                                    @endif
                                </b>
                                <br>
                                *
                                <br>
                            </span>
                            <span style="font-size: 12pt;">Số:............/{{ $setting->clinic_name_acronym }}-GCT</span>
                        </p>
                    </td>

                    <td style="vertical-align: text-top;">
                        <p class="font-default text-center" style="width:360px; padding-top: 5px;">
                            <b>
                                <span lang=VI>
                                    CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM
                                    <br>
                                    <span style="text-decoration:underline;">Độc lập - Tự do - Hạnh phúc</span>
                                </span>
                            </b>
                            <span lang=VI></span>
                        </p>
                    </td>
                    <td style="vertical-align: text-top;">
                        <p class="font-default"
                            style="width:100px; font-size: 12pt; padding-top: 12px; padding-left: 5px;">
                            <span lang=VI>
                                Số Hồ sơ: ......
                            </span>
                            <span>
                                Vào sổ chuyển tuyến số: ........
                            </span>
                        </p>
                    </td>
                </tr>
            </table>
        </div>

        <div>
            <p class="text-center" style='font-size: 15pt; line-height:15pt;'>
                <b>GIẤY CHUYỂN TUYẾN KHÁM BỆNH, CHỮA BỆNH BẢO HIỂM Y TẾ</b>
            </p>
        </div>

        <div>
            <p class="text-center" style="width: 80%; margin: auto; line-height:15pt;">
                <b>Kính gửi: {{ $hospitalTransfer->hospital->name }}</b>
            </p>
        </div>

        <div>
            <p class="line-height-default" style="">
                <b>{{ $hospital->name }} trân trọng giới thiệu:</b>
            </p>
        </div>

        <div>
            <p class="line-height-default">
                <span>
                    - Họ và tên người bệnh:
                    <span style="width: 320px; display: inline-block; vertical-align: text-top">
                        {{ $medical->cadre_name ?? '' }}
                    </span>
                </span>
                <span style="width: 60px; display: inline-block; vertical-align: text-top">
                    @if ($medical->cadre_gender !== null)
                        {{ $medical->cadre_gender }}
                    @endif
                </span>
                <span style="display: inline-block; vertical-align: text-top">
                    Tuổi: {{ $hospitalTransfer->cadre_age ?? '' }}
                </span>
            </p>
        </div>

        <div>
            <p class="line-height-default">
                <span>
                    - Địa chỉ: {{ $medical->cadre_address ?? '' }}
                </span>
            </p>
        </div>

        <div>
            <p class="line-height-default">
                <span style='width:400px; display:inline-block; vertical-align: text-top;'>
                    - Dân tộc:
                    @foreach ($folks as $folk)
                        @if ($medical->cadre_folk_id !== null && $medical->cadre_folk_id == $folk->id)
                            {{ $folk->name }}
                        @endif
                    @endforeach
                </span>
                <span style='width:200px; display:inline-block;'>Quốc tịch: Việt Nam</span>
            </p>
        </div>

        <div>
            <p class="line-height-default">
                <span style='width:300px; display:inline-block; vertical-align: text-top;'>
                    - Nghề nghiệp: {{ $medical->cadre_job ?? '' }}
                </span>
                <span style='width:300px; display:inline-block; vertical-align: text-top;'>
                    Nơi làm việc: {{ $hospitalTransfer->cadre_work_place ?? '' }}
                </span>
            </p>
        </div>

        <div style="margin-top: 25px; margin-bottom: 25px">
            <p class="line-height-default">
                <span>- Số thẻ:</span>
                <span style='display:inline-block; vertical-align: text-top;'>
                    @if (strlen($medical->cadre_medical_insurance_number) === 15)
                        <table border=0; cellspacing=0; cellpadding=0; style='margin-left: 30px;'>
                            <tr style='height:20pt'>
                                <td
                                    style='border:solid windowtext 1.0pt;width:1.0cm;padding:0cm 10pt 0cm 10pt;height:20pt;'>
                                    <p
                                        style='text-transform: uppercase; margin-top:6.0pt;margin-bottom:6.0pt;line-height:11.7pt; text-align: center;'>
                                        <span lang=VI>
                                            {{ (substr($medical->cadre_medical_insurance_number, 0, 2)) }}
                                        </span>
                                    </p>
                                </td>
                                <td
                                    style='border:solid windowtext 1.0pt;width:0.5cm;padding:0cm 9pt 0cm 9pt;height:20pt; text-align: center;'>
                                    <p
                                        style='text-transform: uppercase; margin-top:6.0pt;margin-bottom:6.0pt;line-height:11.7pt;'>
                                        <span lang=VI>
                                            {{ (substr($medical->cadre_medical_insurance_number, 2, 1)) }}
                                        </span>
                                    </p>
                                </td>
                                <td
                                    style='border:solid windowtext 1.0pt;width:0.5cm;padding:0cm 9pt 0cm 9pt;height:20pt; text-align: center;'>
                                    <p
                                        style='text-transform: uppercase; margin-top:6.0pt;margin-bottom:6.0pt;line-height:11.7pt;'>
                                        <span lang=VI>
                                            {{ (substr($medical->cadre_medical_insurance_number, 3, 2)) }}
                                        </span>
                                    </p>
                                </td>
                                <td
                                    style='width:0.5cm;border:solid windowtext 1.0pt;padding:0cm 9pt 0cm 9pt;height:20pt; text-align: center;'>
                                    <p
                                        style='margin-top:6.0pt;margin-bottom:6.0pt;text-align:center;line-height:11.7pt;'>
                                        <span lang=VI>
                                            {{ substr($medical->cadre_medical_insurance_number, 5, 3) ?? '' }}
                                        </span>
                                    </p>
                                </td>
                                <td
                                    style='width:0.5cm;border:solid windowtext 1.0pt;padding:0cm 10pt 0cm 10pt;height:20pt; text-align: center;'>
                                    <p
                                        style='margin-top:6.0pt;margin-bottom:6.0pt;text-align:center;line-height:11.7pt;'>
                                        <span lang=VI>
                                            {{ substr($medical->cadre_medical_insurance_number, 8, 3) ?? '' }}
                                        </span>
                                    </p>
                                </td>
                                <td
                                    style='width:1cm;border:solid windowtext 1.0pt;padding:0cm 11pt 0cm 11pt;height:25pt; text-align: center;'>
                                    <p
                                        style='margin-top:6.0pt;margin-bottom:6.0pt;text-align:center;line-height:11.7pt; min-width: 60px'>
                                        <span lang=VI>
                                            {{ substr($medical->cadre_medical_insurance_number, 11, strlen($medical->cadre_medical_insurance_number)) ?? '' }}
                                        </span>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    @else
                        <table border=0; cellspacing=0; cellpadding=0; style='margin-left: 30px;'>
                            <tr style='height:20pt'>
                                <td
                                    style='border:solid windowtext 1.0pt;width:1.0cm;padding:0cm 10pt 0cm 10pt;height:20pt'>
                                    <p
                                        style='text-transform: uppercase; margin-top:6.0pt;margin-bottom:6.0pt;line-height:11.7pt; text-align: center;'>
                                        <span lang=VI>

                                        </span>
                                    </p>
                                </td>
                                <td
                                    style='border:solid windowtext 1.0pt;width:0.5cm;padding:0cm 9pt 0cm 9pt;height:20pt'>
                                    <p
                                        style='text-transform: uppercase; margin-top:6.0pt;margin-bottom:6.0pt;line-height:11.7pt; text-align: center;'>
                                        <span lang=VI>

                                        </span>
                                    </p>
                                </td>
                                <td
                                    style='border:solid windowtext 1.0pt;width:0.5cm;padding:0cm 9pt 0cm 9pt;height:20pt'>
                                    <p
                                        style='text-transform: uppercase; margin-top:6.0pt;margin-bottom:6.0pt;line-height:11.7pt; text-align: center;'>
                                        <span lang=VI>

                                        </span>
                                    </p>
                                </td>
                                <td
                                    style='width:0.5cm;border:solid windowtext 1.0pt;padding:0cm 9pt 0cm 9pt;height:20pt'>
                                    <p
                                        style='margin-top:6.0pt;margin-bottom:6.0pt;text-align:center;line-height:11.7pt; text-align: center;'>
                                        <span lang=VI>
                                            {{ substr($medical->cadre_medical_insurance_number,0, 2) ?? '' }}
                                        </span>
                                    </p>
                                </td>
                                <td
                                    style='width:0.5cm;border:solid windowtext 1.0pt;padding:0cm 10pt 0cm 10pt;height:20pt'>
                                    <p
                                        style='margin-top:6.0pt;margin-bottom:6.0pt;text-align:center;line-height:11.7pt; text-align: center;'>
                                        <span lang=VI>
                                            {{ substr($medical->cadre_medical_insurance_number, 2, 3) ?? '' }}
                                        </span>
                                    </p>
                                </td>
                                <td
                                    style='width:1cm;border:solid windowtext 1.0pt;padding:0cm 11pt 0cm 11pt;height:25pt'>
                                    <p
                                        style='margin-top:6.0pt;margin-bottom:6.0pt;text-align:center;line-height:11.7pt; min-width: 60px; text-align: center;'>
                                        <span lang=VI>
                                            {{ substr($medical->cadre_medical_insurance_number, 5, strlen($medical->cadre_medical_insurance_number)) ?? '' }}
                                        </span>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    @endif
                </span>
            </p>
        </div>

        <div>
            @if ($medical->cadre_medical_insurance_number !== null)
                <p class="line-height-default">
                    <span>
                        - Hạn sử dụng từ
                        {{ date_format(date_create($medical->cadre_medical_insurance_start_date), "d/m/Y") }} đến
                        {{ date_format(date_create($medical->cadre_medical_insurance_end_date), "d/m/Y") }}
                    </span>
                </p>
            @else
                <p class="line-height-default">
                    <span>
                        - Hạn sử dụng từ ........./........./20....... đến ........./........./20.......
                    </span>
                </p>
            @endif
        </div>

        <div>
            <p class="line-height-default">
                <span>Đã được khám bệnh/điều trị:</span>
            </p>
        </div>

        <div>
            <p class="line-height-default">
                <span>
                    <span style="max-width: 240px; display: inline-block; vertical-align: text-top; line-height: 18pt">
                        + Tại: <b>{{ $hospital->name }}</b>
                    </span>
                    <span>
                        .(Tuyến..........) Từ ngày
                    </span>
                    {{ date_format(date_create($hospitalTransfer->treatment_start_date), 'd/m/Y') }}
                    đến ngày
                    {{ date_format(date_create($hospitalTransfer->treatment_end_date), 'd/m/Y') }}
                </span>
            </p>
        </div>

        <div style="margin-top: 30px">
            <p class="line-height-default text-center">
                <b>
                    <span>
                        TÓM TẮT BỆNH ÁN
                    </span>
                </b>
            </p>
        </div>
        <div>
            <p class="line-height-default" style="word-wrap: break-word; word-break: break-word; white-space: pre-line;
                line-height: 18pt">- Dấu hiệu lâm sàng: {{ $hospitalTransfer->clinical_signs }}</p>
        </div>
        <div>
            <p class="line-height-default" style="word-wrap: break-word; word-break: break-word; white-space: pre-line;
                line-height: 18pt">- Kết quả xét nghiệm, cận lâm sàng: {{ $hospitalTransfer->subclinical_results }}</p>
        </div>
        <div>
            <p class="line-height-default" style="word-wrap: break-word; word-break: break-word; white-space: pre-line;
                line-height: 18pt">- Chẩn đoán: {{ $hospitalTransfer->diagnose }}</p>
        </div>
        <div>
            <p class="line-height-default" style="word-wrap: break-word; word-break: break-word; white-space: pre-line;
                line-height: 18pt">- Phương pháp, thủ thuật, kỹ thuật, thuốc đã sử dụng trong điều trị: {{ $hospitalTransfer->treatment_methods }}</p>
        </div>
        <div>
            <p class="line-height-default" style="word-wrap: break-word; word-break: break-word; white-space: pre-line;
                line-height: 18pt">- Tình trạng người bệnh lúc chuyển tuyến: {{ $hospitalTransfer->patient_status }}</p>
        </div>
        <div>
            <p class="line-height-default">
                <span>- Lý do chuyển viện: Khoanh tròn vào lý do chuyển tuyến phù hợp sau đây:</span>
            </p>
            @if ($hospitalTransfer->reasons == 1)
                <p class="line-height-default">
                    <span style="display: inline-block; vertical-align: text-top; width: 590px">
                        {{ HospitalTransferConstant::REASON_TEXT[HospitalTransferConstant::REASON_1] }}
                    </span>
                    <span style="display: inline-block; vertical-align: text-top;">
                        <table border=0; cellspacing=0; cellpadding=0;>
                            <tr style='height:15pt'>
                                <td
                                    style='border:solid windowtext 1.0pt;width:0.2cm;padding:0cm 5.4pt 0cm 5.4pt;height:10pt'>
                                    <span style='font-size:13pt;font-family:"Times New Roman",sans-serif'>
                                        x
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </span>
                </p>
                <p class="line-height-default">
                    <span style="display: inline-block; vertical-align: text-top; width: 590px">
                        {{ HospitalTransferConstant::REASON_TEXT[HospitalTransferConstant::REASON_2] }}
                    </span>
                    <span style="display: inline-block; vertical-align: text-top;">
                        <table border=0; cellspacing=0; cellpadding=0;>
                            <tr style='height:15pt'>
                                <td
                                    style='border:solid windowtext 1.0pt;width:0.2cm;padding:0cm 5.4pt 0cm 5.4pt;height:10pt'>
                                    <span style='font-size:13pt;font-family:"Times New Roman",sans-serif'>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </span>
                </p>
            @else
                <p class="line-height-default">
                    <span style="display: inline-block; vertical-align: text-top; width: 590px">
                        {{ HospitalTransferConstant::REASON_TEXT[HospitalTransferConstant::REASON_1] }}
                    </span>
                    <span style="display: inline-block; vertical-align: text-top;">
                        <table border=0; cellspacing=0; cellpadding=0;>
                            <tr style='height:15pt'>
                                <td
                                    style='border:solid windowtext 1.0pt;width:0.2cm;padding:0cm 5.4pt 0cm 5.4pt;height:10pt'>
                                    <span style='font-size:13pt;font-family:"Times New Roman",sans-serif'>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </span>
                </p>
                <p class="line-height-default">
                    <span style="display: inline-block; vertical-align: text-top; width: 590px">
                        {{ HospitalTransferConstant::REASON_TEXT[HospitalTransferConstant::REASON_2] }}
                    </span>
                    <span style="display: inline-block; vertical-align: text-top;">
                        <table border=0; cellspacing=0; cellpadding=0;>
                            <tr style='height:15pt'>
                                <td
                                    style='border:solid windowtext 1.0pt;width:0.2cm;padding:0cm 5.4pt 0cm 5.4pt;height:10pt'>
                                    <span style='font-size:13pt;font-family:"Times New Roman",sans-serif'>
                                        x
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </span>
                </p>
            @endif
        </div>

        <div>
            <p class="line-height-default" style="word-wrap: break-word; word-break: break-word; white-space: pre-line;
                line-height: 18pt">- Hướng điều trị: {{ $hospitalTransfer->treatment_directions }}</p>
        </div>

        <div>
            <p class="line-height-default">
                <span>
                    - Chuyển tuyến hồi: .......giờ .......phút, ngày
                    {{ date_format(date_create($hospitalTransfer->treatment_start_date), 'd') }}
                    tháng
                    {{ date_format(date_create($hospitalTransfer->treatment_start_date), 'm') }}
                    năm
                    {{ date_format(date_create($hospitalTransfer->treatment_start_date), 'Y') }}
                </span>
            </p>
        </div>

        <div>
            <p class="line-height-default" style="word-wrap: break-word; word-break: break-word; white-space: pre-line;
                line-height: 18pt">- Phương tiện vận chuyển: {{ $hospitalTransfer->transportations }}</p>
        </div>

        <div>
            <p class="line-height-default" style="word-wrap: break-word; word-break: break-word; white-space: pre-line;
                line-height: 18pt">- Họ tên, chức danh, trình độ chuyên môn của người hộ tống: {{ $hospitalTransfer->escort_information }}</p>
        </div>

        <div class="footer">
            <table>
                <tr>
                    <td style='width:220px;'>
                        <p class="line-height-default">
                            <span style='display: block; text-align: center; margin-top: 22px;'>
                            </span>
                            <b>
                                <span>
                                    Y, BÁC SỸ KHÁM, ĐIỀU TRỊ
                                </span>
                            </b>
                            <br>
                            <span style='display: block; text-align: center;'>
                                (Ký và ghi rõ họ tên)
                            </span>
                        </p>
                    </td>
                    <td style='width:340px; padding-left: 100px;'>
                        <p class="line-height-default">
                            <span style='display: block; text-align: center;'>
                                Ngày ...... tháng ...... năm 20....
                            </span>
                            <b>
                                <span style='display: block; margin-top: 5px'>
                                    NGƯỜI CÓ THẨM QUYỀN CHUYỂN TUYẾN
                                </span>
                            </b>
                            <span style='display: block; text-align: center;'>
                                (Ký tên, đóng dấu)
                            </span>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
