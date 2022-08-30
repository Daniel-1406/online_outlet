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
        $this->form_validation->set_rules("name", "Custom Page Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("date", "Date", "required|trim|min_length[3]");
        $this->form_validation->set_rules("content", "Content", "required");
        ;

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('createcustompages');
        } else {

            $rec["msg"] = $this->custompagemodel->insertcustompage();

            $this->load->view('facilityfeedback', $rec);
        }
    }

    public function viewfacility() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->facilitymodel->viewfacility();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("viewmenu", $data);
    }

    public function deletethisfacility() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $res["msg"] = $this->facilitymodel->deletefacility($this->uri->segment(3));
        $this->load->view("facilityfeedback", $res);
    }

    public function editthisfacility() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $rtnvals = $this->facilitymodel->editfacility($this->uri->segment(3));
        $this->load->view("editfacility", $rtnvals);
    }

}

?>
