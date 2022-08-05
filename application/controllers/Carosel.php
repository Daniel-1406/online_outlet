<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carosel extends CI_Controller {

    public function createcarousel() {

        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        // $data["mains"]=  $this->Menumodel->getmainmennu();
        $this->load->view('createcarousel');
    }

    public function do_upload() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("url", "url", "required|trim");
        $this->form_validation->set_rules("status", "Status", "required|trim");
        $this->form_validation->set_rules("orientation", "rientation", "required|trim");
        $this->form_validation->set_rules("heading", "heading", "required|trim");
        $this->form_validation->set_rules("description", "Deescription", "required|trim|min_length[3]");


        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['max_width'] = 200000;
        $config['max_height'] = 200000;
        $this->load->library('upload', $config);



        if ($this->form_validation->run() == FALSE) {
            //it hasn't been ran or there are validation errorrs

            $this->load->view('createcarousel');
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('createcarousel', $error);
            } else {


                $data = $this->upload->data();
                $upload = array('upload_data' => $data);

                $rec["msg"] = $this->carouselmodel->insertcarousel($data["file_name"]);

                $this->load->view('carouselsuccess', $rec);
            }
        }
    }

    public function viewcarousel() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->carouselmodel->viewcarosel();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("viewmenu", $data);
    }

    public function deletethiscarousel() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $res["msg"]=$this->carouselmodel->deletecarousel($this->uri->segment(3));
        $this->load->view("carouselsuccess", $res);
    }

    public function editthiscarousel() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $rtnvals = $this->carouselmodel->editcarousel($this->uri->segment(3));
        $this->load->view("editcarousels", $rtnvals);
    }

   

}

