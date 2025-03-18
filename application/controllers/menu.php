<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    
    public function menuUpload() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("url", "url", "required|trim");
        $this->form_validation->set_rules("status", "Status", "required|trim");
        $this->form_validation->set_rules("orientation", "Main Menu Orientation", "required|trim");
        $this->form_validation->set_rules("suborientation", "Child Menu Orientation", "required|trim");
        $this->form_validation->set_rules("numbering", "Numbering", "required|trim");

        if ($this->form_validation->run() == FALSE) {
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["menu"] = $this->menumodel->getmainmenu();
            $data["submenu"] = $this->menumodel->getsubmenus();

            $this->load->view('uploads/menu', $data);
        } else {
            $feedback = $this->menumodel->uploadmenu();
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["feedback"] = $feedback;

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
            $mainDetail= $this->menumodel->editmenu($this->input->post("id"));
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["menu_name"] = $mainDetail["menu_name"];
            $data["url"] = $mainDetail["url"];
            $data["orientation"] = $mainDetail["orientation"];
            $data["status"] = $mainDetail["status"];
            $data["numbering"] = $mainDetail["numbering"];
            $data["id"] = $mainDetail["id"];
            $data["menu"] = $this->menumodel->mainmenuforupdate();
            $data["submenu"] = $this->menumodel->submenuforupdate();

            $this->load->view('updates/menu', $data);
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


            $feedback= $this->menumodel->updatemenu($val);
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["feedback"] = $feedback;
            $this->load->view('feedbacks/sermon', $data);
        }
    }

    public function viewmenu() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->menumodel->viewmenu();
        $storeInfo = $info=$this->storeinfo->getStoreInfo();
        $data["name"] = $storeInfo["name"];
        $data["logo"] = $storeInfo["logo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];

        $this->load->view("manage_menu", $data);
    }

    public function deletethismenu() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $feedback = $this->menumodel->deletemenu($this->uri->segment(3));
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["feedback"] = $feedback;
            
            $this->load->view("feedbacks/sermon", $data);
    }

    
    public function editthismenu() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $storeInfo = $info=$this->storeinfo->getStoreInfo();
            
        $data = $this->menumodel->editmenu($this->uri->segment(3));
        $data["menu"] = $this->menumodel->mainmenuforupdate();
        $data["submenu"] = $this->menumodel->submenuforupdate();
        $data["name"] = $storeInfo["name"];
        $data["logo"] = $storeInfo["logo"];
       
        $this->load->view("updates/menu", $data);
    }
    public function openmenu() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["menu"]= $this->menumodel->getmainmenu();
            $data["submenu"]= $this->menumodel->getsubmenus();
            $this->load->view("uploads/menu", $data);
    }

}

?>