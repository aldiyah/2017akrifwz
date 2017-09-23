<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tp_aktifitas extends MY_Model {

    public function __construct() {
        parent::__construct("tp_aktifitas");
        $this->primary_key = "tp_aktifitas_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "tp_aktifitas_id" => array("tp_aktifitas_id", "ID Aktifitas Tupoksi"),
        "uraian_id" => array("uraian_id", "ID Uraian"),
        "aktifitas_id" => array("aktifitas_id", "ID Aktifitas"),
    );
    protected $rules = array(
        array("tp_aktifitas_id", ""),
        array("uraian_id", ""),
        array("aktifitas_id", "")
    );
    protected $related_tables = array(
        "tp_uraian" => array(
            "fkey" => "uraian_id",
            "columns" => array(
                "uraian_uraian"
            ),
            "referenced" => "LEFT"
        ),
        "master_tupoksi" => array(
            "fkey" => "tupoksi_id",
            "reference_to" => "tp_uraian",
            "columns" => array(
                "tupoksi_nama",
                "tupoksi_tahun"
            ),
            "referenced" => "LEFT"
        ),
        "master_aktifitas" => array(
            "fkey" => "aktifitas_id",
            "columns" => array(
                "aktifitas_nama",
                "aktifitas_output",
                "aktifitas_waktu",
                "aktifitas_kesulitan",
                "aktifitas_bobot",
                "aktifitas_nama",
            ),
            "referenced" => "LEFT"
        ),
        "kategori_aktifitas" => array(
            "fkey" => "kategori_id",
            "reference_to" => "master_aktifitas",
            "columns" => array(
                "kategori_nama"
            ),
            "referenced" => "LEFT"
        )
    );
    protected $attribute_types = array(
        "tp_aktifitas_id" => "NUMERIC",
        "uraian_id" => "NUMERIC",
        "aktifitas_id" => "NUMERIC"
    );

}
