<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends MY_Controller {

        function __construct()
        {
            parent:: __construct();
            $this->redirectIfNotLoggedIn();
            $this->load->model('GetModel','fetch');
            $this->load->model('EditModel','edit');
        }

        public function Feedback($id)
        {
            $data=$this->input->post();
            $path=null;
            if($_FILES['img']['name']!=null){
                $path ='assets/images';
                $initialize = array(
                    "upload_path" => $path,
                    "allowed_types" => "jpg|jpeg|png|bmp|webp|gif",
                    "remove_spaces" => TRUE,
                    "max_size" => 600
                );
                $this->load->library('upload', $initialize);
                if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('failed',strip_tags($this->upload->display_errors() ) );
                    redirect('Admin/Feedbacks');
                } 
                else {
                    $imgdata = $this->upload->data();
                    $data['img_src'] = $imgdata['file_name'];
                    $d= $this->fetch->getInfoById($id,'feedbacks');
                    if($d->img_src){
                        $path= 'assets/images/'.$d->img_src;
                    }
                }
            }
            $status= $this->edit->updateInfo($data, $id, 'feedbacks');
            if($status){
                if($path){
                    unlink($path);
                }
                $this->session->set_flashdata('success','Feedback Updated !');
                redirect('Admin/Feedbacks');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/Feedbacks');
            }
        }

        public function Portfolio($id)
        {
            $data=$this->fetch->getInfoById($id,'portfolio');
            $this->load->view('admin/adminheader',['title'=>'Edit portfolio','data'=>$data]); 
            $this->load->view('admin/adminaside'); 
            $this->load->view('admin/portfolio-form'); 
            $this->load->view('admin/adminfooter');  
        }
        public function updatePortfolio($id)
        {  
            $this->form_validation->set_rules('title', 'Project title', 'required');
            $this->form_validation->set_rules('short_descr', 'Short description', 'required');
            
            if($this->form_validation->run() == true){
                $data=$this->input->post();

                // if( $_FILES['img']['name']!=null ){
                //     $old_img= $this->fetch->getInfoById($id,'portfolio');
                //     $unlink= 'assets/portfolio/'.$old_img->img_src;
                //     $path ='assets/portfolio';
                //     $initialize = array(
                //         "upload_path" => $path,
                //         "allowed_types" => "jpg|jpeg|png|bmp|webp",
                //         "remove_spaces" => TRUE
                //     );
                //     $this->load->library('upload', $initialize);
                //     if (!$this->upload->do_upload('img')) {
                //         $this->session->set_flashdata('failed',$this->upload->display_errors());
                //         redirect('Admin/Portfolio');
                //     }
                //     else {
                //         $filedata = $this->upload->data();
                //         $fileName = $filedata['file_name'];
                        
                //         $data['img_src']=$fileName;
                //     } 
                // }

                $status= $this->edit->updateInfo($data, $id, 'portfolio');

                if($status){
                    unlink($unlink);
                    $this->session->set_flashdata('success','Work updated !' );
                    redirect('Admin/Portfolio');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('Admin/Portfolio');
                }
            }
            else{
                $this->session->set_flashdata('failed',strip_tags(validation_errors()));
                redirect('Admin/Portfolio');
            }
        }
        public function PortfolioImages($id)
        {
            $data=$this->fetch->getInfoType('portfolio_images','portfolio_id',$id);
            $this->load->view('admin/adminheader',['title'=>'Edit portfolio images','data'=>$data]); 
            $this->load->view('admin/adminaside'); 
            $this->load->view('admin/portfolio-images-form'); 
            $this->load->view('admin/adminfooter');  
        }

        public function Clients($id)
        {
            $data=$this->input->post();
            $path=null;
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
                    $data['img_src']=$imagename;
                    $d= $this->fetch->getInfoById($id,'clients');
                    $path= 'assets/clients/'.$d->img_src;
                } 
            }

            $status= $this->edit->updateInfo($data,$id, 'clients');
            if($status){
                if($path){
                    unlink($path);
                }
                $this->session->set_flashdata('success','Client Updated!' );
                redirect('Admin/Clients');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/Clients');
            }
        }

        public function webProfile()
        {
            $data=$this->input->post();
            $status= $this->edit->updateWebProfile($data);

            if($status){
                $this->session->set_flashdata('success','Web Profile Updated !');
                redirect('Admin/webProfile');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/webProfile');
            }
        }

        public function enqStatus($id)
        {
            $status= $this->edit->updateEnqStatus($id);
            if($status){
                redirect('Admin');
            }
            else{
                redirect('Admin');
            }
        }

        public function adminProfile($id)
        {
            $data=$this->input->post();
            $status= $this->edit->updateAdminProfile($data,$id);
            $user=$this->fetch->getAdminProfile();
            $this->session->set_userdata(['user' =>  $user]);

            if($status){
                $this->session->set_flashdata('success','Admin Panel Profile Updated !');
                redirect('Admin/adminProfile');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/adminProfile');
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
