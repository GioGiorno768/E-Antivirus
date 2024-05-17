<?php

namespace App\Controllers\Member;

use App\Controllers\MasterController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Member\UserKeperluanModel;
use App\Models\Member\UserModel;
use App\Models\MasterOPDModel;
use App\Models\Super\KodeAksesModel;
use App\Models\OPDEksternalModel;
use App\Models\Member\PersonilTerpilihModel;

class AuthController extends MasterController
{
    protected $userModel;
    protected $userKeperluanModel;
    protected $masterOPDModel;
    protected $kodeAksesModel;
    protected $personilEksternalModel;
    protected $personilTerpilihModel;
    

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->userModel = new UserModel();
        $this->userKeperluanModel = new UserKeperluanModel();
        $this->masterOPDModel = new MasterOPDModel();
        $this->kodeAksesModel = new KodeAksesModel();
        $this->personilEksternalModel = new OPDEksternalModel();
        $this->personilTerpilihModel = new PersonilTerpilihModel();

        $this->hasLoggedIn();
    }

    public function index()
    {
        return view('fe/loginRev');
    }

    public function login()
    {
        return view('fe/loginRev');
    }
    // public function index()
    // {
    //     return view('fe/login');
    // }

    // public function login()
    // {
    //     return view('fe/login');
    // }

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
        $session = session();

        $foto = $this->request->getFile('fotoKeperluan');
        $pegawai_internal = $this->request->getPost('pegawai_internal');
        $pegawai_eksternal = $this->request->getPost('pegawai_eksternal');
        $kode_akses = $this->request->getPost('kodeAkses');
        $keperluan = $this->request->getPost('keperluan');

        $kode = $this->kodeAksesModel->ambilKodeAkses();
        $verify_password = password_verify($kode_akses, $kode['kode']);
        if ($verify_password) {
            $allowedMimeTypes = ['image/png', 'image/jpeg'];
            if ($foto->isValid() && !$foto->hasMoved()) {
                $mimeType = $foto->getMimeType();
                if (in_array($mimeType, $allowedMimeTypes)) {
                    $nama_foto = $foto->getRandomName();
                    $foto->move(ROOTPATH . 'public/img/keperluan', $nama_foto);
                } else {
                    $session->setFlashdata('msg', 'Gambar harus berupa file PNG atau JPG.');
                    return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('msg', 'Gambar tidak valid.');
                return redirect()->to('/login');
            }

            $data_keperluan = [
                'foto' => $nama_foto,
                'keperluan' => $keperluan,
                'waktu_mulai' => date('Y-m-d H:i:s'),
                'durasi' => 1,
            ];

            
            if(isset($pegawai_internal)) {
                $this->userKeperluanModel->insert($data_keperluan);
                $keperluanTerkini = $this->userKeperluanModel->ambilKeperluanTerkini();
                foreach ($pegawai_internal as $pegawai) {
                    $login_keperluan_user[] = [
                        'user_id' => $pegawai,
                        'keperluan_user_id' => $keperluanTerkini['id']
                    ];
                }
                $this->personilTerpilihModel->insertBatch($login_keperluan_user);
            } else {
                $session->setFlashdata('msg', 'Pegawai internal harus ada.');
                return redirect()->to('/login');
            }
            
            if(isset($pegawai_eksternal)) {
                foreach ($pegawai_eksternal as $pegawai) {
                    $personil_eksternal[] = [
                        'nama' => $pegawai['nama'],
                        'opd_id' => $pegawai['opd'],
                        'keperluan_user_id' => $keperluanTerkini['id']
                    ];
                }
                $this->personilEksternalModel->insertBatch($personil_eksternal);
            }
            
            $personil_internal = $this->userKeperluanModel->ambilKeperluanUserLogin($keperluanTerkini['id']);
            $keperluan_session = [
                'id_keperluan' => $keperluanTerkini['id'],
                'login_time' => $keperluanTerkini['waktu_mulai'],
                'keperluan' => $keperluanTerkini['keperluan'],
                'personil' => [
                    'internal' => $personil_internal, 
                    'eksternal' => isset($pegawai_eksternal) ? $personil_eksternal : null
                ],
                'isLoginUser' => true
            ];
            $session->set($keperluan_session);
    
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('msg', 'Kode Akses Ditolak');
            return redirect()->to('/login');
        }

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
        // $durasi_format = gmdate('H:i:s', $selisih_detik); // ini cara menggunakan durasi yg tersimpan di database
        $jam = floor($selisih_detik / 3600);
        $menit = floor(($selisih_detik / 60) % 60);
        $sisaDetik = $selisih_detik % 60;
    
        // $hasil = [];
    
        // if ($jam > 0) {
        //     $hasil[] = $jam . ' jam';
        // }
        // if ($menit > 0) {
        //     $hasil[] = $menit . ' menit';
        // }
        // if ($sisaDetik > 0 || empty($hasil)) {
        //     $hasil[] = $sisaDetik . ' detik';
        // }

        // $durasi_format =  $jam;
        // print_r($durasi_format);
        $dataToUpdate = [
            'waktu_selesai' => date("Y-m-d H:i:s"),
            'durasi'    => $selisih_detik
        ];

        $this->userKeperluanModel->update($id_keperluan, $dataToUpdate);

        session()->destroy();
        session()->setFlashdata('success-logout', 'Anda telah keluar ruang server!');
        return redirect()->to('/login');
    }

    // public function formatJam($detik) {
    //     $jam = floor($detik / 3600);
    //     $menit = floor(($detik / 60) % 60);
    //     $sisaDetik = $detik % 60;
    
    //     $hasil = [];
    
    //     if ($jam > 0) {
    //         $hasil[] = $jam . ' jam';
    //     }
    //     if ($menit > 0) {
    //         $hasil[] = $menit . ' menit';
    //     }
    //     if ($sisaDetik > 0 || empty($hasil)) {
    //         $hasil[] = $sisaDetik . ' detik';
    //     }
    
    //     return implode(' ', $hasil);
    // }
}
