<?php

namespace App\Models;

use CodeIgniter\Model;

class OPDEksternalModel extends Model
{
    protected $table            = 'personil_eksternal';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'nama',
        'opd_id',
        'keperluan_user_id'
    ];

    public function ambilOPD($id) {
        $data = $this->db->table('personil_eksternal')
            ->join('master_opd', 'master_opd.id_opd = personil_eksternal.opd_id')
            ->where('personil_eksternal.opd_id', $id)
            ->get()
            ->getRow();

        return $data;
    }

    public function ambilWaktuBertugas($id) {
        $data = $this->db->table('personil_eksternal')
            ->join('keperluan_user', 'keperluan_user.id = personil_eksternal.keperluan_user_id')
            ->where('personil_eksternal.keperluan_user_id', $id)
            ->get()
            ->getResultArray();

        return $data;
    }

    // Dates
    protected $useTimestamps = false;
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
