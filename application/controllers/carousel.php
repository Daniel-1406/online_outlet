<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class carousel extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("header", "Carousel Header", "required|trim|min_length[3]");
        $this->form_validation->set_rules("text", "Carousel Text", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
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
            $this->load->view('uploads/carousel',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data["error"] = $this->upload->display_errors();
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('uploads/carousel', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $data["msg"] = $this->carouselmodel->uploadcarousel($data["file_name"]);
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('feedbacks/sermon', $data);
            }
        }
    }

    public function opencarousel() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
        $this->load->view('uploads/carousel',$data);
    }
    
    public function viewcarousel() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->carouselmodel->viewcarousel();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

    public function deletethiscarousel() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data["msg"] = $this->carouselmodel->deletecarousel($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("feedbacks/sermon", $data);
    }
    public function editthiscarousel() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->carouselmodel->editcarousel($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/carousel", $data);
    }

}

?>
