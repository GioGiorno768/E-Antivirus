<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Member\UserKeperluanModel;


use Dompdf\Dompdf;
use Dompdf\Options;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class ExportPDFController extends BaseController
{
    protected $userKeperluanModel;

    public function __construct()
    {
        $this->userKeperluanModel = new UserKeperluanModel();
        function formatDateTime($dateTimeStr) {
            // Pisahkan tanggal dan waktu
            list($date, $time) = explode(' ', $dateTimeStr);
        
            // Pisahkan tahun, bulan, dan hari
            list($year, $month, $day) = explode('-', $date);
        
            // Gabungkan kembali dengan format yang diinginkan
            $formattedDateTime = "$day-$month-$year $time";
        
            return $formattedDateTime;
        }
    }

    public function index()
    {
        $keperluan2x = $this->userKeperluanModel->select('keperluan_user.id, keperluan_user.foto, keperluan_user.keperluan, keperluan_user.waktu_mulai, keperluan_user.waktu_selesai, keperluan_user.durasi, 
        GROUP_CONCAT(DISTINCT login.nama_lengkap SEPARATOR " | ") as users, 
        GROUP_CONCAT(DISTINCT personil_eksternal.nama SEPARATOR " | ") as eksternal')
        ->join('login_keperluan_user', 'keperluan_user.id = login_keperluan_user.keperluan_user_id')
        ->join('login', 'login_keperluan_user.user_id = login.id')
        ->join('personil_eksternal', 'keperluan_user.id = personil_eksternal.keperluan_user_id', 'left')
        ->groupBy('keperluan_user.id')
        ->get()
        ->getResultArray();
        $data['keperluan2x'] = $keperluan2x;
        return view('export/keperluan_user', $data);
    }

    public function export_keperluan_user_pdf() {
        $keperluan2x = $this->userKeperluanModel->select('keperluan_user.id, keperluan_user.foto, keperluan_user.keperluan, keperluan_user.waktu_mulai, keperluan_user.waktu_selesai, keperluan_user.durasi,  
        GROUP_CONCAT(DISTINCT CONCAT("- ", login.nama_lengkap) SEPARATOR "<br>") as users,
        GROUP_CONCAT(DISTINCT CONCAT("- ", personil_eksternal.nama, " (", mo.nama_opd, ")") SEPARATOR "<br>") AS eksternal')
        ->join('login_keperluan_user', 'keperluan_user.id = login_keperluan_user.keperluan_user_id')
        ->join('login', 'login_keperluan_user.user_id = login.id')
        ->join('personil_eksternal', 'keperluan_user.id = personil_eksternal.keperluan_user_id', 'left')
        ->join('master_opd as mo', 'personil_eksternal.opd_id = mo.id_opd', 'left')
        ->groupBy('keperluan_user.id')
        ->orderBy('keperluan_user.id', 'desc')
        ->get()
        ->getResultArray();

        $data['keperluan2x'] = $keperluan2x;
        $html = view('export/keperluan_user', $data);

        // Buat instance DOMPDF
        $dompdf = new Dompdf();

        // Load HTML ke DOMPDF
        $dompdf->loadHtml($html);

        // Set ukuran dan orientasi kertas (opsional)
        $dompdf->setPaper('A4', 'landscape');

        // Render HTML menjadi PDF
        $dompdf->render();

        // Output file PDF ke browser
        $dompdf->stream("laporan_keperluan.pdf");
        // $dompdf = new \Dompdf\Dompdf();
        // $dompdf->loadHtml($html);
        // $dompdf->setPaper('A4', 'landscape');
        // $dompdf->render();
        // $dompdf->stream('laporan_keperluan');
    }

    public function export_keperluan_user_excel() {

        // Mendapatkan data dari model
        $data = $this->userKeperluanModel->select('keperluan_user.id, keperluan_user.foto, 
        GROUP_CONCAT(DISTINCT CONCAT(login.nama_lengkap) SEPARATOR " | ") as users, 
        keperluan_user.keperluan, keperluan_user.waktu_mulai, keperluan_user.waktu_selesai, keperluan_user.durasi, 
        GROUP_CONCAT(DISTINCT CONCAT(personil_eksternal.nama, " (", mo.nama_opd, ")") SEPARATOR " | ") AS eksternal')
        ->join('login_keperluan_user', 'keperluan_user.id = login_keperluan_user.keperluan_user_id')
        ->join('login', 'login_keperluan_user.user_id = login.id')
        ->join('personil_eksternal', 'keperluan_user.id = personil_eksternal.keperluan_user_id', 'left')
        ->join('master_opd as mo', 'personil_eksternal.opd_id = mo.id_opd', 'left')
        ->groupBy('keperluan_user.id')
        ->orderBy('keperluan_user.id', 'desc')
        ->get()
        ->getResultArray();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan judul kolom
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Foto');
        $sheet->setCellValue('C1', 'Internal');
        $sheet->setCellValue('D1', 'OPD Eksternal');
        $sheet->setCellValue('E1', 'Keperluan');
        $sheet->setCellValue('F1', 'Waktu Mulai');
        $sheet->setCellValue('G1', 'Waktu Selesai');
        $sheet->setCellValue('H1', 'Durasi');

        // Menambahkan data dari database ke file Excel
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A'.$row, $item['id']);
            $sheet->setCellValue('B'.$row, '=HYPERLINK("'. base_url('img/keperluan/') . $item['foto'] .'", "Tampilkan Gambar")');
            $sheet->setCellValue('C'.$row, $item['users']);
            $sheet->setCellValue('D'.$row, $item['eksternal']);
            $sheet->setCellValue('E'.$row, $item['keperluan']);
            $sheet->setCellValue('F'.$row, formatDateTime($item['waktu_mulai']));
            $sheet->setCellValue('G'.$row, formatDateTime($item['waktu_selesai']));
            // Convert durasi to readable format
            $jam = floor($item['durasi'] / 3600);
            $menit = floor(($item['durasi'] / 60) % 60);
            $sisaDetik = $item['durasi'] % 60;

            $hasil = [];

            if ($jam > 0) {
                $hasil[] = $jam . ' jam';
            }
            if ($menit > 0) {
                $hasil[] = $menit . ' menit';
            }
            if ($sisaDetik > 0 || count($hasil) === 0) {
                $hasil[] = $sisaDetik . ' detik';
            }

            $durasi = implode(' ', $hasil);

            $sheet->setCellValue('H'.$row, $durasi);

            $row++;
        }

        // Menyimpan file Excel
        $writer = new Xlsx($spreadsheet);
        $file_name = 'laporan_keperluan.xlsx'; // Nama file yang ingin Anda berikan
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$file_name.'"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

}
