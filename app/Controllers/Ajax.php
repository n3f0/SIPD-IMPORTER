<?php
namespace App\Controllers;

use App\Libraries\Client;
use App\Models\Urusan;

class Ajax extends BaseController{

    public function __construct(){
        $this->uri=service('uri');
    }

    public function index(){
        echo "No direct Access!";
    }

    public function load(){
        
    }

    public function edit(){

    }

    public function delete(){

    }

    public function import(){
        $opt=$this->uri->getSegment(3);
        switch($opt){
            case 1:
                //Import data Urusan
                break;
            case 2:
                //Import data bidang urusan
                break;
            case 3:
                //Import data Program
                break;
            case 4:
                //Import data Kegiatan
                break;
            case 5:
                //Import data SubKegiatan
                break;
            case 6:
                //Import data Akun
                break;
            case 7:
                //import data OPD
                break;
            default:
                echo json_encode(['result'=>'1','message'=>'Error Request','data'=>[]]);
        }
    }

    private function import_urusan(){
        
    }
}