<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Set_aktifitas extends MY_Model {

    public function __construct() {
        parent::__construct("set_aktifitas");
        $this->primary_key = "setaktif_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "setaktif_id" => array("setaktif_id", "ID Kegiatan"),
        "pegawai_id" => array("pegawai_id", "ID Pegawai"),
        "tupoksi_id" => array("tupoksi_id", "ID Tupoksi"),
        "aktifitas_id" => array("aktifitas_id", "ID Aktifitas")
    );
    protected $rules = array(
        array("setaktif_id", ""),
        array("pegawai_id", ""),
        array("tupoksi_id", ""),
        array("aktifitas_id", "")
    );
    protected $related_tables = array(
        "master_pegawai" => array(
            "fkey" => "pegawai_id",
            "columns" => array(
                "pegawai_nip",
                "pegawai_nama"
            ),
            "referenced" => "LEFT"
        ),
        "master_tupoksi" => array(
            "fkey" => "tupoksi_id",
            "columns" => array(
                "tupoksi_uraian"
            ),
            "referenced" => "LEFT"
        ),
        "master_aktifitas" => array(
            "fkey" => "aktifitas_id",
            "columns" => array(
                "aktifitas_nama"
            ),
            "referenced" => "LEFT"
        ),
        "master_kategori_aktifitas" => array(
            "fkey" => "kategori_id",
            "reference_to" => "master_aktifitas",
            "columns" => array(
                "kategori_nama"
            ),
            "referenced" => "LEFT"
        ),
    );
    protected $attribute_types = array();

}
