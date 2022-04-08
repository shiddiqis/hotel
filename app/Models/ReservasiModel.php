<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservasiModel extends Model
{
    //membuat properti untuk Model
    protected $db;
    protected $table = 'tb_res';
    protected $primaryKey = 'id_reservasi';
    protected $allowedFields = ['id_reservasi', 'id_user', 'id_kamar', 'checkin', 'checkout', 'pembayaran', 'statusr', 'created_at', 'updated_at'];
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
        $builder = $this->db->table('tb_res');
        $builder
            ->join('tb_kamar', 'tb_kamar.id_kamar = tb_res.id_kamar')
            ->join('tb_user', 'tb_user.id_user = tb_res.id_user');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function filterjoinOke($checkin, $checkout)
    {
        $query = "SELECT tb_res.id_reservasi, tb_user.username, tb_kamar.nama_kamar, tb_kamar.tipe_kamar, tb_res.checkin, tb_res.checkout, tb_res.statusr, tb_res.pembayaran FROM tb_res JOIN tb_kamar ON tb_res.id_kamar=tb_kamar.id_kamar JOIN tb_user ON tb_res.id_user=tb_user.id_user WHERE tb_res.checkin>='" . $checkin . "' AND tb_res.checkout<='" . $checkout . "'";
        $data = $this->db->query($query)->getResultArray();
        return $data;
    }
    // public function joinOye()
    // {
    //     $builder = $this->db->table('tb_res');
    //     $builder->join('tb_fasilitas', 'tb_fasilitas.id_fasilitas = tb_kamar.id_fasilitas');
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }
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
