<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Member\UserKeperluanModel;

class ExportPDFController extends BaseController
{
    protected $userKeperluanModel;

    public function __construct()
    {
        $this->userKeperluanModel = new UserKeperluanModel();
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

    public function export_keperluan_user() {
        $keperluan2x = $this->userKeperluanModel->select('keperluan_user.id, keperluan_user.foto, keperluan_user.keperluan, keperluan_user.waktu_mulai, keperluan_user.waktu_selesai, keperluan_user.durasi, 
        GROUP_CONCAT(DISTINCT login.nama_lengkap SEPARATOR "<br>") as users, 
        GROUP_CONCAT(DISTINCT personil_eksternal.nama SEPARATOR "<br>") as eksternal')
        ->join('login_keperluan_user', 'keperluan_user.id = login_keperluan_user.keperluan_user_id')
        ->join('login', 'login_keperluan_user.user_id = login.id')
        ->join('personil_eksternal', 'keperluan_user.id = personil_eksternal.keperluan_user_id', 'left')
        ->groupBy('keperluan_user.id')
        ->get()
        ->getResultArray();

        $data['keperluan2x'] = $keperluan2x;
        $html = view('export/keperluan_user', $data);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporan_keperluan');
    }
}
