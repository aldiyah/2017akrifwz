<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tp_uraian extends MY_Model {

    public function __construct() {
        parent::__construct("tp_uraian");
        $this->primary_key = "uraian_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "uraian_id" => array("uraian_id", "ID Uraian"),
        "tupoksi_id" => array("tupoksi_id", "ID Tupoksi"),
        "uraian_uraian" => array("uraian_uraian", "Uraian"),
        "uraian_status" => array("uraian_status", "Status")
    );
    protected $rules = array(
        array("uraian_id", ""),
        array("tupoksi_id", ""),
        array("uraian_uraian", ""),
        array("uraian_status", "")
    );
    protected $related_tables = array(
        "master_tupoksi" => array(
            "fkey" => "tupoksi_id",
            "columns" => array(
                "tupoksi_nama",
                "tupoksi_tahun"
            ),
            "referenced" => "LEFT"
        )
    );
    protected $attribute_types = array(
        "tupoksi_id" => "NUMERIC",
        "uraian_status" => "NUMERIC"
    );

}
