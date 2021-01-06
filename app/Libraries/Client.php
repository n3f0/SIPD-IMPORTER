<?php
namespace App\Libraries;

class Client{

    public function post($url,$param,$cookie){

    }

    public function get($url,$cookie=''){
        $opt=[
            'http'=>[
                'method'=>'GET',
                'header'=>'Accept-language: en\r\n'.
                          'Cookie: '.$cookie
            ]
        ];
        $context=stream_context_create($opt);
        $result=file_get_contents($url,false,$context);

        $data=['header'=>$http_response_header,'content'=>$result];
        return $data;
    }

    public function Cookie($data){

    }

    public function token($data){
        $tmp=explode('<meta name="_token" content="',$data);
        $tmp2=explode('">',$tmp[1]);
        return $tmp2[0];
    }
}