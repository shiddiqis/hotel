<?php

// namespace App\Controllers;

// class Web extends BaseController
// {
//     public function index()
//     {
//         echo "hallo nama saya Code Igniter 4 salam Kenal";
//     }
//     public function komentar()
//     {
//         echo "ini adalah fungsi komentar";
//     }
//     /*$nama adalah parameter*/
//     /*bisa menggunakan lebih dri 1 parameter*/
//     /*cara memanggilnya yaitu dengan menulis di url setelah controller dan function*/
//     public function nama($nama, $umur)
//     {
//         echo "Haloo nama saya $nama dan berumur $umur";
//     }
//     /*membuat variable di controller trs dipanggil oleh view*/
//     public function biodata()
//     {
//         $data['nama'] = 'Rudy Eko Prasetya';
//         $data['alamat'] = 'Kediri';
//         return view('biodata', $data);
//     }
//     /*untuk hitung digunakan untuk menampilkan view kalkulator*/
//     public function hitung()
//     {
//         $data['judul'] = 'Kalkulator Sederhana';
//         $data['angka1'] = 0;
//         $data['angka2'] = 0;
//         $data['hasil'] = 0;
//         return view('kalkulator', $data);
//     }
//     /* fungsi proses digunakan untuk proses perhitungannya*/
    
//     /*$this->request->getPost('angka1'); digunakan untuk menangkap 
//     value dari form input dengan atribut name angka1 ataupun 2 */

//     /* code $data['hasil'] = $data['angka1'] * $data['angka2']; digunakan untuk
//     menghitung perkalian antara angka1 dan angka2 dan menyimpannya dalam variable hasil*/
//     public function proses()
//     {
//         $data['judul'] = 'Kalkulator Sederhana';
//         $data['angka1'] = $this->request->getPost('angka1');
//         $data['angka2'] = $this->request->getPost('angka2');
//         $data['hasil'] = $data['angka1'] * $data['angka2'];
//         return view('kalkulator', $data);
//     } }

