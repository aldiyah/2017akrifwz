<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_max_poin extends MY_Model {

    public $sort_by = 'max_poin_peringkat';
    public $sort_mode = 'desc';

    public function __construct() {
        parent::__construct("master_max_poin");
        $this->primary_key = "max_poin_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "max_poin_id" => array("max_poin_id", "ID Max Poin"),
        "max_poin_jabatan" => array("max_poin_jabatan", "Max Poin Jabatan"),
        "max_poin_peringkat" => array("max_poin_peringkat", "Max Poin Peringkat"),
        "max_poin_nilai" => array("max_poin_nilai", "Max Poin Nilai"),
        "max_poin_tkd" => array("max_poin_tkd", "Max Poin TKD"),
        "max_poin_status" => array("max_poin_status", "Max Poin Status")
    );
    protected $rules = array(
        array("max_poin_id", ""),
        array("max_poin_jabatan", ""),
        array("max_poin_peringkat", ""),
        array("max_poin_nilai", ""),
        array("max_poin_tkd", ""),
        array("max_poin_status", "")
    );
    protected $related_tables = array();
    protected $attribute_types = array();

}
