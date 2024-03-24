<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class carousel extends CI_Controller {

   
    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $this->form_validation->set_rules("header", "Carousel Header", "required|trim|min_length[3]");
            $this->form_validation->set_rules("text", "Carousel Text", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->admin->editcarousel($this->input->post('id'));
            $this->load->view('updates/carousel', $data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data=array();
                $error =$this->upload->display_errors();
                $data = $this->admin->editcarousel($this->input->post('id'));
                $data['error']=$error;
                $data['text']=$data['text'];
                $data['header']=$data['header'];
                $data['id']=$data['id'];
                $this->load->view('updates/carousel', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['photo'] = $data["file_name"];
                $rec['id'] = $this->input->post('id');
                $rec["text"] = $this->input->post("text");
                $rec["header"] = $this->input->post("header");
                
                $rec["msg"] = $this->admin->updatecarousel($rec);

                $this->load->view('feedbacks/sermon', $rec);
            }
        }
    }

    

}

?>
