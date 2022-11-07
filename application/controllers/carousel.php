<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends CI_Controller {

    public function opencarousel() {

        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view('uploads/carousel');
    }

    public function do_upload() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("url", "url", "required|trim");
        $this->form_validation->set_rules("status", "Status", "required|trim");
        $this->form_validation->set_rules("orientation", "Orientation", "required|trim");
        $this->form_validation->set_rules("heading", "heading", "required|trim");
        $this->form_validation->set_rules("description", "Deescription", "required|trim");


        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);



        if ($this->form_validation->run() == FALSE) {

            $this->load->view('uploads/carousel');
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('uploads/carousel', $error);
            } else {
                
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);

                $rec["msg"] = $this->carouselmodel->insertcarousel($data["file_name"]);

                $this->load->view('feedbacks/carousel', $rec);
            }
        }
    }

    public function viewcarousel() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->carouselmodel->viewcarosel();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

    public function deletethiscarousel() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $res["msg"] = $this->carouselmodel->deletecarousel($this->uri->segment(3));
        $this->load->view("feedbacks/carousel", $res);
    }

    public function editthiscarousel() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $rtnvals = $this->carouselmodel->editcarousel($this->uri->segment(3));
        $this->load->view("update/carousel", $rtnvals);
    }

}

