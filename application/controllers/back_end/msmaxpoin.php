<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Msmaxpoin extends Back_end {

    public $model = 'model_master_max_poin';

    public function __construct() {
        parent::__construct('kelola_master_max_poin', 'Master Max Poin');
    }

    public function index() {
        parent::index();
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
        $this->set('access_rules', $this->access_rules());
    }

    public function detail($id = FALSE) {
        parent::detail($id, array("max_poin_jabatan", "max_poin_peringkat", "max_poin_nilai", "max_poin_tkd"));
        $this->set("bread_crumb", array(
            "back_end/" . $this->_name => $this->_header_title,
            "#" => 'Formulir ' . $this->_header_title
        ));
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model_master_max_poin->get_like($keyword);
        $this->to_json($kategori_found);
    }

}
