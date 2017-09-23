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
        "tupoksi_id" => array("tupoksi_id", "ID Tupoksi"),
        "tupoksi_nama" => array("tupoksi_nama", "Nama Tupoksi"),
        "tupoksi_hukum" => array("tupoksi_hukum", "Dasar Hukum"),
        "tupoksi_tahun" => array("tupoksi_tahun", "Tahun"),
        "tupoksi_status" => array("tupoksi_status", "Status")
    );
    protected $rules = array(
        array("tupoksi_id", ""),
        array("tupoksi_nama", ""),
        array("tupoksi_hukum", ""),
        array("tupoksi_tahun", ""),
        array("tupoksi_status", "")
    );
    protected $related_tables = array();
    protected $attribute_types = array();

}
