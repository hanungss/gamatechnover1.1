<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hal_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        //load model admin
		$this->load->model('admin');
		$this->load->model('user_u');
		$this->load->model('berkas_u'); 
		$this->load->helper(array('form', 'url','download','html'));  
		$this->load->library(array('form_validation', 'session'));

	}

	public function index()
	{
		if($this->admin->logged_id())
		{

			$this->load->view("user/hal_user");			

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

		}
	}

	public function upload(){
		$this->load->view("user/upload");	
	}

	// public function profil(){
	// 	$this->load->view("user/profil");	
	// }

	public function lihat_berkas(){
		$this->load->view("user/lihat_berkas");	
	}

	

	public function data_status()
	{
		$this->load->model('status_model');
		$data['judul'] = 'Status';
		$data['data_status'] = $this->status_model->tampil_status();
		$this->load->view("user/lihat_berkas", $data);
	}


	public function tambah_berkas()
	{
		$this->load->helper(['form', 'string', 'notification']);
		if ($this->validation()) {
			$id_berkas = $this->input->post('id_berkas', TRUE);
			$where = "id_berkas = '$id_berkas'";
			$data = $this->berkas_u->is_exist($where);
		} else{
			$s_id = random_string('alnum', 10);
			$id_berkas = $_FILES['id_berkas']['name'];
		}
	}

	public function hitungan()
	{
		$data['graph'] = $this->berkas_u->get_data_berkas();
		$this->load->view('user/hal_user', $data);
	}

	function cek_berkas(){
		$this->load->model("berkas_u");	
		$queey['judul'] = 'Status';
		$query['cek_berkas'] = $this->berkas_u->get_data_berkas();
		$this->load->view('user/lihat_berkas', $query);
	}

	public function countTotalrow(){
		$data['query'] = $this->berkas_u->file_total(); 
	}

	function delete_berkas($id_row)
	{
		$this->load->model('berkas_u');
		$nama_berkas = $this->berkas_u->delete_berkas($id_row);
		redirect('hal_user');
	}

	public function download ($file_path = "upload/") {
            // load ci download helder
		$this->load->helper('download'); 
            // get download file path and store it in $data array
		$data['download_file'] = $file_path;    
        $data = file_get_contents(base_url("/upload/".$download_file)); // Read the file's contents
        $name = $download_file;
        force_download($name, $data);                   
    }

    function profil(){
    	$this->load->model("user_u");	
    	$queey['judul'] = 'Status';
    	$query['profil'] = $this->user_u->get_data_user();
    	$this->load->view('user/profil', $query);
    }

    function edit_berkas($id_row)
    {
    	$data['judul']='Update Data';
    	$this->load->model('berkas_u');
    	$data['edit']=$this->berkas_u->edit_berkas($id_row);
    	$this->load->view('user/edit_berkas', $data);
    }

    function simpan_edit_berkas()
    {

    	$id_berkas = $this->input->post('id_berkas');
    	$nama_berkas = $this->input->post('nama_berkas');
    	$keterangan = $this->input->post('keterangan');
    	$tanggal = $this->input->post('tanggal');
    	$jenis = $this->input->post('jenis');
    	$berkas = $this->input->post('berkas');

    	$data['judul'] = 'Update Data Codeigniter';
    	$this->load->model('berkas_u');
    	$data['edit'] = $this->berkas_u->simpan_edit_berkas($id_berkas, $nama_berkas, $keterangan, $tanggal, $jenis, $berkas);
    	$data['notifikasi'] = 'Data telah berhasil disimpan';
    	$this->load->view('user/hal_user');

    }

    function edit_user($id_user)
    {
    	$data['judul']='Update Data';
    	$this->load->model('user_u');
    	$data['edit']=$this->user_u->edit_user($id_user);
    	$this->load->view('user/edit_user', $data);
    }

    function simpan_edit_user()
    {
    	$id_user = $this->input->post('id_user');
    	$nama_user = $this->input->post('nama_user');
    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
    	$foto = $this->input->post('foto');

    	$data['judul'] = 'Update Data Codeigniter';
    	$this->load->model('user_u');
    	$data['edit'] = $this->user_u->simpan_edit_user($id_user, $nama_user, $username, $password, $foto);
    	$data['notifikasi'] = 'Data telah berhasil disimpan';
    	$this->load->view('user/hal_user');

    }

    public function berkas_pdf(){
    	$this->load->model("berkas_u");	
    	$dok['judul'] = 'Berkas';
    	$dok['berkas_pdf'] = $this->berkas_u->berkas_dokumen();
    	$this->load->view('user/berkas_dokumen', $dok);
    }

    public function berkas_gambar(){
    	$this->load->model("berkas_u");	
    	$gam['judul'] = 'Berkas';
    	$gam['berkas_gambar'] = $this->berkas_u->berkas_gambar();
    	$this->load->view('user/berkas_gambar', $gam);
    }

    public function berkas_video(){
        $this->load->model("berkas_u"); 
        $vid['judul'] = 'Berkas';
        $vid['berkas_video'] = $this->berkas_u->berkas_video();
        $this->load->view('user/berkas_video', $vid);
    }

    public function berkas_lain(){
        $this->load->model("berkas_u"); 
        $lain['judul'] = 'Berkas';
        $lain['berkas_lain'] = $this->berkas_u->berkas_lain();
        $this->load->view('user/berkas_lain', $lain);
    }

    public function kadaluarsa(){
    	$this->load->model("berkas_u");	
    	$exp['judul'] = 'Berkas';
    	$exp['kadaluarsa'] = $this->berkas_u->kadaluarsa();
    	$this->load->view('user/kadaluarsa', $exp);
    }

    function delete_user($id_user)
    {
    	$this->load->model('user_u');
    	$username = $this->user_u->delete_user($id_user);
    	redirect('dashboard/logout');
    }

    public function send()  
    {  
        $config = Array(  
          'protocol' => 'smtp',  
          'smtp_host' => 'ssl://smtp.googlemail.com',  
          'smtp_port' => 465,  
          'smtp_user' => 'hanungsmbd@gmail.com',   
          'smtp_pass' => 'kopongSS217',   
          'mailtype' => 'html',   
          'charset' => 'iso-8859-1'  
      ); 
        $sesi =  $this->session->userdata("user_email");
        $email=$this->db->query("SELECT email FROM user")->row_array();
        $this->load->library('email', $config);  
        $this->email->set_newline("\r\n");  
        $this->email->from('berkasgamatechno@gmail.com', 'Admin berkas-gamatechno');
        $this->email->to($email);
        $this->email->subject('Berkas anda akan kadaluarsa');   
        $this->email->message('Berkas anda yang ada pada sistem berkas Gamatechno akan segera kadaluarsa , segera cek berkas tersebut untuk menghindari terlewatnya masa berlaku berkas , cek berkas anda disini http://www.berkas-gamatechno.ga');  
        if (!$this->email->send()) {  
          show_error($this->email->print_debugger());   
      }else{  
          echo 'email berhasil terkirim';   
      }  
}

}








