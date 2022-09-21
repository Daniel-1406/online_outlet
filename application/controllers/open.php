<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Open extends CI_Controller {

    public function opendashboard() {
        $this->load->view("dashboard");
    }

    public function schoolinfo() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $data["state"] = $this->welcomemodel->getnigeriastates();
        $data["school"] = $this->welcomemodel->getschoolinformation();
        $this->load->view("uploads/schoolinfo", $data);
    }

    public function socialmedia() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $data["social"] = $this->welcomemodel->getsocialmedialinks();
        $this->load->view("uploads/socialmedia", $data);
    }

    public function openfacility() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view("uploads/facility");
    }

    public function openevent() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view("uploads/event");
    }

    public function opennews() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view("uploads/news");
    }

    public function opencustompages() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view("uploads/createcustompages");
    }

    
    

    public function managestudents() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->students->getAll();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

   

    public function editthisstudent() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $rtnvals = $this->students->editstudent($this->uri->segment(3));
        $this->load->view("editstudents", $rtnvals);
    }

    public function updatestudents() {
        if ($this->session->userdata("admin") == "")
            $this->form_validation->set_rules("surname", "Surname", "required|trim|min_length[3]|max_length[30]|alpha");
        $this->form_validation->set_rules("firstname", "First Name", "required|trim|min_length[3]|max_length[30]|alpha");
        $this->form_validation->set_rules("username", "Username", "required|trim|min_length[3]|max_length[30]|alpha_numeric");
        $this->form_validation->set_rules("pass", "Password", "required|trim|min_length[3]");
        $this->form_validation->set_rules("gender", "Gender", "required|trim");

        if ($this->form_validation->run() == FALSE) {
            $rtnvals = $this->students->editstudent($this->input->post("studentid"));
            $this->load->view("editstudents", $rtnvals);
        } else {
            $values["surname"] = $this->input->post("surname");
            $values["firstname"] = $this->input->post("firstname");
            $values["username"] = $this->input->post("username");
            $values["password"] = md5($this->input->post("pass"));
            $values["gender"] = $this->input->post("gender");
            $values["id"] = $this->uri->segment(3);
            //$values["id"] = $this->input->post("rtnid");
            $conf_pass = md5($this->input->post("confirm_pass"));
            if ($values["password"] != $conf_pass) {
                $data["pass_err"] = "<span style='color:red'>Passwords do not match</span>";
                $this->load->view("editstudents", $data);
            } else {
                if ($this->students->updatestudents($values))
                    redirect("welcome/openstudents");
            }
        }
    }

    public function view_reg_stu() {

        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view('welcome_message.php');
    }

    public function openreg() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view('home.php');
    }

    public function reg_stu() {
        if ($this->session->userdata("admin") == "")
            redirect("login/");
        //then validation 
        $this->form_validation->set_rules("surname", "Surname", "required|trim|min_length[3]|max_length[30]|alpha");
        $this->form_validation->set_rules("firstname", "First Name", "required|trim|min_length[3]|max_length[30]|alpha");
        $this->form_validation->set_rules("username", "Username", "required|trim|min_length[3]|max_length[30]|alpha_numeric");
        $this->form_validation->set_rules("pass", "Password", "required|trim|min_length[3]");
        $this->form_validation->set_rules("gender", "Gender", "required|trim");


        if ($this->form_validation->run() == FALSE) {
            $this->load->view("home");
        } else {
            $val["surname"] = $this->input->post("surname");
            $val["firstname"] = $this->input->post("firstname");
            $val["username"] = $this->input->post("username");
            $val["password"] = md5($this->input->post("pass"));
            $val["gender"] = $this->input->post("gender");
            $conf_pass = md5($this->input->post("confirm_pass"));
            if ($val["password"] != $conf_pass) {
                $data["pass_err"] = "<span style='color:red'>Passwords do not match</span>";
                $this->load->view("home.php", $data);
            } else {
                $lat["msg"] = $this->students->register_stu($val);
                $this->load->view("result", $lat);
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata("admin");
        redirect("welcome");
    }

}

