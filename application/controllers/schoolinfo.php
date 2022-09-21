<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolinfo extends CI_Controller {

    public function updateschoolinfo() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("schoolname", "School Name", "required|trim|min_length[3]|max_length[100]");
        $this->form_validation->set_rules("schoolmotto", "School Motto", "required|trim|min_length[3]|max_length[100]");
        $this->form_validation->set_rules("email", "Email", "required|trim|min_length[3]|max_length[100]");
        $this->form_validation->set_rules("address", " Address", "required|trim|min_length[3]|max_length[100]");
        $this->form_validation->set_rules("city", " City", "required|trim|min_length[3]|max_length[100]");
        $this->form_validation->set_rules("phonenumber", "Phone Number ", "required|trim|min_length[3]|max_length[100]");
        $this->form_validation->set_rules("nigeriastates", "State", "trim|min_length[3]|max_length[100]");
        $this->form_validation->set_rules("majorcolor", " Major Color", "trim|min_length[3]|max_length[100]");
        $this->form_validation->set_rules("minorcolor", "Minor Color", "trim|min_length[3]|max_length[100]");
        if ($this->form_validation->run() == FALSE) {
            $this->schooldetails();
        } else {
            $lat["msg"] = $this->welcomemodel->registerschoolinfo();
            $this->load->view("feedbacks/schoolinfo", $lat);
        }
    }

    public function schooldetails() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $data["state"] = $this->welcomemodel->getnigeriastates();
        $data["school"] = $this->welcomemodel->getschoolinformation();
        $this->load->view("schooldetails", $data);
    }

}

?>
