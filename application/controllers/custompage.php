<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custompage extends CI_Controller {

    public function opencustompages() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view("uploads/custompages");
    }

    public function do_upload() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Custom Page Name", "required|trim");
        $this->form_validation->set_rules("date", "Date", "required|trim");
        $this->form_validation->set_rules("content", "Content", "required");
        
        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('uploads/custompages');
        } else {  
            $rec["msg"] = $this->custompagemodel->insertcustompage();

            $this->load->view('feedbacks/custompage', $rec);
        }
    }
    
    

    public function viewpages() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->custompagemodel->getpages();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

    public function deletethispage() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $res["msg"] = $this->custompagemodel->deletepage($this->uri->segment(3));
        $this->load->view("feedbacks/custompage", $res);
    }

    public function editthispage() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $rtnvals = $this->custompagemodel->editpage($this->uri->segment(3));
        $this->load->view("update/custompages", $rtnvals);
    }

}

?>
