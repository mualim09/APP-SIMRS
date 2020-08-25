<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');
	}

	function index(){
		$this->load->view('admin/login');
	}

	function aksi_login(){
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = array(
				'username' => $username,
				'password' => $password
			);
			$cek = $this->M_MasterData->cek_login('tb_user',$data);
			if(@$cek){

				$data_session = array(
					'user_id' => $cek->user_id,
					'username' => $username,
					'password' => $password,
					'full_name' => $cek->full_name,
					'foto' => $cek->foto,
					'jenis_kelamin' => $cek->jenis_kelamin,
					'email' => $cek->email,
					'alamat' => $cek->alamat,
					'no_hp' => $cek->no_hp,
					'jabatan' => $cek->jabatan,
					'unit' => $cek->unit,
					'date_user' => $cek->date_user,
					'tgl_lahir' => $cek->tgl_lahir,
					'statusta' => $cek->status,
					'status' => "login",
					'role' => $cek->user_role
				);
				$this->session->set_userdata($data_session);
				redirect('AdminHome');
			}else{
				$this->load->view('404');
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}
}