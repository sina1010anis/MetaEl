<?php

namespace App\Repository\Front\User;

use Exception;
use function PHPUnit\Framework\isNull;

class SecurityUserHistorySearch {

    private $json_file;
    public $json;
    public $data_user = null;
    private $address;
    private $username = null;

    public function __construct(String $name_file = 'history_search.json' ,$type = true){
        //Receipt json file and decode for php
        $this->address = $name_file;
        $this->json_file = file_get_contents(public_path($name_file));
        $this->json = json_decode($this->json_file , $type);
        return $this;
    }

    public function get_old_data(String $username)
    {
        //Announce receipt of old data to connect new data to old
        try{
            $this->username = $username;
            $this->data_user = $this->json[$username];
        }catch(Exception $e){}
        return $this;
        
    }

    public function set_new_data($data)
    {
        //To save new data
        $this->json[$this->username] =($this->data_user != null)? collect($this->data_user)->push($data) : [$data] ;
        return $this;
    }

    public function unique_data()
    {
        collect($this->data_user)->unique();
        return $this;
    }

    public function show_data($status = true)
    {
        //To display saved data
        return (($status) ? $this->json[$this->username] : $this->json);
    }

    public function put_file()
    {
        //To save and recover json files
        $this->json = json_encode($this->json);
        file_put_contents(public_path($this->address),$this->json);
        return $this;
    }

}
