<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class aktifitasharian extends Back_end {

    public $model = 'model_tr_aktifitas';

    public function __construct() {
        parent::__construct('kelola_transaksi_aktifitas', 'Aktifitas Harian');
        $this->load->model(array(
            'model_master_aktifitas'
        ));
    }

    public function index($date = FALSE) {
        $tgl = $date != FALSE ? $date : date('Y-m-d');
        $this->set('tanggal', $tgl);
        $this->set('header_title', $this->_header_title . ' per ' . $tgl);
        $this->set('keyword', NULL);
        $records = $this->model_tr_aktifitas->get_aktifitas_harian($this->pegawai_id, $tgl);


//        $utama = FALSE;
//        if ($aktifitas) {
//            foreach ($aktifitas as $row) {
//                $utama[] = array(
//                    'aktifitas' => $row,
//                    'kegiatan' => $this->model_set_tugas->get_aktifitas($row->setaktif_id),
//                    'laporan' => $this->model_tr_aktifitas->get_laporan($this->pegawai_id, $row->aktifitas_id, $tgl)
//                );
//            }
//        }
//        $umum = $this->model_tr_aktifitas->get_laporan($this->pegawai_id, 0, $tgl);
//        $absensi = $this->_call_api('checkInOut', array(
//            'checkInOutIn' => array(
//                'nip' => $this->pegawai_nip,
//                'checkTime' => date('d-m-Y', strtotime($tgl))
//            )
//        ));
//        $this->set('id_pegawai', $this->pegawai_id);
////        $this->set('absensi', isset($absensi['checkInOutOut']->checkInOutList->checkInOut) ? TRUE : FALSE);
        $this->set('absensi', TRUE);
//        $this->set('aktifitas', $this->model_master_aktifitas->get_all());
//        $this->set('access_rules', $this->access_rules());
        $this->set('records', $records);
        $this->set('additional_js', 'back_end/' . $this->_name . '/js/index_js');
        $this->add_jsfiles(array('atlant/plugins/fullcalendar/fullcalendar.min.js'));
        $this->add_jsfiles(array('atlant/plugins/fullcalendar/lang/id.js'));
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
    }

    public function detail($date = FALSE, $id = FALSE) {
        parent::detail($id, array("pegawai_id", "aktifitas_id", "tr_aktifitas_tanggal", "tr_aktifitas_volume", "tr_aktifitas_mulai", "tr_aktifitas_selesai", "tr_aktifitas_keterangan"));
        $tgl = $date != FALSE ? $date : date('Y-m-d');
        $this->set('pegawai_id', $this->user_detail['pegawai_id']);
        $this->set('tanggal', $tgl);
        $this->set('aktifitas', $this->model_master_aktifitas->get_all());
        $this->set('additional_js', 'back_end/' . $this->_name . '/js/detail_js');
    }

    public function get_waktu() {
        $this->to_json(30);
    }

//    public function laporan($date = FALSE, $id_tugas = FALSE, $id = FALSE) {
//        $this->model_tr_aktifitas->set_user_detail($this->user_detail);
//        parent::detail($id, array("pegawai_id", "tugas_id", "kegiatan_id", "aktifitas_id", "tr_aktifitas_tanggal", "tr_aktifitas_volume", "tr_aktifitas_mulai", "tr_aktifitas_selesai", "tr_aktifitas_keterangan"));
//        if ($date) {
//            $this->set('tanggal', $date);
//        } else {
//            $this->set('tanggal', date('Y-m-d'));
//        }
//        $this->set('tugas', $this->model_set_tugas->get_tugas($id_tugas));
//        $this->load_view('back_end/' . $this->_name . '/laporan', $data);
//    }
}
