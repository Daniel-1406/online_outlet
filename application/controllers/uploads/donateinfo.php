<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class donateinfo extends CI_Controller {

   
    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $this->form_validation->set_rules("heading", "Donate Feature Heading", "required|trim|min_length[3]");
            $this->form_validation->set_rules("information", "Donate Feature Message", "required|trim|min_length[3]");
            $this->form_validation->set_rules("button_text", "Donate Button Text", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->donatemodel->getdonateitems();
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

            $this->load->view('updates/donateinfo', $data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data=array();
                $data["error"] =$this->upload->display_errors();
                $data = $this->donatemodel->getdonateitems();
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

                $this->load->view('updates/donateinfo', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['photo'] = $data["file_name"];
                $rec['heading'] = $this->input->post('heading');
                $rec["information"] = $this->input->post("information");
                $rec["button_info"] = $this->input->post("button_text");
                
                $data["msg"] = $this->donatemodel->updatedonateitems($rec);
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
