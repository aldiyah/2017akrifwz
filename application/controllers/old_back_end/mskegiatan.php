<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mskegiatan extends Back_end {

    public $model = 'model_master_kegiatan';

    public function __construct() {
        parent::__construct('kelola_master_kegiatan', 'Master Kegiatan');
    }

    public function index() {
        parent::index();
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
    }

    public function detail($id = FALSE) {
        parent::detail($id, array(
            "kegiatan_kode", "kegiatan_nama"
        ));

        $this->set("bread_crumb", array(
            "back_end/" . $this->_name => $this->_header_title,
            "#" => 'Formulir ' . $this->_header_title
        ));
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model_master_kegiatan->get_like($keyword);
        $this->to_json($kategori_found);
    }

}
