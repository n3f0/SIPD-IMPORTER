<?php
namespace App\Models;

use CodeIgniter\Model;

class Program extends Model{
    protected $table            ="program";
    protected $primaryKey       ='id_program';
    protected $returnType       ='object';
    protected $allowedFields    = ['id_bidang_urusan','id_program','kode_program','nama_program'];
}