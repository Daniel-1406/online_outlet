<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class gallery extends CI_Controller {

   
    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $this->form_validation->set_rules("caption", "Photo Caption", "required|trim|min_length[3]");
            $this->form_validation->set_rules("category", "Category", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->gallerymodel->editgallery($this->input->post('id'));
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/gallery', $data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data=array();
                $data["error"] =$this->upload->display_errors();
                $data = $this->gallerymodel->editgallery($this->input->post('id'));
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

                $this->load->view('updates/gallery', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['name'] = $data["file_name"];
                $rec['id'] = $this->input->post('id');
                $rec["caption"] = $this->input->post("caption");
                $rec["category"] = $this->input->post("category");
                
                $data["msg"] = $this->gallerymodel->updategallery($rec);
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
