<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kegiatan extends MY_Model {

    public $sort_by = 'kegiatan_kode';
    public $sort_mode = 'asc';

    public function __construct() {
        parent::__construct("master_kegiatan");
        $this->primary_key = "kegiatan_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "kegiatan_id" => array("kegiatan_id", "ID Kegiatan"),
        "kegiatan_kode" => array("kegiatan_kode", "Kode Kegiatan"),
        "kegiatan_nama" => array("kegiatan_nama", "Nama Kegiatan")
    );
    protected $rules = array(
        array("kegiatan_id", ""),
        array("kegiatan_kode", ""),
        array("kegiatan_nama", "")
    );
    protected $related_tables = array();
    protected $attribute_types = array();

}
