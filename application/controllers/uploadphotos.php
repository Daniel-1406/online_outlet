<?php

class Uploadphotos extends CI_Controller {

    public function openphotos() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view('uploads/gallery');
    }

    public function do_upload() {
        var_dump($this->input->post()); 
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Photo Title", "required|trim");
        $this->form_validation->set_rules("numbering", "Numbering value", "numeric|required|trim");


        $config['upload_path'] = './images/';
        $config['allowed_types'] = '*';//gif|jpg|png
        $config['max_size'] = 0;
        $config['overwrite'] = TRUE;
        
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);
         $this->upload->do_upload('userfile');
         $error = array('error' => $this->upload->display_errors());
                var_dump($error);die;

        if ($this->form_validation->run() == FALSE) {
            //it hasn't been ran or there are validation errorrs
            $this->load->view('uploads/gallery');
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);die;
                $this->load->view('uploads/gallery', $error);
                
            } else {

                $data = $this->upload->data();
                $upload = array('upload_data' => $data);

                $rec["msg"] = $this->gallerymodel->insert($data["file_name"]);

                $this->load->view('feedbacks/gallery', $rec);
            }
        }
    }

    public function viewgallery() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->gallerymodel->viewgallery();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

    public function deletethisgallery() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $res["msg"] = $this->gallerymodel->deletegallery($this->uri->segment(3));
        $this->load->view("feedbacks/gallery", $res);
    }

    public function editthisgallery() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $rtnvals = $this->gallerymodel->editgallery($this->uri->segment(3));
        $this->load->view("update/gallery", $rtnvals);
    }

}

?>
