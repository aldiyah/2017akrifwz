<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kategori_aktifitas extends MY_Model {

    public $sort_by = 'kategori_nama';
    public $sort_mode = 'asc';

    public function __construct() {
        parent::__construct("master_kategori_aktifitas");
        $this->primary_key = "kategori_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "kategori_id" => array("kategori_id", "ID Kategori"),
        "kategori_nama" => array("kategori_nama", "Nama Kategori"),
        "kategori_keterangan" => array("kategori_keterangan", "Keterangan Kategori")
    );
    protected $rules = array(
        array("kategori_id", ""),
        array("kategori_nama", ""),
        array("kategori_keterangan", "")
    );
    protected $related_tables = array();
    protected $attribute_types = array();

}
