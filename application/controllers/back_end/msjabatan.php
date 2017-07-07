<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Msjabatan extends Back_end {

    public $model = 'model_master_jabatan';

    public function __construct() {
        parent::__construct('kelola_master_jabatan', 'Master Jabatan');
    }

    public function index() {
        parent::index();
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
        $this->set('access_rules', $this->access_rules());
    }

    public function detail($id = FALSE) {
        parent::detail($id, array("keljab_id", "jabatan_nama", "jabatan_keterangan"));
        $this->set("bread_crumb", array(
            "back_end/" . $this->_name => $this->_header_title,
            "#" => 'Formulir ' . $this->_header_title
        ));
        $this->load->model('model_master_kelompok_jabatan');
        $this->set('kelompok', $this->model_master_kelompok_jabatan->get_all());
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model->get_like($keyword);
        $this->to_json($kategori_found);
    }

}
