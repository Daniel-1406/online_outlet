<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class leadershipteam extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("position", "Position", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $church= $this->churchinfo->getchurchinformation();
            $data = $this->carouselmodel->editleader($this->input->post("id"));
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/leadershipteam',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data["error"] = $this->upload->display_errors();
                $church= $this->churchinfo->getchurchinformation();
                $data = $this->carouselmodel->editleader($this->input->post("id"));
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('updates/leadershipteam', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['photo'] = $data["file_name"];
                $rec['id'] = $this->input->post('id');
                $rec["position"] = $this->input->post("position");
                $rec["name"] = $this->input->post("name");
                
                $data["msg"] = $this->carouselmodel->updateleader($rec);
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
