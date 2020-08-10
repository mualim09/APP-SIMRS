<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminManageAplikasi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_MasterData');

		if($this->session->userdata('status') != 'login'){
			redirect('Admin');
		}
	}
	function index(){
		$this->load->view('admin/include/head');
		$this->load->view('admin/ad_mg_aplikasi');
		$this->load->view('admin/include/footer');
		$this->load->view('admin/include/thirdparty');
	}

	// INPUT DATA APLIKASI
	public function create()
	{
		$data = array(
			'nama_app' => $this->input->post('nama_app'),
			'status_akses' => $this->input->post('status_akses'),
			'url' => $this->input->post('url'),
			'status_tampilan' => $this->input->post('status_tampilan')
		);

		if (!empty($_FILES['cover']['name'])) {
			$upload = $this->_do_upload();
			$data['cover'] = $upload;
		}
		$this->M_MasterData->input_aplikasi('tb_aplikasi', $data);
		redirect('AdminManageAplikasi', $data);
	}

	private function _do_upload()
	{
		$config['upload_path'] 		= 'assets/images/bgcover/';
		$config['allowed_types'] 	= 'jpeg|jpg|png|pdf';
		$config['max_size'] 		= 2000;
		// $config['max_widht'] 		= 1000;
		// $config['max_height']  		= 1000;
		$config['encrypt_name'] 	= true;
		
 
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('cover')) {
		$this->session->flashdata('flash', $this->upload->display_errors('',''));
			redirect('AdminManageAplikasi');
		}
		return $this->upload->data('file_name');
	}

	// UPDATE APLIKASI
	public function update($id)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'nama_app' => $this->input->post('nama_app'),
				'status_akses' => $this->input->post('status_akses'),
				'url' => $this->input->post('url'),
				'status_tampilan' => $this->input->post('status_tampilan')
			);
			$this->M_MasterData->update_aplikasi('tb_aplikasi',$data, $id);
		} 
		redirect('AdminManageAplikasi');	
	}

	public function updatefotopj($id){

		$config['upload_path']="assets/images/bgcover/";
		$config['allowed_types']='pdf|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("cover")){
			$file = $this->upload->data();
			
			$bukti= $file['file_name'];
			
			$data = array(
				'cover' => $bukti
			);

			$result= $this->M_MasterData->update_aplikasi('tb_aplikasi',$data, $id);
			echo json_decode($result);
		}
		redirect('AdminManageAplikasi');
	}

	// DELETE APLIKASI
	public function delete(){
		
		$id['id'] = $this->uri->segment(3);
		
		$this->M_MasterData->DeleteDataAplikasi('tb_aplikasi',$id);

		redirect('AdminManageAplikasi');	
	}
}