<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class headercontact extends CI_Controller {

   
    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $this->form_validation->set_rules("title", "Title Heading", "required|trim|min_length[3]");
            $this->form_validation->set_rules("subtitle", "Subtitle", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->headermodel->getcontact();
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/headingcontact', $data);
        } else {

                if (!$this->upload->do_upload('userfile')) {
                    $data=array();
                    $error =$this->upload->display_errors();
                    $data = $this->headermodel->getcontact();
                    $data['error']=$error;
                    $data['title']=$data['title'];
                    $data['subtitle']=$data['subtitle'];
                    $data['photo']=$data['photo'];
                   
                    $church= $this->churchinfo->getchurchinformation();
                    $pic=$this->footerbackg->getfooterbg();

                    $data["church"]=$church["name"];
                    $data["favicon"]=$pic["photo"];
                    $this->load->view('updates/headingcontact', $data);
    
                } else {
                    $data = $this->upload->data();
                    $upload = array('upload_data' => $data);                    

                    $rec['title'] =  $this->input->post('title');
                    $rec['subtitle'] = $this->input->post('subtitle');
                    $rec['photo'] = $data["file_name"];
                    $data["msg"] = $this->headermodel->updatecontact($rec);
                    
                    $church= $this->churchinfo->getchurchinformation();
                    $pic=$this->footerbackg->getfooterbg();
                    $data["church"]=$church["name"];
                    $data["favicon"]=$pic["photo"];
                    $this->load->view('feedbacks/sermon', $data);
                }
            }
        }

        public function load() {
            if ($this->session->userdata("admin_pass") == "")
                redirect("welcome/");
            $db= $this->headermodel->getcontact();
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
    
            $data["title"]=$db["title"];
            $data["subtitle"]=$db["subtitle"];
            $data["photo"]=$db["photo"];
        
            $this->load->view("updates/headingcontact", $data);
        }
    }

?>
