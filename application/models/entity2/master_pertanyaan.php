<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pertanyaan extends MY_Model {

    public $sort_by = 'pertanyaan_isi';
    public $sort_mode = 'asc';

    public function __construct() {
        parent::__construct("master_pertanyaan");
        $this->primary_key = "pertanyaan_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "pertanyaan_id" => array("pertanyaan_id", "ID Pertanyaan"),
        "kategori_id" => array("kategori_id", "ID Kategori"),
        "pertanyaan_isi" => array("pertanyaan_isi", "Isi Pertanyaan"),
        "pertanyaan_jenis" => array("pertanyaan_jenis", "Jenis Pertanyaan"),
        "pertanyaan_status" => array("pertanyaan_status", "Status Pertanyaan")
    );
    protected $rules = array(
        array("pertanyaan_id", ""),
        array("kategori_id", ""),
        array("pertanyaan_isi", ""),
        array("pertanyaan_jenis", ""),
        array("pertanyaan_status", "")
    );
    protected $related_tables = array(
        "kategori_pertanyaan" => array(
            "fkey" => "kategori_id",
            "columns" => array(
                "kategori_nama",
                "kategori_keterangan"
            ),
            "referenced" => "LEFT"
        )
    );
    protected $attribute_types = array();

}
