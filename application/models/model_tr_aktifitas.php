<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/tr_aktifitas.php";

class Model_tr_aktifitas extends Tr_aktifitas {

    protected $rules = array(
        array("aktifitas_id", "required|is_natural_no_zero"),
        array("tr_aktifitas_tanggal", "required|valid_date[dd/mm/yyyy]"),
        array("tr_aktifitas_volume", "required|numeric"),
        array("tr_aktifitas_mulai", "required|valid_time"),
        array("tr_aktifitas_selesai", "required|valid_time"),
        array("tr_aktifitas_keterangan", "required|min_length[3]|max_length[200]")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE) {
        return parent::get_all(array("tr_aktifitas_keterangan")
                        , $this->table_name . ".created_by = '" . $this->username . "'", TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

}
