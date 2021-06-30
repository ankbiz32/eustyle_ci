<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends MY_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('GetModel','fetch');
	}
	
	public function index()
	{	
		$response=array();
		$response['web']=$this->fetch->getWebProfile('webprofile');
		$response['title']='Error 404. Page not found!';
		$response['clients']=$this->fetch->getInfo('clients');
		// var_dump('<pre>',$response);exit;
		$this->load->view('header',$response);
		$this->load->view('errors/html/custom_404');
		$this->load->view('footer');
	}
}
