<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class video_upload extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $this->form_validation->set_rules("topic", "Video Heading", "required|trim|min_length[3]");
            $this->form_validation->set_rules("speaker", "Speaker", "required|trim|min_length[3]");
            $this->form_validation->set_rules("summary", "Summary", "required|trim|min_length[3]");
            $this->form_validation->set_rules("date", "Date", "required|trim|min_length[3]");
            $this->form_validation->set_rules("link", "Link", "required|trim");
    
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 10000000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->videomodel->editvideo($this->input->post("id"));
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/video',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {    
                $data["error"] =$this->upload->display_errors();
                $data= $this->videomodel->editvideo($this->input->post("id"));
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

                $this->load->view('updates/video', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['pic'] = $data["file_name"];
                $rec['id'] = $this->input->post('id');
                $rec["topic"] = $this->input->post("topic");
                $rec["speaker"] = $this->input->post("speaker");
                $rec["summary"] = $this->input->post("summary");
                $rec["date"] = $this->input->post("date");
                $rec["link"] = $this->input->post("link");

                $data["msg"] = $this->videomodel->updatevideo($rec);
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
