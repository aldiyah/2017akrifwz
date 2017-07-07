<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Set_bawahan extends MY_Model {

    public $sort_by = 'pegawai_id';
    public $sort_mode = 'asc';

    public function __construct() {
        parent::__construct("set_bawahan");
        $this->primary_key = "bawahan_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "bawahan_id" => array("bawahan_id", "ID Bawahan"),
        "pegawai_id" => array("pegawai_id", "ID Pegawai"),
        "atasan_id" => array("atasan_id", "ID Atasan")
    );
    protected $rules = array(
        array("bawahan_id", ""),
        array("pegawai_id", ""),
        array("atasan_id", "")
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
        "master_jabatan" => array(
            "fkey" => "jabatan_id",
            "reference_to" => "master_pegawai",
            "columns" => array(
                "jabatan_nama"
            ),
            "referenced" => "LEFT"
        )
    );
    protected $attribute_types = array();

}
