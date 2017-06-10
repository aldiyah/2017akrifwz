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
        $this->set("additional_js", "back_end/" . $this->_name . "/js/detail_js");
        $this->add_cssfiles(array("plugins/select2/select2.min.css"));
        $this->add_jsfiles(array("plugins/select2/select2.full.min.js"));
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model_master_aktifitas->get_like($keyword);
        $this->to_json($kategori_found);
    }

}
