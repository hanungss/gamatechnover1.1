<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function tambah_user(){
		$this->load->view("tambah_user");	
	}
}
