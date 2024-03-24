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
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

            $this->load->view('uploads/audioupload',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data["error"] =$this->upload->display_errors();
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

                $this->load->view('uploads/audioupload', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $data["msg"] = $this->audiomodel->uploadaudio($data["file_name"]);
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
