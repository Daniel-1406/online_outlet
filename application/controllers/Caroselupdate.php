<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Caroselupdate extends CI_Controller {

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
            $rtnvals = $this->carouselmodel->editcarousel($this->input->post('id'));
            $this->load->view('editcarousels', $rtnvals);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data['error'] = array('error' => $this->upload->display_errors());
                $data['rtnvals'] = $this->carouselmodel->editcarousel($this->input->post('id'));
                $this->load->view('editcarousels', $data);
            } else {

                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['file_name'] = $data["file_name"];
                $rec['id'] = $this->input->post('id');


                $field["name"] = $this->input->post("name");
                $field["carouselid"] = $this->input->post("id");
                $field["photo"] = $data['file_name'];
                $field["heading"] = $this->input->post("heading");
                $field["description"] = $this->input->post("description");
                $field["url"] = $this->input->post("url");
                $field["orientation"] = $this->input->post("orientation");
                $field["status"] = $this->input->post("status");


                $rec["msg"] = $this->carouselmodel->updatecarousel($field);
               

                $this->load->view('carouselsuccess', $rec);
            }
        }
    }

}

