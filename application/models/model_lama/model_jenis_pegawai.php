<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Model_jenis_pegawai extends MY_Model {
    
    public $jenis_pegawai = [];

    public function __construct() {
        parent::__construct();
        $this->__set_temp_jenis_pegawai();
    }
    
    private function __set_temp_jenis_pegawai(){
        $this->jenis_pegawai = [
            "staff",
            "kasie",
            "kabid",
            "kadin",
            "sekda",
            "kada",
        ];
    }
    
    private function __set_value_jenis_pegawai(&$items, &$key){
        $items++;
    }
    
    public function get_jenis_pegawai(){
        $arr_data = array_flip($this->jenis_pegawai);
        array_walk($arr_data, array($this, '__set_value_jenis_pegawai'));
        return array_flip($arr_data);
    }
    
    public function get_by_id($id=FALSE){
        $response = FALSE;
        if($id){
            $arr_data = $this->get_jenis_pegawai();
            $response = array_key_exists($id, $arr_data) ? $arr_data[$id] : FALSE;
            unset($arr_data);
        }
        return $response;
    }

    //put your code here
}
