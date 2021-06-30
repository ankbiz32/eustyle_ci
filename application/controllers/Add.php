<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends MY_Controller {

        function __construct(){
                parent:: __construct();
                $this->redirectIfNotLoggedIn();
                $this->load->model('AddModel','save');
                $this->load->model('GetModel','fetch');
        }

        public function Feedback()
        {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('desig', 'Designation', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
            if($this->form_validation->run() == true && $_FILES['img']['name']!=null){
                $data=$this->input->post();
                $path ='assets/clients';
                $initialize = array(
                    "upload_path" => $path,
                    "allowed_types" => "jpg|jpeg|png|bmp|webp|gif",
                    "remove_spaces" => TRUE,
                    "max_size" => 600
                );
                $this->load->library('upload', $initialize);
                if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('failed',strip_tags($this->upload->display_errors()) );
                    redirect('Admin/Feedbacks');
                }
                else {
                    $imgdata = $this->upload->data();
                    $imagename = $imgdata['file_name'];
                    $data['img_src']=$imagename;
                    $status= $this->save->saveInfo($data, 'feedbacks');

                    if($status){
                        $this->session->set_flashdata('success','Feedback added !' );
                        redirect('Admin/Feedbacks');
                    }
                    else{
                        $this->session->set_flashdata('failed','Error !');
                        redirect('Admin/Feedbacks');
                    }
                } 
            }
            else{
                $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
                redirect('Admin/Feedbacks');
            } 
        }

        public function Portfolio()
        {
            $this->load->view('admin/adminheader',['title'=>'Add work']); 
            $this->load->view('admin/adminaside'); 
            $this->load->view('admin/portfolio-form'); 
            $this->load->view('admin/adminfooter');  
        }
        public function savePortfolio()
        {
            // var_dump($_POST);exit;
            $this->form_validation->set_rules('title', 'Project title', 'required');
            $this->form_validation->set_rules('short_descr', 'Short description', 'required');
            if($this->form_validation->run() == true){
                if( $_FILES['img']['name']!=null){
                    $data=$this->input->post();
                    $path ='assets/portfolio';
                    $initialize = array(
                        "upload_path" => $path,
                        "allowed_types" => "jpg|jpeg|png|bmp|webp",
                        "remove_spaces" => TRUE
                    );
                    $this->load->library('upload', $initialize);
                    if (!$this->upload->do_upload('img')) {
                        $this->session->set_flashdata('failed',$this->upload->display_errors());
                        redirect('Admin/Portfolio');
                    }
                    else {
                        $filedata = $this->upload->data();
                        $data['img_src']= $filedata['file_name'];
                        $status= $this->save->saveInfo($data,'portfolio');
                        if($status){
                            $this->session->set_flashdata('success','Work added!' );
                            redirect('Admin/Portfolio');
                        }
                        else{
                            $this->session->set_flashdata('failed','Error !');
                            redirect('Admin/Portfolio');
                        }
                    } 
                }
                else{
                    $this->session->set_flashdata('failed','Please upload image');
                    redirect('Admin/Portfolio');
                }
            }
            else{
                $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
                redirect('Admin/Portfolio');
            } 
        }


        public function Client()
        {
            if($_FILES['img']['name']!=null){
                $path ='assets/clients';
                $initialize = array(
                    "upload_path" => $path,
                    "allowed_types" => "jpg|jpeg|png|bmp|webp",
                    "remove_spaces" => TRUE,
                    "max_size" => 600
                );
                $this->load->library('upload', $initialize);
                if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('failed',strip_tags($this->upload->display_errors()) );
                    redirect('Admin/Clients');
                }
                else {
                    $imgdata = $this->upload->data();
                    $imagename = $imgdata['file_name'];
                    $data=array('img_src'=>$imagename, 'name'=>$this->input->post('name'));
                    $status= $this->save->saveInfo($data, 'clients');

                    if($status){
                        $this->session->set_flashdata('success','New client added !' );
                        redirect('Admin/Clients');
                    }
                    else{
                        $this->session->set_flashdata('failed','Error !');
                        redirect('Admin/Clients');
                    }
                } 
            }
            else{
                $this->session->set_flashdata('failed','No image selected !');
                redirect('Admin/Clients');
            } 
        }

        public function Mail()
        {
            $name=$this->input->post('name');
            $phone=$this->input->post('phone');
            $message=$this->input->post('message');
            $guest_email=$this->input->post('email');
            
            $mail_arr = $this->fetch->getWebProfile();
            $landing_mail = $mail_arr->email;
            
            $to=$landing_mail;
            $msg ="You have a new qnquiry from- \n\r Name:".$name.".\n\r Phone:".$phone."\n\r E-mail:".$guest_email."\n\r Purpose:".$message;
            $subject = "DigiKraft Social - New Enquiry";
            $headers = "From:" . $name;

            mail($to, $subject, $msg, $headers);
            
            $data=$this->input->post();
            $data['date']=date('Y-m-d');
            $status= $this->save->saveEnquiry($data);

            if($status){
                $this->session->set_flashdata('success','Mail Sent!  We will connect with you soon.' );
                redirect('Contact');
            }
            else{
                $this->session->set_flashdata('failed','Error sending mail !');
                redirect('Contact');
            }
        }

        function generate_url_slug($string,$table,$field='slug',$key=NULL,$value=NULL){
            $t =& get_instance();
            $slug = url_title($string);
            $slug = strtolower($slug);
            $i = 0;
            $params = array ();
            $params[$field] = $slug;
            if($key)$params["$key !="] = $value; 
            while ($t->db->where($params)->get($table)->num_rows())
            {
                if (!preg_match ('/-{1}[0-9]+$/', $slug )){
                    $slug .= '-' . ++$i;
                }
                else{
                    $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
                }
                $params [$field] = $slug;
            }
                return $slug;
        }



}
