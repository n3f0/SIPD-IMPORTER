<?php
namespace App\Controllers;

use App\Libraries\Client;

class login extends BaseController{

    public function __construct(){
        $this->client=new Client();
        $this->session=session();
    }

    public function index(){
        $url="https://".SIPD.".sipd.kemendagri.go.id/daerah?kXR8NMlu7z81k3Aeh6cs4RSVsvvRbF3k7heGR1qLeXxp/IRMD@AeNPzWxJHwLOzc4nFclz9BCPCM5ABRsZDIEqu2JDMcfg5Q2@DAITGqXHkvlI94msbz1oVmlQ0whqm3";
        $data=$this->client->get($url);
        $token=$this->client->token($data['content']);
        $cookie=$this->client->cookie($data['header']);
        $this->session->set('token',$token);
        $this->session->set('cookie',$cookie);
        return view('login');
    }

    public function verify(){
        //script login sipd
        //jika login berhasil redirect home
        //jika gagal redirect login/index
        $request=service('request');
        $url='https://'.SIPD.'sipd.kemendagri.go.id/daerah/login'
        $param="_token=".$this->session->get('token')."&env=main&region=daerah&skrim=".$request->getPost('cr64');
        $data=$this->client->post($url,$param,$this->session->get('cookie'));
        echo json_encode($data['content']);

    }
}