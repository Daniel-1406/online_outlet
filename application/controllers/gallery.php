<?php
class Gallery extends CI_Controller{
    
    
    public function upload_photos() {
        $this->load->view('upload_photos');
        
        
    }

     public function do_upload() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Photo Title", "required|trim");
        $this->form_validation->set_rules("numbering", "Numbering value", "numeric|required|trim");


        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['max_width'] = 200000;
        $config['max_height'] = 200000;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            //it hasn't been ran or there are validation errorrs
            $this->load->view('upload_photos');
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload_photos', $error);
            } else {


                $data = $this->upload->data();
                $upload = array('upload_data' => $data);

                $rec["msg"] = $this->gallerymodel->insert($data["file_name"]);

                $this->load->view('upload_feedback', $rec);
            }
        }
    }
    
    
     public function viewgallery() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->gallerymodel->viewgallery();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("viewmenu", $data);
    }
    
        public function deletethisgallery() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $res["msg"]=$this->gallerymodel->deletegallery($this->uri->segment(3));
        $this->load->view("upload_feedback", $res);
    }

    public function editthisgallery() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $rtnvals = $this->gallerymodel->editgallery($this->uri->segment(3));
        $this->load->view("editgallery", $rtnvals);
    }
    
    
    
}
?>
