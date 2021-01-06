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
        $tmp=[];
        for($i=count($data)-1;$i>=0;$i--){
            if(substr($data[$i],0,11)=="Set-Cookie:"){
                $tmp2=explode(';',$data[$i]);
                array_push($tmp,substr($tmp2[0],strlen("Set-Cookie:"),strlen($tmp2[0])-strlen("Set-Cookie:")));
            }
                
        }

        return implode(';',$tmp);
    }

    public function token($data){
        $tmp=explode('<meta name="_token" content="',$data);
        $tmp2=explode('">',$tmp[1]);
        return $tmp2[0];
    }
}