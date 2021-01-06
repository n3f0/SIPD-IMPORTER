<?php namespace App\Controllers;

use App\Libraries\Client;

class Home extends BaseController
{
	public function __construct(){
		$this->client=new Client;
		
	}
	public function index()
	{
		$session = session();
		if($session->get('cookie') && $session->get('token')){
			return view('home');
		}else{
			return redirect()->to(site_url('login'));
		}

		
	}

	public function login(){
		return view('login');
	}


	public function test(){
		$session=session();

		$url="https://".SIPD.".sipd.kemendagri.go.id/daerah";

		$data=$this->client->get($url);
		
		echo $this->client->Cookie($data['header']);
	}
	//--------------------------------------------------------------------

}
