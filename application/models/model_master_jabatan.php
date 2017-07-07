<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/master_jabatan.php";

class Model_master_jabatan extends Master_jabatan {

    protected $rules = array(
        array("keljab_id", "required|is_natural_no_zero"),
        array("jabatan_nama", "required|min_length[3]|max_length[50]"),
        array("jabatan_keterangan", "required|min_length[3]|max_length[200]")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE) {
        return parent::get_all(array(
                    "jabatan_nama", "jabatan_keterangan"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

}
