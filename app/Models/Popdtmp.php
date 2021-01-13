<?php
namespace App\Models;

use CodeIgniter\Model;
class Popdtmp extends Model{
    protected $table            ="popd_tmp";
    protected $primaryKey       =['id_skpd','tahun','tahap'];
    protected $returnType       ='object';
    protected $allowedFields    = ['id_unit','id_skpd','kode_skpd','nama_skpd','nilaitotal','nilaimurni','tahun','tahap'];

}