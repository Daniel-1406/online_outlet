<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class newsletter extends CI_Controller {

   
    public function upload() {
        $this->form_validation->set_rules("email", "Email", "required|min_length[3]|trim");
        if($this->form_validation->run()==FALSE){
            $data["result"]="";
            
                $data["menu"]=$this->homemodel->getpagemenu();
                $data["favicon"]=$this->homemodel->getfavicon();
                $data["info"]=$this->homemodel->getchurchinformation();
                $data["carousel"]=$this->homemodel->getcarousel();
                $data["records"]=$this->homemodel->getrecord();
                $data["testimonies"]=$this->homemodel->gettestimonies();
                $data["videos"]=$this->homemodel->getvideos();
                $data["memories"]=$this->homemodel->getmemories();
                $data["randomphotos"]=$this->homemodel->getrandomphotos();
                $data["mini_carousel"]=$this->homemodel->getminicarousel();
                $data["donate"]=$this->homemodel->getdonateitems();
                $data["quicklinks"]=$this->homemodel->getquicklinks();
                $data["exhortations"]=$this->homemodel->getexhortations();
                $data["events"]=$this->homemodel->getevents();
                $data["result"].="Invalid Email, Please type in a valid email";
        
            
            $this->load->view('display/index',$data);

                }else{
                $result['email'] =$this->input->post('email');
                $feedback=$this->homemodel->uploademail($result);
                $data["result"]=$feedback;
                $data["menu"]=$this->homemodel->getpagemenu();
                $data["favicon"]=$this->homemodel->getfavicon();
                $data["info"]=$this->homemodel->getchurchinformation();
                $data["carousel"]=$this->homemodel->getcarousel();
                $data["records"]=$this->homemodel->getrecord();
                $data["testimonies"]=$this->homemodel->gettestimonies();
                $data["videos"]=$this->homemodel->getvideos();
                $data["memories"]=$this->homemodel->getmemories();
                $data["randomphotos"]=$this->homemodel->getrandomphotos();
                $data["mini_carousel"]=$this->homemodel->getminicarousel();
                $data["donate"]=$this->homemodel->getdonateitems();
                $data["quicklinks"]=$this->homemodel->getquicklinks();
                $data["exhortations"]=$this->homemodel->getexhortations();
                $data["events"]=$this->homemodel->getevents();
        
            
            $this->load->view('display/index',$data);
        }

    }

      
    }

?>
