<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('GetModel','fetch');
	}

	public function index()
	{	
		$response=array();
		$response['web']=$this->fetch->getWebProfile('webprofile');
		$response['works']=$this->fetch->getWorks(3);
        // var_dump('<pre>',$response['works']);exit;
		$response['feedbacks']=$this->fetch->getInfo('feedbacks');
		// var_dump('<pre>',$response);exit;
		$this->load->view('header',$response);
		$this->load->view('index');
		$this->load->view('footer');
	}


	public function privacy()
	{
		$response=array();
		$response['web']=$this->fetch->getWebProfile('webprofile');
		$response['clients']=$this->fetch->getInfo('clients');
		$this->load->view('header' , $response);
		$this->load->view('policies');
		$this->load->view('footer');
	}

	
	public function enquiry(){
		// var_dump('<pre>',$_POST);exit;
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('some_info_for_sending_this_msg', 'Email', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		
		if($this->input->post('email')){
			$this->session->set_flashdata('failed','Some error occured!');
			redirect('/#contact');
		}
		else{
			if($this->form_validation->run() == true){
				$guest_email=$this->input->post('some_info_for_sending_this_msg');
				$to = $this->fetch->getWebProfile()->email;

				$data = $this->input->post();
				$data['name']=substr(strip_tags($data['name']),0,50);
				$data['email']=substr(strip_tags($data['some_info_for_sending_this_msg']),0,50);
				unset($data['some_info_for_sending_this_msg']);
				$data['message']=substr(strip_tags($data['message']),0,300);

				// Regex for filtering spam words
				preg_match('/(http|www|ftp|mailto|porn|nude|sex|click)/i', $data['message'], $matches);

				if($matches){
					$this->session->set_flashdata('failed','Some error occured!');
					redirect('/#contact');
				}
				else{
					$msg ="You have a new enquiry from- \n\r Name:".$data['name']." \n\r E-mail:".$data['some_info_for_sending_this_msg']." \n\r  Message:".$data['message'];
					$subject = "Eustyle Interiors - New Enquiry";
					$headers = "From:" . $guest_email;
					// mail($to, $subject, $msg);
					$this->load->model('AddModel','save');
					$status= $this->save->saveInfo($data,'enquiries');

					if($status){
						$this->session->set_flashdata('success','Thank you for sending us a message. Our team will reach out to you shortly.' );
						redirect('/#contact');
					}
					else{
						$this->session->set_flashdata('failed','Something went wrong. Please try again in some time.' );
						redirect('/#contact');
					}
				}
			}
			else{
				$this->session->set_flashdata('failed',strip_tags(validation_errors()));
				redirect('/#contact');
			}
		}
	}

}
