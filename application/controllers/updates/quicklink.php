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
        $data = $this->quicklinkmodel->editquicklink($this->input->post('id'));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data= $this->quicklinkmodel->editquicklink($this->input->post("id"));
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/quicklink",$data);
    } else {
        $val["address"] = $this->input->post("address");
        $val["parish"] = $this->input->post("parish");
        $val["phone"] = $this->input->post("phone");
        $val["pic"] = $this->input->post("pic");
        $val["id"] = $this->input->post("id");

        $db= $this->quicklinkmodel->updatequicklink($val);
        $data= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$data["name"];
        $data["favicon"]=$pic["photo"];
        $data["msg"]=$db;
            $this->load->view("feedbacks/sermon", $data);
        }
    
    }
    

    

}

?>
