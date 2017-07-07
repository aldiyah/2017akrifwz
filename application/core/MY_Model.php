<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends LWS_Model {

    protected $user_detail;

    function __construct($table_name = '') {
        parent::__construct($table_name);
    }

    public function set_user_detail($user_detail) {
        $this->user_detail = $user_detail;
    }

    protected function set_insert_property() {
        parent::set_insert_property();
        $this->{$this->created_by_column_name} = $this->username;
    }

    protected function set_update_property() {
        parent::set_update_property($this->username);
    }

}
