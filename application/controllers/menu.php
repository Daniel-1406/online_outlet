<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    
    public function menu_upload() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("url", "url", "required|trim");
        $this->form_validation->set_rules("status", "Status", "required|trim");
        $this->form_validation->set_rules("orientation", "Main Menu Orientation", "required|trim");
        $this->form_validation->set_rules("suborientation", "Child Menu Orientation", "required|trim");
        $this->form_validation->set_rules("numbering", "Numbering", "required|trim");

        if ($this->form_validation->run() == FALSE) {
            $data= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$data["name"];
            $data["favicon"]=$pic["photo"];
            $data["menu"] = $this->menumodel->getmainmenu();
            $data["submenu"] = $this->menumodel->getsubmenus();

            $this->load->view('uploads/menu', $data);
        } else {
            $data= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$data["name"];
            $data["favicon"]=$pic["photo"];
            $data["msg"] = $this->menumodel->uploadmenu();

            $this->load->view('feedbacks/sermon', $data);
        }
    }

    public function updatemenu() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("url", "url", "required|trim");
        $this->form_validation->set_rules("status", "Status", "required|trim");
        $this->form_validation->set_rules("orientation", "Main Menu Orientation", "required|trim");
        $this->form_validation->set_rules("suborientation", "Child Menu Orientation", "required|trim");
        $this->form_validation->set_rules("numbering", "Numbering", "required|trim");

        if ($this->form_validation->run() == FALSE) {
            $main= $this->menumodel->editmenu($this->input->post("id"));
            $data= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $main["church"]=$data["name"];
            $main["favicon"]=$pic["photo"];
            $main["menu"] = $this->menumodel->mainmenuforupdate();
            $main["submenu"] = $this->menumodel->submenuforupdate();

            $this->load->view('updates/menu', $main);
        } else {
            if($this->input->post("suborientation")=="none"){
                $orientation=$this->input->post("orientation");

            }else{
                $orientation=$this->input->post("suborientation");

            }
            $val["name"] = $this->input->post("name");
            $val["url"] = $this->input->post("url");
            $val["id"] = $this->input->post("id");
            $val["status"] = $this->input->post("status");
            $val["orientation"] = $orientation;
            $val["numbering"] = $this->input->post("numbering");


            $rec["msg"] = $this->menumodel->updatemenu($val);
            $data= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $rec["church"]=$data["name"];
            $rec["favicon"]=$pic["photo"];
            $this->load->view('feedbacks/sermon', $rec);
        }
    }

    public function viewmenu() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->menumodel->viewmenu();
        $data= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$data["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];

        $this->load->view("manage_menu", $data);
    }

    public function deletethismenu() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["msg"] = $this->menumodel->deletemenu($this->uri->segment(3));
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("feedbacks/sermon", $data);
    }

    
    public function editthismenu() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $rtnvals = $this->menumodel->editmenu($this->uri->segment(3));
        $rtnvals["menu"] = $this->menumodel->mainmenuforupdate();
        $rtnvals["submenu"] = $this->menumodel->submenuforupdate();
        $rtnvals["favicon"]=$pic["photo"];
        $rtnvals["church"]=$church["name"];
        $this->load->view("updates/menu", $rtnvals);
    }
    public function openmenu() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $data= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$data["name"];
            $data["favicon"]=$pic["photo"];
            $data["menu"]= $this->menumodel->getmainmenu();
            $data["submenu"]= $this->menumodel->getsubmenus();
            $this->load->view("uploads/menu", $data);
    }

}

?>