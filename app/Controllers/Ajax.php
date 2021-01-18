<?php
namespace App\Controllers;

use App\Libraries\Client;
use App\Models\Urusan;
use App\Models\Bidang;
use App\Models\Program;
use App\Models\Kegtmp;
use App\Models\Popdtmp;
use App\Models\Princitmp;
use App\Models\Bopdtmp;
use App\Models\Bkegtmp;

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
                echo json_encode($this->import_kegiatan());
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
            case 8:
                //import data pendapatan
                echo json_encode($this->import_pendapatan_opd(2021,2));
                break;
            case 9:
                //import detail pendapatan apbd
                echo json_encode($this->import_pendapatan_rinci($this->uri->getSegment(4),2021,2));
                break;
            case 10:
                echo json_encode($this->import_belanja_opd(2));
                break;
            case 11:
                echo json_encode($this->import_belanjakeg(2,$this->uri->getSegment(4)));
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

    private function import_kegiatan(){
        $kegiatan=new Kegtmp;
        $url="https://".SIPD.".sipd.kemendagri.go.id/daerah/main/budget/subgiat/2021/tampil-sub-giat/".$this->session->get('id_daerah')."/0?filter_program=&filter_giat=&filter_sub_giat=";
        try{
            $data=$this->client->get($url,$this->session->get('cookie'));
            $json=json_decode($data['content'])->data;
            foreach($json as $row){
                $data=["id_urusan"          =>$row->id_urusan,
                       "kode_urusan"        =>$row->kode_urusan,
                       "nama_urusan"        =>substr($row->nama_urusan,strpos($row->nama_urusan,' '),strlen($row->nama_urusan)-strpos($row->nama_urusan,' ')),
                       "id_bidang_urusan"   =>$row->id_bidang_urusan,
                       "kode_bidang_urusan" =>$row->kode_bidang_urusan,
                       "nama_bidang_urusan" =>substr($row->nama_bidang_urusan,strpos($row->nama_bidang_urusan,' '),strlen($row->nama_bidang_urusan)-strpos($row->nama_bidang_urusan,' ')),
                       "id_program"         =>$row->id_program,
                       "kode_program"       =>$row->kode_program,
                       "nama_program"       =>substr($row->nama_program,strpos($row->nama_program,' '),strlen($row->nama_program)-strpos($row->nama_program,' ')),
                       "id_giat"            =>$row->id_giat,
                       "kode_giat"          =>$row->kode_giat,
                       "nama_giat"          =>substr($row->nama_giat,strpos($row->nama_giat,' '),strlen($row->nama_giat)-strpos($row->nama_giat,' ')),
                       "id_sub_giat"        =>$row->id_sub_giat,
                       "kode_sub_giat"      =>$row->kode_sub_giat,
                       "nama_sub_giat"      =>substr($row->nama_sub_giat,strpos($row->nama_sub_giat,' '),strlen($row->nama_sub_giat)-strpos($row->nama_sub_giat,' '))];
                $kegiatan->insert($data);
            }
            return ['result'=>'0','message'=>'success','data'=>$json];
            
        }catch(Exception $e){
            return ['result'=>'1','message'=>'Error Import data'];
        }
    }

    private function import_pendapatan_opd($tahun,$tahap){
        $popdtmp=new Popdtmp;
        $url="https://".SIPD.".sipd.kemendagri.go.id/daerah/main/budget/pendapatan/2021/ang/tampil-unit/".$this->session->get("id_daerah")."/0";
        try{
            $data=$this->client->get($url,$this->session->get('cookie'));
            $json=json_decode($data['content'])->data;
            foreach($json as $row){
                $dat=['id_unit'     =>$row->id_unit,
                    'id_skpd'       =>$row->id_skpd,
                    'kode_skpd'     =>$row->kode_skpd,
                    'nama_skpd'     =>substr($row->nama_skpd->nama_skpd,strpos($row->nama_skpd->nama_skpd,' '),strlen($row->nama_skpd->nama_skpd)-strpos($row->nama_skpd->nama_skpd,' ')),
                    'nilaitotal'   =>(float)$row->nilaitotal,
                    'nilaimurni'   =>(float)$row->nilaimurni,
                    'tahun'         =>$tahun,
                    'tahap'         =>$tahap
                    ];
                $popdtmp->insert($dat);
            }
            return ['result'=>'0','message'=>'success','data'=>$json];
        }catch(Exception $e){
            return ['result'=>'1','message'=>'Error Import data'];
        }
    }

    private function import_pendapatan_rinci($id_skpd,$tahun,$tahap){
        $princitmp=new Princitmp;
        $url="https://".SIPD.".sipd.kemendagri.go.id/daerah/main/budget/pendapatan/2021/ang/tampil-pendapatan/".$this->session->get('id_daerah')."/".$id_skpd;
        try{
            $data=$this->client->get($url,$this->session->get('cookie'));
            $json=json_decode($data['content'])->data;
            foreach($json as $row){
                $dat=[
                    'id_pendapatan'     =>$row->id_pendapatan,
                    'kode_akun'         =>$row->kode_akun,
                    'nama_akun'         =>$row->nama_akun,
                    'uraian'            =>$row->uraian,
                    'skpd_koordinator'  =>$row->skpd_koordinator,
                    'urusan_koordinator'    =>$row->urusan_koordinator,
                    'program_koordinator'   =>$row->program_koordinator,
                    'total'             =>$row->total,
                    'rekening'          =>$row->rekening,
                    'nilaimurni'        =>$row->nilaimurni,
                    'id_skpd'           =>$id_skpd,
                    'tahun'             =>$tahun,
                    'tahap'             =>$tahap
                ];
                $princitmp->insert($dat);
            }
            return ['result'=>'0','message'=>'success','data'=>$json];
        }catch(Exception $e){
            return ['result'=>'1','message'=>'Error Import data'];
        }
    }

    private function import_belanja_opd($tahap){
        $bopdtmp=new Bopdtmp;
        $url="https://".SIPD.".sipd.kemendagri.go.id/daerah/main/budget/belanja/2021/giat/tampil-unit/".$this->session->get('id_daerah')."/0";
        try{
            $data=$this->client->get($url,$this->session->get('cookie'));
            $json=json_decode($data['content'])->data;
            foreach($json as $row){
                $dat=[
                    'tahun'=>$row->tahun,
                    'tahap'=>$tahap,
                    'id_unit'=>$row->id_unit,
                    'id_skpd'=>$row->id_skpd,
                    'kode_skpd'=>$row->kode_skpd,
                    'nama_skpd'=>substr($row->nama_skpd->nama_skpd,strpos($row->nama_skpd->nama_skpd,' '),strlen($row->nama_skpd->nama_skpd)-strpos($row->nama_skpd->nama_skpd,' ')),
                    'total_giat'=>$row->total_giat,
                    'set_pagu_giat'=>($row->set_pagu_giat!==null)?$row->set_pagu_giat:0,
                    'set_pagu_skpd'=>$row->set_pagu_skpd,
                    'pagu_giat'=>($row->pagu_giat!==null)?$row->pagu_giat:0,
                    'rinci_giat'=>($row->rinci_giat!==null)?$row->rinci_giat:0,
                    'totalgiat'=>$row->totalgiat,
                    'batasanpagu'=>$row->batasanpagu,
                    'nilaipagu'=>($row->nilaipagu!==null)?$row->nilaipagu:0,
                    'nilaipagumurni'=>($row->nilaipagumurni!==null)?$row->nilaipagumurni:0,
                    'nilairincian'=>($row->nilairincian!==null)?$row->nilairincian:0,
                    'realisasi'=>($row->realisasi!==null)?$row->realisasi:0
                ];
                $bopdtmp->insert($dat);
            }
            return ['result'=>'0','message'=>'success','data'=>$json];
        }catch(Exception $e){
            return ['result'=>'1','message'=>'Error Import data'];
        }
    }

    private function import_belanjakeg($tahap,$id_skpd){
        $bkegtmp=new Bkegtmp;
        $url="https://".SIPD.".sipd.kemendagri.go.id/daerah/main/budget/belanja/2021/giat/tampil-giat/".$this->session->get('id_daerah')."/".$id_skpd;
        try{
            $data=$this->client->get($url,$this->session->get('cookie'));
            $json=json_decode($data['content'])->data;
            foreach($json as $row){
                $dat=[
                    'id_skpd'           =>$row->id_skpd,
                    'kode_skpd'         =>$row->kode_skpd,
                    'nama_skpd'         =>substr($row->nama_skpd,strpos($row->nama_skpd,' '),strlen($row->nama_skpd)-strpos($row->nama_skpd,' ')),
                    'id_urusan'         =>$row->id_urusan,
                    'kode_urusan'       =>$row->kode_urusan,
                    'nama_urusan'       =>substr($row->nama_urusan,strpos($row->nama_urusan,' '),strlen($row->nama_urusan)-strpos($row->nama_urusan,' ')),
                    'id_bidang_urusan'  =>$row->id_bidang_urusan,
                    'kode_bidang_urusan'=>$row->kode_bidang_urusan,
                    'nama_bidang_urusan'=>substr($row->nama_bidang_urusan,strpos($row->nama_bidang_urusan,' '),strlen($row->nama_bidang_urusan)-strpos($row->nama_bidang_urusan,' ')),
                    'id_sub_skpd'       =>$row->id_sub_skpd,
                    'kode_sub_skpd'     =>$row->kode_sub_skpd,
                    'nama_sub_skpd'     =>$row->nama_sub_skpd,
                    'id_program'        =>$row->id_program,
                    'kode_program'      =>$row->kode_program,
                    'nama_program'      =>substr($row->nama_program,strpos($row->nama_program,' '),strlen($row->nama_program)-strpos($row->nama_program,' ')),
                    'id_giat'           =>$row->id_giat,
                    'kode_giat'         =>$row->kode_giat,
                    'nama_giat'         =>substr($row->nama_giat->nama_giat,strpos($row->nama_giat->nama_giat,' '),strlen($row->nama_giat->nama_giat)-strpos($row->nama_giat->nama_giat,' ')),
                    'kode_bl'           =>$row->nama_giat->kode_bl,
                    'pagu_giat'         =>($row->pagu_giat!==null)?$row->pagu_giat:0,
                    'rinci_giat'        =>($row->rinci_giat!==null)?$row->rinci_giat:0,
                    'id_sub_giat'       =>$row->id_sub_giat,
                    'kode_sub_giat'     =>$row->kode_sub_giat,
                    'nama_sub_giat'     =>substr($row->nama_sub_giat->nama_sub_giat,strpos($row->nama_sub_giat->nama_sub_giat,' '),strlen($row->nama_sub_giat->nama_sub_giat)-strpos($row->nama_sub_giat->nama_sub_giat,' ')),
                    'kode_sbl'          =>$row->kode_sbl,
                    'pagu'              =>($row->pagu!==null)?$row->pagu:0,
                    'pagu_indikatif'    =>$row->pagu_indikatif,
                    'rincian'           =>($row->rincian!==null)?$row->rincian:0,
                    'sub_giat_locked'   =>$row->sub_giat_locked
                ];
                $bkegtmp->insert($dat);
            }
            return ['result'=>'0','message'=>'success','data'=>$json];
        }catch(Exception $e){
            return ['result'=>'1','message'=>'Error Import data'];
        }
    }

}