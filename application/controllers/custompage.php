<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custompage extends CI_Controller {

    public function opencustompages() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view("createcustompages");
    }

    public function do_upload() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Custom Page Name", "required|trim");
        $this->form_validation->set_rules("date", "Date", "required|trim");
        $this->form_validation->set_rules("content", "Content", "required");
        
        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('createcustompages');
        } else {  
            $rec["msg"] = $this->custompagemodel->insertcustompage();

            $this->load->view('facilityfeedback', $rec);
        }
    }
    
    

    public function viewpages() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->custompagemodel->getpages();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("viewmenu", $data);
    }

    public function deletethispage() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $res["msg"] = $this->custompagemodel->deletepage($this->uri->segment(3));
        $this->load->view("facilityfeedback", $res);
    }

    public function editthispage() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $rtnvals = $this->custompagemodel->editpage($this->uri->segment(3));
        $this->load->view("editcustompages", $rtnvals);
    }

}

?>
