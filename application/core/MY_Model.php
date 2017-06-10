<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends LWS_Model {

    protected $username;

    function __construct($table_name = '') {
        parent::__construct($table_name);
        $user_detail = $this->lmanuser->get("user_detail", $this->my_side);
        $_cfg_username = $this->config->item('backbone_user.username');
        $uname = $_cfg_username ? $_cfg_username : 'username';
        $this->username = $user_detail[$uname];
    }

    protected function set_insert_property() {
        parent::set_insert_property();
        $this->created_by_column_name = $this->username;
    }

    protected function set_update_property() {
        parent::set_update_property($this->username);
    }

}
