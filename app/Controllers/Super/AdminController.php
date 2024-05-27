<?php

namespace App\Controllers\Super;

use App\Controllers\MasterController;
use App\Models\Member\UserModel;
use App\Models\Member\UserKeperluanModel;
use App\Models\Super\KodeAksesModel;
use App\Models\OPDEksternalModel;
use \Hermawan\DataTables\DataTable;

class AdminController extends MasterController
{
    protected $userModel;
    protected $userKeperluanModel;
    protected $kodeAksesModelModel;
    protected $pegawaiEksternalModel;


    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userKeperluanModel = new UserKeperluanModel();
        $this->kodeAksesModelModel = new KodeAksesModel();
        $this->pegawaiEksternalModel = new OPDEksternalModel();
        
    }

    public function index()
    {
        return view('be/login');
    }

    public function dashboard()
    {
        $data['title']   = 'Dashboard';
        $content['text'] = '<h4>Dashboard</h4>';;
        $content['desc'] = 'halo dari desc di dashboard';

        //mengambil data admin user
        $adminUsers = $this->userModel->ambilAdminUsers();
        $adminUsers_Admin = $this->userModel->ambilAdminUsers_Admin();

        $keperluanHariIni = $this->userKeperluanModel->ambilKeperluanHariIni();
        $keperluanBulanIni = $this->userKeperluanModel->ambilKeperluanBulanIni();
        $keperluanTahunIni = $this->userKeperluanModel->ambilKeperluanTahunIni();

        $content['adminUsers'] = $adminUsers;
        $content['adminUsers_Admin'] = $adminUsers_Admin;
        $content['keperluan'] = $keperluanHariIni;
        $content['keperluanPerBulan'] = $keperluanBulanIni;
        $content['keperluanPerTahun'] = $keperluanTahunIni;
        $data['contentString']   = view('be/content/dashboard/str-dashboard', $content);

        return view('be/template', $data);
    }

    public function masteradmin()
    {
        $data['title']   = 'Master Admin';
        $content['text'] = '<h4>Data Master Admin</h4>';
        $content['desc'] = 'halo dari desc di master admin';
        $data['contentString']   = view('be/content/master-admin/str-master-admin', $content);

        return view('be/template', $data);
    }

    public function tambah_admin()
    {
        if($this->request->getMethod() === 'post') {
            $content =[
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'username'     => $this->request->getPost('username'),
                'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'is_admin'     => $this->request->getGetPost('is_admin'),
            ];
            //push ke database
            $this->userModel->insert($content);
            session()->setFlashdata('msg', 'Data Master Admin telah ditambahkan!');
            return redirect()->to('administrator/master-admin');
        }
        return view('master-admin');
    }

    public function edit_masteradmin($id)
    {
        $admin = $this->userModel->find($id);
        if (!$admin){
            return redirect()->to(base_url('error'));
        }

        $data['title']   = 'Edit Master Admin';
        $content['text'] = '<h4>Edit Master Admin</h4>';
        $content['desc'] = 'Edit Master User';

        $content['id'] = $id;
        $content['nama_lengkap'] = $admin['nama_lengkap'];
        $content['username'] = $admin['username'];
        $content['password'] = $admin['password'];

        $data['contentString']   = view('be/content/master-admin/str-edit-master-admin', $content);

        return view('be/template', $data);
    }

    public function update_masteradmin($id)
    {
        $inputNama = $this->request->getPost('inputNama');
        $inputUsername = $this->request->getPost('inputUsername');
        $inputPassword = $this->request->getPost('inputPassword');
        
        $data = [
            'username' => $inputUsername,
            'nama_lengkap' => $inputNama, 
        ];

        if (!empty($inputPassword)) {
            // Mengenkripsi password sebelum disimpan
            $hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);
            $data['password'] = $hashedPassword;
        }
        
        $this->userModel->update($id, $data);
        session()->setFlashdata('msg', 'Data Master Admin telah diperbarui!');
        return redirect()->to(base_url('administrator/master-admin'));
    }

    public function delete_masteradmin($id)
    {
        return view('be/content/master-admin/confirmation-delete', ['id' => $id]);
    }

    public function prosesDeleteAdmin($id)
    {
        // $this->userKeperluanModel->where('user_id', $id)->delete();
        $this->userModel->delete($id);
        session()->setFlashdata('msg', 'Data Master Admin telah dihapus!');
        return redirect()->to(base_url('administrator/master-admin'));
    }


    public function masteradmin_datatable_ss() 
    {
        $this->userModel->select('id, username, nama_lengkap, created_at')->where('is_admin', 1);
        return DataTable::of($this->userModel)->toJson();
    }

    public function masteruser()
    {
        $data['title']   = 'Master User';
        $content['text'] = '<h4>Data Master User</h4>';
        $content['desc'] = 'halo dari desc di master user';
        $data['contentString']   = view('be/content/master-user/str-master-user', $content);

        return view('be/template', $data);
    }

    public function tambah_user()
    {
        if($this->request->getMethod() === 'post') {
            $content =[
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'username'     => $this->request->getPost('username'),
                'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                
            ];
            //push ke database
            $this->userModel->insert($content);
            session()->setFlashdata('msg', 'Data Master User telah ditambahkan!');
            return redirect()->to('administrator/master-user');
        }
        return view('master-user');
    }

    public function edit_masteruser($id)
    {
        $user = $this->userModel->find($id);
        if (!$user){
            return redirect()->to(base_url('error'));
        }

        $data['title']   = 'Edit Master User';
        $content['text'] = '<h4>Edit Master User</h4>';
        $content['desc'] = 'Edit Master User';
        
        $content['id'] = $id;
        $content['nama_lengkap'] = $user['nama_lengkap'];
        $content['username'] = $user['username'];
        $content['password'] = $user['password'];

        $data['contentString']   = view('be/content/master-user/str-edit-master-user', $content);

        return view('be/template', $data);
    }

    public function update_masteruser($id)
    {

        $inputNama = $this->request->getPost('inputNama');
        $inputUsername = $this->request->getPost('inputUsername');
        $inputPassword = $this->request->getPost('inputPassword');

        $data = [
            'username' => $inputUsername,
            'nama_lengkap' => $inputNama, 
        ];

        if(!empty($inputPassword)) {
            //mengenkripsikan password sebelum disimpan
            $hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);
            $data['password'] = $hashedPassword;
        }

        $this->userModel->update($id, $data);
        session()->setFlashdata('msg', 'Data Master User telah diperbarui!');
        return redirect()->to(base_url('administrator/master-user'));
    }

    public function delete_masteruser($id)
    {
        return view('be/content/master-user/confirmation-delete', ['id' => $id]);
    }

     public function prosesDelete($id)
    {
        $this->userKeperluanModel->where('id', $id)->delete();
        $this->userModel->delete($id);
        session()->setFlashdata('msg', 'Data Master User telah dihapus!');
        return redirect()->to(base_url('administrator/master-user'));
    }

    public function masteruser_datatable_ss() 
    {
        $this->userModel->select('id, username, nama_lengkap, created_at')->where('is_admin', 0);
        return DataTable::of($this->userModel)->toJson();
    }

    public function rekapkeperluanuser()
    {
        // $keperluan = $this->userKeperluanModel->select('keperluan_user.id, keperluan_user.foto, keperluan_user.keperluan, keperluan_user.waktu_mulai, keperluan_user.waktu_selesai, keperluan_user.durasi, 
        // GROUP_CONCAT(DISTINCT login.nama_lengkap SEPARATOR " | ") as users, 
        // GROUP_CONCAT(DISTINCT personil_eksternal.nama SEPARATOR " | ") as eksternal')
        // ->join('login_keperluan_user', 'keperluan_user.id = login_keperluan_user.keperluan_user_id')
        // ->join('login', 'login_keperluan_user.user_id = login.id')
        // ->join('personil_eksternal', 'keperluan_user.id = personil_eksternal.keperluan_user_id', 'left')
        // ->groupBy('keperluan_user.id')
        // ->get()
        // ->getResultArray();
        // dd($keperluan);
        $data['title']   = 'Rekap Keperluan User';
        $content['text'] = '<h4>Data Rekap Keperluan User</h4>';
        $content['desc'] = 'halo dari desc di Rekap Keperluan User';
        $data['contentString']   = view('be/content/rekap-keperluan-user/str-rekap-keperluan-user', $content);

        return view('be/template', $data);
    }

    public function edit_rekapkeperluanuser($id)
    {
        $data['title']   = 'Edit Keperluan User';
        $content['text'] = '<h4>Edit Keperluan User</h4>';
        $content['desc'] = 'Edit Keperluan User';
        $content['id'] = $id;
        $data['contentString']   = view('be/content/rekap-keperluan-user/str-edit-keperluan-user', $content);

        return view('be/template', $data);
    }

    public function rekapkeperluanuser_datatable_ss() 
    {
        // $keperluan = $this->userKeperluanModel->select('id, foto, keperluan, waktu_mulai, waktu_selesai, durasi');

        $keperluan = $this->userKeperluanModel->select('login.nama_lengkap, 
        keperluan_user.id, keperluan_user.foto, keperluan_user.keperluan, keperluan_user.waktu_mulai, keperluan_user.waktu_selesai, 
        keperluan_user.durasi, personil_eksternal.nama')
        ->join('login_keperluan_user', 'keperluan_user.id = login_keperluan_user.keperluan_user_id')
        ->join('login', 'login_keperluan_user.user_id = login.id')
        ->join('personil_eksternal', 'keperluan_user.id = personil_eksternal.keperluan_user_id', 'left')
        ->join('master_opd as mo', 'personil_eksternal.opd_id = mo.id_opd', 'left')
        ->groupBy('keperluan_user.id');


        return DataTable::of($keperluan)
        ->add('nama_lengkapC', function($row) {
            $users = $this->userKeperluanModel->ambilKeperluanUserLogin($row->id);
            $names = '';
            foreach ($users as $user) {
                $names .= '- ' . $user['nama_lengkap'] . '<br>';
            }
            return $names;
        }, 'first')
        ->add('opd_eksternal', function($row) {
            $users = $this->userKeperluanModel->get_user_eksternal_with_keperluan($row->id);
            $names = '';
            foreach ($users as $user) {
                $opd = $this->pegawaiEksternalModel->ambilOPD($user['opd_id']);
                $names .= '- ' . $user['nama'] . ' (' . $opd->nama_opd . ')' . '<br>';
            }
            return $names;
        }, 'last')
        ->setSearchableColumns(['nama_lengkap', 'nama', 'keperluan', 'waktu_mulai', 'waktu_selesai'])
        ->hide('nama_lengkap')
        ->hide('nama')
        ->toJson();
    }

    public function kode_akses() {

        $data['title']   = 'Kode Akses';
        $content['text'] = '<h4>Edit Kode Akses</h4>';
        $content['desc'] = 'Edit Kode Akses';

        $data['contentString']   = view('be/content/kode-akses/str-kode-akses', $content);

        return view('be/template', $data);
    }

    public function update_kode_akses() {
        $kode = $this->kodeAksesModelModel->ambilKodeAkses();
        $inputKodeLama = $this->request->getPost('inputKodeLama');
        $inputKodeBaru = $this->request->getPost('inputKodeBaru');

        $data = [
            'kode' => $inputKodeBaru, 
        ];

        if(!empty($inputKodeLama) && !empty($inputKodeBaru)) {
            $db_kode = $kode['kode'];
            $verify_password = password_verify($inputKodeLama, $db_kode);
            if ($verify_password) { 
                $data['kode'] = password_hash($inputKodeBaru, PASSWORD_DEFAULT);
                $this->kodeAksesModelModel->update(1, $data);
                session()->setFlashdata('msg', 'Kode Akses telah diperbarui!');
            } else {
                session()->setFlashdata('msg', 'Kode Akses lama tidak sesuai!');
            }
        }
        return redirect()->to(base_url('administrator/kode-akses'));
    }

    public function kegiatan_pegawai_eksternal() {
        // $pegawaiEksternal = $this->pegawaiEksternalModel->select('personil_eksternal.id, personil_eksternal.nama, mo.nama_opd, ku.waktu_mulai')
        // ->join('master_opd as mo', 'personil_eksternal.opd_id = mo.id_opd')
        // ->join('keperluan_user as ku', 'personil_eksternal.keperluan_user_id = ku.id')
        // ->get()
        // ->getResultArray();
        // dd($pegawaiEksternal);

        $data['title']   = 'Rekap Kegiatan Pegawai Eksternal';
        $content['text'] = '<h4>Rekeperluan Kegiatan Eksternal</h4>';
        $content['desc'] = 'Rekeperluan Kegiatan Eksternal';

        $data['contentString']   = view('be/content/rekap-pegawai-eksternal/str-kegiatan-pegawai-eksternal', $content);

        return view('be/template', $data);
    }

    public function kegiatanPegawaiEksternal_datatable_ss() 
    {
        $pegawaiEksternal = $this->pegawaiEksternalModel->select('personil_eksternal.id, personil_eksternal.nama, mo.nama_opd, ku.waktu_selesai')
        ->join('master_opd as mo', 'personil_eksternal.opd_id = mo.id_opd')
        ->join('keperluan_user as ku', 'personil_eksternal.keperluan_user_id = ku.id');


        return DataTable::of($pegawaiEksternal)
        // ->add('nama_opdC', function($row) {
        //     $opd = $this->pegawaiEksternalModel->ambilOPD($row->opd_id);
        //     $names = '';
        //     foreach ($opd as $user) {
        //         $names .= $user['nama_opd'];
        //         break;
        //     }
        //     return $names;
        // }, 'first')
        // ->add('waktu_selesai', function($row) {
        //     $waktu = $this->pegawaiEksternalModel->ambilWaktuBertugas($row->keperluan_user_id);
        //     $names = '';
        //     foreach ($waktu as $user) {
        //         $names .= $user['waktu_selesai'];
        //         break;
        //     }
        //     return $names;
        // }, 'last')
        ->toJson();
    }

}
