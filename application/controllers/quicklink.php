<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class quicklink extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("login/");
    //then validation 
    $this->form_validation->set_rules("address", "Address", "required|trim");
    $this->form_validation->set_rules("parish", "Parish", "required|trim");
    $this->form_validation->set_rules("phone", "Phone", "required|trim");
    $this->form_validation->set_rules("pic", "Pastor in Charge", "required|trim");
    

    if ($this->form_validation->run() == FALSE) {
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("uploads/quicklink",$data);
    } else {
        $val["address"] = $this->input->post("address");
        $val["parish"] = $this->input->post("parish");
        $val["phone"] = $this->input->post("phone");
        $val["pic"] = $this->input->post("pic");
        $data["msg"] = $this->quicklinkmodel->uploadquicklink($val);
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

            $this->load->view("feedbacks/sermon", $data);
        }
    
    }

    public function viewquicklinks() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $data = $this->quicklinkmodel->viewquicklinks();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $data["head"];
        $data["rtnbody"] = $data["body"];
        $this->load->view("manage", $data);
    }

    public function deletethisquicklink() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $data["msg"] = $this->quicklinkmodel->deletequicklink($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("feedbacks/sermon", $data);
    }

    public function editthisquicklink() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $data= $this->quicklinkmodel->editquicklink($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("updates/quicklink", $data);
    }
    public function openquicklink() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/quicklink",$data);
    }
    

}

?>
