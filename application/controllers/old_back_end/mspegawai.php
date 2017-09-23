<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mspegawai extends Back_end {

    public $model = 'model_master_pegawai';

    public function __construct() {
        parent::__construct('kelola_master_pegawai', 'Master Pegawai');
    }

    public function index() {
        parent::index();
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model->get_like($keyword);
        $this->to_json($kategori_found);
    }

}
