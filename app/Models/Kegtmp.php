<?php
namespace App\Models;

use CodeIgniter\Model;

class Kegtmp extends Model{
    protected $table            ="kegiatan_tmp";
    protected $primaryKey       =['id_urusan','id_bidang_urusan','id_program','id_giat','id_sub_giat'];
    protected $returnType       ='object';
    protected $allowedFields    = ["id_urusan","kode_urusan","nama_urusan","id_bidang_urusan","kode_bidang_urusan","nama_bidang_urusan","id_program","kode_program","nama_program","id_giat","kode_giat","nama_giat","id_sub_giat","kode_sub_giat","nama_sub_giat"];
}