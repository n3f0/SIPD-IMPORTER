<?php

namespace App\Libraries;

use \PDO;
class Sipkd{
    private $conn;
    private $user='usadi';
    private $pwd ='valid49';

    public function __construct(){
        try{
            $this->conn=new PDO('sqlsrv:server=192.168.13.43 ;Database=v@lid49v6_2021',$this->user,$this->pwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e){
            die(print_r($e->getMessage()));
        }
    }

    public function get($sql,$param){
        try{
            $qr=$this->conn->prepare($sql);
            if($param!=null){
                if($qr->execute($param)){
                    $result=$qr->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return null;
                }
            }else{
                if($qr->execute()){
                    $result=$qr->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return null;
                }
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return null;
        }
    }

    public function update($sql,$param){
        try{
            $qr=$this->conn->prepare($sql);
            if($qr->execute($param)){
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
            return false;
        }
    }

}