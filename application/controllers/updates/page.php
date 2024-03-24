<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class page extends CI_Controller {

    public function dd() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("login/");
    //then validation 
    $this->form_validation->set_rules("name", "Page Title", "required|trim|min_length[3]");
    $this->form_validation->set_rules("date", "Date", "required|trim|min_length[3]");
    $this->form_validation->set_rules("identifier", "Page identifier", "required|trim");
    $this->form_validation->set_rules("content", "Page Content", "required|trim|min_length[3]");
    

    if ($this->form_validation->run() == FALSE) {
     $data = $this->pagemodel->editpage($this->input->post("id"));
     $church= $this->churchinfo->getchurchinformation();
     $pic=$this->footerbackg->getfooterbg();
     $data["church"]=$church["name"];
     $data["favicon"]=$pic["photo"];
    $this->load->view("updates/page",$data);
    } else {

        $val["name"] = $this->input->post("name");
        $val["date"] = $this->input->post("date");
        $val["content"] = $this->input->post("content");
        $val["identifier"] = $this->input->post("identifier");
        $val["id"] = $this->input->post("id");
        $data["msg"] = $this->pagemodel->updatepage($val);
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

            $this->load->view("feedbacks/sermon", $data);
        }
    
    }

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Custom Page Name", "required|trim");
        $this->form_validation->set_rules("date", "Date", "required|trim");
        $this->form_validation->set_rules("identifier", "Page Identifier", "required|trim");
        $this->form_validation->set_rules("content", "Content", "required");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000000000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);
        
        if ($this->form_validation->run() == FALSE) {
            $data = $this->pagemodel->editpage($this->input->post("id"));
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

            $this->load->view("updates/custompage",$data);
        } else {
            if(!$this->upload->do_upload("userfile")){
                $error=$this->upload->display_errors();
                $church= $this->churchinfo->getchurchinformation();
                $data = $this->pagemodel->editpage($this->input->post("id"));
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $data["error"]=$error;
                $this->load->view("updates/custompage",$data);

            }else{
            $data = $this->upload->data();
            $upload = array('upload_data' => $data);
            $val["name"] = $this->input->post("name");
            $val["id"] = $this->input->post("id");
            $val["date"] = $this->input->post("date");
            $val['banner'] = $data["file_name"];
            $val["identifier"] = $this->input->post("identifier");
            $val["content"] = $this->input->post("content");
            $data["msg"] = $this->pagemodel->updatepage($val);
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view("feedbacks/sermon", $data);


                }
            }
    }
    

}

?>
