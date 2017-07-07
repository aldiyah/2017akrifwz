<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_jabatan extends MY_Model {

    public $sort_by = 'jabatan_id';
    public $sort_mode = 'asc';

    public function __construct() {
        parent::__construct("master_jabatan");
        $this->primary_key = "jabatan_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "jabatan_id" => array("jabatan_id", "ID Jabatan"),
        "keljab_id" => array("keljab_id", "ID Jabatan"),
        "jabatan_nama" => array("jabatan_nama", "Nama Jabatan"),
        "jabatan_keterangan" => array("jabatan_keterangan", "Keterangan Jabatan")
    );
    protected $rules = array(
        array("jabatan_id", ""),
        array("keljab_id", ""),
        array("jabatan_nama", ""),
        array("jabatan_keterangan", "")
    );
    protected $related_tables = array(
        "master_kelompok_jabatan" => array(
            "fkey" => "keljab_id",
            "columns" => array(
                "keljab_nama",
                "keljab_keterangan"
            ),
            "referenced" => "LEFT"
        )
    );
    protected $attribute_types = array();

}
