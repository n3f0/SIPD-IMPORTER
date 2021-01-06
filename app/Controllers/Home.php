<?php namespace App\Controllers;

use App\Libraries\Client;

class Home extends BaseController
{
	public function __construct(){
		$this->client=new Client;
	}
	public function index()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
