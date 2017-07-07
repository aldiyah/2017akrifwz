<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Back_end extends Lwpustaka_data {

    protected $backend_controller_location = "back_end/";
    protected $myid = 0;
    protected $pegawai_id = 0;
    protected $keljab = 0;

    public function __construct($cmodul_name = FALSE, $header_title = FALSE) {
        $this->is_front_end = FALSE;
        parent::__construct($cmodul_name, $header_title);
        $this->_layout = $this->config->item('application_active_layout');
        $this->init_back_end();
        if (!$this->is_authenticated()) {
            redirect('login');
        }
        $this->myid = $this->user_detail['id_user'];
        if ($this->user_detail['pegawai_id'] != NULL) {
            $this->pegawai_id = $this->user_detail['pegawai_id'];
        }
        $this->keljab = $this->user_detail['keljab_id'];
    }

    private function init_back_end() {
        $this->my_location = "back_end/";
        $this->init_backend_menu();
        $this->backend_controller_location = $this->my_location . $this->_name;
        $this->set("controller_location", $this->backend_controller_location);
    }

}
