<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class minicarousel extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("text", "Text", "required|trim|min_length[3]");
        $this->form_validation->set_rules("label", "Label", "required|trim");
        $this->form_validation->set_rules("numbering", "Numbering", "required|trim");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->minicarouselmodel->editminicarousel($this->input->post('id'));
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/minicarousel',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data=array();
                $error=$this->upload->display_errors();
                $data = $this->minicarouselmodel->editminicarousel($this->input->post('id'));
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $data["error"]=$error;

                $this->load->view('updates/minicarousel', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['photo'] = $data["file_name"];
                $rec['id'] = $this->input->post('id');
                $rec["text"] = $this->input->post("text");
                $rec["label"] = $this->input->post("label");
                $rec["numbering"] = $this->input->post("numbering");
                
                $data["msg"] = $this->minicarouselmodel->updateminicarousel($rec);
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
