<?php
namespace App\Models;

use CodeIgniter\Model;
class Princitmp extends Model{
    protected $table            ="princi_tmp";
    protected $primaryKey       =['id_pendapatan','id_skpd','tahun','tahap'];
    protected $returnType       ='object';
    protected $allowedFields    = ['id_pendapatan','kode_akun','nama_akun','uraian','skpd_koordinator','urusan_koordinator','program_koordinator','total','rekening','nilaimurni','id_skpd','tahun','tahap'];

}