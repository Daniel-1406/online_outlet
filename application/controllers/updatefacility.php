<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Updatefacility extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Facility Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("description", "Facility Deescription", "required|trim|min_length[3]");


        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['max_width'] = 200000;
        $config['max_height'] = 200000;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->facilitymodel->editfacility($this->input->post('id'));
            $this->load->view('update/facility', $data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data=array();
                $error= $this->upload->display_errors();
                $data = $this->facilitymodel->editfacility($this->input->post('id'));
                $data['error']=$error;
                $data['name']=$data['name'];
                $data['photo']=$data['photo'];
                $data['description']=$data['description'];
                $data['id']=$data['id'];

                $this->load->view('update/facility', $data);
            } else {


                $data = $this->upload->data();
                $upload = array('upload_data' => $data);

                $rec["msg"] = $this->facilitymodel->updatefacility($data["file_name"]);

                $this->load->view('feedbacks/facility', $rec);
            }
        }
    }

}

?>
