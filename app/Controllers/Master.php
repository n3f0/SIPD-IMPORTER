<?php
namespace App\Controllers;

use App\Libraries\Client;
use App\Models\Urusan;

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
        return redirect()->to(site_url('/'));
    }

    public function urusan(){
        $urusan=new Urusan();
        $data['urusan']=$urusan->findAll();
        return view('master/urusan',$data);
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