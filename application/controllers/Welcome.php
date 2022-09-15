<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        //$this->welcomemodel->setuptables();
        $this->load->view('login.php');
    }

    public function login() {
        $val = $this->students->adminlogin();
        if ($val == "wrong") {
            $data["val"] = "<span style='color:red'>Wrong Username or password!</span>";
            $this->load->view("login", $data);
        } else {
            $this->load->view("welcome_page");
        }
    }

    public function schooldetails() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $data["state"] = $this->welcomemodel->getnigeriastates();
        $data["school"] = $this->welcomemodel->getschoolinformation();
        $this->load->view("schooldetails", $data);
    }

    public function socialmedia() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $data["social"] = $this->welcomemodel->getsocialmedialinks();
        $this->load->view("socialmedia", $data);
    }

    public function openevent() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view("event");
    }

    public function openfacility() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view("facility");
    }

    public function opennews() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view("news");
    }

    public function opencustompages() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view("createcustompages");
    }

    public function updatesocialmedia() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("twitter", "Twitter link", "required|trim|min_length[3]");
        $this->form_validation->set_rules("facebook", "Facebook Link", "required|trim|min_length[3]");
        $this->form_validation->set_rules("instagram", "Istagram Link", "required|trim|min_length[3]");

        if ($this->form_validation->run() == FALSE) {
            $this->socialmedia();
        } else {
            $lat["msg"] = $this->welcomemodel->socialmedia();
            $this->load->view("socialmediafeedback", $lat);
        }
    }

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
            $this->load->view("schoolupdatefeedback", $lat);
        }
    }

    public function openstudents() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->students->getAll();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("viewstudents", $data);
    }

    public function deletethisstudent() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $this->students->deletestudent($this->uri->segment(3));
        redirect("welcome/openstudents");
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

