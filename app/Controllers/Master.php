<?php
namespace App\Controllers;

use App\Libraries\Client;

class Master extends BaseController{

    public function __construct(){
        $this->session = session();
		$this->client=new Client;
		if($this->session->get('cookie') && $this->session->get('token')&&$this->session->get('id_user')){
		}else{
			return redirect()->to(site_url('login'));
		}
    }

    public function index(){

    }

    public function urusan(){
        $url='https://'.SIPD.'.sipd.kemendagri.go.id/daerah/main/budget/urusan/2021/tampil-urusan/'.$this->session->get('id_daerah').'/0';
        $data=$this->client->get($url,$this->session->get('cookie'));
        echo $data['content'];
        //echo $this->session->get('cookie');
    }

    public function bidang(){

    }

    public function program(){

    }

    public function kegiatan(){

    }

    public function subkegiatan(){

    }

    public function akun(){

    }

    public function opd(){

    }
}