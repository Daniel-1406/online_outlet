<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class sermon extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("login/");
    //then validation 
    $this->form_validation->set_rules("topic", "Sermon Topic", "required|trim|min_length[3]|max_length[30]");
    $this->form_validation->set_rules("preacher", "Preacher", "required|trim|min_length[3]|max_length[30]");
    $this->form_validation->set_rules("date", "Date", "required|trim|min_length[3]|max_length[30]");
    $this->form_validation->set_rules("text", "Bible Text", "required|trim|min_length[3]|max_length[30]");
    $this->form_validation->set_rules("message", "Sermon Message", "required|trim|min_length[3]");


    if ($this->form_validation->run() == FALSE) {
     $rtnvals = $this->sermonmodel->editsermon($this->input->post("id"));
        $this->load->view("updates/sermon",$rtnvals);
    } else {
        $val["title"] = $this->input->post("topic");
        $val["preacher"] = $this->input->post("preacher");
        $val["date"] = $this->input->post("date");
        $val["text"] = $this->input->post("text");
        $val["message"] = $this->input->post("message");
        $val["id"] = $this->input->post("id");
        $data["msg"] = $this->sermonmodel->updatesermon($val);
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

            $this->load->view("feedbacks/sermon", $data);
        }
    
    }
    

}

?>
