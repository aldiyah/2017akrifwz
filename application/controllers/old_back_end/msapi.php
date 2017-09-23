<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of msapi
 *
 * @author Rinaldi
 */
class Msapi extends Back_end {

    protected $auto_load_model = FALSE;

    public function __construct() {
        parent::__construct();
    }

    public function like_nip() {
        $keyword = $this->input->post("keyword");
        $data = $this->_call_api('nipAutoComplete', array('nipAutoCompleteIn' => array('nip' => $keyword)));
        $this->to_json($data['autoCompleteOut']->nipAutoCompleteList->autoCompleteDetail);
    }

}
