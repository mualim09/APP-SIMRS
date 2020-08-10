<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BRR extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_MasterData');
	}

	function index(){
		$this->load->view('include/head');
		$this->load->view('include/sidebar');
		$this->load->view('page/BRR/booking');
		$this->load->view('include/thirdpart');
	}
}