<?php

class Updategallery extends CI_Controller {

    public function openphotos() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->load->view('uploads/gallery');
    }

    public function do_upload() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Photo Title", "required|trim");
        $this->form_validation->set_rules("numbering", "Numbering value", "numeric|required|trim");


        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->gallerymodel->editgallery($this->input->post('id'));
            $this->load->view('update/gallery', $data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data=array();
                $error =$this->upload->display_errors();
                $data = $this->gallerymodel->editgallery($this->input->post('id'));
                $data['error']=$error;
                $data['title']=$data['title'];
                $data['photo']=$data['photo'];
                $data['numbering']=$data['numbering'];
                $data['id']=$data['id'];
                $this->load->view('update/gallery', $data);
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
