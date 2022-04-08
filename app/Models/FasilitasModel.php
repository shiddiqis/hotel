<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    //membuat properti untuk Model
    protected $db;
    protected $table = 'tb_fasilitas';
    protected $primaryKey = 'id_fasilitas';
    protected $allowedFields = ['id_fasilitas', 'nama_fasilitas', 'detail_fasilitas', 'hotel_fasilitas', 'logo', 'created_at', 'updated_at'];

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
        return $data = $builder->getWhere(['id_fasilitas' => $id])->getResultArray();
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
