<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function openstudents() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view('uploads/students');
    }

    public function registerstudents() {
        if ($this->session->userdata("admin") == "")
            redirect("login/");
        //then validation 
        $this->form_validation->set_rules("surname", "Surname", "required|trim|min_length[3]|max_length[30]|alpha");
        $this->form_validation->set_rules("firstname", "First Name", "required|trim|min_length[3]|max_length[30]|alpha");
        $this->form_validation->set_rules("username", "Username", "required|trim|min_length[3]|max_length[30]|alpha_numeric");
        $this->form_validation->set_rules("pass", "Password", "required|trim|min_length[3]");
        $this->form_validation->set_rules("gender", "Gender", "required|trim");


        if ($this->form_validation->run() == FALSE) {
            $this->load->view("uploads/students");
        } else {
            $val["surname"] = $this->input->post("surname");
            $val["firstname"] = $this->input->post("firstname");
            $val["username"] = $this->input->post("username");
            $val["password"] = md5($this->input->post("pass"));
            $val["gender"] = $this->input->post("gender");
            $conf_pass = md5($this->input->post("confirm_pass"));
            if ($val["password"] != $conf_pass) {
                $data["pass_err"] = "Passwords do not match";
                $this->load->view("uploads/students", $data);
            } else {
                $lat["msg"] = $this->students->registerstu($val);
                $this->load->view("feedbacks/students", $lat);
            }
        }
    }

    public function managestudents() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->students->getAll();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

    public function deletethisstudent() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $res["msg"] = $this->students->deletestudent($this->uri->segment(3));
        $this->load->view("feedbacks/students", $res);
    }

    public function editthisstudent() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $rtnvals = $this->students->editstudent($this->uri->segment(3));
        $this->load->view("update/students", $rtnvals);
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
            $this->load->view("update/students", $rtnvals);
        } else {
            $values["surname"] = $this->input->post("surname");
            $values["firstname"] = $this->input->post("firstname");
            $values["username"] = $this->input->post("username");
            $values["password"] = md5($this->input->post("pass"));
            $values["gender"] = $this->input->post("gender");
            $values["id"] = $this->uri->segment(3);
            $conf_pass = md5($this->input->post("confirm_pass"));
            if ($values["password"] != $conf_pass) {
                $rtnvals = $this->students->editstudent($this->input->post("studentid"));
                $data["pass_err"] = "Passwords do not match";
                $this->load->view("update/students", $rtnvals);
            } else {
                $data['msg'] = $this->students->updatestudents($values);
                $this->load->view("feedbacks/students",$data);
            }
        }
    }

}

?>
