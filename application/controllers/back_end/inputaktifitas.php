<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inputaktifitas extends Back_end {

    public $model = 'model_tr_aktifitas';

    public function __construct() {
        parent::__construct('kelola_transaksi_aktifitas', 'Input Aktifitas');
    }

    public function index() {
        parent::index();
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
    }

    public function detail($id = FALSE) {
        parent::detail($id, array("aktifitas_id", "tr_aktifitas_tanggal", "tr_aktifitas_volume", "tr_aktifitas_mulai", "tr_aktifitas_selesai", "tr_aktifitas_keterangan"));
        $this->set("bread_crumb", array(
            "back_end/" . $this->_name => $this->_header_title,
            "#" => 'Formulir ' . $this->_header_title
        ));
        $this->set("additional_js", "back_end/" . $this->_name . "/js/detail_js");
        $this->add_cssfiles(array("plugins/select2/select2.min.css"));
        $this->add_jsfiles(array("plugins/select2/select2.full.min.js"));
    }

}
