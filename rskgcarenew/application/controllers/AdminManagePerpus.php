<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminManagePerpus extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_MasterData');

		if($this->session->userdata('status') != 'login'){
			redirect('Admin');
		}
	}

	function index(){
		$this->load->view('admin/include/head');
		$this->load->view('admin/ad_mg_perpus');
		$this->load->view('admin/include/footer');
		$this->load->view('admin/include/thirdparty');
	}

	// INPUT DATA PERPUSTAKAAN
	public function create()
	{
		$data = array(
			'judul' => $this->input->post('judul'),
			'kategori' => $this->input->post('kategori'),
			'tahun' => $this->input->post('tahun'),
			'penulis' => $this->input->post('penulis'),
			'penerbit' => $this->input->post('penerbit'),
			'deskripsi' => $this->input->post('deskripsi'),
			'status_perpus' => $this->input->post('status_perpus'),
			'date_perpus' => $this->input->post('date_perpus')
		);

		if (!empty($_FILES['cover']['name'])) {
			$upload = $this->_do_upload();
			$data['cover'] = $upload;
		}

		if (!empty($_FILES['dokumen']['name'])) {
			$upload = $this->_do_uploadbbuku();
			$data['dokumen'] = $upload;
		}
		$this->M_MasterData->input_perpust('tb_perpustakaan', $data);
		redirect('AdminManagePerpus', $data);
	}

	private function _do_upload()
	{
		$config['upload_path'] 		= 'assets/images/perpus/';
		$config['allowed_types'] 	= 'jpeg|jpg|png|pdf';
		$config['max_size'] 		= 2000;
		$config['encrypt_name'] 	= true;
		

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('cover')) {
			$this->session->flashdata('flash', $this->upload->display_errors('',''));
			redirect('AdminManagePerpus');
		}
		return $this->upload->data('file_name');
	}

	private function _do_uploadbbuku()
	{
		$config['upload_path'] 		= 'assets/images/perpus/';
		$config['allowed_types'] 	= 'jpeg|jpg|png|pdf';
		$config['max_size'] 		= 2000;
		$config['encrypt_name'] 	= true;
		

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('dokumen')) {
			$this->session->flashdata('flash', $this->upload->display_errors('',''));
			redirect('AdminManagePerpus');
		}
		return $this->upload->data('file_name');
	}

	// UPDATE APLIKASI
	public function update($id)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'judul' => $this->input->post('judul'),
				'kategori' => $this->input->post('kategori'),
				'tahun' => $this->input->post('tahun'),
				'penulis' => $this->input->post('penulis'),
				'penerbit' => $this->input->post('penerbit'),
				'deskripsi' => $this->input->post('deskripsi')
			);
			$this->M_MasterData->update_perpus('tb_perpustakaan',$data, $id);
		} 
		redirect('AdminManagePerpus');	
	}

	// UPDATE COVER
	public function updatecover($id){

		$config['upload_path']="assets/images/perpus/";
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

			$result= $this->M_MasterData->update_perpus('tb_perpustakaan',$data, $id);
			echo json_decode($result);
		}
		redirect('AdminManagePerpus');
	}

	// UPDATE BUKU
	public function updatebuku($id){

		$config['upload_path']="assets/images/perpus/";
		$config['allowed_types']='pdf|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("cover")){
			$file = $this->upload->data();
			
			$bukti= $file['file_name'];
			
			$data = array(
				'dokumen' => $bukti
			);

			$result= $this->M_MasterData->update_perpus('tb_perpustakaan',$data, $id);
			echo json_decode($result);
		}
		redirect('AdminManagePerpus');
	}

	// DELETE DATA PERPUSTAKAAN
	public function delete(){
		
		$id['id'] = $this->uri->segment(3);
		
		$this->M_MasterData->DeleteDataPerpus('tb_perpustakaan',$id);

		redirect('AdminManagePerpus');	
	}

////////////////////////////////////////////KATEGORI PERPUS////////////////////////////////////////////////////////////////////
// INPUT DATA PERPUSTAKAAN
	public function createkat()
	{
		$data = array(
			'kategori' => $this->input->post('kategori')
		);

		$this->M_MasterData->input_katperpust('tb_katperpus', $data);
		redirect('AdminManagePerpus', $data);
	}

	// UPDATE DATA 
	public function updatekategori($id)
	{
		if(isset($_POST['updatekategori']))
		{	
			$data = array(
				'kategori' => $this->input->post('kategori')
			);
			$this->M_MasterData->update_katperpus('tb_katperpus',$data, $id);
		} 
		redirect('AdminManagePerpus');	
	}

	// DELETE DATA PERPUSTAKAAN
	public function deletekategori(){
		
		$id['id'] = $this->uri->segment(3);
		
		$this->M_MasterData->DeleteDataKatPerpus('tb_katperpus',$id);

		redirect('AdminManagePerpus');	
	}

}