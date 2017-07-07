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
        $this->set('access_rules', $this->access_rules());
    }

    public function detail($id = FALSE) {
        parent::detail($id, array("pegawai_nip", "pegawai_nama", "jabatan_id", "id_profil"));
        $this->set("bread_crumb", array(
            "back_end/" . $this->_name => $this->_header_title,
            "#" => 'Formulir ' . $this->_header_title
        ));
        $this->load->model(array('model_master_jabatan', 'model_backbone_user'));
        $this->set('jabatan', $this->model_master_jabatan->get_all());
        $this->set('users', $this->model_backbone_user->get_all());
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model->get_like($keyword);
        $this->to_json($kategori_found);
    }

}
