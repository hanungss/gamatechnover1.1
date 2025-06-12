<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        //load model admin
		$this->load->model('admin');
		$this->load->model('user_u'); 
		$this->load->model('berkas_u'); 
		$this->load->helper(array('form', 'url'));  
		$this->load->library(array('form_validation', 'session'));

	}

	public function index()
	{
		if($this->admin->logged_id())
		{
			
			$this->load->view("admin/dashboard");
			
			

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function tambah_user(){
		if (!$this->load->view('admin/daftar'));	
	}

		public function create_user()
	{
		
		if ($this->form_validation->run() == FALSE) {
			$data['nama_user'] = $this->input->post('nama_user') ? $this->input->post('nama_user') : '';
			$data['username'] = $this->input->post('username') ? $this->input->post('username') : '';
			$data['password'] = $this->input->post(md5('password')) ? $this->input->post('password') : '';
			$data['jenis_kel'] = $this->input->post('jenis_kel') ? $this->input->post('jenis_kel') : '';
			$data['email'] = $this->input->post('email') ? $this->input->post('email') : '';
		}
		$this->load->view('admin/daftar', $data);
	}

	public function submit_registrasi(){
		$this->rule();
		$config = array(
			'upload_path' => './upload/foto',
			'allowed_types' => 'jpeg|jpg|png',
			'max_size' => '2048'
 		);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
			redirect(site_url('dashboard/create_user'));
		} else {
			$file = $this->upload->data();
			$data = array(
					'nama_user' => $this->input->post('nama_user'),
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'jenis_kel' => $this->input->post('jenis_kel'),
					'email' => $this->input->post('email'),
					'foto' => $file['file_name']
			);

			$this->user_u->insertuser($data);
		}
		$this->session->set_flashdata('message', "<div style='color:#00a65a;'>Gambar berhasil ditambah.</div>");
		redirect(site_url('login'));
	}

	public function rule()
	{
		$this->form_validation->set_rules('nama_user', 'Nama User', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('jenis_kel', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
	
	function delete_user($id_user)
	{
		$this->load->model('user_u');
		$username = $this->user_u->delete_user($id_user);
		redirect('dashboard/user');
	}

	function delete_berkas($id_row)
	{
		$this->load->model('berkas_u');
		$nama_berkas = $this->berkas_u->delete_berkas($id_row);
		redirect('dashboard/data_status');
	}

	public function upload(){
		$this->load->view("admin/upload");	
	}	

	public function data_status()
	{
		$this->load->model('status_model');
		$data['judul'] = 'Status';
		$data['data_status'] = $this->status_model->tampil_status();
		$this->load->view("admin/lihat_berkas", $data);
	}

	public function status_data()
	{
		$this->load->model('berkas_u');
		$data['judul'] = 'Status';
		$data['status_data'] = $this->berkas_u->file_total();
		$this->load->view("user/lihat", $data);
	}

	public function berkas(){
		$this->load->model('user_u');
		$berkas['total'] = count($this->user_u->total($berkas));
		$this->load->view("user/hal_user", $data);

	}

	public function user(){
		$this->load->model("status_model");	
		$data['judul'] = 'Status';
		$data['user'] = $this->status_model->tampil_user();
		$this->load->view("admin/user", $data);
	}

	function edit_user($id_user)
	{
		$data['judul']='Update Data';
		$this->load->model('user_u');
		$data['edit']=$this->user_u->edit_user($id_user);
		$this->load->view('admin/edit_user', $data);
	}

	function simpan_edit_user()
	{
		$id_user = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data['judul'] = 'Update Data Codeigniter';
		$this->load->model('user_u');
		$data['edit'] = $this->user_u->simpan_edit_user($id_user, $nama_user, $username, $password);
		$data['notifikasi'] = 'Data telah berhasil disimpan';
		$this->load->view('admin/dashboard');

	}

	function edit_berkas($id_row)
	{
		$data['judul']='Update Data';
		$this->load->model('berkas_u');
		$data['edit']=$this->berkas_u->edit_berkas($id_row);
		$this->load->view('admin/edit_berkas', $data);
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
		$this->load->view('admin/dashboard');

	}

	public function create()
	{
		
		if ($this->form_validation->run() == FALSE) {
			$data['nama_berkas'] = $this->input->post('nama_berkas') ? $this->input->post('nama_berkas') : '';
			$data['keterangan'] = $this->input->post('keterangan') ? $this->input->post('keterangan') : '';
			$data['tanggal'] = $this->input->post('tanggal') ? $this->input->post('tanggal') : '';
			$data['jenis'] = $this->input->post('jenis') ? $this->input->post('jenis') : '';
		}
		$this->load->view('user/upload', $data);
	}

	function unggah()
	{
		$this->rules();
		$config = array(
			'upload_path' => 'C:/Users/Hanung/Dropbox/upload/dokumen',
			'allowed_types' => 'pdf|doc|docx|jpeg|jpg|png',
			'max_size' => '2048'
 		);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			$this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
			redirect(site_url('dashboard/create'));
		} else {
			$file = $this->upload->data();
			$data = array(

					'id_berkas' => $this->session->userdata('user_id'),
					'nama_berkas' => $this->input->post('nama_berkas'),
					'keterangan' => $this->input->post('keterangan'),
					'tanggal' => $this->input->post('tanggal'),
					'jenis' => $this->input->post('jenis'),
					'berkas' => $file['file_name']
			);

			$this->berkas_u->insert($data);
		}
		$this->session->set_flashdata('message', "<div style='color:#00a65a;'>Gambar berhasil ditambah.</div>");
		redirect(site_url('hal_user'));
	}

	public function rules()
	{
		$this->form_validation->set_rules('nama_berkas', 'Nama Berkas', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function grafik(){
		$this->load->model("berkas_u");	
		$data['judul'] = 'Status';
		$data['admin'] = $this->berkas_u->get_data_berkas();
		$this->load->view("user/hal_user", $data);
	}

	public function pengguna(){
		$this->load->model("status_model");	
		$data['judul'] = 'Status';
		$data['user'] = $this->status_model->tampil_user();
		$this->load->view("admin/user", $data);
	}

	
}