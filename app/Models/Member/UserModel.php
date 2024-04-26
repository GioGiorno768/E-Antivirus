<?php

namespace App\Models\Member;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'login';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username',
        'password',
        'nama_lengkap',
        'is_admin',
        'created_at',
        'updated_at',
    ];

    // Menghitung jumlah pengguna Admin
    public function ambilAdminUsers_Admin()
    {
        // Mengambil data user dengan is_admin == 1
        return $this->where('is_admin', 1)->findAll();
    }

    public function cariAdminUsers($kunci)
    {
        // Mengambil data user
        return $this->where('is_admin', 1)
            ->like('is_admin', $kunci)
            ->findAll();
    }

    public function hitungAdminUsers($kunci)
    {
        // Menghitung jumlah user 
        return $this->where('is_admin', 1)
            ->like('is_admin', $kunci)
            ->countAllResults();
    }

    // Menghitung jumlah pengguna User
    public function ambilAdminUsers()
    {
        // Mengambil data user dengan is_admin == 1
        return $this->where('is_admin', 0)->findAll();
    }

    public function cariAdminUsers_Admin($kunci)
    {
        // Mengambil data user 
        return $this->where('is_admin', 0)
            ->like('username', $kunci)
            ->findAll();
    }

    public function hitungAdminUsersAdmin($kunci)
    {
        // Menghitung jumlah user 
        return $this->where('is_admin', 0)
            ->like('username', $kunci)
            ->countAllResults();
    }

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
