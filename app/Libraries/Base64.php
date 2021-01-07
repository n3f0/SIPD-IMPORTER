<?php
namespace App\Libraries;

class Base64{
    private $key="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    public function encode($param){
        $t="";
        $e=utf8_encode($param);
        $f=0;
        
        while($f<strlen($e)){
            $n=ord($e{$f++});
            $r=ord($e{$f++});
            $i=ord($e{$f++});
            $s=$n>>2;
            $o=($n&3)<<4|$r>>4;
            $u=($r&15)<<2|$i>>6;
            $a=$i&63;
            if(is_nan($r))
                $u=$a=64;
            else if(is_nan($i))
                $a=64;
            $t.=$this->key{$s}.$this->key{$o}.$this->key{$u}.$this->key{$a};
            echo $f;
        }
        return $t;
    }
}