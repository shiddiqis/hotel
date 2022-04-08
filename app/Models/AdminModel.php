<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    //membuat properti untuk Model
    protected $db;
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'email', 'password', 'username', 'NIK', 'gender', 'akses'];
    public function __construct()
    {
        parent::__construct();
        //koneksikan ke database
        $this->db = db_connect();
    }
    public function getData()
    {
        //code untuk tampil data sebelumnya disembunyikan
    }
    public function simpan($data)
    {
        //simpan data ke database
        //$builder = $this->db->table($this->table);
        //$builder->insert($data);
    }
    public function getDataByID($id)
    {
        $builder = $this->db->table($this->table);
        //ambil data berdasarkan id
        //SELECT * FROM employe WHERE id='$id'
        return $data = $builder->getWhere(['id_user' => $id])->getResultArray();
    }
    public function ubah($data, $key)
    {
        $builder = $this->db->table($this->table);
        //ubah data dalam tabel
        //update employe set field1, field2 WHERE id='$id'
        $builder->update($data, $key);
    }
    public function hapus($key)
    {
        $builder = $this->db->table($this->table);
        //hapus data sesuai id
        //DELETE FROM employe WHERE id='$id'
        $builder->delete($key);
    }
}
