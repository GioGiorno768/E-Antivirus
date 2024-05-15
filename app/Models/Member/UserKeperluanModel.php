<?php

namespace App\Models\Member;

use CodeIgniter\Model;

class UserKeperluanModel extends Model
{
    protected $table            = 'keperluan_user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'foto',
        'user_id',
        'keperluan',
        'waktu_mulai',
        'waktu_selesai',
        'durasi',
    ];

    public function ambilKeperluan()
    {
        return $this->findAll();
    }

    // Mencari data keperluan_user 
    public function cariKeperluan($kunci)
    {
        return $this->like('keperluan', $kunci)->findAll();
    }

    // Menghitung jumlah data keperluan_user 
    public function hitungKeperluan($kunci)
    {
        return $this->like('keperluan', $kunci)->countAllResults();
    }

    public function ambilKeperluanHariIni()
    {
        $today = date('Y-m-d');
        return $this->where('DATE(waktu_selesai)', $today)->findAll();
    }

    public function ambilKeperluanBulanIni()
    {
        $bulanIni = date('Y-m');

        return $this->where('DATE_FORMAT(waktu_selesai, "%Y-%m")', $bulanIni)->findAll();
    }

    public function ambilKeperluanTahunIni()
    {
        $tahunIni = date('Y');

        return $this->where('DATE_FORMAT(waktu_selesai, "%Y")', $tahunIni)->findAll();
    }

    public function ambilKeperluanUserLogin($keperluan_user_id) {
        $data = $this->db->table('login')
                ->select('login.nama_lengkap')
                ->join('login_keperluan_user as lku', 'login.id = lku.user_id')
                ->where('lku.keperluan_user_id', $keperluan_user_id)
                ->get()
                ->getResultArray();
        
        return $data;
    }

    public function ambilKeperluanTerkini() {
        return $this->orderBy('id', 'DESC')->first();       
    }

    // Dates
    protected $useTimestamps = false; // jika true silahkan buka komentar atribut di bawah
    /* protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at'; */

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

    public function get_user_eksternal_with_keperluan($id)
    {
        $data = $this->db->table('keperluan_user')
            ->join('personil_eksternal', 'personil_eksternal.keperluan_user_id = keperluan_user.id')
            ->where('keperluan_user.id', $id)
            ->get()
            ->getResultArray();

        return $data;
    }
}
