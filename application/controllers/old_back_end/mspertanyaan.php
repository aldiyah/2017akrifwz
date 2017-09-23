<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mspertanyaan extends Back_end {

    public $model = 'model_master_pertanyaan';

    public function __construct() {
        parent::__construct('kelola_master_pertanyaan', 'Master Pertanyaan');
        $this->load->model(array('model_kategori_pertanyaan','model_jenis_pegawai'));
    }

    public function index() {
        parent::index();
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
    }
    
    protected function __set_jenis_pegawai(&$items, $key){
        $items->pertanyaan_jenis_text = $this->model_jenis_pegawai->get_by_id($items->pertanyaan_jenis);
    }
    
    protected function after_get_paging($record_set){
        if($record_set && is_array($record_set)){
            array_walk($record_set, array($this, '__set_jenis_pegawai'));
        }
        return $record_set;
    }

    public function detail($id = FALSE) {
        parent::detail($id, array("kategori_id", "pertanyaan_isi", "pertanyaan_jenis", "pertanyaan_status"));
        $this->set("bread_crumb", array(
            "back_end/" . $this->_name => $this->_header_title,
            "#" => 'Formulir ' . $this->_header_title
        ));
        
//        echo $this->model_jenis_pegawai->get_by_id(3);
        
        $this->set('kategori', $this->model_kategori_pertanyaan->get_all());
        $this->set('jenis', $this->model_jenis_pegawai->get_jenis_pegawai());
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model_master_pertanyaan->get_like($keyword);
        $this->to_json($kategori_found);
    }

}
