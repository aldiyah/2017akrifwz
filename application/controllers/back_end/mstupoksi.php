<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mstupoksi extends Back_end {

    public $model = 'model_master_tupoksi';

    public function __construct() {
        parent::__construct('kelola_master_tupoksi', 'Master Tupoksi');
    }

    public function index() {
        parent::index();
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
        $this->set('access_rules', $this->access_rules());
    }

    public function detail($id = FALSE) {
        parent::detail($id, array(
            "tupoksi_uraian","tupoksi_hukum","tupoksi_tahun"
        ));

        $this->set("bread_crumb", array(
            "back_end/" . $this->_name => $this->_header_title,
            "#" => 'Formulir ' . $this->_header_title
        ));
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model_master_tupoksi->get_like($keyword);
        $this->to_json($kategori_found);
    }

}
