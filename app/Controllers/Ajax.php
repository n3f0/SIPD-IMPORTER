<?php
namespace App\Controllers;

use App\Libraries\Client;
use App\Models\Urusan;
use App\Models\Bidang;
use App\Models\Program;

class Ajax extends BaseController{

    public function __construct(){
        $this->uri=service('uri');
        $this->session=session();
        $this->client=new Client();
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
                echo json_encode($this->import_bidang());
                break;
            case 3:
                //Import data Program
                echo json_encode($this->import_program());
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

    private function import_bidang(){
        $bidang=new Bidang;
        $bidang->purgeDeleted();
        $url="https://".SIPD.".sipd.kemendagri.go.id/daerah/main/budget/urusan/2021/tampil-urusan/".$this->session->get('id_daerah')."/0";
        try{
            $data=$this->client->get($url,$this->session->get('cookie'));
            $json=json_decode($data['content'])->data;
            foreach($json as $row){
                $data=['id_bidang_urusan'=>$row->id_bidang_urusan,'id_urusan'=>$row->id_urusan,'kode_bidang_urusan'=>$row->kode_bidang_urusan,'nama_bidang_urusan'=>substr($row->nama_bidang_urusan,strpos($row->nama_bidang_urusan,' '),strlen($row->nama_bidang_urusan)-strpos($row->nama_bidang_urusan,' '))];
                $bidang->insert($data);
            }
            return ['result'=>'0','message'=>'success','data'=>$json];
        }catch(Exception $e){
            return ['result'=>'1','message'=>'Error Import data'];
        }
        
    }

    private function import_program(){
        $program=new Program;
        
        $url="https://".SIPD.".sipd.kemendagri.go.id/daerah/main/budget/program/2021/tampil-program/".$this->session->get('id_daerah')."/0";
        try{
            $data=$this->client->get($url,$this->session->get('cookie'));
            $json=json_decode($data['content'])->data;
            foreach($json as $row){
                $data=['id_bidang_urusan'=>$row->id_bidang_urusan,'id_program'=>$row->id_program,'kode_program'=>$row->kode_program,'nama_program'=>substr($row->nama_program,strpos($row->nama_program,' '),strlen($row->nama_program)-strpos($row->nama_program,' '))];
                $program->insert($data);
            }
            return ['result'=>'0','message'=>'success','data'=>$json];
        }catch(Exception $e){
            return ['result'=>'1','message'=>'Error Import data'];
        }
    }
}