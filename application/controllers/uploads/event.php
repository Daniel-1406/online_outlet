<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class event extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Service Title", "required|trim|min_length[3]");
        $this->form_validation->set_rules("summary", "Service Summary", "required|trim|min_length[3]");
        $this->form_validation->set_rules("date", "Service Day", "required|trim|min_length[3]");
        $this->form_validation->set_rules("location", "Service Location", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->eventmodel->editevent($this->input->post('id'));
            $this->load->view('updates/event',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data=array();
                $data["error"] =$this->upload->display_errors();
                $data = $this->eventmodel->editevent($this->input->post('id'));
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

                $this->load->view('updates/event', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['pic'] = $data["file_name"];
                $rec['id'] = $this->input->post('id');
                $rec["summary"] = $this->input->post("summary");
                $rec["title"] = $this->input->post("title");
                $rec["date"] = $this->input->post("date");
                
                $data["msg"] = $this->eventmodel->updateevent($rec);
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
