<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct($rules = array()) {
        parent::__construct($rules);
    }

    public function nama($str) {
        return (!preg_match("/^([a-zA-Z\. ])+$/i", $str)) ? FALSE : TRUE;
    }

    public function check_captcha($str) {
        return ($str != $this->CI->session->userdata('captcha')) ? FALSE : TRUE;
    }

    public function valid_date($str, $format) {
        switch ($format) {
            case 'dd/mm/yyyy':
                return (!preg_match('/^(0[0-9]|1[0-9]|2[0-9]|3[0-1])(-|\/)(0[0-9]|1[0-2])(-|\/)[0-9]{4}$/', $str)) ? FALSE : TRUE;
                break;
            case 'mm/dd/yyyy':
                return (!preg_match('/^(0[0-9]|1[0-2])(-|\/)(0[0-9]|1[0-9]|2[0-9]|3[0-1])(-|\/)[0-9]{4}$/', $str)) ? FALSE : TRUE;
                break;
            case 'yyyy/mm/dd':
                return (!preg_match('/^[0-9]{4}(-|\/)(0[0-9]|1[0-2])(-|\/)(0[0-9]|1[0-9]|2[0-9]|3[0-1])$/', $str)) ? FALSE : TRUE;
                break;
        }
        return FALSE;
    }

    public function valid_time($str) {
        return (!preg_match('/^(0[0-9]|1[0-9]|2[0-3])(-|:)[0-5][0-9]$/', $str)) ? FALSE : TRUE;
    }

    public function alamat($str) {
        return (!preg_match("/^([a-zA-Z0-9\.,\-\/\s ])+$/i", $str)) ? FALSE : TRUE;
    }

}
