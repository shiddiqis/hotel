<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    //membuat properti untuk Model
    protected $db;
    protected $table = 'tb_kamar';
    protected $primaryKey = 'id_kamar';
    protected $allowedFields = ['id_kamar', 'id_fasilitas', 'nama_kamar', 'tipe_kamar', 'fasilitas', 'harga', 'deskripsi', 'status', 'gambar', 'created_at', 'updated_at'];
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
    public function joinOke()
    {
        $builder = $this->db->table('tb_kamar');
        $builder->join('tb_fasilitas', 'tb_fasilitas.id_fasilitas = tb_kamar.id_fasilitas');
        $query = $builder->get();
        return $query->getResultArray();
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
