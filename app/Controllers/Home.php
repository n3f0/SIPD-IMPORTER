<?php namespace App\Controllers;

use App\Libraries\Client;

class Home extends BaseController
{

	public function __construct(){
		$this->session = session();
		$this->client=new Client;
		
		
	}
	public function index()
	{
			return view('home');	
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
