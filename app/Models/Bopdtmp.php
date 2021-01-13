<?php
namespace App\Models;

use CodeIgniter\Model;
class Bopdtmp extends Model{
    protected $table            ="belanjaopd_tmp";
    protected $primaryKey       =['tahun','tahap','id_skpd'];
    protected $returnType       ='object';
    protected $allowedFields    = ['tahun','tahap','id_unit','id_skpd','kode_skpd','nama_skpd','total_giat','set_pagu_giat','set_pagu_skpd','pagu_giat','rinci_giat','totalgiat','batasanpagu','nilaipagu','nilaipagumurni','nilairincian','realisasi'];

}