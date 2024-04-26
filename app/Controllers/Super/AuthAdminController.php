<?php
namespace App\Controllers\Super;

use App\Controllers\MasterController;
use App\Models\Member\UserModel;

class AuthAdminController extends MasterController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('be/login');
    }

    public function login_action()
    {
        $session = session();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $where = ['username' => $username, 'is_admin' => 1];

        $user_data = $this->userModel->where($where)->first();

        if ($user_data) {
            $db_password = $user_data['password'];
            $verify_password = password_verify($password, $db_password);

            if ($verify_password) {
                $user_data['user_id'] = isset($user_data['id']) ? $user_data['id'] : null;
                $user_data['isLoginAdmin'] = true;
                $session->set($user_data);

                return redirect()->to('/administrator/dashboard');
            } else {
                $session->setFlashdata('msg', 'Akses kredensial anda tidak valid.');
                return redirect()->to('/admin/login');
            }
        } else {
            $session->setFlashdata('msg', 'Akun anda tidak ditemukan.');
            return redirect()->to('/admin/login');
        }
    }

    public function logout_action()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('success-logout', 'Anda telah keluar aplikasi!');
        return redirect()->to('/admin/login');
    }
} 