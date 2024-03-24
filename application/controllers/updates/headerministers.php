<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class headerministers extends CI_Controller {

   
    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $this->form_validation->set_rules("title", "Title Heading", "required|trim");
            $this->form_validation->set_rules("link", "Link", "required|trim");
            $this->form_validation->set_rules("date", "Date", "required|trim");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->headermodel->getlive();
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/headingministers', $data);
        } else {

                if (!$this->upload->do_upload('userfile')) {
                    $data=array();
                    $error =$this->upload->display_errors();
                    $data = $this->headermodel->getlive();
                    $data['error']=$error;
                    $church= $this->churchinfo->getchurchinformation();
                    $pic=$this->footerbackg->getfooterbg();

                    $data["church"]=$church["name"];
                    $data["favicon"]=$pic["photo"];
                    $this->load->view('updates/headingministers', $data);
    
                } else {
                    $data = $this->upload->data();
                    $upload = array('upload_data' => $data);                    

                    $rec['title'] =  $this->input->post('title');
                    $rec['link'] = $this->input->post('link');
                    $rec['date'] = $this->input->post('date');
                    $rec['photo'] = $data["file_name"];
                    $data["msg"] = $this->headermodel->updatelive($rec);
                    
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
            $data= $this->headermodel->getlive();
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
    
            
        
            $this->load->view("updates/headingministers", $data);
        }
    }

?>
