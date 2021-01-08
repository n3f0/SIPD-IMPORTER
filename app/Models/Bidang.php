<?php
namespace App\Models;

use CodeIgniter\Model;

class Bidang extends Model{
    protected $table            ="bidang";
    protected $primaryKey       ='id_bidang_urusan';
    protected $returnType       ='object';
    protected $allowedFields    = ['id_bidang_urusan','id_urusan','kode_bidang_urusan','nama_bidang_urusan'];
}