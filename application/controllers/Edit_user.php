<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_user');
    }


    public function get_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables_ssp');
            $columns = array(
                array('db' => 'id_user', 'dt' => 'id_user'),
                array('db' => 'nama_user', 'dt' => 'nama_user'),
                array('db' => 'password', 'dt' => 'password'),
                array('db' => 'created_at', 'dt' => 'created_at'),
                array('db' => 'updated_at', 'dt' => 'updated_at'),
                array(
                    'db' => 'id_user',
                    'dt' => 'tindakan',
                    'formatter' => function($id_user) {
                        return '<a class="btn btn-info btn-sm mb" href="'.site_url('dashboard/edit_user/'.$id_user).'">Ubah</a>
                        <a class="btn btn-danger btn-sm mb" onclick="return confirmDialog();" href="'.site_url('user/reset/'.$id_user).'"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Reset Password</a>';
                    }
                ),
            );

            $sql_details = [
                'user' => $this->db->username,
                'pass' => $this->db->password,
                'db' => $this->db->database,
                'host' => $this->db->hostname
            ];

            echo json_encode(
                Datatables_ssp::simple($_GET, $sql_details, self::$table, self::$primaryKey, $columns)
            );
        }
    }
}