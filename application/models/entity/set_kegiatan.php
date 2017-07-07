<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Set_kegiatan extends MY_Model {

    public function __construct() {
        parent::__construct("set_kegiatan");
        $this->primary_key = "setgiat_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "setgiat" => array("setgiat", "ID Set Kegiatan"),
        "pegawai_id" => array("pegawai_id", "ID Pegawai"),
        "kegiatan_id" => array("kegiatan_id", "ID Kegiatan")
    );
    protected $rules = array(
        array("setgiat", ""),
        array("pegawai_id", ""),
        array("kegiatan_id", "")
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
        "master_kegiatan" => array(
            "fkey" => "kegiatan_id",
            "columns" => array(
                "kegiatan_kode",
                "kegiatan_nama"
            ),
            "referenced" => "LEFT"
        )
    );
    protected $attribute_types = array();

}
