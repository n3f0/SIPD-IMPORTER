<?php
namespace App\Controllers;

use App\Libraries\Client;

class Master extends BaseController{

    public function __construct(){
        $session = session();
		$this->client=new Client;
		if($session->get('cookie') && $session->get('token')&&$session->get('id_user')){
		}else{
			return redirect()->to(site_url('login'));
		}
    }

    public function index(){

    }

    public function urusan(){

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