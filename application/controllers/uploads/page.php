<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class page extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("login/");
    //then validation 
    $this->form_validation->set_rules("name", "Page Title", "required|trim|min_length[3]");
    $this->form_validation->set_rules("identifier", "Page Identifier", "required|trim");
    $this->form_validation->set_rules("date", "Date", "required|trim|min_length[3]|max_length[30]");
    $this->form_validation->set_rules("content", "Page Content", "required|trim|min_length[3]");
    

    if ($this->form_validation->run() == FALSE) {
     $data = $this->pagemodel->editpage($this->input->post("id"));
     $church= $this->churchinfo->getchurchinformation();
     $pic=$this->footerbackg->getfooterbg();
     $data["church"]=$church["name"];
     $data["favicon"]=$pic["photo"];

     $this->load->view("updates/page",$data);
    } else {
        if(!$this->upload->do_upload("userfile")){
            $data = array('error' => $this->upload->display_errors());
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view("updates/page",$data);


        }else{
            $data=$this->upload->data();
            $upload = array('upload_data' => $data);

        $val["name"] = $this->input->post("name");
        $val["date"] = $this->input->post("date");
        $val["content"] = $this->input->post("content");
        $val["identifier"] = $this->input->post("identifier");
        $val["banner"] = $data["filename"];
        $val["id"] = $this->input->post("id");
        $data["msg"] = $this->pagemodel->updatepage($val);
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

            $this->load->view("feedbacks/sermon", $data);
            }
        }
    
    }
    public function opencustompage() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('uploads/custompage',$data);
    }

    public function pageupload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Custom Page Title", "required|trim");
        $this->form_validation->set_rules("date", "Date", "required|trim");
        $this->form_validation->set_rules("identifier", "Page Identifier", "required|trim");
        $this->form_validation->set_rules("content", "Content", "required");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);
        
        if ($this->form_validation->run() == FALSE) {
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

            $this->load->view("uploads/custompage",$data);
        } else {
            if(!$this->upload->do_upload("userfile")){
                $data["error"] =$this->upload->display_errors();
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view("uploads/custompage",$data);

            }else{
            $data = $this->upload->data();
            $upload = array('upload_data' => $data);
            $val["name"] = $this->input->post("name");
            $val["date"] = $this->input->post("date");
            $val['banner'] = $data["file_name"];
            $val["identifier"] = $this->input->post("identifier");
            $val["content"] = $this->input->post("content");
            $data["msg"] = $this->pagemodel->uploadpage($val);
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view("feedbacks/sermon", $data);


                }
            }
    }

    public function viewpages() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->pagemodel->viewpages();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("manage", $data);
    }

    public function deletethispage() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data["msg"] = $this->pagemodel->deletepage($this->uri->segment(4));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("feedbacks/sermon", $data);
    }
    public function editthispage() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->pagemodel->editpage($this->uri->segment(4));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/custompage", $data);
    }



    

}

?>
