<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/master_kelompok_jabatan.php";

class Model_master_kelompok_jabatan extends Master_kelompok_jabatan {

    protected $rules = array(
        array("keljab_nama", "required|min_length[3]|max_length[20]"),
        array("keljab_keterangan", "required|min_length[3]|max_length[200]")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE) {
        return parent::get_all(array(
                    "keljab_nama", "keljab_keterangan"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

}
