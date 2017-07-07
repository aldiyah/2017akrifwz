<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_tupoksi extends MY_Model {

    public function __construct() {
        parent::__construct("master_tupoksi");
        $this->primary_key = "tupoksi_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "tupoksi_id" => array("tupoksi_id", "ID Kategori"),
        "tupoksi_uraian" => array("tupoksi_uraian", "Uraian"),
        "tupoksi_hukum" => array("tupoksi_hukum", "Dasar Hukum"),
        "tupoksi_tahun" => array("tupoksi_tahun", "Tahun")
    );
    protected $rules = array(
        array("tupoksi_id", ""),
        array("tupoksi_uraian", ""),
        array("tupoksi_hukum", ""),
        array("tupoksi_tahun", "")
    );
    protected $related_tables = array();
    protected $attribute_types = array();

}
