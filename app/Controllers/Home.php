<?php namespace App\Controllers;

use App\Libraries\Client;

class Home extends BaseController
{
	public function __construct(){
		$this->client=new Client;
		
	}
	public function index()
	{
		$session = \Config\Services::session($config);

		return view('home');
	}


	public function test(){

		$url="https://".SIPD.".sipd.kemendagri.go.id/daerah";

		$data=$this->client->get($url);
		
		echo $this->client->Cookie($data['header']);
	}
	//--------------------------------------------------------------------

}
