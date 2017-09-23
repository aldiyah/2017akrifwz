<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ktaktifitas extends Back_end {

    public $model = 'model_kategori_aktifitas';

    public function __construct() {
        parent::__construct('kelola_kategori_aktifitas', 'Kategori Aktifitas');
    }

    public function index() {
        parent::index();
        $this->set("bread_crumb", array(
            "back_end/msaktifitas" => "Master Aktifitas",
            "#" => $this->_header_title
        ));
    }

    public function detail($id = FALSE) {
        parent::detail($id, array(
            "kategori_nama", "kategori_keterangan"
        ));

        $this->set("bread_crumb", array(
            "back_end/msaktifitas" => "Master Aktifitas",
            "back_end/" . $this->_name => $this->_header_title,
            "#" => 'Formulir ' . $this->_header_title
        ));
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model_kategori_aktifitas->get_like($keyword);
        $this->to_json($kategori_found);
    }

}
