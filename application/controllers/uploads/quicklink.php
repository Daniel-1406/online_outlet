<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class quicklink extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("login/");
    //then validation 
    $this->form_validation->set_rules("title", "Link Title", "required|trim|min_length[1]");
    $this->form_validation->set_rules("link", "Link", "required|trim");
    $this->form_validation->set_rules("numbering", "Numbering", "required|trim");
    

    if ($this->form_validation->run() == FALSE) {
        $data = $this->quicklinkmodel->editquicklink($this->input->post('id'));
        $info= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$info["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("uploads/quicklink",$data);
    } else {
        $val["title"] = $this->input->post("title");
        $val["link"] = $this->input->post("link");
        $val["numbering"] = $this->input->post("numbering");
        $val["id"] = $this->input->post("id");
        $data["msg"] = $this->quicklinkmodel->updatequicklink($val);
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("feedbacks/sermon", $data);
        }
    
    }
    

    

}

?>
