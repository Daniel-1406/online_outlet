<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Updatecustompage extends CI_Controller {


    public function do_upload() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Custom Page Name", "required|trim");
        $this->form_validation->set_rules("date", "Date", "required|trim");
        $this->form_validation->set_rules("content", "Content", "required");
        
        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('update/custompages');
        } else {  
            $rec["msg"] = $this->custompagemodel->updatecustompage();

            $this->load->view('feedbacks/custompage', $rec);
        }
    }
    
  

}

?>
