<?php

namespace App\Controllers\Member;

use App\Controllers\MasterController;
use App\Models\Member\UserKeperluanModel;
use App\Models\Member\UserModel;

class UserController extends MasterController
{
    protected $userModel;
    protected $userKeperluanModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userKeperluanModel = new UserKeperluanModel();
    }

    public function home()
    {
        $date = date('Y-m-d H:i:s');
        $data['format_date'] = date('l, j F Y', strtotime($date));

        $keperluan_id = session()->get('keperluan_id');
        $data['keperluan_data'] = $this->userKeperluanModel->get_user_with_keperluan($keperluan_id);

        return view ('home',$data);
    }

    public function change_password()
    {
        $user_id = session()->get('user_id');
        $user_data = $this->userModel->where('id', $user_id)->first();

        $password_lama = $this->request->getVar('password_lama');

        if (!password_verify($password_lama, $user_data['password'])) {
            session()->setFlashdata('error', 'Password lama anda salah!');
            return redirect()->to('/dashboard');
        } else {
            $password_baru = $this->request->getVar('password_baru');
            $confirm_password = $this->request->getVar('confirm_password');

            if ($password_baru !== $confirm_password) {
                session()->setFlashdata('error', 'Password baru dan konfirmasi password tidak sama!');
                return redirect()->to('/dashboard');
            } else {
                $user_data_update = [
                    'password' => password_hash($password_baru, PASSWORD_DEFAULT)
                ];

                $this->userModel->update($user_id, $user_data_update);

                session()->setFlashdata('msg', 'Password berhasil diperbarui!');
                return redirect()->to('/dashboard');
            }
        }
    }
}
