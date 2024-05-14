<?php

namespace App\Controllers\Member;

use App\Controllers\MasterController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Member\UserKeperluanModel;
use App\Models\Member\UserModel;
use App\Models\MasterOPDModel;

class AuthController extends MasterController
{
    protected $userModel;
    protected $userKeperluanModel;
    protected $masterOPDModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->userModel = new UserModel();
        $this->userKeperluanModel = new UserKeperluanModel();
        $this->masterOPDModel = new MasterOPDModel();

        $this->hasLoggedIn();
    }

    public function index()
    {
        return view('fe/login');
    }

    public function login()
    {
        return view('fe/login');
    }

    public function loginRev()
    {
        return view('fe/loginRev');
    }

    public function loginRev_list_user()
    {
        $users = $this->userModel->ambilAdminUsers();
        $listUser = [];

        foreach ($users as $user) {
            $listUser[] = [
                "id" => $user['id'],
                "nama" => $user['nama_lengkap']
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($listUser);
        die();
    }

    public function loginRev_list_opd()
    {
        $opd = $this->masterOPDModel->ambilOpd();
        $listOpd = [];

        foreach ($opd as $item) {
            $listOpd[] = [
                "id" => $item['id_opd'],
                "nama_opd" => $item['nama_opd']
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($listOpd);
        die();
    }

    public function login_action()
    {
        $session = session();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $where = ['username' => $username, 'is_admin' => 0];

        $user_data = $this->userModel->where($where)->first();

        if ($user_data) {
            $db_password = $user_data['password'];
            $verify_password = password_verify($password, $db_password);

            if ($verify_password) {
                $user_data['login_time'] = date('Y-m-d H:i:s');
                $user_data['keperluan'] = $this->request->getVar('keperluan');
                $user_data['user_id'] = isset($user_data['id']) ? $user_data['id'] : null;
                $user_data['isLoginUser'] = true;

                //insert keperluan ke database
                $keperluanArr = [
                    'user_id'       => $user_data['id'],
                    'keperluan'     => $user_data['keperluan'],
                    'waktu_mulai'   => $user_data['login_time'],
                    'durasi'        => 1, 
                ];

                $idKeperluan = $this->userKeperluanModel->insert($keperluanArr);
                if (!$idKeperluan) {
                    $session->setFlashdata('msg', 'Ada gangguan teknis. Mohon Login kembali.');
                    return redirect()->to('/login');
                }

                $user_data['id_keperluan'] = $idKeperluan;
                $session->set($user_data);

                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Akses kredensial anda tidak valid.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Akun anda tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function login_actionRev() {
        $pegawai_internal = $this->request->getPost('pegawai_internal');
        $pegawai_eksternal = $this->request->getPost('pegawai_eksternal');
        $kode_akses = $this->request->getPost('kodeAkses');
        $keperluan = $this->request->getPost('keperluan');
        $lol = [
            "in" => $pegawai_internal,
            "eks" => $pegawai_eksternal,
            "kode" => $kode_akses,
            "perlu" => $keperluan

        ];

        print_r($lol);
    }

    public function logout_action()
    {
        $id_keperluan = session()->get('id_keperluan');
        $waktu_mulai = session()->get('login_time'); //waktu login
        $waktu_selesai = date('Y-m-d H:i:s'); // Waktu sekarang

        // Hitung durasi waktu
        $timestamp_mulai    = strtotime($waktu_mulai); // satuannya sekon / detik
        $timestamp_selesai  = strtotime($waktu_selesai); // satuannya sekon / detik

        $selisih_detik = $timestamp_selesai - $timestamp_mulai;
        #$durasi_format = gmdate('H:i:s', $selisih_detik); // ini cara menggunakan durasi yg tersimpan di database

        $dataToUpdate = [
            'waktu_selesai' => date("Y-m-d H:i:s"),
            'durasi'    => $selisih_detik,
        ];

        $this->userKeperluanModel->update($id_keperluan, $dataToUpdate);

        session()->destroy();
        session()->setFlashdata('success-logout', 'Anda telah keluar ruang server!');
        return redirect()->to('/login');
    }
}
