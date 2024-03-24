<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class sermon extends CI_Controller {

    public function uploadsermon() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
    $this->form_validation->set_rules("topic", "Sermon Topic", "required|trim|min_length[3]|max_length[30]");
    $this->form_validation->set_rules("preacher", "Preacher", "required|trim|min_length[3]|max_length[30]");
    $this->form_validation->set_rules("date", "Date", "required|trim|min_length[3]|max_length[30]");
    $this->form_validation->set_rules("message", "Sermon Message", "required|trim|min_length[3]");
    $this->form_validation->set_rules("text", "Sermon text", "required|trim");


    if ($this->form_validation->run() == FALSE) {
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/sermon",$data);
    } else {
        $val["title"] = $this->input->post("topic");
        $val["preacher"] = $this->input->post("preacher");
        $val["date"] = $this->input->post("date");
        $val["date"] = $this->input->post("date");
        $val["text"] = $this->input->post("text");
        $val["message"] = $this->input->post("message");
        $data["msg"] = $this->sermonmodel->uploadsermon($val);
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("feedbacks/sermon", $data);
        }
    
    }
    public function viewsermon() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->sermonmodel->viewsermon();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

    public function deletethissermon() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data["msg"] = $this->sermonmodel->deletesermon($this->uri->segment(4));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("feedbacks/sermon", $data);
    }
    public function editthissermon() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->sermonmodel->editsermon($this->uri->segment(4));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("updates/sermon", $data);
    }
    

}

?>
