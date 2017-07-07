<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kelompok_jabatan extends MY_Model {

    public $sort_by = 'keljab_id';
    public $sort_mode = 'asc';

    public function __construct() {
        parent::__construct("master_kelompok_jabatan");
        $this->primary_key = "keljab_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "keljab_id" => array("keljab_id", "ID Kelompok Jabatan"),
        "keljab_nama" => array("keljab_nama", "Nama Kelompok Jabatan"),
        "keljab_keterangan" => array("keljab_keterangan", "Keterangan Kelompok Jabatan")
    );
    protected $rules = array(
        array("keljab_id", ""),
        array("keljab_nama", ""),
        array("keljab_keterangan", "")
    );
    protected $related_tables = array();
    protected $attribute_types = array();

}
