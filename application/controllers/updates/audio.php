<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class audio extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Audio Title", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'mp3|wav';
        $config['max_size'] = 10000000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->audiomodel->editaudio($this->input->post("id"));
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/audio',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $error["error"] =$this->upload->display_errors();
                $data= $this->audiomodel->editaudio($this->input->post("id"));
                $data["error"]=$error;
                $data["title"] = $data["title"];
                $data["audioname"] = $data["audioname"]; 
                $data["error"] = $error["error"]; 
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('updates/audio', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['audioname'] = $data["file_name"];
                $rec['id'] = $this->input->post('id');
                $rec["title"] = $this->input->post("title");
                $data["msg"] = $this->audiomodel->updateaudio($rec);
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('feedbacks/sermon', $data);
            }
        }
    }

    

}

?>
