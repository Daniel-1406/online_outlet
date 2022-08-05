<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menuci extends CI_Controller {

    public function openregistermenu() {
        if ($this->session->userdata("admin") == "")
            redirect("login/");
        $main["menu"] = $this->menumodel->getmainmenu();
        $this->load->view("registermenu", $main);
    }

    public function openmenuview() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->menumodel->getpagemenuforview();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("viewmenu", $data);
    }

    public function registermenu() {

        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("url", "url", "required|trim");
        $this->form_validation->set_rules("status", "Status", "required|trim");
        $this->form_validation->set_rules("orientation", "Orientation", "required|trim");
        $this->form_validation->set_rules("numbering", "Numbering", "required|trim");

        if ($this->form_validation->run() == FALSE) {
            $main["menu"] = $this->menumodel->getmainmenu();

            //it hasn't been ran or there are validation errorrs
            $this->load->view('registermenu', $main);
        } else {
            $rec["msg"] = $this->menumodel->registermenu();

            $this->load->view('menusuccess', $rec);
        }
    }

    public function deletethismenu() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $res["msg"] = $this->menumodel->deletemenu($this->uri->segment(3));
        $this->load->view("menusuccess", $res);
    }

    public function editthismenu() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $rtnvals = $this->menumodel->editmenu($this->uri->segment(3));
        $rtnvals["menu"] = $this->menumodel->mainmenuforupdate();

        $this->load->view("editmenu",$rtnvals);
    }

}

?>