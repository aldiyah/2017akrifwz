<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_aktifitas extends MY_Model {

    public $sort_by = 'aktifitas_kode';
    public $sort_mode = 'asc';

    public function __construct() {
        parent::__construct("master_aktifitas");
        $this->primary_key = "aktifitas_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "aktifitas_id" => array("aktifitas_id", "ID Aktifitas"),
        "kategori_id" => array("kategori_id", "ID Kategori"),
        "aktifitas_kode" => array("aktifitas_kode", "Kode Aktifitas"),
        "aktifitas_nama" => array("aktifitas_nama", "Nama Aktifitas"),
        "aktifitas_output" => array("aktifitas_output", "Satuan Output"),
        "aktifitas_waktu" => array("aktifitas_waktu", "Lama Waktu"),
        "aktifitas_kesulitan" => array("aktifitas_kesulitan", "Tingkat Kesulitan"),
        "aktifitas_bobot" => array("aktifitas_bobot", "Bobot Aktifitas"),
        "aktifitas_status" => array("aktifitas_status", "Status Aktifitas")
    );
    protected $rules = array(
        array("aktifitas_id", ""),
        array("kategori_id", ""),
        array("aktifitas_kode", ""),
        array("aktifitas_nama", ""),
        array("aktifitas_output", ""),
        array("aktifitas_waktu", ""),
        array("aktifitas_kesulitan", "")
    );
    protected $related_tables = array(
        "kategori_aktifitas" => array(
            "fkey" => "kategori_id",
            "columns" => array(
                "kategori_nama",
                "kategori_keterangan"
            ),
            "referenced" => "LEFT"
        )
    );
    protected $attribute_types = array();

}
