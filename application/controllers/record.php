<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class record extends CI_Controller {

    public function openrecord() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
        $this->load->view('uploads/record',$data);
    }
    public function openform() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
        $this->load->view('uploads/form',$data);
    }

    public function viewrecord() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->recordmodel->viewrecord();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("manage", $data);
    }
    public function viewform() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->recordmodel->viewform();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("manage", $data);
    }


    public function deletethisrecord() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data["msg"] = $this->recordmodel->deleterecord($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("feedbacks/sermon", $data);
    }
    public function deletethisform() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data["msg"] = $this->recordmodel->deleteform($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("feedbacks/sermon", $data);
    }


    public function editthisrecord() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->recordmodel->editrecord($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/record", $data);
    }
    public function editthisform() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->recordmodel->editform($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/form", $data);
    }
    public function record_upload() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("record", "Record", "required|trim");
        $this->form_validation->set_rules("value", "Value", "required|trim|numeric");
        $this->form_validation->set_rules("numbering", "Numbering", "required|trim");
        
        if ($this->form_validation->run() == FALSE) {
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('uploads/record',$data);
        } else {
            $data["msg"] = $this->recordmodel->uploadrecord();
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('feedbacks/sermon', $data);
        }
    }
    public function form_upload() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Title", "required|trim");
        $this->form_validation->set_rules("aboutform", "Description", "required|trim");
        
        if ($this->form_validation->run() == FALSE) {
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('uploads/form',$data);
        } else {
            $data["msg"] = $this->recordmodel->uploadform();
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('feedbacks/sermon', $data);
        }
    }
        public function updaterecord() {

            if ($this->session->userdata("admin_pass") == "")
                redirect("welcome/");
            $this->form_validation->set_rules("record", "Record", "required|trim|min_length[3]");
            $this->form_validation->set_rules("value", "Value", "required|trim");
            $this->form_validation->set_rules("numbering", "Numbering", "required|trim");
            
            if ($this->form_validation->run() == FALSE) {
                $data= $this->recordmodel->editrecord($this->input->post("id"));
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('updates/record', $data);
            } else {
                $val["record"] = $this->input->post("record");
                $val["value"] = $this->input->post("value");
                $val["id"] = $this->input->post("id");
                $val["numbering"] = $this->input->post("numbering");
    
    
            $data["msg"] = $this->recordmodel->updaterecord($val);
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
    
                $this->load->view('feedbacks/sermon', $data);
            }
        }
        public function updateform() {

            if ($this->session->userdata("admin_pass") == "")
                redirect("welcome/");
            $this->form_validation->set_rules("title", "Title", "required|trim");
            $this->form_validation->set_rules("aboutform", "Description", "required|trim");   
            if ($this->form_validation->run() == FALSE) {
                $data= $this->recordmodel->editform($this->input->post("id"));
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('updates/form', $data);
            } else {
                $val["title"] = $this->input->post("title");
                $val["about"] = $this->input->post("aboutform");
                $val["id"] = $this->input->post("id");
    
    
            $data["msg"] = $this->recordmodel->updateform($val);
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
    
                $this->load->view('feedbacks/sermon', $data);
            }
        }   


}

?>
