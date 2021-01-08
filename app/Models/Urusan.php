<?php
namespace App\Models;

use CodeIgniter\Model;

class Urusan extends Model{
    
    protected $table            ="urusan";
    protected $primaryKey       ='id_urusan';
    protected $returnType       ='object';
    protected $allowedFields    = ['kode_urusan','nama_urusan'];
    
}