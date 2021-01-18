<?php
namespace App\Models;

use CodeIgniter\Model;

class Bkegtmp extends Model{
    protected $table            =   "belanja_keg";
    protected $primaryKey       =   ['id_skpd','id_urusan','id_bidang_urusan','id_sub_skpd','id_program','id_giat','id_sub_giat'];
    protected $returnType       =   'object';
    protected $allowedFields    =   ['id_skpd','kode_skpd','nama_skpd','id_urusan','kode_urusan','nama_urusan','id_bidang_urusan','kode_bidang_urusan','nama_bidang_urusan','id_sub_skpd','kode_sub_skpd','nama_sub_skpd','id_program','kode_program','nama_program','id_giat','kode_giat','nama_giat','kode_bl','pagu_giat','rinci_giat','id_sub_giat','kode_sub_giat','nama_sub_giat','kode_sbl','pagu','pagu_indikatif','rincian','sub_giat_locked'];
}