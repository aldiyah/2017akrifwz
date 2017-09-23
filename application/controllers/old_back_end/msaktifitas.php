<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Msaktifitas extends Back_end {

    public $model = 'model_master_aktifitas';

    public function __construct() {
        parent::__construct('kelola_master_aktifitas', 'Master Aktifitas');
    }

    public function index() {
        parent::index();
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
    }

    public function detail($id = FALSE) {
        parent::detail($id, array("kategori_id", "aktifitas_kode", "aktifitas_nama", "aktifitas_output", "aktifitas_waktu", "aktifitas_kesulitan"));
        $this->set("bread_crumb", array(
            "back_end/" . $this->_name => $this->_header_title,
            "#" => 'Formulir ' . $this->_header_title
        ));
        $this->load->model('model_kategori_aktifitas');
        $this->set('kategori', $this->model_kategori_aktifitas->get_all());
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model_master_aktifitas->get_like($keyword);
        $this->to_json($kategori_found);
    }

}
