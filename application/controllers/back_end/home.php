<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Back_end {

    protected $auto_load_model = FALSE;

    public function can_access() {
        return TRUE;
    }

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->set("header_title", 'Home');
    }

}
