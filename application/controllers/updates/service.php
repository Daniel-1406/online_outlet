<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class service extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Program Title", "required|trim|min_length[3]");
        $this->form_validation->set_rules("duration", "Program Duration", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 4000000000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->servicemodel->editservice($this->input->post('id'));
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/service',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data=array();
                $error=$this->upload->display_errors();
                $data = $this->servicemodel->editservice($this->input->post('id'));
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $data["error"]=$error;

                $this->load->view('updates/service', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['pic'] = $data["file_name"];
                $rec['id'] = $this->input->post('id');
                $rec["duration"] = $this->input->post("duration");
                $rec["title"] = $this->input->post("title");
                
                $data["msg"] = $this->servicemodel->updateservice($rec);
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
